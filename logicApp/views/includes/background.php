<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Background extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('commanmodel'), '', true);
    }
    
    public function testDrive(){
       $this->load->view('pages/testDriveForm');
    }
    public function service(){
       $this->load->view('pages/bookService');
    }
    public function bookTestDrive(){
        if(isset($_POST['msg'],$_POST['delId'])){
            $qry=$this->db->get_where('dealer_branch',  array('branch_id'=>  $this->input->post('delId')));
            $toEmail=($qry->result()[0]->sale_email=="")?"support@keralaonroad.com":$qry->result()[0]->sale_email;
            $ccEmail="admin.executive@keralaonroad.com";
            $this->load->library('email');
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://vps.tricetechnologies.in',
                    'smtp_port' => 465,
                    'smtp_user' => 'info@keralaonroad.com',
                    'smtp_pass' => 'fZ5?NhVRw4qt',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                $this->email->initialize($config);
                $this->email->from('info@keralaonroad.com', 'Admin');
                $this->email->to($toEmail);
                $this->email->cc($ccEmail);
                $this->email->subject('Test Drive');
                $this->email->message($this->input->post('msg'));
                $this->email->send();
        }        
    }
    public function bookService(){
        if(isset($_POST['msg'],$_POST['delId'])){
            $qry=$this->db->get_where('dealer_branch',  array('branch_id'=>  $this->input->post('delId')));
            $toEmail=($qry->result()[0]->sar_email=="")?"support@keralaonroad.com":$qry->result()[0]->sar_email;
            $ccEmail="admin.executive@keralaonroad.com";
            $this->load->library('email');
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://vps.tricetechnologies.in',
                    'smtp_port' => 465,
                    'smtp_user' => 'info@keralaonroad.com',
                    'smtp_pass' => 'fZ5?NhVRw4qt',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                $this->email->initialize($config);
                $this->email->from('info@keralaonroad.com', 'Admin');
                $this->email->to($toEmail);
                $this->email->cc($ccEmail);
                $this->email->subject('Service');
                $this->email->message($this->input->post('msg'));
                $this->email->send();
        }
    }
    
}