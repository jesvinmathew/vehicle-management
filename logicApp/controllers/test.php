<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

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
    public function index(){
    	$this->load->library('email');
        $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://vps.tricetechnologies.in',
    'smtp_port' => 465,
    'smtp_user' => 'info@keralaonroad.com',
    'smtp_pass' => 'fZ5?NhVRw4qt',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
    	/*$config['protocol'] = 'smtp';
    	$config['smtp_host'] = 'ssl://vps.tricetechnologies.in';
    	$config['smtp_port'] = '465'; 
   	$config['smtp_timeout'] = '7';
    	$config['smtp_user'] = 'info@keralaonroad.com';
    	$config['smtp_pass'] = 'fZ5?NhVRw4qt';
	$config['mailpath'] = '/usr/sbin/sendmail';
	$config['charset'] = 'iso-8859-1';
	$config['wordwrap'] = TRUE;*/


$this->email->initialize($config);
                        $this->email->from('info@keralaonroad.com', 'Admin');
                        $this->email->to('jesvinmathew@gmail.com');
                        $this->email->cc('info@keralaonroad.com');
                        $this->email->bcc('info@keralaonroad.com');
                        $this->email->subject('Confirm your email registered in Keralaonroad.com');
                        $this->email->message('Testing the email address Please press this key and confirm it please ');
                        $this->email->send();
                        echo $this->email->print_debugger();
                        
    }
}