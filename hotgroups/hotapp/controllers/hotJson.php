<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hotJson extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function uploadimg() {
        $this->load->view('load/imupload');
    }
    public function uplodingImg(){        
        $config['upload_path'] = './assets/uploads/post/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = 'hotfile_' .time();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        }
        else{
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
            }
            else{
                $this->db->insert('post_datas',  array('user_id'=>$this->session->userdata('keralaonroads'), 'datainfo'=>  $data['upload_data']['file_name'], 'type'=>1));
                echo($_POST['index']);
            }
        }
    }
    
    public function uploadlink(){
        $this->load->view('load/linkload');
    }
    
    public function uplodingLink(){
        if(!empty($_POST['value1'])){
            $this->db->insert('post_datas',  array('user_id'=>$this->session->userdata('keralaonroads'), 'datainfo'=> $this->input->post('value1'), 'type'=>2));
            echo "Success";
        }
        else{
            echo "No link ";
        }
    }
}
?>