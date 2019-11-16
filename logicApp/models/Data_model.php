<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_model extends CI_Model {

    public function deleteCategory($id) {
    	$msg="No action Performed";
        if ($this->session->userdata('LgicSoft')) {
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
    
    public function passwordChange(){
    	$data=$this->db->get_where('users',['id'=>$this->session->userdata('LgicSmatrx'), 'password'=>md5($this->input->post('curPass'))])->result();
    	if($data[0]->id==$this->session->userdata('LgicSmatrx')){
    		$this->db->where('id', $this->session->userdata('LgicSmatrx'));
		$this->db->update('users', ['password'=>md5($this->input->post('newPassword'))]);
		$this->session->set_flashdata(['msg1' => 'Password Changed']);
    	}
    }
    
    public function getClients(){
    	return $this->db->get('clients')->result();
    }

    public function deleteClients($id){
    	$msg="";
    	$file=$this->db->get_where('clients',['i_d'=>$id])->result();
    	if((!empty($file[0]->logo))&& $file[0]->logo!="#"){
    		unlink("assets/img/clients/thump/".$file[0]->logo);
                unlink("assets/img/clients/".$file[0]->logo);
                $msg.= "Images Deleted - ";
    	}
    	$this->db->where('i_d', $id);
        $this->db->delete('clients');
        $msg.="Category Deleted ";
        echo $msg;
    }
}
?>