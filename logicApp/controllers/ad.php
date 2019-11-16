<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad extends CI_Controller {

    public function __construct() {
        parent::__construct();
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
        $webData['tittle'] = "Welcome To KeralaOnRoad";
    }
    
    public function info(){
    	$webData['tittle'] = "Welcome To KeralaOnRoad";
        $webData['content'][] = 'adInfo';
        $webData['style'][] = "slimtable";
        $webData['script'][] = "slimtable";
        $webData['ad']=$this->db->get('add_info')->result();
        $this->load->view('templates/welcome', $webData);
    }
    
    public function add(){
        if(isset($_POST['pLoc'],$_POST['tAd'],$_POST['position'])){
            $data = Array(
                'location' => $this->input->post('pLoc'),
                'type' => $this->input->post('tAd'),
                'postion' => $this->input->post('position'),
                'duration' => $this->input->post('duration'),
                'specification' => $this->input->post('seeci')
            );
            $this->db->insert('add_info',$data);
            redirect(site_url('ad/info'));
        }
    	$webData['tittle'] = "Welcome To KeralaOnRoad";
        $webData['content'][] = 'adAdd';
        $webData['ad']=$this->db->get('add_info')->result();
        $this->load->view('templates/welcome', $webData);
    }
    
    public function editAdInfo(){
        if(isset($_POST['pLoc'],$_POST['tAd'],$_POST['position'])){
            $data = Array(
                'location' => $this->input->post('pLoc'),
                'type' => $this->input->post('tAd'),
                'postion' => $this->input->post('position'),
                'duration' => $this->input->post('duration'),
                'specification' => $this->input->post('seeci')
            );
            $this->db->update('add_info', $data, array('id'=>$this->input->post('id')));
            redirect(site_url('ad/info'));
        }
        $webData['data']=$this->db->get_where('add_info', array('id'=>$this->uri->segment(3)))->result();
    	$webData['tittle'] = "Welcome To KeralaOnRoad";
        $webData['content'][] = 'adAdd';
        $webData['ad']=$this->db->get('add_info')->result();
        $this->load->view('templates/welcome', $webData);
    }
    
    public function deleteAdInfo(){
        $this->db->delete('add_info', array('id' => $this->uri->segment(3)));
        redirect(site_url('ad/info'));
    }
    
    public function adsWithus() {
        $webData['tittle'] = "Welcome To KeralaOnRoad";
        $webData['style'][] = "slimtable";
        $webData['script'][] = "slimtable";
        $webData['script'][] = "adWithUs";
        $webData['ad']=$this->db->get('add_info')->result();
        $webData['content'][] = 'adWithUs';
        $this->load->view('templates/welcome', $webData);
    }
    
    public function adDetails(){
        if(isset($_POST['value1'])){
            $data=$this->db->get_where('add_info',  array('id'=>  $this->input->post('value1')))->result();
            if(isset($data[0]->specification)){
                echo $data[0]->specification;
            }
        }
    }

    public function adRequest() {
        if (!(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']))) {
            $arr = $_POST;
            $arr['type'] = 1;
            $arr['status'] = 1;
            $this->db->insert('message', $arr);
            $mesage = 'Name:' . $this->input->post('name') . '<br/>' .
                    'Phone:' . $this->input->post('phone') . '<br/>' .
                    'Email:' . $this->input->post('email') . '<br/>' .
                    'Message:' . $this->input->post('message') . '<br/>';
            if (isset($mesage)) {
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
                $this->email->subject('Ad request');
                $this->email->message($mesage);
                if($this->email->send()){
                    $this->email->clear(true);
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
                    $this->email->from('operationmanager@keralaonroad.com', 'Keralaonroad');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Thank you for your advertisement request');
                    $this->email->message('Dear Mr/Ms.'.$this->input->post('name').'<br /><br />Thank you for contacting us about advertising at Keralaonroad.com<br /><br />
                        Advertising with us will put your product or service in front of a huge list of prospective buyers who are looking for ways to improve the business. Our team will respond to your request as soon as possible,for further details please write to us at operationmanager@keralaonroad.com
                        <br/><br/>
                        Regards<br/><br/>
                        Keralaonroad.com<br/>');
                    $this->email->send();
                    echo '<script>alert("Your request successfully sent");</script>';
                }
            }
        }
        $webData['tittle'] = "Welcome To KeralaOnRoad";
        $webData['script'][] = 'adRequest';
        $webData['content'][] = 'adRequest';
        $this->load->view('templates/welcome', $webData);
    }

    public function wpview() {
        $this->load->view('pages/viewAd');
    }

    public function manage() {
        if ($this->session->userdata('keralaonroads')) {
            $webData['content'][] = 'adManage';
            $this->db->where('loc', 1);
            $qry1 = $this->db->get('add');
            $webData['path1'] = $qry1->result();
            $this->db->where('loc', 2);
            $qry2 = $this->db->get('add');
            $webData['path2'] = $qry2->result();
            $this->db->where('loc', 3);
            $qry3 = $this->db->get('add');
            $webData['path3'] = $qry3->result();
            $this->db->where('loc', 4);
            $qry4 = $this->db->get('add');
            $webData['path4'] = $qry4->result();
            $this->load->view('templates/welcome', $webData);
        } else
            redirect('welcome/login');
    }

    public function adupload() {
        if ($this->session->userdata('keralaonroads')) {
            $webData['content'][] = 'adupload';
            $nesId = $this->db->insert_id();
            if (isset($_POST['submit'])) {
                if (($_FILES['userfile']['name']) != "") {
                    $image_info = getimagesize($_FILES["userfile"]["tmp_name"]);
                    $image_width = $image_info[0];
                    $image_height = $image_info[1];
                    if ((($image_width == 370 && $image_height == 300) && ($this->uri->segment(3) == 3 || $this->uri->segment(3) == 4)) || (($image_width == 1000 && $image_height == 350) && ($this->uri->segment(3) == 1 || $this->uri->segment(3) == 2)) || (($image_width == 1200 && $image_height == 130) && ($this->uri->segment(3) % 3 == 0)) || ($this->uri->segment(3) > 9 && $this->uri->segment(3) % 3 != 0) && ($image_width == 600 && $image_height == 130) || ($image_width == 300 && $image_height == 380) && ($this->uri->segment(3) > 99)) {
                        $config['upload_path'] = './assets/images/advertisement/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '8048';
                        $_FILES['newimg']['name'] = $_FILES['userfile']['name'];
                        $_FILES['newimg']['type'] = $_FILES['userfile']['type'];
                        $_FILES['newimg']['tmp_name'] = $_FILES['userfile']['tmp_name'];
                        $_FILES['newimg']['error'] = $_FILES['userfile']['error'];
                        $_FILES['newimg']['size'] = $_FILES['userfile']['size'];
                        $config['file_name'] = 'korslide_' . $nesId;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('newimg')) {
                            $error = array('error' => $this->upload->display_errors());
                            echo $this->upload->display_errors();
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $data['upload_data']['full_path'];
                            $this->load->library('image_lib', $config);
                            $this->image_lib->initialize($config);
                            if ($this->uri->segment(3) > 9) {
                                $row = $this->db->get_where('add', array('loc' => $this->uri->segment(3)))->result();
                                if (isset($row[0]->loc)) {
                                    unlink(('./assets/images/advertisement/' . $row[0]->img_path1));
                                    $data = array(
                                        'img_path1' => $data['upload_data']['file_name'],
                                        'link' => $this->input->post('link'));
                                    $this->db->update('add', $data, array('loc' => $this->uri->segment(3)));
                                } else {
                                    $this->db->insert('add', array('img_path1' => $data['upload_data']['file_name'], 'status' => 1, 'loc' => $this->uri->segment(3), 'type' => 1, 'link' => $this->input->post('link')));
                                }
                            } else {
                                $this->db->insert('add', array('img_path1' => $data['upload_data']['file_name'], 'status' => 1, 'loc' => $this->uri->segment(3), 'type' => 1, 'link' => $this->input->post('link')));
                            }
                        }
                    } else {
                        echo'<script>alert("please verify the image");</script>';
                    }
                }
            }
            $this->load->view('templates/welcome', $webData);
        } else {
            redirect('welcome/login');
        }
    }

    public function delete() {
        if ($this->session->userdata('keralaonroads')) {
            if (isset($_GET['did'])) {
                $add = $this->db->get_where('add', array('id' => $_GET['did']))->result();
                if ($add[0]->img_path1) {
                    unlink(('./assets/images/advertisement/' . $add[0]->img_path1));
                    $this->db->delete('add', array('id' => $_GET['did']));
                }
            }
            redirect(site_url('ad/manage'));
        }
        redirect(site_url('welcome'));
    }

    public function brandad() {
        if ($this->session->userdata('keralaonroads')) {
            $webData['content'][] = 'brandad';
            $this->db->order_by('companyname', 'ASC');
            $qry = $this->db->get('company');
            $webData['brand1'] = $qry->result();
            $nesId = $this->db->insert_id();
            if (isset($_POST['submit1'])) {
                if (($_FILES['userfile']['name']) != "") {
                    $image_info = getimagesize($_FILES["userfile"]["tmp_name"]);
                    $image_width = $image_info[0];
                    $image_height = $image_info[1];

                    if ($image_width == 253 && $image_height == 175) {
                        $config['upload_path'] = './assets/images/advertisement/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '8048';
                        $_FILES['newimg']['name'] = $_FILES['userfile']['name'];
                        $_FILES['newimg']['type'] = $_FILES['userfile']['type'];
                        $_FILES['newimg']['tmp_name'] = $_FILES['userfile']['tmp_name'];
                        $_FILES['newimg']['error'] = $_FILES['userfile']['error'];
                        $_FILES['newimg']['size'] = $_FILES['userfile']['size'];
                        $config['file_name'] = 'korbrand_' . time();
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('newimg')) {
                            $error = array('error' => $this->upload->display_errors());
                            echo $this->upload->display_errors();
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $data['upload_data']['full_path'];
                            $this->load->library('image_lib', $config);
                            $this->image_lib->initialize($config);
                            $row = $this->db->get_where('brand_ad', array('cmp_id' => $this->input->post('company')))->result();
                            if (isset($row[0]->cmp_id)) {
                                unlink(('./assets/images/advertisement/' . $row[0]->img_name));
                                $data = array(
                                    'img_name' => $data['upload_data']['file_name'],
                                    'link' => $this->input->post('link'));
                                $this->db->update('brand_ad', $data, array('cmp_id' => $this->input->post('company')));
                            } else {
                                $this->db->insert('brand_ad', array('img_name' => $data['upload_data']['file_name'], 'cmp_id' => $this->input->post('company'), 'type' => 1, 'link' => $this->input->post('link')));
                            }
                        }
                    } else {
                        echo'<script>alert("please verify the image");</script>';
                    }
                }
            }
            $this->load->view('templates/welcome', $webData);
        } else
            redirect('welcome/login');
    }

    public function getDealerAd() {
        if (isset($_POST['placeid'], $_POST['delid'])) {
            $this->db->order_by('location', 'ASC');
            $result = $this->db->get_where('dealer_ad', array('deal_id' => $this->input->post('delid'), 'dist_id' => $this->input->post('placeid')))->result();
            foreach ($result as $img) {
                echo '<img class="col-xs-50" src="' . IMAGES_PATH . "advertisement/" . $img->img_name . '"></img>';
            }
        }
    }

    public function dealerad() {
        if ($this->session->userdata('keralaonroads')) {
            $webData['content'][] = 'dealerad';
            $nesId = $this->db->insert_id();
            if (isset($_POST['submit2'])) {
                if (($_FILES['userfile']['name']) != "" && $this->input->post('dist') != 0 && $this->input->post('position') != 0) {
                    $image_info = getimagesize($_FILES["userfile"]["tmp_name"]);
                    $image_width = $image_info[0];
                    $image_height = $image_info[1];
                    if ($image_width == 300 && $image_height == 380) {
                        $config['upload_path'] = './assets/images/advertisement/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '8048';
                        $_FILES['newimg']['name'] = $_FILES['userfile']['name'];
                        $_FILES['newimg']['type'] = $_FILES['userfile']['type'];
                        $_FILES['newimg']['tmp_name'] = $_FILES['userfile']['tmp_name'];
                        $_FILES['newimg']['error'] = $_FILES['userfile']['error'];
                        $_FILES['newimg']['size'] = $_FILES['userfile']['size'];
                        $config['file_name'] = 'kordealer_'.time() . $nesId;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('newimg')) {
                            $error = array('error' => $this->upload->display_errors());
                            echo $this->upload->display_errors();
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $data['upload_data']['full_path'];
                            $this->load->library('image_lib', $config);
                            $this->image_lib->initialize($config);
                            $row = $this->db->get_where('dealer_ad', array('deal_id' => $this->uri->segment(3), 'dist_id' => $this->input->post('dist'), 'location' => $this->input->post('position')))->result();
                            if (isset($row[0]->id)) {
                                unlink(('./assets/images/advertisement/' . $row[0]->img_name));
                                $data = array(
                                    'img_name' => $data['upload_data']['file_name'],
                                    'link' => $this->input->post('link'),
                                    'location' => $this->input->post('position'),
                                    'dist_id' => $this->input->post('dist'));
                                $this->db->update('dealer_ad', $data, array('id' => $row[0]->id));
                            } else {
                                $this->db->insert('dealer_ad', array('img_name' => $data['upload_data']['file_name'], 'deal_id' => $this->uri->segment(3), 'type' => 1, 'link' => $this->input->post('link'), 'dist_id' => $this->input->post('dist'), 'location' => $this->input->post('position')));
                            }
                        }
                    } else {
                        echo'<script>alert("please verify the image");</script>';
                    }
                } else {
                    echo'<script>alert("Please Select All Fields");</script>';
                }
            }
            $this->load->view('templates/welcome', $webData);
        } else
            redirect('welcome/login');
    }
}