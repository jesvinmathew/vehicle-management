<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('LSModel');
        $webData['Cat1']=$this->LSModel->getCatagory(['priority' => 1]);
        $webData['pro1']=$this->LSModel->getProduct(['status' => 1]);
        $webData['content'][] = 'welcome';
        $webData['script'][] = 'slider';
        $webData['style'][] = 'index';
        $this->load->view('templates/welcome', $webData);
    }
    
    public function productDetails() {
        $id=$this->uri->segment(3);
        $this->load->model('Comman_model');
        $webData['product']=$this->Comman_model->selectAll('products',['id' => $id]);
        $webData['content'][] = 'productDetails';
        $this->load->view('templates/welcome', $webData);
    }
}
