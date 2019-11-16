<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminJson extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata("LgicSoft")){
            $this->load->model("Comman_model");
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
            header('Content-type: application/json; charset=utf8');
            $this->load->helper(array('form', 'url'));
        }
        else{
            redirect('Welcome/login');
        }        
    }
    public function addCategory() {
    	$data['message']="";
        if (isset($_POST['new'])) {
            if ($_POST['new'] == '-1') {
                $this->Comman_model->insert('category ', ['name' => $this->input->post('name'), 'priority' => $this->input->post('priority'), 'status' => 1]);
                $data['message']= "Category " . $this->input->post('name') . " added successfully";
            } else if(isset($_POST['subCat']) && $this->input->post('subCat')==1){
            	$this->Comman_model->insert('category ', ['name' => $this->input->post('name'), 'priority' => $this->input->post('priority'), 'p_id' => $this->input->post('new'), 'status' => 1]);
                $data['message']= "Sub category " . $this->input->post('name') . " added successfully";
            }
            else{
	        $data = array(
	        	'name' => subCat,
	                'priority' => $this->input->post('priority')
	        );
	        $this->db->where('id', $this->input->post('new'));
	        $this->db->update('category', $data);
	        $data['message']= "Category " . $this->input->post('name') . " Updated successfully";	     
            }
        }
        echo json_encode($data);
    }
    public function deleteCata() {
        $pieces = explode("#", $this->input->post('delID'));
        $this->load->model("Data_model");
        $data['message']= $this->Data_model->deleteCategory($pieces[0]);
        echo json_encode($data);
    }
}
?>