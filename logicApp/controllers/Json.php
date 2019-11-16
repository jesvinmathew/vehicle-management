<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Json extends CI_Controller {

    public function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-type: application/json; charset=utf8');
        $this->load->model("Comman_model");
    }
    
    public function getProducts(){
    	if($this->input->post('value1')){
    		$product=$this->Comman_model->selectAll('products',['cat_id'=>$this->input->post('value1')]);
    		$this->output
    			->set_content_type('application/json')
    			->set_output(json_encode($product));
    		
    	}
    }
     public function contactmail(){
    	
        if (isset($_POST['msg'])) {
            $toEmail = "info@smartexgt.com";
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
            $this->email->from('info@smartexgt.com', 'test');
            $this->email->to($toEmail);
            $this->email->subject('test');
            $this->email->message($this->input->post('msg'));
           $this->email->send();
            echo'we will contact you soon';
            
    }
    }
}
?>