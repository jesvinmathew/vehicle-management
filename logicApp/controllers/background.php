<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Background extends CI_Controller {

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

    public function testDrive() {
    	$webData=array();
    	if(isset($_GET['delId'])){
    		$this->db->select('name,address');
    		$result=$this->db->get_where('dealer_branch',['branch_id'=>$this->input->get('delId')])->result();
    		$webData=$result[0];
    	}
        $this->load->view('pages/testDriveForm',$webData);
    }
    public function commonTestdrive() {
    	
        $this->load->view('pages/commonTestdrive');
    }
 public function comonService() {
    	
        $this->load->view('pages/comonService');
    }

 public function commonPrice() {
    	
        $this->load->view('pages/commonPrice');
    }
    public function commonBreak() {
    	
        $this->load->view('pages/commonBreak');
    }



    public function service() {
    	$webData=array();
    	if(isset($_GET['delId'])){
    		$this->db->select('dealer_branch.name, dealer_branch.address, dealer.vtype');
    		$this->db->join('dealer', 'dealer.id = 	dealer_branch.dealer_id');
    		$result=$this->db->get_where('dealer_branch',['branch_id'=>$this->input->get('delId')])->result();
    		$webData=$result[0];
    	}
        $this->load->view('pages/bookService',$webData);
    }

    public function breakservice() {
    	$webData=array();
    	if(isset($_GET['brachId'])){
    		$this->db->select('dealer_branch.name, dealer_branch.address, dealer.vtype');
    		$this->db->join('dealer', 'dealer.id = 	dealer_branch.dealer_id');
    		$result=$this->db->get_where('dealer_branch',['branch_id'=>$this->input->get('brachId')])->result();
    		$webData=$result[0];
    	}
        $this->load->view('pages/breakService',$webData);
    }

    public function bookTestDrive() {
        if (isset($_POST['msg'])) {
            $toEmail = "info@keralaonroad.com";
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
            $this->email->from('customersupport@keralaonroad.com', 'Test Drive');
            $this->email->to($toEmail);
            $this->email->subject('Test Drive');
            $this->email->message($this->input->post('msg'));
            if ($this->email->send()) {
            echo "Your Request Sent successfully";
            if(isset($_POST['toemail'])){
                $this->email->clear();
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
                $this->email->to($this->input->post('toemail'));
                $this->email->subject('Thank you for your test drive request');
                $this->email->message('Dear Mr/Ms.' . $this->input->post('toname') . ' <br />
                        We thank you for the interest shown in keralaonroad.com products and for your request for Test Drive<br/><br/>
                        As per your request, our team will assist you based on the information you have provided in this regard. We are confident that the Selected Model will meet all your requirements for space, durability, reliability, fuel efficiency and exceptional styling.
                        We also take this opportunity to invite you to visit our website http://www.keralaonroad.com for various latest information and updates on our Products and Services.<br/><br/>
                        Your request is in process and will get in touch with you shortly.<br/><br/>
                        Thank you once again for your time and effort.<br/><br/>
                        Regards<br/><br/>
                        Keralaonroad.com');
                $this->email->send();
                
            }}
        }
    }

    public function bookService() {
        if (isset($_POST['msg'])) {
            $toEmail = 'support@keralaonroad.com';
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
            $this->email->from('customersupport@keralaonroad.com', 'Service');
            $this->email->to($toEmail);
            $this->email->subject('Service Request');
            $this->email->message(nl2br($this->input->post('msg')));
            if($this->email->send()){
                echo "Your request successfully sent";
                if(isset($_POST['email']))
                {
                $this->email->clear();
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
                $this->email->from('support@keralaonroad.com', 'keralaonroad');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Thank you for your service request');
                $this->email->message('Dear Mr/Ms. '.$this->input->post('name').'<br /><br />Thank you for using Keralaonroad.com service request facility.<br /><br />Keralaonroad.com will be in touch with you soon with your selected dealer Service Centre to confirm the date and time for your vehicle service booking.<br /><br />
                    Regards<br/><br/>
                    Keralaonroad.com');
                $this->email->send();
            }}
        }
    }

    public function unenq() {
        if (isset($_POST['msg'])) {
            $toEmail = "info@keralaonroad.com";
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
            $this->email->from('customersupport@keralaonroad.com', 'Used vehicle enquery');
            $this->email->to($toEmail);
            $this->email->subject('Used vehicle enquery');
            $this->email->message($this->input->post('msg'));
            if ($this->email->send()) {
                echo "Your request successfully sent";
                $this->email->clear();
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
                $this->email->to($this->input->post('toemail'));
                $this->email->subject('Thank you for your vehicle enquiry');
                $this->email->message('Dear Mr/Ms. '.$this->input->post('toname').'<br /><br />Thank you, we have successfully received your used vehicle enquiry at Keralaonroad.com. <br /><br />
                    Our team will get back to you shortly to assist you with your request.<br /><br />
                    Regards<br/><br/>
                    Keralaonroad.com');
                $this->email->send();
            }
        }
    }

    public function vareq() {
        if (isset($_POST['msg'])) {
            $toEmail = "info@keralaonroad.com";
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
            $this->email->from('customersupport@keralaonroad.com', 'Price Enqury');
            $this->email->to($toEmail);
            $this->email->subject('Varient Price enquiry');
            $this->email->message($this->input->post('msg'));
            if ($this->email->send()) {
            
            echo "Your requet has been sent successfully";
            if(isset($_POST['toemail']))
            {
                $this->email->clear();
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
                $this->email->to($this->input->post('toemail'));
                $this->email->subject('Thank you for your price enquiry');
                $this->email->message('Dear Mr/Ms.'.$this->input->post('toname').'<br />Thank you for vehicle price enquiry. Keralaonroad.com team will be in touch with you soon with the price quotes for the selected vehicle request.<br /><br />
                    Regards<br/><br/>
                    Keralaonroad.com<br/>
                ');
                $this->email->send();
                
            }}
        }
    }

    public function browser() {
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
            $this->email->from('customersupport@keralaonroad.com', '');
            $this->email->to($toEmail);
            $this->email->subject('Brochure');
            $this->email->message($this->input->post('msg'));
            if($this->email->send()){
                $this->email->clear();
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
                $this->email->from('support@keralaonroad.com', 'Keralaonroad');
                $this->email->to($this->input->post('toemail'));
                $this->email->subject('Thank you for requesting brochure');
                $this->email->message('Dear Mr/Ms.'.$this->input->post('toname').'<br />Thank you for submitting our online form and viewing the brochure at Keralaonroad.com.<br /><br />
                    If you are having trouble downloading the brochure, Keralaonroad.com will mail your brochure to you immediately in your inbox
                    <br /><br />Regards<br/><br/>
                    Keralaonroad.com<br/>
                ');
              $this->email->send(); 
            }
        }
    }
}
