<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hotJson extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function addComment(){
       if(intval($_POST['value1'])&& !empty($_POST['value2']) && $this->session->userdata('keralaonroads')){
            $this->db->insert('hot_comments', array('post_id'=>  $this->input->post('value1'),'user_id'=>$this->session->userdata('keralaonroads'),'comment'=>$this->input->post('value2')));
            echo "Comment added successfully";
        }
        else{
            echo "Please fill the comment";
        }
    }
    public function addChat(){
        if((!empty($_POST['value1'])) && $this->session->userdata('keralaonroads')){
            $this->db->insert('hot_pub_chat', array('user_id'=>$this->session->userdata('keralaonroads'),'chat'=>$this->input->post('value1'),'date'=>date('Y-m-d')));
        }
        else{
            echo "login first";
        }
    }
    public function getLink(){
        if(isset($_POST['link'])){
            $data = $this->db->get_where('hot_post_datas',  array('id'=>$this->input->post('link'),'type'=>2))->result();
            if(isset($data[0])){
                echo $data[0]->datainfo;
            }
        }
    }
    public function searchLink(){
        if(isset($_POST['search'])){
            $this->db->select('datainfo,text,username,hot_post_datas.id');
            $this->db->join('hot_post','hot_post.id=hot_post_datas.post_id');
            $this->db->join('users',  'users.user_id=hot_post.user_id');
            $this->db->like('text',  $this->input->post('search')); 
            $qry=$this->db->get_where('hot_post_datas',  array('hot_post_datas.type'=>2))->result();
            foreach ($qry as $link){
                echo "<li> <b><a  data-bind='$link->id' class='link' onclick='viewVedio($link->id)'>$link->username   - $link->text</a></b></li>";
            }
            $this->db->select('datainfo,text,username,hot_post_datas.id');
            $this->db->join('hot_post','hot_post.id=hot_post_datas.post_id');
            $this->db->join('users',  'users.user_id=hot_post.user_id');
            $this->db->like('username',  $this->input->post('search')); 
            $qry=$this->db->get_where('hot_post_datas',  array('hot_post_datas.type'=>2))->result();
            foreach ($qry as $link){
                echo "<li> <b><a  data-bind='$link->id' class='link' onclick='viewVedio($link->id)'>$link->username   - $link->text</a></b></li>";
            }
        }
    }
}
?>