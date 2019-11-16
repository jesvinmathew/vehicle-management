<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dealer extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $webData['tittle'] = "Welcome To KeralaOnRoad";
    }

    public function service() {
        $webData['content'][] = 'service';
        if($this->uri->segment(3)=="bike")
            $this->db->where('type',1);
        else
            $this->db->where('type',2);
        $this->db->order_by("companyname", "ASC");
        $webData['company']=$this->db->get('company')->result();
        $this->db->order_by("placename", "ASC");
        $webData['district']=$this->db->get_where('place',  array('root_id'=>2))->result();
        $this->load->view('templates/welcome', $webData);
    }

}
