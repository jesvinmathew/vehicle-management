<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hotties extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (isset($_POST['textarea'])) {
            $data['text'] = $_POST['textarea'];
            $data['user_id'] = $this->session->userdata('keralaonroads');
            if (!trim($_POST['textarea']) == ""){
                $this->db->insert('post', $data);
                $postId = $this->db->insert_id();
                $this->db->update('post_datas', array('post_id'=>$postId), array('user_id' =>$this->session->userdata('keralaonroads'), 'post_id'=>0));
            }
            redirect('hotties/index', 'refresh');
        }
        $this->db->order_by("id", "desc");
        $webData['posts'] = $this->db->get('post');
        $webData['tittle'] = "Welcome To Hot Group";
        $webData['style'][] = "index";
        $webData['content'][] = 'index';
        $this->load->view('templates/welcome', $webData);
    }
    public function events(){
        $webData['tittle'] = "Welcome To Hot Group";
        $this->load->view('templates/welcome', $webData);
    }
    public function gallery(){
        $webData['tittle'] = "Welcome To Hot Group";
        $this->load->view('templates/welcome', $webData);
    }
    public function contact(){
        $webData['tittle'] = "Welcome To Hot Group";
        $this->load->view('templates/welcome', $webData);
    }
    public function links(){
        $webData['tittle'] = "Welcome To Hot Group";
        $this->load->view('templates/welcome', $webData);
    }
    public function map(){
        $webData['tittle'] = "Welcome To Hot Group";
        $this->load->view('templates/welcome', $webData);
    }
}

?>