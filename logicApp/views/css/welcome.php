<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('commanmodel'), '', true);
        if (strpos(uri_string(),'.js') == false) {
            $user=($this->session->userdata('keralaonroads_name'))?$this->session->userdata('keralaonroads_name'):"Gust";
            $trafic = Array(
                        'ip' => $this->input->ip_address(),
                        'page' => uri_string(),
                        'username' => $user,
                        'date' => date("Y-m-d")
                    );
            $this->db->insert('traffic',$trafic);
        }
        else{
            exit;
        }        
    }

    public function index() {
        $webData['tittle'] = "Welcome To KeralaOnRoad";
        $webData['style'][] = "index";
        $webData['script'][] = "index";
        $webData['content'][] = 'welcome';
        $this->load->view('templates/welcome', $webData);
    }

    public function login() {
        if ($this->session->userdata('keralaonroads')) {
            redirect(site_url('welcome'));
        }
        $this->load->model('datas');
        $this->load->model('CommanModel');
        $this->load->model('validate');
        $this->load->model('validate');
        $this->load->model('users');
        $this->load->library('encrypt');
        $this->error = 0;
        $this->message = '';
        if (isset($_POST['submit'])) {
            if (!isset($_POST['userName'])) {
                $this->error++;
                $this->message = 'Please enter Your Username';
            }
            if (!filter_var($this->input->post('userName'), FILTER_VALIDATE_EMAIL)) {
                $type = 'name';
                $this->error++;
                $this->message = 'Please enter a valid email like sample@keralaonroads.com ';
            }
            if (( strlen($this->input->post('userName')) <= 6 ) || ( strlen($this->input->post('userName')) > 50 )) {
                $this->error++;
                $this->message = 'not a valid email (6-50 charcters)';
            }
            if (!isset($_POST['pass'])) {
                $this->error++;
                $this->message = 'Please enter your password';
            }
            if (strlen($this->input->post('pass')) < 5) {
                $this->error++;
                $this->message = 'small pwd (>5 characters)';
            }
            if (( isset($_POST['userName']) ) && ( isset($_POST['pass']) )) {
                $password = $this->input->post('pass');
                $this->users->make_password($password);
                $password = $this->users->enc_password;
                $username = $this->input->post('userName');
                $user = $this->db->get_where('users', array('email' => $username, 'passwords' => $password));
                $count = $user->num_rows();
                if ($count == 1) {
                    $row = $user->row();
                    $id = $row->user_id;
                    $status = $row->status;
                    if ($status == 0) {
                        $this->error++;
                        $this->message = 'Confirm your mail please ,Check your mail box';
                    } else {
                        if ($row->utype_id == 107) {
                            $this->message = 'you are successfully logined now';
                            $this->session->set_userdata("keralaonroads_admin", $id);
                            $this->session->set_userdata("keralaonroads", $id);
                            $this->session->set_userdata("keralaonroads_name", "Admin");
                            redirect('welcome');
                        } else {
                            $this->message = 'you are successfully logined now';
                            $this->session->set_userdata("keralaonroads", $id);
                            $this->session->set_userdata("keralaonroads_name", $username);
                            redirect('welcome');
                        }
                    }
                } else {
                    $this->error++;
                    $this->message = 'Please enter a valid username or password';
                }
            }
        }
        $webData['error'] = $this->error;
        $webData['data'] = $this->message;
        $webData['tittle'] = "KeralaOnRoad - Login";
        $webData['script'][] = "login";
        $webData['content'][] = 'login';
        $this->load->view('templates/welcome', $webData);
    }

    public function mail_confirm() {
        if ($this->uri->segment(3)) {
            $query = $this->db->get_where('users', array('keys' => $this->uri->segment(3)));
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data = array('status' => 1, 'keys' => '');
                    $this->db->update('users', $data, array('user_id' => $row->user_id));
                    echo 'Your email address confirmed  <a href="' . base_url() . 'welcome/login">Click here</a> to login now';
                }
            } else {
                echo 'Not a valid email confirmation key may be user already activated. <a href="' . base_url() . 'welcome/login">Click here</a> to login now';
            }
        } else {
            redirect('welcome/login');
        }
    }

    public function forgotpassword() {
        if ($this->session->userdata('keralaonroads')) {
            redirect(site_url('welcome'));
        }
        $webData['script'][] = 'forgotpassword';
        $webData['content'][] = 'forgotpassword';
        $this->load->view('templates/welcome', $webData);
    }

    public function passSetEmail() {

        if ($this->session->userdata('keralaonroads')) {
            redirect(site_url('welcome'));
        }
        if (isset($_POST['userName'])) {
            $ipaddress = $this->input->ip_address();
            $this->db->select('user_id');
            $result = $this->db->get_where('users', array('email' => $this->post('userName')));
            $user = $result->result();
            if (isset($user[0]->user_id)) {
                $this->db->update('users', array('keys' => $this->users->make_email_conf_key($this->input->post('userName'))), array('user_id' => $user[0]->user_id));
                $this->load->library('email');
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'vps.tricetechnologies.in',
                    'smtp_port' => 587,
                    'smtp_user' => 'customersupport@keralaonroad.com',
                    'smtp_pass' => '_C^(4^6L=P^r',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                $this->email->initialize($config);
                $this->email->from('customersupport@keralaonroad.com', 'Support');
                $this->email->to($this->input->post('userName'));
                $this->email->bcc('noreplay@keralaonroad.com');
                $this->email->subject('Reset Password- Keralaonroad.com');
                $this->email->message('You receive this email because the IP' . $ipaddress . ' asked for a password renewal<br/>
Your password has not been changed yet, but you can reset it <a href="' . site_url('welcome/passwordReSet') . '/' . $this->users->confirmkey . '/' . $this->input->post('userName') . '">here</a> <br/><br/>The keralaonroad.com Team'
                );
                $this->email->send();
                $this->email_message = $this->email->print_debugger();
                redirect(site_url('welcome/login'));
            }
        }
        $webData['script'][] = 'forgotpassword';
        $webData['content'][] = 'forgotpassword';
        $this->load->view('templates/welcome', $webData);
    }

    public function passwordReSet() {
        $this->load->library('encrypt');
        $this->load->model('users');
        if ($this->uri->segment(3) && $_GET['email']) {
            $query = $this->db->get_where('users', array('keys' => $this->uri->segment(3), 'email' => $_GET['email']));
            $result = $query->result();
            if (count($result) == 1) {
                if (isset($_POST['newPass'])) {
                    $password = $this->input->post('newPass');
                    $this->users->make_password($password);
                    $ipaddress = $this->input->ip_address();
                    $platform = 1;
                    $password = $this->users->enc_password;
                    $this->db->update('users', array('passwords' => $password, 'ipaddress' => $ipaddress, 'status' => 1), array('user_id' => $result[0]->user_id));
                    redirect('welcome/login');
                } else {
                    $webData['content'][] = 'passwordSet';
                    $this->load->view('templates/welcome', $webData);
                }
            } else {
                echo 'Not a valid email confirmation key may be user already activated. <a href="' . base_url() . 'welcome/login">Click here</a> to login now';
            }
        } else {
            redirect('welcome/login');
        }
    }

    public function viewdetails() {
        if ($this->input->get('viewnew') || $this->input->get('view')) {
            $this->load->view('pages/viewdetails');
        }
    }

    public function register() {
        $this->load->model('datas');
        $this->load->model('CommanModel');
        $this->load->model('validate');
        $this->load->model('validate');
        $this->load->model('users');
        $this->load->library('encrypt');
        $this->error = 0;
        $this->message = '';
        if (isset($_POST['submit'])) {
            if (!isset($_POST['name'])) {
                $this->message = 'Please enter your name';
                $this->error++;
            }
            if (( strlen($this->input->post('name')) <= 3 ) || ( strlen($this->input->post('name')) > 30 )) {
                $this->message = 'Please enter your name use 4-30 characters';
                $this->error++;
            }
            if (!preg_match("/^[a-zA-Z' .-]+$/", $this->input->post('name'))) {
                $this->message = 'Please enter your name use A-Z a-z characters';
                $this->error++;
            }
            if (!isset($_POST['location'])) {
                $this->message = 'Please enter your location';
                $this->error++;
            }
            if (( strlen($this->input->post('location')) <= 3 ) || ( strlen($this->input->post('location')) > 30 )) {
                $this->message = 'Please enter your location use 4-30 characters';
                $this->error++;
            }
            if (!preg_match("/^[a-zA-Z' .-]+$/", $this->input->post('location'))) {
                $this->message = 'Please enter your location use A-Z a-z characters';
                $this->error++;
            }
            if (!isset($_POST['phone'])) {
                $this->message = 'Please enter a  Mobile Number';
                $this->error++;
            }
            if (( strlen($this->input->post('phone')) <= 9 ) || ( strlen($this->input->post('phone')) > 12 )) {
                $this->message = 'Not a valid Mobile Number only 10 to 12 charcters allowed';
                $this->error++;
            }
            if (!preg_match("/^[0-9]+$/", $this->input->post('phone'))) {
                $this->message = 'Not a valid Mobile Number only numbers allowedsss';
                $this->error++;
            }
            if (!isset($_POST['email'])) {
                $this->message = 'Please enter your email';
                $this->error++;
            }
            if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                $this->message = 'Enter a valid email address like "example@mail.com"';
                $this->error++;
            }
            if (( strlen($this->input->post('email')) <= 6 ) || ( strlen($this->input->post('email')) > 50 )) {
                $this->message = 'Enter a valid email address use 7-50 charcters';
                $this->error++;
            } else {
                $sql = $this->db->get_where('users', array('email' => $this->input->post('email')));
                if ($sql->num_rows() > 0) {
                    $this->message = 'This email already exists in our records';
                    $this->error++;
                }
                $sql->free_result();
            }
            if (!isset($_POST['pass'])) {
                $this->message = 'Please enter a password';
                $this->error++;
            }
            if (strlen($this->input->post('pass')) <= 5) {
                $this->message = 'Password is too small min 5 characters';
                $this->error++;
            }
            if (!isset($_POST['rpass'])) {
                $this->message = 'Please Enter confirm password';
                $this->error++;
            }
            if ($this->input->post('pass') != $this->input->post('rpass')) {
                $this->message = 'Password and confirm passwords do not match';
                $this->error++;
            }

            if ($this->error == 0) {
                if (( isset($_POST['email']) ) && ( isset($_POST['pass']) )) {
                    $password = $this->input->post('pass');
                    $username = $this->input->post('email');
                    if ($password == $username) {
                        $this->message = 'Same Email and password';
                        $this->error++;
                    }
                    if ($this->error == 0) {
                        $this->users->make_password($password);
                        $ipaddress = $this->input->ip_address();
                        $platform = 1;
                        $password = $this->users->enc_password;
                        $this->users->make_email_conf_key($username);
                        $this->db->insert('users', array(
                            'email' => $username,
                            'username' => $this->input->post('name'),
                            'passwords' => $password,
                            'contactno' => $this->input->post('phone'),
                            'location' => $this->input->post('location'),
                            'status' => 0,
                            'utype_id' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'ac_type' => 1,
                            'keys' => $this->users->confirmkey,
                            'ipaddress' => $ipaddress));
                        $this->load->library('email');
                        $config = Array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'vps.tricetechnologies.in',
                            'smtp_port' => 587,
                            'smtp_user' => 'customersupport@keralaonroad.com',
                            'smtp_pass' => '_C^(4^6L=P^r',
                            'mailtype' => 'html',
                            'charset' => 'iso-8859-1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('info@keralaonroad.com', 'Keralaonroad');
                        $this->email->bcc($username);
                        $this->email->to('info@keralaonroad.com');
                        $this->email->subject('Welcome TO keralaonroad.com');
                        $this->email->message('Greeting from Keralaonroad.com<br/><br/>

The India’s no.1 Automobile dealers, buyers, retailers, manufacturers and all other related entities under one single roof<br/>
Our team strives to initiate and retain better and long term customer relationship, for us quality is not something confined to the<br/> products and services we offer, but it’s a virtue that resonates<br/><br/>

It’s essential to meet the requirements of terms & conditions and privacy policy as part of the validation of your email ID<br/> ' . $username . ' for your account on keralaonroad.com. To proceed and verify the email id please click <a href="' . site_url('welcome/mail_confirm') . "/" . $this->users->confirmkey . '">here</a><br/>
Please note that your username is the email address associated with this account<br/><br/>

You will need this every time you want to log on to the website, so keep it safe and don’t share it with any one.<br/><br/>

Sincerely<br/>
The Keralaonroad.com Team
');
                        $this->email->send();
                        $this->email_message = $this->email->print_debugger();
                        if ($this->db->affected_rows() > 0) {
                            $userid = $this->db->insert_id();
                            $this->message = 'Successfully Registered go to plan <a href="' . redirect('welcome/plans') . '">Click</a>';
                            //redirect('welcome/plans');
                        } else {
                            $this->message = 'something error occured';
                            $this->error++;
                        }
                    }
                }
            }
        }
        $webData['error'] = $this->error;
        $webData['data'] = $this->message;
        $webData['tittle'] = "KeralaOnRoads - Register";
        $webData['script'][] = "register";
        $webData['content'][] = 'register';
        $this->load->view('templates/welcome', $webData);
    }

    public function plans() {
        $webData['tittle'] = "KeralaOnRoads - Plans";
        $webData['style'][] = "plans";
        $webData['content'][] = 'plans';
        $this->db->where('vehicle_type !=', 2);
        $this->db->order_by('vehicle_type', 'ASC');
        $webData['bikePlan'] = $this->db->get('uptype')->result();
        $this->db->where('vehicle_type !=', 1);
        $this->db->order_by('vehicle_type', 'ASC');
        $webData['carPlan'] = $this->db->get('uptype')->result();
        $userId = $this->session->userdata('keralaonroads');
        if ($userId) {
            $this->db->select('user_id,status,utype_id,ac_type');
            $webData['user'] = $this->db->get_where('users', array('user_id' => $userId))->result();
        }
        $this->load->view('templates/welcome', $webData);
    }

    public function upgrade() {
        $userId = $this->session->userdata('keralaonroads');
        if ($userId) {
            $acount = $this->db->get_where('users', array('user_id' => $userId))->result();
            $webData['account'] = $acount;
            $webData['new'] = $this->db->get_where('uptype', array('uptype_id' => $this->uri->segment(3)))->result();
            if (isset($_POST['user'], $_POST['plan']) && $userId === $this->input->post('user') && $this->uri->segment(3) === $this->input->post('plan')) {
                $SECURE_SECRET = "03A41248FE404892E1CC5E77CE9EE4FA";
                $vpcURL = "https://migs.mastercard.com.au/vpcpay?";
                $this->db->insert('plan_data', array('user_id' => $this->input->post('user'), 'plan_id' => $this->input->post('plan'), 'amount' => $webData['new'][0]->fees, 'date' => date('Y-m-d')));
                $id = $this->db->insert_id();
                unset($_POST["user"]);
                unset($_POST["plan"]);
                $paymenData = array(
                    "Title" => "PHP VPC 3-Party",
                    "vpc_Version" => 1,
                    "vpc_Command" => "pay",
                    "vpc_AccessCode" => "E3201AD2",
                    "vpc_MerchTxnRef" => "Data".$id,
                    "vpc_Merchant" => "KERALAONROAD",
                    "vpc_OrderInfo" => "Payment".$id,
                    "vpc_Amount" => ($webData['new'][0]->fees * 100),
                    "vpc_Locale" => "en",
                    "vpc_ReturnURL" => site_url("welcome/planUpdate/$id"),
                    "vpc_TicketNo" => $id
                );
                $md5HashData = $SECURE_SECRET;
                ksort($paymenData);
                $appendAmp = 0;
                foreach ($paymenData as $key => $value) {

                    // create the md5 input and URL leaving out any fields that have no value
                    if (strlen($value) > 0) {

                        // this ensures the first paramter of the URL is preceded by the '?' char
                        if ($appendAmp == 0) {
                            $vpcURL .= urlencode($key) . '=' . urlencode($value);
                            $appendAmp = 1;
                        } else {
                            $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
                        }
                        $md5HashData .= $value;
                    }
                }
                if (strlen($SECURE_SECRET) > 0) {
                    $vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($md5HashData));
                }
                header("Location: " . $vpcURL);
                exit;
            }
            $webData['current'] = $this->db->get_where('uptype', array('uptype_id' => $acount[0]->ac_type))->result();
            if (((int) $this->uri->segment(3)) && $acount[0]->ac_type && $this->uri->segment(3) != $acount[0]->ac_type) {
                $webData['tittle'] = "KeralaOnRoads - Upgrade Plan";
                $webData['style'][] = "plans";
                $webData['content'][] = 'upgrade';
                $this->load->view('templates/welcome', $webData);
                //exit;
            } else {
                redirect('welcome');
            }
        }
    }

    public function planUpdate() {
        $userId = $this->session->userdata('keralaonroads');
        $dataId = $this->uri->segment(3);
        $palnData = $this->db->get_where('plan_data', array('id' => $dataId))->result();
        if ($palnData[0]->user_id === $userId) {
            $user = $this->db->get_where('users', array('user_id' => $userId))->result();
            $SECURE_SECRET = " 2299EEE1E6A44BDEA60F82EB580BB5F3";
            $vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];
            $this->db->insert('transations', array('Title' => $this->input->get('Title'),
                'vpc_Amount' => $this->input->get('vpc_Amount'),
                'vpc_Locale' => $this->input->get('vpc_Locale'),
                'vpc_BatchNo' => $this->input->get('vpc_BatchNo'),
                'vpc_Command' => $this->input->get('vpc_Command'),
                'vpc_Message' => $this->input->get('vpc_Message'),
                'date' => date('Y-m-d')));
            $id = $this->db->insert_id();
            if ($_GET["vpc_TxnResponseCode"] == 0) {
                $this->db->update('plan_data', array('transation_id' => $id, 'status' => 1), array('id' => $dataId));
                $this->db->update('users', array('ac_type' => $palnData[0]->plan_id, 'updated_at' => date('Y-m-d')), array('user_id' => $userId));
                $toEmail = "operationmanager@keralaonroad.com";
                $this->load->library('email');
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'vps.tricetechnologies.in',
                    'smtp_port' => 587,
                    'smtp_user' => 'customersupport@keralaonroad.com',
                    'smtp_pass' => '_C^(4^6L=P^r',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                $this->email->initialize($config);
                $this->email->from('customersupport@keralaonroad.com', 'Keralaonroad');
                $this->email->to($toEmail);
                $this->email->subject('New Plan');
                $this->email->message("User Name:" . $user[0]->email . "<br />Amount:" . ($_GET["vpc_Amount"]/100));
                $this->email->send();
                $sms['mobileNo']=$user[0]->contactno;
                $sms['message']='Thank you for Updating your plan.';
                $this->load->view('pages/sms', $sms);
            }
            $webData['content'][] = 'payment/respose';
            $this->load->view('templates/welcome', $webData);
        }
    }

    function null2unknown($data) {
        if ($data == "") {
            return "No Value Returned";
        } else {
            return $data;
        }
    }

    public function loginnow() {
        if (!isset($_POST['userName'])) {
            $this->error = true;
            $this->message = 'Please enter Your Username';
            $this->datas->output();
        }
        if (!filter_var($this->input->post('userName'), FILTER_VALIDATE_EMAIL)) {
            $type = 'name';
            $this->error = true;
            $this->message = 'Please enter a valid email like sample@keralaonroads.com ';
            $this->datas->output();
        }
        if (( strlen($this->input->post('userName')) <= 6 ) || ( strlen($this->input->post('userName')) > 50 )) {
            $this->error = true;
            $this->message = 'not a valid email (6-50 charcters)';
            $this->datas->output();
        }
        if (!isset($_POST['pass'])) {
            $this->error = true;
            $this->message = 'Please enter your password';
            $this->datas->output();
        }
        if (strlen($this->input->post('pass')) < 5) {
            $this->error = true;
            $this->message = 'small pwd (>5 characters)';
            $this->datas->output();
        }
        if (( isset($_POST['userName']) ) && ( isset($_POST['pass']) )) {
            $password = $this->input->post('pass');
            $this->users->make_password($password);
            $password = $this->users->enc_password;
            $username = $this->input->post('userName');
            $user = $this->db->get_where('users', array('email' => $username, 'passwords' => $password));
            $count = $user->num_rows();
            if ($count == 1) {
                $row = $user->row();
                $id = $row->user_id;
                $status = $row->status;
                if ($status == 0) {
                    $this->error = true;
                    $this->message = 'Confirm your mail please ,Check your mail box';
                    $this->datas->output();
                } else {
                    $this->error = false;
                    $this->message = 'you are successfully logined now';
                    $this->session->set_userdata("keralaonroads", $id);
                    $sname = $this->session->userdata('keralaonroads');
                    $this->datas->output();
                }
            } else {
                $this->error = true;
                $this->message = 'Please enter a valid username or password';
                $this->datas->output();
            }
        }
        $this->datas->output();
    }

    public function view() {
        $webData['tittle'] = "KeralaOnRoads - About";
        $webData['content'][] = 'view';
        $this->load->view('templates/welcome', $webData);
    }

    public function sell() {
        $sname = $this->session->userdata('keralaonroads');
        $this->message = '';
        $this->error = '';
        if (!$this->session->userdata('keralaonroads')) {
            redirect('welcome/login');
        }
        $this->db->select('ac_type');
        $acount = $this->db->get_where('users', array('user_id' => $sname))->result();
        if ($acount[0]->ac_type) {
            $this->db->select('num_vehicle,num_cars,num_bikes');
            $plan = $this->db->get_where('uptype', array('uptype_id' => $acount[0]->ac_type))->result();
            $this->db->select('count(*) as Total');
            $numcar = $this->db->get_where('vehicle_details', array('status' => 1, 'vtype_id' => 2, 'user_id' => $sname))->result();
            $this->db->select('count(*) as  Total');
            $numbike = $this->db->get_where('vehicle_details', array('status' => 1, 'vtype_id' => 1, 'user_id' => $sname))->result();
            $total = ((int) ($numbike[0]->Total) + (int) ($numcar[0]->Total));
            $j = 0;
            if ($total >= $plan[0]->num_vehicle) {
                redirect('welcome/plans?msg=Please Upgrade your plan');
            } else if ($plan[0]->num_bikes > $numbike[0]->Total) {
                $j = 1;
            }
            if ($plan[0]->num_cars > $numcar[0]->Total) {
                $j+=2;
            }
            if ($j == 1) {
                if ($this->uri->segment(3) != "bike")
                    redirect('welcome/sell/bike');
            }
            if ($j == 2) {
                if ($this->uri->segment(3) != "car")
                    redirect('welcome/sell/car');
            }
            if (!$j)
                redirect('welcome/login?msg=Please Upgrade your plan');
        }
        $webData['upload_data'] = '';
        $webData['tittle'] = "Welcome To KeralaOnRoads- Sell Your Car";
        $webData['error'] = 2;
        $webData['value'] = '';
        $webData['style'][] = "sell";
        $webData['content'][] = 'sell';
        $webData['script'][] = "calendar";
        $webData['script'][] = "sell";
        $webData['style'][] = "calendar";
        $this->load->view('templates/welcome', $webData);
    }

    public function addNewVehicle() {
        $sname = $this->session->userdata('keralaonroads_admin');
        $this->message = '';
        $this->error = '';
        if (!$this->session->userdata('keralaonroads_admin')) {
            redirect('welcome/login');
        }
        $webData['upload_data'] = '';
        $webData['tittle'] = "Welcome To KeralaONRoads- Add new Vehicle";
        $webData['error'] = 2;
        $webData['value'] = '';
        $webData['style'][] = "sell";
        $webData['script'][] = "validation";
        $webData['content'][] = 'sellnew';
        $this->load->view('templates/welcome', $webData);
    }

    public function dealers() {
        $this->message = '';
        $this->error = '';
        $this->db->order_by("placename", "ASC");
        $query = $this->db->get_where('place', array('type' => 3, 'root_id' => 2));
        $webData['place'] = $query->result();
        $placeid = ((int) $this->uri->segment(5)) ? $this->uri->segment(5) : $webData['place'][1]->place_id;
        if ($this->uri->segment(3) == "new") {
            $vtype = ($this->uri->segment(4) == "car") ? 2 : 1;
            $this->db->select('dealer_id');
            $res = $this->db->get_where('dealer_branch', array('district_id' => $placeid));
            $delId = Array();
            foreach ($res->result() As $val)
                $delId[] = $val->dealer_id;
            $this->db->distinct('c.cmp_id');
            $this->db->select('c.companyname, c.image, c.cmp_id');
            $this->db->join('company c', 'cmp_id=company_id');
            $this->db->order_by('c.companyname', 'ASC');
            $this->db->where_in('id', $delId);
            $this->db->where('c.type', $vtype);
            $this->db->from('dealer');
            $qry = $this->db->get();
            $webData['brands'] = $qry->result();
        } else {
            $this->db->select('branch_id,ph1,address,dealer_branch.name');
            $this->db->order_by('dealer_branch.name', 'ASC');
            $this->db->from('dealer_branch');
            $this->db->where('district_id', $placeid);
            $this->db->limit(5);
            $this->db->join('dealer', 'dealer_id=id');
            if ($this->uri->segment(4) == "car")
                $this->db->where('dealer.type', 2);
            else
                $this->db->where('dealer.type', 1);
            $query = $this->db->get();
            $webData['delers'] = $query->result();
        }
        $webData['upload_data'] = '';
        $webData['tittle'] = "Welcome To KeralaOnRoad- Dealers";
        $webData['error'] = 2;
        $webData['value'] = '';
        $webData['style'][] = "dealers";
        $webData['script'][] = "dealers";
        $webData['content'][] = 'dealers';
        $this->load->view('templates/welcome', $webData);
    }

    public function getnewDel() {
        $this->db->join('dealer_branch', 'dealer_id=id');
        $this->db->where('sale_email !=', '');
        $this->db->where(array('company_id' => $this->uri->segment(3), 'district_id' => $this->uri->segment(4)));
        $this->db->from('dealer');
        $qry = $this->db->get();
        echo "<div class='col-xs-50 tittle'>Select a Branch<br/> </div>";
        foreach ($qry->result() as $val) {
            echo "<a href='#'><div onclick='dealerpageLoad($val->branch_id)' class='col-xs-50 dotBorderBox'><div class=' col-xs-50 col-xs-offset-1'><b><br />$val->name </b><div>" . nl2br($val->address) . "</div><ul><li><i class='glyphicon glyphicon-envelope'>&nbsp;</i>$val->email</li><li><i class='glyphicon glyphicon-phone-alt'>&nbsp;</i>$val->ph1</li><li class='glyphicon glyphicon-phone-alt'> $val->ph2</li></ul></div></div></a>";
        }
    }

    public function dealerPage() {
        $banchqry = $this->db->get_where('dealer_branch', array('branch_id' => $this->uri->segment(3)));
        $webData['tittle'] = "Welcome To KeralaOnRoads- Brands";
        if ((int) $this->uri->segment(3)) {
            $webData['content'][] = 'dealerPage';
            $brancid = (int) $this->uri->segment(3);
            $brngQr = $this->db->get_where('dealer_branch', array('branch_id' => $brancid));
            $webData['branch'] = $brngQr->result();
            $dealer_id = $brngQr->result()[0]->dealer_id;
            $delQr = $this->db->get_where('dealer', array('id' => $dealer_id));
            $webData['comp_id'] = $delQr->result();
            $cid = $delQr->result()[0]->company_id;
            $userId = $delQr->result()[0]->usid;

            if ($cid) {
                $webData['brands'] = $this->commanmodel->selectAll('company', array('cmp_id' => $cid));
                $this->db->from('model');
                $this->db->select('model_image,model.status,model.model_id,model_name,brochure,about_model');
                $this->db->order_by("model.status", "desc");
                $this->db->join('model_images', 'model_images.model_id=model.model_id', 'left');
                $this->db->distinct('model.model_id');
                $this->db->group_by('model.model_id');
                $this->db->where_in('model.status', array(1, 2));
                $this->db->where('cmp_id =' . $cid);
                $query = $this->db->get();
                $webData['models'] = $query->result();
            } elseif ($userId !== 0 || $banchqry->result()[0]->usid !== 0) {
                if (!$this->session->userdata('keralaonroads')) {
                    redirect('welcome/login?url=' . uri_string());
                } else {
                    if ($userId) {
                        $this->db->from('vehicle_details vd');
                        $this->db->select('image,vd.model_id, vd.varient_id, title_name,vd.discription,vd.pro_id');
                        $this->db->order_by("vd.pro_id", "desc");
                        $this->db->join('vehicle_images vi', 'vi.pro_id=vd.pro_id', 'left');
                        $this->db->distinct('vd.pro_id');
                        $this->db->group_by('vd.pro_id');
                        $this->db->where_in('vd.status', array(1, 2));
                        $this->db->where(array('vd.status' => 1, 'vd.user_id' => $userId));
                        $query = $this->db->get();
                        $webData['userVehi'] = $query->result();
                    }
                    if ($banchqry->result()[0]->usid) {
                        $this->db->from('vehicle_details vd');
                        $this->db->select('image,vd.model_id, vd.varient_id, title_name,vd.discription,vd.pro_id');
                        $this->db->order_by("vd.pro_id", "desc");
                        $this->db->join('vehicle_images vi', 'vi.pro_id=vd.pro_id', 'left');
                        $this->db->distinct('vd.pro_id');
                        $this->db->group_by('vd.pro_id');
                        $this->db->where_in('vd.status', array(1));
                        $this->db->where(array('vd.status' => 1, 'vd.user_id' => $banchqry->result()[0]->usid));
                        $query = $this->db->get();
                        $webData['userVehiDel'] = $query->result();
                    }
                }
            } else {
                if (!$this->session->userdata('keralaonroads')) {
                    redirect('welcome/login?url=' . uri_string());
                }
            }
        } else {
            $webData['brands'] = $this->commanmodel->selectAll('company');
            $webData['content'][] = 'dealerPage';
        }
        $this->load->view('templates/welcome', $webData);
    }

    public function dealerDetails() {
        $sname = $this->session->userdata('keralaonroads');
        $this->message = '';
        $this->error = '';
        if (!$this->session->userdata('keralaonroads')) {
            redirect('welcome/login?url=' . uri_string());
        }
        $i = 0;
        $this->found = 0;
        $this->id[$i] = 0;
        if (( $this->input->get('dealer') != '') && ( $this->input->get('branch') != '')) {
            $this->db->select('company_id,vtype,dealer.type,dealer_branch.email,dealer.email as dealeremail,phnum,branch_id,id,logo,ph1,ph2,address,dealer_branch.name,dealer.name as dealername');
            $array = array(
                'dealer.status' => 1,
                'dealer_id' => $this->input->get('dealer'),
                'branch_id' => $this->input->get('branch'));
            $this->db->join('dealer', 'dealer_branch.dealer_id = dealer.id', 'LEFT OUTER');
            $query = $this->db->get_where('dealer_branch', $array);
            foreach ($query->result() as $row) {
                $this->dealernumber = $row->phnum;
                $this->email = $row->email;
                $this->dealeremail = $row->dealeremail;
                $this->dealername = $row->dealername;
                $this->brid = $row->branch_id;
                $this->id = $row->id;
                $this->img = $row->logo;
                $this->number = $row->ph1;
                $this->number2 = $row->ph2;
                $this->address = $row->address;
                $this->name = $row->name;
                $this->found = 1;
            }
            $i = 0;
            $this->id[$i] = 0;
            switch ($row->type) {
                case 1: {
                        $where = 'vehicle_details.vtype_id =' . $row->vtype;
                        $this->db->where($where);
                        $where = 'vehicle_details.cmp_id =' . $row->company_id;
                        $this->db->where($where);
                        $this->db->select('*');
                        $this->db->from('vehicle_details');
                        $this->db->join('company', 'company.cmp_id = vehicle_details.cmp_id', 'LEFT OUTER JOIN');
                        $this->db->join('model', 'model.model_id = vehicle_details.model_id', 'LEFT OUTER JOIN');
                        $this->db->join('variant', 'variant.varient_id = vehicle_details.varient_id', 'LEFT OUTER JOIN');
                        $this->db->join('vehicle_type_global', 'vehicle_type_global.vtype_id = vehicle_details.vtype_id', 'LEFT OUTER JOIN');
                        $this->db->order_by("vehicle_details.pro_id", "desc");
                        $onroad_vehicle_detailsquery = $this->db->get();
                        $this->db->last_query();
                        if ($onroad_vehicle_detailsquery->num_rows() > 0) {
                            foreach ($onroad_vehicle_detailsquery->result() as $rowonroad_vehicle_details) {
                                $this->id[$i] = 1;
                                $i++;
                                $this->id[$i] = $rowonroad_vehicle_details->pro_id;
                                $this->condition[$i] = 'used';
                                $this->variant[$i] = $rowonroad_vehicle_details->var_name;
                                $this->model[$i] = $rowonroad_vehicle_details->model_name;
                                $this->company[$i] = $rowonroad_vehicle_details->companyname;
                                $this->title[$i] = $rowonroad_vehicle_details->title_name;
                                $this->year[$i] = $rowonroad_vehicle_details->model_year;
                                $this->millage[$i] = $rowonroad_vehicle_details->millage;
                                $this->price[$i] = $rowonroad_vehicle_details->exp_prize;
                                $this->i = $i;
                                $this->db->limit(1);
                                $this->db->order_by("vimg_id", "desc");
                                $onroad_vehicle_imagesquery = $this->db->get_where('vehicle_images', array('pro_id' => $rowonroad_vehicle_details->pro_id));
                                if ($onroad_vehicle_imagesquery->num_rows() > 0) {
                                    foreach ($onroad_vehicle_imagesquery->result() as $rowonroad_vehicle_images) {
                                        $this->image[$i] = str_replace('.', '_thumb.', $rowonroad_vehicle_images->image);
                                    }
                                } else {
                                    $this->image[$i] = 'new.jpg';
                                }
                            }
                            $this->get = 'view';
                        }
                        break;
                    }
                case 2: {
                        $this->db->select('*');
                        $this->db->from('vehicle_details');
                        $this->db->join('company', 'company.cmp_id = vehicle_details.cmp_id', 'LEFT OUTER JOIN');
                        $this->db->join('model', 'model.model_id = vehicle_details.model_id', 'LEFT OUTER JOIN');
                        $this->db->join('variant', 'variant.varient_id = vehicle_details.varient_id', 'LEFT OUTER JOIN');
                        $this->db->join('vehicle_type_global', 'vehicle_type_global.vtype_id = vehicle_details.vtype_id', 'LEFT OUTER JOIN');
                        $this->db->order_by("vehicle_details.pro_id", "desc");
                        $onroad_vehicle_detailsquery = $this->db->get();
                        $this->db->last_query();
                        if ($onroad_vehicle_detailsquery->num_rows() > 0) {
                            foreach ($onroad_vehicle_detailsquery->result() as $rowonroad_vehicle_details) {
                                $this->id[$i] = 1;
                                $i++;
                                $this->id[$i] = $rowonroad_vehicle_details->pro_id;
                                $this->condition[$i] = 'used';
                                $this->variant[$i] = $rowonroad_vehicle_details->var_name;
                                $this->model[$i] = $rowonroad_vehicle_details->model_name;
                                $this->company[$i] = $rowonroad_vehicle_details->companyname;
                                $this->title[$i] = $rowonroad_vehicle_details->title_name;
                                $this->year[$i] = $rowonroad_vehicle_details->model_year;
                                $this->millage[$i] = $rowonroad_vehicle_details->millage;
                                $this->price[$i] = $rowonroad_vehicle_details->exp_prize;
                                $this->i = $i;
                                $this->db->limit(1);
                                $this->db->order_by("vimg_id", "desc");
                                $onroad_vehicle_imagesquery = $this->db->get_where('vehicle_images', array('pro_id' => $rowonroad_vehicle_details->pro_id));
                                if ($onroad_vehicle_imagesquery->num_rows() > 0) {
                                    foreach ($onroad_vehicle_imagesquery->result() as $rowonroad_vehicle_images) {
                                        $this->image[$i] = str_replace('.', '_thumb.', $rowonroad_vehicle_images->image);
                                    }
                                } else {
                                    $this->image[$i] = 'new.jpg';
                                }
                            }
                            $this->get = 'view';
                        }
                        break;
                    }
                case 4: {
                        $this->db->select('*');
                        $this->db->from('new_vehicle');
                        $this->db->join('company', 'company.cmp_id = new_vehicle.company_id', 'LEFT OUTER JOIN');
                        $this->db->join('model', 'model.model_id = new_vehicle.model_id', 'LEFT OUTER JOIN');
                        $this->db->join('variant', 'variant.varient_id = new_vehicle.veriant_id', 'LEFT OUTER JOIN');
                        $this->db->join('vehicle_type_global', 'vehicle_type_global.vtype_id = onroad_company.type', 'LEFT OUTER JOIN');
                        $this->db->order_by("new_vehicle.vehicle_id", "desc");
                        $onroad_vehicle_detailsquery = $this->db->get();
                        $this->db->last_query();
                        if ($onroad_vehicle_detailsquery->num_rows() > 0) {
                            foreach ($onroad_vehicle_detailsquery->result() as $rowonroad_vehicle_details) {
                                $this->id[$i] = 1;
                                $i++;
                                $this->id[$i] = $rowonroad_vehicle_details->vehicle_id;
                                $this->condition[$i] = 'new';
                                $this->variant[$i] = $rowonroad_vehicle_details->var_name;
                                $this->model[$i] = $rowonroad_vehicle_details->model_name;
                                $this->company[$i] = $rowonroad_vehicle_details->companyname;
                                $this->title[$i] = $rowonroad_vehicle_details->tittle;
                                $this->year[$i] = 'New';
                                $this->millage[$i] = '';
                                $this->price[$i] = $rowonroad_vehicle_details->price;
                                $this->i = $i;
                                $this->db->limit(1);
                                $this->db->order_by("vimg_id", "desc");
                                $onroad_vehicle_imagesquery = $this->db->get_where('vehicle_new_images', array('pro_id' => $rowonroad_vehicle_details->vehicle_id));
                                if ($onroad_vehicle_imagesquery->num_rows() > 0) {
                                    foreach ($onroad_vehicle_imagesquery->result() as $rowonroad_vehicle_images) {
                                        $this->image[$i] = str_replace('.', '_thumb.', $rowonroad_vehicle_images->image);
                                    }
                                } else {
                                    $this->image[$i] = 'new.jpg';
                                }
                            }
                            $this->get = 'viewnew';
                        }
                        break;
                    }
                case 8: {
                        $this->db->select('*');
                        $this->db->from('new_vehicle');
                        $this->db->join('company', 'company.cmp_id = new_vehicle.company_id', 'LEFT OUTER JOIN');
                        $this->db->join('model', 'model.model_id = new_vehicle.model_id', 'LEFT OUTER JOIN');
                        $this->db->join('variant', 'variant.varient_id = new_vehicle.veriant_id', 'LEFT OUTER JOIN');
                        $this->db->join('vehicle_type_global', 'vehicle_type_global.vtype_id = onroad_company.type', 'LEFT OUTER JOIN');
                        $this->db->order_by("new_vehicle.vehicle_id", "desc");
                        $onroad_vehicle_detailsquery = $this->db->get();
                        $this->db->last_query();
                        if ($onroad_vehicle_detailsquery->num_rows() > 0) {
                            foreach ($onroad_vehicle_detailsquery->result() as $rowonroad_vehicle_details) {
                                $this->id[$i] = 1;
                                $i++;
                                $this->id[$i] = $rowonroad_vehicle_details->vehicle_id;
                                $this->condition[$i] = 'new';
                                $this->variant[$i] = $rowonroad_vehicle_details->var_name;
                                $this->model[$i] = $rowonroad_vehicle_details->model_name;
                                $this->company[$i] = $rowonroad_vehicle_details->companyname;
                                $this->title[$i] = $rowonroad_vehicle_details->tittle;
                                $this->year[$i] = 'New';
                                $this->millage[$i] = '';
                                $this->price[$i] = $rowonroad_vehicle_details->price;
                                $this->i = $i;
                                $this->db->limit(1);
                                $this->db->order_by("vimg_id", "desc");
                                $onroad_vehicle_imagesquery = $this->db->get_where('vehicle_new_images', array('pro_id' => $rowonroad_vehicle_details->vehicle_id));
                                if ($onroad_vehicle_imagesquery->num_rows() > 0) {
                                    foreach ($onroad_vehicle_imagesquery->result() as $rowonroad_vehicle_images) {
                                        $this->image[$i] = str_replace('.', '_thumb.', $rowonroad_vehicle_images->image);
                                    }
                                } else {
                                    $this->image[$i] = 'new.jpg';
                                }
                            }
                            $this->get = 'viewnew';
                        }
                        break;
                    }
                default: {
                        
                    }
            }
        }
        $webData['upload_data'] = '';
        $webData['tittle'] = "Welcome To KeralaOnRoad- Dealers";
        $webData['error'] = 2;
        $webData['value'] = '';
        $webData['style'][] = "dealers";
        $webData['script'][] = "dealers";
        $webData['content'][] = 'dealersDet';
        $this->load->view('templates/welcome', $webData);
    }

    public function dealersMange() {
        if ($this->uri->segment(3) && $this->session->userdata('keralaonroads_admin')) {
            $sname = $this->session->userdata('keralaonroads_admin');
            $this->message = '';
            $this->error = '';
            $webData['upload_data'] = '';
            $webData['tittle'] = "Welcome To KeralaOnRoads- Dealer Management";
            $webData['script'][] = "dealersMange";
            $webData['content'][] = 'dealersmange';
            $this->load->view('templates/welcome', $webData);
        } else
            redirect('welcome/login');
    }

    public function manage() {
        $sname = $this->session->userdata('keralaonroads_admin');
        $this->message = '';
        $this->error = '';
        if (!$this->session->userdata('keralaonroads_admin')) {
            redirect('welcome/login');
        } else {
            $webData['tittle'] = "Welcome To KeralaONRoads- Sell Your Car";
            $webData['error'] = 2;
            $webData['value'] = '';
            $webData['style'][] = "manage";
            $webData['script'][] = "manage";
            $webData['content'][] = 'manage';
            $this->db->order_by("feachur_id asc");
            $query = $this->db->get_where('feaur', 'patent = 0');
            $webData['feaures1'] = $query->result();
            $this->db->order_by("patent asc, feachur asc");
            $query = $this->db->get_where('feaur', 'patent != 0');
            $webData['feaures2'] = $query->result();
            $this->db->order_by("spec_id", "asc");
            $query = $this->db->get_where('specification', 'patent = 0');
            $webData['specification1'] = $query->result();
            $this->db->order_by("patent asc, specification asc");
            $query = $this->db->get_where('specification', 'patent != 0');
            $webData['specification2'] = $query->result();
            $webData['deatils'] = $this->commanmodel->selectAll('deatils');
            $webData['fueltype'] = $this->commanmodel->selectAll('fueltype');
            $this->load->view('templates/welcome', $webData);
        }
    }

    public function userMange() {
        if (!$this->session->userdata('keralaonroads_admin')) {
            redirect('welcome/login');
        } else {
            $this->db->limit(50);
            $query = $this->db->get_where('users', array('utype_id' => 1));
            $webData['users'] = $query->result();
            $webData['utypes'] = $this->db->get('uptype')->result();
            $webData['dist'] = $this->db->get_where('place', array('type' => 3))->result();
            $webData['content'][] = "userMange";
            $webData['script'][] = "userMange";
            $this->load->view('templates/welcome', $webData);
        }
    }

    public function search() {
        $webData['tittle'] = "Welcome To KeralaOnRoads- Search";
        $webData['style'][] = "search";
        $webData['script'][] = "search";
        $webData['content'][] = 'search';
        $this->load->view('templates/welcome', $webData);
    }

    public function brands() {
        $webData['tittle'] = "Welcome To KeralaOnRoads- Brands";
        $webData['content'][] = 'brands';
        if ($this->uri->segment(3) === "car")
            $webData['brands'] = $this->commanmodel->selectAll('company', array('type' => 2, 'status' => 1));
        else
        if ($this->uri->segment(3) === "bike")
            $webData['brands'] = $this->commanmodel->selectAll('company', array('type' => 1, 'status' => 1));
        else
            $webData['brands'] = $this->commanmodel->selectAll('company', array('status' => 1));
        $this->load->view('templates/welcome', $webData);
    }

    public function brandView() {
        $webData['tittle'] = "Welcome To KeralaOnRoads- Brands";
        if ((int) $this->input->get('company')) {
            $webData['content'][] = 'brandview';
            $cid = (int) $this->input->get('company');
            $webData['brands'] = $this->commanmodel->selectAll('company', array('cmp_id' => $cid));
            $this->db->from('model');
            $this->db->select('model_image,model.status,model.model_id,model_name,brochure,about_model');
            $this->db->order_by("model.status", "desc");
            $this->db->join('model_images', 'model_images.model_id=model.model_id', 'left');
            $this->db->distinct('model.model_id');
            $this->db->group_by('model.model_id');
            $this->db->where_in('model.status', array(1, 2));
            $this->db->where('cmp_id =' . $cid);
            $query = $this->db->get();
            $webData['models'] = $query->result();
        } else {
            $webData['brands'] = $this->commanmodel->selectAll('company');
            $webData['content'][] = 'brands';
        }
        $this->load->view('templates/welcome', $webData);
    }

    public function loan() {
        $webData['tittle'] = "KeralaOnRoads - Loan";
        $webData['style'][] = "plans";
        $webData['content'][] = 'loan';        
        $webData['script'][] = "calendar";
        $webData['style'][] = "calendar";
        $webData['district'] = $this->db->get_where('place', array('root_id' => 2))->result();
        $webData['Cbrands'] = $this->db->get_where('company', array('status' => 1, 'type' => 2))->result();
        $webData['Bbrands'] = $this->db->get_where('company', array('status' => 1, 'type' => 1))->result();
        $nesId = $this->db->insert_id();
        if (isset($_POST['submit'])) {
            if (isset($_POST['vehiType'])) {
                $data_insert = array(
                    'fname' => $this->input->post('fullName'),
                    'lname' => $this->input->post('lName'),
                    'caddress' => $this->input->post('caddress'),
                    'paddress' => $this->input->post('paddress'),
                    'mobile_no' => $this->input->post('cuCode') . '-' . $this->input->post('mobileNo'),
                    'land_no' => $this->input->post('lCode') . '-' . $this->input->post('landNo'),
                    'pdistrict_id' => $this->input->post('pdistrict'),
                    'cdistrict_id' => $this->input->post('cdistrict'),
                    'cpin_code' => $this->input->post('cpinCode'),
                    'ppin_code' => $this->input->post('ppinCode'),
                    'email' => $this->input->post('emailId'),
                    'res_type' => $this->input->post('residence'),
                    'transfer_Y' => $this->input->post('tYear'),
                    'transfer_M' => $this->input->post('tMonth'),
                    'dob' => $this->input->post('dob'),
                    'emp_type' => $this->input->post('employ'),
                    'loan_amnt' => $this->input->post('loanAmount'),
                    'annual_inc' => $this->input->post('anualIncome'),
                    'bank' => $this->input->post('bank'),
                    'v_type' => $this->input->post('vehiType'),
                    'sex' => $this->input->post('sex'));
                $config['upload_path'] = './assets/uploads/loan_documents/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                $config['max_size'] = '5120';
                $getpan="";
                $getadd="";
                $getsal="";
                if (($_FILES['pancard']['name']) != "") {
                    $_FILES['doc']['name'] = $_FILES['pancard']['name'];
                    $_FILES['doc']['type'] = $_FILES['pancard']['type'];
                    $_FILES['doc']['tmp_name'] = $_FILES['pancard']['tmp_name'];
                    $_FILES['doc']['error'] = $_FILES['pancard']['error'];
                    $_FILES['doc']['size'] = $_FILES['pancard']['size'];
                    $config['file_name'] = 'korpan_' . $nesId;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('doc')) {                         
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $data_insert['pancard'] = $data['upload_data']['file_name'];
                         $getpan=$data['upload_data']['file_name'];
                    }
                }
                if (($_FILES['addrproof']['name']) != "") {
                    $_FILES['doc']['name'] = $_FILES['addrproof']['name'];
                    $_FILES['doc']['type'] = $_FILES['addrproof']['type'];
                    $_FILES['doc']['tmp_name'] = $_FILES['addrproof']['tmp_name'];
                    $_FILES['doc']['error'] = $_FILES['addrproof']['error'];
                    $_FILES['doc']['size'] = $_FILES['addrproof']['size'];
                    $config['file_name'] = 'koraddp_' . $nesId;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('doc')) {
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $data_insert['add_proof'] = $data['upload_data']['file_name'];
                        $getadd=$data['upload_data']['file_name'];
                    }
                }
                if (($_FILES['salaryStmnt']['name']) != "") {
                    $_FILES['doc']['name'] = $_FILES['salaryStmnt']['name'];
                    $_FILES['doc']['type'] = $_FILES['salaryStmnt']['type'];
                    $_FILES['doc']['tmp_name'] = $_FILES['salaryStmnt']['tmp_name'];
                    $_FILES['doc']['error'] = $_FILES['salaryStmnt']['error'];
                    $_FILES['doc']['size'] = $_FILES['salaryStmnt']['size'];
                    $config['file_name'] = 'korsal_' . $nesId;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('doc')) {
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $data_insert['bank_stmnt'] = $data['upload_data']['file_name'];
                        $getsal=$data['upload_data']['file_name'];
                    }
                }
                if ($this->input->post('vehiType') == 1) {
                    $loneFor="new car";
                    $data_insert['make'] = $this->input->post('newmakeC');
                    $data_insert['model'] = $this->input->post('newmodel');
                    $data_insert['variant'] = $this->input->post('newvariant');
                    $make=  $this->db->get_where('company',  array('cmp_id'=>$this->input->post('newmakeC')))->result();
                    @$make=$make[0]->companyname;
                    $model=$this->db->get_where('model',  array('model_id'=>$this->input->post('newmodel')))->result();
                    @$model=$model[0]->model_name;
                    $variant=$this->db->get_where('variant',  array('varient_id'=>$this->input->post('newvariant')))->result();
                    @$variant=$variant[0]->var_name;
                } elseif ($this->input->post('vehiType') == 2) {
                    $loneFor="new bike";
                    $data_insert['make'] = $this->input->post('newmakeB');
                    $data_insert['model'] = $this->input->post('newmodel');
                    $data_insert['variant'] = $this->input->post('newvariant');
                    $make=  $this->db->get_where('company',  array('cmp_id'=>$this->input->post('newmakeB')))->result();
                    @$make=$make[0]->companyname;
                    $model=$this->db->get_where('model',  array('model_id'=>$this->input->post('newmodel')))->result();
                    @$model=$model[0]->model_name;
                    $variant=$this->db->get_where('variant',  array('varient_id'=>$this->input->post('newvariant')))->result();
                    @$variant=$variant[0]->var_name;
                } else {
                    $loneFor="new vehicle";
                    $data_insert['make'] = $this->input->post('usedmake');
                    $data_insert['model'] = $this->input->post('usedmodel');
                    $data_insert['variant'] = $this->input->post('usedvariant');
                    $make=$this->input->post('usedmake');
                    $model=$this->input->post('usedmodel');
                    $variant=$this->input->post('usedvariant');                    
                }
                $sex = $_POST["sex"];
                $insert_id = $this->db->insert_id();
                $this->db->where('id', $insert_id);
                $qry = $this->db->get('loan_document');
                $res = $qry->result();
                $name = '<style>.add{ width:300px; float: right;}</style>'
                        . 'First Name : ' . $this->input->post('fullName') . '<br/>' .
                        'Second Name : ' . $this->input->post('lName') . '<br/>' .
                        'Sex : ' . $sex . '<br/>' .
                        'DOB : ' . $this->input->post('dob') . '<br/>' .
                        '<strong>Current Address :</strong> <div style="width:500px;"><div style="width:150px;"></div><div class="add">' . nl2br($this->input->post('caddress')) . '</div></div><br/> ' .
                        'Current District : ' . $this->input->post('cdistrict') . '<br/>' .
                        '<b>Permanent Address :</b> <div>' . nl2br($this->input->post('paddress')) . '</div><br/> ' .
                        'Permanent District : ' . $this->input->post('pdistrict') . '<br/>' .
                        'Current Pin Code : ' . $this->input->post('cpinCode') . '<br/>' .
                        'Permanant Pin Code : ' . $this->input->post('ppinCode') . '<br/>' .
                        'Mobile No : ' . $this->input->post('cuCode')."-".$this->input->post('mobileNo') . '<br/>' .
                        'Land No : ' . $this->input->post('lCode')."-".$this->input->post('landNo') . '<br/>' .
                        'Email Id : ' . $this->input->post('emailId') . '<br/>' .
                        'Resident Type : '  . $this->input->post('residence') . '<br/>' .
                        'Transferyear : ' . $this->input->post('tYear') . '<br/>' .
                        'Transfer Month : ' . $this->input->post('tMonth') . '<br/>' .
                        'Employment Type : ' . $this->input->post('employ') . '<br/>' .
                        'Loan Amount : ' . $this->input->post('loanAmount') . '<br/>' .
                        'Anual Income : ' . $this->input->post('anualIncome') . '<br/>' .
                        'Bank Selected : ' . $this->input->post('bank') . '<br/>' .
                        'Make : ' . $make . '<br/>' .
                        'Model : ' . $model . '<br/>' .
                        'Variant : ' . $variant. '<br/>' .
                        'Booking Stataus'.$this->input->post('book');
                if (isset($name)) {
                    $toEmail = "loan@keralaonroad.com";
                    $this->load->library('email');
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'vps.tricetechnologies.in',
                        'smtp_port' => 587,
                        'smtp_user' => 'customersupport@keralaonroad.com',
                        'smtp_pass' => '_C^(4^6L=P^r',
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('customersupport@keralaonroad.com', 'Loan');
                    $this->email->to($toEmail);
                    $this->email->subject('loan application');
                    $this->email->attach('./assets/uploads/loan_documents/' . $getpan);
                    $this->email->attach('./assets/uploads/loan_documents/' . $getadd);
                    $this->email->attach('./assets/uploads/loan_documents/' . $getsal);
                    $this->email->message($name);
                    if($this->email->send()){
                        $this->email->clear(TRUE);
                        $this->load->library('email');
                        $config = Array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'vps.tricetechnologies.in',
                            'smtp_port' => 587,
                            'smtp_user' => 'customersupport@keralaonroad.com',
                            'smtp_pass' => '_C^(4^6L=P^r',
                            'mailtype' => 'html',
                            'charset' => 'iso-8859-1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('loan@keralaonroad.com', 'Loan');
                        $this->email->to($this->input->post('emailId'));
                        $this->email->subject('Thank you for your loan request');
                        $this->email->message('Dear Mr/Ms.'.$this->input->post('fullName').'<br /><br />Thank you for your interest in applying loan for a '.$loneFor.'  with Keralaonroad.com<br /><br />
                            We may need to request additional information from you as we process your loan; delays in loan processing are most commonly caused by incomplete applications. Keralaonroad.com will contact you further for your loan processing. <br /><br />
                            Once again thank you for choosing Keralaonroad.com. We look forward to deliver the best possible finances for your request.<br/><br/>
                            Regards<br/><br/>
                            Keralaonroad.com<br/>');
                        $this->email->send();
                        echo "<script>alert('Your request sent successfully' )</script>";
                        $sms['mobileNo']=$this->input->post('mobileNo');
                        $sms['message']='Thank you for choosing for keralaonroad. We will contact you soon';
                        $sms['page']='welcome/loan';
                        $this->load->view('pages/sms', $sms);                        
                    }                    
                }
            } else {
                
                echo'<script>
                alert("Please select vehicle type");</script>';
            }
        }
        else{
            $this->load->view('templates/welcome', $webData);
        }
    }

    public function emi() {
        $webData['tittle'] = "KeralaOnRoads - EMI Calculater";
        $webData['script'][] = "emi";
        $webData['content'][] = 'emi';
        $this->load->view('templates/welcome', $webData);
    }

    public function profile() {
        if (!empty($_FILES['proImg'])) {
            $config['upload_path'] = './assets/images/profile/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'KORProfile_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('proImg')) {
                echo $this->upload->display_errors();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = $data['upload_data']['full_path'];
                $config['new_image'] = $data['upload_data']['file_path'] . "/thumbs/";
                $config['create_thumb'] = true;
                $config['width'] = 350;
                $config['height'] = '1';
                $config['maintain_ratio'] = true;
                $config['master_dim'] = 'width';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    echo "Sorry Unable to make thumb image ,Please Try again";
                } else {
                    $this->db->update('users', array('pro_img' => $data['upload_data']['file_name']), array('user_id' => $this->session->userdata('keralaonroads')));
                }
            }
        }
        $webData['script'][] = "profile";
        $webData['content'][] = 'profile';
        if ($this->uri->segment(3) === 'myvehicle') {
            $this->db->from('vehicle_details');
            $this->db->select('vehicle_details.pro_id, title_name, exp_prize, model_year, millage, kilo_meter, vehicle_details.status, companyname, model_name, var_name, fueltypename,vehicle_images.image');
            $this->db->join('model', 'model.model_id=vehicle_details.model_id', 'left outer');
            $this->db->join('company', 'company.cmp_id=model.cmp_id', 'left outer');
            $this->db->join('variant', 'variant.varient_id=vehicle_details.varient_id', 'left outer');
            $this->db->join('fueltype', 'fl_id=variant.fuel_type', 'left outer');
            $this->db->join('vehicle_images', 'vehicle_images.pro_id=vehicle_details.pro_id', 'left');
            $this->db->distinct('vehicle_details.pro_id');
            $this->db->group_by('vehicle_details.pro_id');
            $this->db->where('vehicle_details.user_id = ' . $this->session->userdata('keralaonroads'));
            $query = $this->db->get();
            $webData['vehicles'] = $query->result();
        } else if ($this->uri->segment(3) === 'mylikes') {
            $this->db->from('likes');
            $this->db->select('vehicle_details.pro_id,title_name, exp_prize, model_year, millage, kilo_meter, vehicle_details.status, companyname, model_name, var_name, fueltypename,vehicle_images.image');
            $this->db->join('vehicle_details', 'vehicle_id=pro_id');
            $this->db->join('model', 'model.model_id=vehicle_details.model_id', 'left outer');
            $this->db->join('company', 'company.cmp_id=model.cmp_id', 'left outer');
            $this->db->join('variant', 'variant.varient_id=vehicle_details.varient_id', 'left outer');
            $this->db->join('fueltype', 'fl_id=variant.fuel_type', 'left outer');
            $this->db->join('vehicle_images', 'vehicle_images.pro_id=vehicle_details.pro_id', 'left outer');
            $this->db->distinct('vehicle_details.pro_id');
            $this->db->group_by('vehicle_details.pro_id');
            $this->db->where('likes.user_id = ' . $this->session->userdata('keralaonroads'));
            $query = $this->db->get();
            $webData['vehicles'] = $query->result();
        } else if ($this->uri->segment(3) === "chpassword") {
            
        } else {
            if (isset($_POST['submit'])) {
                $this->db->where('user_id', $this->session->userdata('keralaonroads'));
                $this->db->update('users', array('fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'username' => $this->input->post('username'),
                    'address' => $this->input->post('address'),
                    'contactno' => $this->input->post('contactno'),
                ));
            }
            $webData['profile'] = $this->commanmodel->selectAll('users', 'user_id = ' . $this->session->userdata('keralaonroads'));
        }
        $this->load->view('templates/welcome', $webData);
    }

    public function profile_edit() {
        if($this->session->userdata('keralaonroads')){
            $pid = isset($_REQUEST['pid']) ? (int) $this->input->get('pid') : 0;
            if ($pid) {
                $query = $this->db->get_where('vehicle_details', array('pro_id' => $pid, 'user_id' => $this->session->userdata('keralaonroads')));
                $webData['vedit'] = $query->result();
                if (isset($webData['vedit'][0])) {
                    if (isset($_GET['img'])) {
                        $veImg = $this->db->get_where('vehicle_images', array('vimg_id' => $_GET['img'],'pro_id' =>$pid))->result();
                        if($query2[0]) {
                            @unlink("./assets/uploads/thumb/" . strrev(implode(strrev("_thumb."), explode(".", strrev( $veImg[0]->image), 2))));
                            @unlink("./assets/uploads/" . $veImg[0]->image);
                        }
                        $this->db->where('vimg_id', $_GET['img']);
                        $this->db->delete('vehicle_images');
                    }
                    if (isset($_POST['Update'])) {
                        if (!isset($_POST['year']) && !isset($_POST['condition']) && !isset($_POST['color']) && !isset($_POST['vehicletype']) && !isset($_POST['Odometer']) && !isset($_POST['textarea']) && !isset($_POST['inr']) && !isset($_POST['Mileage']) && !isset($_POST['register']) && !isset($_POST['price']) && !isset($_POST['place']) && !isset($_POST['vehicleauth']) && !isset($_POST['number']) && !isset($_POST['edate']) && !isset($_POST['inscomp']) && !isset($_POST['tmission']) && !isset($_POST['ftype']) && !isset($_POST['sdate']) && !isset($_POST['idv'])) {
                            echo '<script>alert("all fields are mandatory"); </script>';
                        } else {
                            $this->db->where('pro_id', $_GET['pid']);
                            $this->db->update('vehicle_details', array(
                                'district_id' => ( $this->input->post('district') ),
                                'con_id' => ( $this->input->post('condition') ),
                                'model_year' => $this->input->post('model_year'),
                                'kilo_meter' => $this->input->post('Odometer'),
                                'color_id' => $this->input->post('color'),
                                'millage' => $this->input->post('Mileage'),
                                'exp_prize' => $this->input->post('inr'),
                                'pr_id' => ( $this->input->post('price') ),
                                'reg_no' => $this->input->post('register'),
                                'place_id' => ( $this->input->post('place') ),
                                'discription' => $this->input->post('textarea'),
                                'ownershipdetails' => $this->input->post('vehicleauth'),
                                'contact_number' => $this->input->post('number'),
                                'sdate' => $this->input->post('sdate'),
                                'edate' => $this->input->post('edate'),
                                'idv' => $this->input->post('idv'),
                                'transmission' => $this->input->post('Transmission'),
                                'ftype' => $this->input->post('ftype'),
                                'land_no' => $this->input->post('lnumber'),
                                'insurance_comp' => $this->input->post('inscomp'),
                            ));
                        }
                    }
                    $query = $this->db->get_where('vehicle_images', array('pro_id' => $pid));
                    $webData['eimage'] = $query->result();
                    $webData['rid'] = $pid;
                    $query = $this->db->get_where('vehicle_details', array('pro_id' => $pid, 'user_id' => $this->session->userdata('keralaonroads')));
                    $webData['vedit'] = $query->result();
                    $webData['content'][] = 'profileedit';
                    $webData['script'][] = 'multyUplaod';
                    $webData['style'][] = 'multyUplaod';
                    $this->load->view('templates/welcome', $webData);
                } else {
                    redirect('welcome/profile/myvehicle');
                }
            } else {
                redirect('welcome/profile/myvehicle');
            }
        }
        else{
            redirect('welcome/login');
        }
    }

    public function uvManage() {
        if (!$this->session->userdata('keralaonroads_admin')) {
            redirect('welcome/login');
        } else
            $this->db->from('vehicle_details');
        $this->db->select('vehicle_details.pro_id, title_name, exp_prize, model_year, millage, kilo_meter, vehicle_details.status, companyname, model_name, var_name, fueltypename,vehicle_images.image');
        $this->db->join('model', 'model.model_id=vehicle_details.model_id', 'left outer');
        $this->db->join('company', 'company.cmp_id=model.cmp_id', 'left outer');
        $this->db->join('variant', 'variant.varient_id=vehicle_details.varient_id', 'left outer');
        $this->db->join('fueltype', 'fl_id=variant.fuel_type', 'left outer');
        $this->db->join('vehicle_images', 'vehicle_images.pro_id=vehicle_details.pro_id', 'left');
        $this->db->distinct('vehicle_details.pro_id');
        $this->db->group_by('vehicle_details.pro_id');
        $query = $this->db->get();
        $webData['vehicles'] = $query->result();
        if (isset($_GET['del'])) {
            $query2 = $this->db->get_where('vehicle_images', array('pro_id' => $_GET['del']));
            foreach ($query2->result() as $row1) {
                $django2 = $row1->image;
                $django3 = strrev(implode(strrev('_thumb.'), explode('.', strrev($row1->image), 2)));

                @unlink("./assets/uploads/" . $django2);
                @unlink("./assets/uploads/thumb/" . $django3);
            }
            $this->db->where('pro_id', $_GET['del']);
            $this->db->delete('vehicle_details');
            $this->db->where('pro_id', $_GET['del']);
            $this->db->delete('vehicle_images');
        }
        if (isset($_GET['block'])) {
            $this->db->where('pro_id', $_GET['block']);
            $this->db->update('vehicle_details', array('status' => 0));
        }
        $webData['content'][] = 'uvManage';
        $this->load->view('templates/welcome', $webData);
    }

    public function logout() {
        $this->session->unset_userdata('keralaonroads');
        $this->session->unset_userdata('keralaonroads_admin');
        redirect(base_url() . 'welcome', 'refresh');
        header('location:' . site_url());
    }

    public function vehiView() {
        $id = $this->uri->segment(3);
        $query = $this->db->get_where('model', array('model_id ' => $id));
        $webData['models'] = $query->result();
        $query = $this->db->get_where('model_images', array('model_id' => $id));
        $webData['modelsImg'] = $query->result();
        $query = $this->db->get_where('variant', array('model_id' => $id));
        $webData['variants'] = $query->result();
        $query = $this->db->get_where('onroad_color_new_vehicle', array('model_id' => $id));
        $webData['colorImg'] = $query->result();
        $this->load->view('pages/vehiView', $webData);
    }

    public function accessories() {

        $webData['tittle'] = "KeralaOnRoads - accessories";
        $webData['content'][] = 'construction';
        $this->load->view('templates/welcome', $webData);
    }

    public function contact() {
        if (isset($_POST['msg'])) {
            $toEmail = "support@keralaonroad.com";
            $this->load->library('email');
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'vps.tricetechnologies.in',
                'smtp_port' => 587,
                'smtp_user' => 'customersupport@keralaonroad.com',
                'smtp_pass' => '_C^(4^6L=P^r',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            $this->email->initialize($config);
            $this->email->from('customersupport@keralaonroad.com', 'Support');
            $this->email->to($toEmail);
            $this->email->subject('contacting details');
            $this->email->message($this->input->post('msg'));
            if ($this->email->send()) {
                echo "Your request successfully sent";
            }
            exit;
        }
        $webData['tittle'] = "KeralaOnRoads - contact";
        $webData['content'][] = 'contact';
        $this->load->view('templates/welcome', $webData);
    }
    public function sms(){
        header("location:http://mobilegateway.in:8080/sendsms/bulksms?username=ggg-trice&password=12345&type=0&dlr=1&destination=9400139888&source=022751&message=".$_GET['msg']);
    }
}
