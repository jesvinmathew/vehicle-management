<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('commanmodel'), '', true);
        $user=($this->session->userdata('keralaonroads_name'))?$this->session->userdata('keralaonroads_name'):"Guest";
            $trafic = Array(
                        'ip' => $this->input->ip_address(),
                        'page' => uri_string(),
                        'username' => $user,
                        'date' => date("Y-m-d")
                    );
            $this->db->insert('traffic',$trafic);
    }

    public function index() {
        $webData['tittle'] = "KeralaOnRoads - Insurance";
        $webData['content'][] = 'insurance';
        $webData['script'][] = "calendar";
        $webData['style'][] = "calendar";
        $webData['script'][] = "insurance";
        $this->load->view('templates/welcome', $webData);
    }

    public function idvmange() {
        if (!$this->session->userdata('keralaonroads_admin')) {
            redirect('welcome/login');
        } else {
            if (!empty($_POST)) {
                if (isset($_POST['vehicleType']) && $this->input->post('vehicleType') != 0 && isset($_POST['make']) && $this->input->post('make') != 0 && isset($_POST['model']) && $this->input->post('model') != 0) {
                    foreach ($this->input->post('idvid') as $key => $val) {
                        if (empty($val) || $val == "null") {
                            $query = $this->db->get_where('idv_chart', array('variant_id' => $this->input->post('vid')[$key]));
                            if ($query->num_rows() > 0) {
                                echo $this->input->post('vid')[$key];
                                $data = array(
                                    'comp_id' => $this->input->post('make'),
                                    'model_id' => $this->input->post('model'),
                                    'ageless6mon' => $this->input->post('ag6m')[$key],
                                    'age6to1' => $this->input->post('ag1y')[$key],
                                    'age1to2' => $this->input->post('ag2y')[$key],
                                    'age2to3' => $this->input->post('ag3y')[$key],
                                    'age3to4' => $this->input->post('ag4y')[$key],
                                    'age4to5' => $this->input->post('ag5y')[$key],
                                    'age5to6' => $this->input->post('ag6y')[$key],
                                    'age6to7' => $this->input->post('ag7y')[$key],
                                    'age7to8' => $this->input->post('ag8y')[$key],
                                    'ag8to9' => $this->input->post('ag9y')[$key],
                                    'ag9to10' => $this->input->post('ag10y')[$key],
                                    'ag10to11' => $this->input->post('ag11y')[$key],
                                    'ag11to12' => $this->input->post('ag12y')[$key],
                                    'age12abow' => $this->input->post('ag13y')[$key],
                                    'status' => 1
                                );
                                $this->db->where('variant_id', $this->input->post('vid')[$key]);
                                $this->db->update('idv_chart', $data);
                            } else {
                                $data = array(
                                    'comp_id' => $this->input->post('make'),
                                    'model_id' => $this->input->post('model'),
                                    'variant_id' => $this->input->post('vid')[$key],
                                    'ageless6mon' => $this->input->post('ag6m')[$key],
                                    'age6to1' => $this->input->post('ag1y')[$key],
                                    'age1to2' => $this->input->post('ag2y')[$key],
                                    'age2to3' => $this->input->post('ag3y')[$key],
                                    'age3to4' => $this->input->post('ag4y')[$key],
                                    'age4to5' => $this->input->post('ag5y')[$key],
                                    'age5to6' => $this->input->post('ag6y')[$key],
                                    'age6to7' => $this->input->post('ag7y')[$key],
                                    'ag7to8' => $this->input->post('ag8y')[$key],
                                    'ag8to9' => $this->input->post('ag9y')[$key],
                                    'ag9to10' => $this->input->post('ag10y')[$key],
                                    'ag10to11' => $this->input->post('ag11y')[$key],
                                    'ag11to12' => $this->input->post('ag12y')[$key],
                                    'age12abow' => $this->input->post('ag13y')[$key],
                                    'status' => 1
                                );
                                $this->db->insert('idv_chart', $data);
                            }
                        } else {
                            $data = array(
                                'comp_id' => $this->input->post('make'),
                                'model_id' => $this->input->post('model'),
                                'variant_id' => $this->input->post('vid')[$key],
                                'ageless6mon' => $this->input->post('ag6m')[$key],
                                'age6to1' => $this->input->post('ag1y')[$key],
                                'age1to2' => $this->input->post('ag2y')[$key],
                                'age2to3' => $this->input->post('ag3y')[$key],
                                'age3to4' => $this->input->post('ag4y')[$key],
                                'age4to5' => $this->input->post('ag5y')[$key],
                                'age5to6' => $this->input->post('ag6y')[$key],
                                'age6to7' => $this->input->post('ag7y')[$key],
                                'ag7to8' => $this->input->post('ag8y')[$key],
                                'ag8to9' => $this->input->post('ag9y')[$key],
                                'ag9to10' => $this->input->post('ag10y')[$key],
                                'ag10to11' => $this->input->post('ag11y')[$key],
                                'ag11to12' => $this->input->post('ag12y')[$key],
                                'age12abow' => $this->input->post('ag13y')[$key],
                                'status' => 1
                            );
                            $this->db->where('idv_id', $val);
                            $this->db->update('idv_chart', $data);
                        }
                    }
                }
            }
            $webData['tittle'] = "KeralaOnRoads - IDV Manager";
            $webData['content'][] = 'idvmange';
            $webData['script'][] = "idvmange";
            $this->load->view('templates/welcome', $webData);
        }
    }

    public function manage() {
        $webData['tittle'] = "KeralaOnRoads - Insurance Manager";
        $webData['content'][] = 'insuranceMange';
        //$webData['script'][] = "insuranceMange";
        $this->load->view('templates/welcome', $webData);
    }

    public function buyinsuranse() {
        $webData['tittle'] = "KeralaOnRoads - Insurance";
        $webData['content'][] = 'buyInsurance';
        if(empty($_POST['formid'])){
            $this->db->insert('insu_eqry', $_POST);
            $webData['id']=$this->db->insert_id();
        }
        if (!isset($_POST['userchkd'])) {
            $qry1 = $this->db->get_where('company', array('cmp_id' => $this->input->post('make')));
            $webData['make'] = $qry1->result();
            $qry2 = $this->db->get_where('model', array('model_id' => $this->input->post('model')));
            $webData['model'] = $qry2->result();
            $qry3 = $this->db->get_where('variant', array('varient_id' => $this->input->post('variant')));
            $webData['var'] = $qry3->result();
        }
        $this->load->view('templates/welcome', $webData);
    }
    
    public function buyinsuranseInsert(){
        $this->db->where('id', $this->input->post('fid'));
        $this->db->update('insu_eqry', array(
                'address' => $this->input->post('address'),
                'location' => $this->input->post('location'),
                'city' => $this->input->post('city'),
                'pin' => $this->input->post('pin'),
                'km' => $this->input->post('km'),
                'fual' => $this->input->post('fual'),
                'insu_cmp' => $this->input->post('insu_cmp')
            ));
                $config['upload_path'] =".". UPLOAD_PATH.'insu_eqry/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '8048'; 
                $config['file_name'] = 'korins_' . time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('rc')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->db->insert('insu_eqry_images', array('name' => $data['upload_data']['file_name'], 'type' => 1, 'ins_id' => $this->input->post('fid')));
                }
                $config['upload_path'] = ".".UPLOAD_PATH.'insu_eqry/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '8048'; 
                $config['file_name'] = 'korins_' . time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('incopy')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->db->insert('insu_eqry_images', array('name' => $data['upload_data']['file_name'], 'type' => 2, 'ins_id' => $this->input->post('fid')));
                }
                $config['upload_path'] = ".".UPLOAD_PATH.'insu_eqry/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '8048'; 
                $config['file_name'] = 'korins_' . time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('taxRec')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->db->insert('insu_eqry_images', array('name' => $data['upload_data']['file_name'], 'type' => 3, 'ins_id' => $this->input->post('fid')));
                }
                $config['upload_path'] = ".".UPLOAD_PATH.'insu_eqry/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '8048'; 
                $config['file_name'] = 'korins_' . time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('fImg')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->db->insert('insu_eqry_images', array('name' => $data['upload_data']['file_name'], 'type' => 4, 'ins_id' => $this->input->post('fid')));
                }
                $config['upload_path'] = ".".UPLOAD_PATH.'insu_eqry/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '8048'; 
                $config['file_name'] = 'korins_' . time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('bImg')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->db->insert('insu_eqry_images', array('name' => $data['upload_data']['file_name'], 'type' => 5, 'ins_id' => $this->input->post('fid')));
                }
                $config['upload_path'] = ".".UPLOAD_PATH.'insu_eqry/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '8048'; 
                $config['file_name'] = 'korins_' . time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('rImg')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->db->insert('insu_eqry_images', array('name' => $data['upload_data']['file_name'], 'type' => 6, 'ins_id' => $this->input->post('fid')));
                }
                $config['upload_path'] = ".".UPLOAD_PATH.'insu_eqry/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '8048'; 
                $config['file_name'] = 'korins_' . time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('lImg')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->db->insert('insu_eqry_images', array('name' => $data['upload_data']['file_name'], 'type' => 7, 'ins_id' => $this->input->post('fid')));
                }
                redirect('insurance');
    }

    public function insu_enqry() {
        if (isset($_POST['name'])) {
            $this->db->insert('insu_eqry', $_POST);
            echo $this->db->insert_id();
        }
    }

    public function showEnquery() {
        if ($this->session->userdata('keralaonroads_admin')) {
            $webData['tittle'] = "KeralaOnRoads - Insurance Enquery";
            $webData['content'][] = 'insuranceEnq';
            $this->db->order_by('id', 'DESC');
            $webData['enqu'] = $this->db->get('insu_eqry')->result();
            $this->load->view('templates/welcome', $webData);
        } else {
            redirect('insurance');
        }
    }

    public function enqueryInfo() {
        if ($this->session->userdata('keralaonroads_admin') && ((int) $this->uri->segment(3))) {
            if (isset($_POST['submit'])) {
                $this->db->where('id', $this->uri->segment(3));
                $this->db->update('insu_eqry', array('thiParty' => $this->input->post('tparty'),
                    'normel' => $this->input->post('normel'),
                    'extra' => $this->input->post('extra')
                ));
            }
            $webData['tittle'] = "KeralaOnRoads - Insurance Enquery";
            $webData['content'][] = 'insuranceEnqInfo';
            $webData['enqu'] = $this->db->get_where('insu_eqry', array('id' => $this->uri->segment(3)))->result();
            if (isset($_POST['g_email'], $_POST['toemail'])) {
                $toEmail = $this->input->post('toemail');
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
                $this->email->from('customersupport@keralaonroad.com', 'Insurance Admin');
                $this->email->to($toEmail);
                $this->email->subject('Insurance request reply');
                $this->email->message("Go to the below link for Proced Payment<br /> <a href='" . site_url("insurance/payment/" . $this->uri->segment(3) . "/" . md5($toEmail)) . "'>click here</a>");
                $this->email->send();
            }
            $this->load->view('templates/welcome', $webData);
        } else {
            redirect('insurance');
        }
    }

    public function payment() {
        $id = $this->uri->segment(3);
        $email = $this->uri->segment(4);
        $insData = $this->db->get_where('insu_eqry', array('id' => $id))->result();
        if (md5($insData[0]->email) === $email) {
            if (isset($_POST['user'], $_POST['plan'])) {
                if ($_POST['plan'] == 1)
                    $amount = $insData[0]->thiParty;
                else if ($_POST['plan'] == 2)
                    $amount = $insData[0]->normel;
                else
                    $amount = $insData[0]->extra;
                $SECURE_SECRET = "03A41248FE404892E1CC5E77CE9EE4FA";
                $vpcURL = "https://migs.mastercard.com.au/vpcpay?";
                $this->db->insert('ins_payment', array('user_id' => $this->input->post('user'), 'plan_id' => $this->input->post('plan'), 'amount' => $amount, 'date' => date('Y-m-d')));
                $id = $this->db->insert_id();
                unset($_POST["user"]);
                unset($_POST["plan"]);
                $paymenData = array(
                    "Title" => "PHP VPC 3-Party",
                    "vpc_Version" => 1,
                    "vpc_Command" => "pay",
                    "vpc_AccessCode" => "E3201AD2",
                    "vpc_MerchTxnRef" => "SampleData",
                    "vpc_Merchant" => "KERALAONROAD",
                    "vpc_OrderInfo" => "InsuranseInfo",
                    "vpc_Amount" => ($amount * 100),
                    "vpc_Locale" => "en",
                    "vpc_ReturnURL" => site_url("insurance/getPayment/$id"),
                    "vpc_TicketNo" => $id,
                    "vpc_TxSourceSubType" => "SINGLE"
                );
                $md5HashData = $SECURE_SECRET;
                ksort($paymenData);
                $appendAmp = 0;
                foreach ($paymenData as $key => $value) {
                    if (strlen($value) > 0) {
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
            $webData['tittle'] = "KeralaOnRoads - Pay Insurance";
            $webData['content'][] = 'insurancePayment';
            $webData['style'][] = "plans";
            $webData['insData'] = $insData;
            $this->load->view('templates/welcome', $webData);
        } else {
            redirect('insurance');
        }
    }

    public function getPayment() {
        $userId = $this->session->userdata('keralaonroads');
        $dataId = $this->uri->segment(3);
        $palnData = $this->db->get_where('insu_eqry', array('id' => $dataId))->result();
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
                $this->db->update('insu_eqry', array('transation_id' => $id, 'status' => 1), array('id' => $dataId));
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
                $this->email->from('customersupport@keralaonroad.com', 'Admin');
                $this->email->to($toEmail);
                $this->email->subject('New Insurance');
                $this->email->message("Amount:" . $_GET["vpc_Amount"]);
                $this->email->send();
            }
            $webData['content'][] = 'payment/respose';
            $this->load->view('templates/welcome', $webData);
        }
    }

}
