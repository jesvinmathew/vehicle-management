<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata("LgicSoft")){
            
        }
        else{
            redirect('Welcome/login');
        }  
    }

    public function index() {
        $webData['content'][] = 'Admin';
        $this->load->view('templates/welcome', $webData);
    }
    
    public function category() {
        $this->load->model('LSModel');
        $this->load->model('Comman_model');
        if (isset($_POST['update']) && isset($_POST['cat_id']) && $_POST['cat_id'] > 0) {
            $fileName = "#";
            $brow= "#";
            if (is_file($_FILES["img"]["tmp_name"])) {
                $config['upload_path'] = './assets/img/products/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = 'briw_' . time();
                $config['max_size'] = '8000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    $image_data = $this->upload->data();
                    $fileName=$image_data['file_name'];
                    $config2 = array(
                        'source_image' => $image_data['full_path'],
                        'new_image' => './assets/img/products/thump',
                        'maintain_ratio' => true,
                        'width' => 150,
                        'height' => 150
                    );
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                }
            }
            if (is_file($_FILES["brow"]["tmp_name"])) {
                $config['upload_path'] = './assets/img/products/uploads/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = 'briw_' . time();
                $config['max_size'] = '8000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('brow')) {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    $bro_data = $this->upload->data();
                    $brow=$bro_data['file_name'];
                }
            }
            if ($_POST['product'] == '-1') {
                $this->Comman_model->insert('products', ['name' => $this->input->post('pro_name'), 'image' => $fileName, 'discription' => $this->input->post('descib'), 'browser' =>$brow, 'cat_id' => $this->input->post('cat_id'), 'price' => $this->input->post('price'), 'status' => $this->input->post('prio_P')]);
                $this->session->set_flashdata(['msg1' => 'Product Added successfully']);
            } else {
            	$data = array();
            	$data['name']=$this->input->post('pro_name');
            	$data['discription']=$this->input->post('descib');
            	$data['price']=$this->input->post('price');
            	$data['latest']=isset($_POST['lp'])?$this->input->post('lp'):0;
            	$data['status']=$this->input->post('prio_P');
            	if ($fileName != "#")
            		$data['image']=$fileName;
            	if ($brow != "#")
            		$data['browser']=$brow;
                $this->db->where('id', $this->input->post('pro_id'));
                $this->db->update('products', $data);
                $this->session->set_flashdata(['msg1' => 'Product updated']);
            } 
        } else if (isset($_POST['delete'])) {
            $this->db->where('name', $this->input->post('pro_name'));
            $this->db->delete('products');
        }
        $webData['cat']=$this->LSModel->selectAll('category');
        $webData['content'][] = 'categoryManage';
        $webData['script'][] = 'categoryManage';
        $this->load->view('templates/welcome', $webData);
    }
    
    public function deleteCata() {
        $pieces = explode("#", $this->input->post('delID'));
        $this->load->model("LSMmodel");
        echo $this->Data_model->deleteCategory($pieces[0]);
    }
}
