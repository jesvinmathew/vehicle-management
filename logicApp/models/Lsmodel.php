<?php

class LSModel extends CI_Model {

    function __construct() {

        $this->load->database();
        parent::__construct();
    }

    function login($usName, $usPass) {
        $log = $this->db->get_where('login', ['user_name' => $usName, 'password' => md5($usPass)])->result();
        if (isset($log[0]->user_name) && $log[0]->user_name == $this->input->post('email')) {
            $this->session->set_userdata("LgicSoft", $log[0]->id);
            $this->session->set_userdata("LSName", $log[0]->user_name);
            $this->session->set_flashdata(['msg1' => 'Welcome ' . $log[0]->name]);
            return (1);
        }
        $this->session->set_flashdata(['error' => 'Please check user name or password']);
        return (0);        
    }
    
    public function insert($tname, $data) {
        $this->db->insert($tname, $data);
        return $this->db->insert_id();
    }

    public function selectAll($table, $id = '') {
        if ($id) {
            $this->db->where($id);
        }
        return $this->db->get($table)->result();
    }

    public function selectSpecific($table, $fields, $id = '') {
        $this->db->select($fields);
        if ($id) {
            $this->db->where($id);
        }
        return $this->db->get($table)->result();
    }
    
    public function update($table, $id, $data) {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function deleteCategory($id) {
    	$msg="No action Performed";
        if ($this->session->userdata('LgicSmatrx')) {
            $msg="";
            $products = $this->db->get_where('products', ['cat_id' => $id])->result();
            foreach ($products as $product) {
                if ($product->image != "") {
                    unlink("assets/img/products/thump/$product->image");
                    unlink("assets/img/products/$product->image");
                    $msg.= "Images Deleted - ";
                }
                $this->db->where('id', $product->id);
                $this->db->delete('products');
                $msg.= " $product->name Product Deleted - ";
            }
            $this->db->where('id', $id);
            $this->db->delete('category');
            $msg.="Category Deleted ";
        }
        return $msg;
    }
    
    public function getCatagory($id='') {
        if ($id) {
            $this->db->where($id);
        }
        return $this->db->get('category')->result();
    }
    public function getProduct($id='') {
        if ($id) {
            $this->db->where($id);
        }
        return $this->db->get('products')->result();
    }
    
}

?>
