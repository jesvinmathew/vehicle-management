<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('LSModel');
        $webData['Cat1']=$this->LSModel->getCatagory(['priority' => 1]);
        $webData['pro1']=$this->LSModel->getProduct(['status' => 1]);
        $webData['content'][] = 'welcome';
        $webData['script'][] = 'slider';
        $webData['script'][] = 'bxslider';
        $webData['style'][] = 'index';
        $this->load->view('templates/welcome', $webData);
    }
    
    public function test() {
        $this->load->model('LSModel');
        $webData['content'][] = 'test';
        $webData['script'][] = 'bxslider';
        $webData['style'][] = 'test';
        $this->load->view('templates/welcome', $webData);
    }
    
    public function login() {
        if(isset($_POST['email'], $_POST['password'])){
            $this->load->model('LSModel');
            $this->LSModel->login($this->input->post('email'),$this->input->post('password'));
        }
        if ($this->session->userdata("LgicSoft")){
            redirect('Admin');
        }    
        $webData['content'][] = 'login';
        $this->load->view('templates/welcome', $webData);
    }
}
