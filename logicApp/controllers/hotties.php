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
            $data['type']=1;
            if (!trim($_POST['textarea']) == ""){
                $this->db->insert('hot_post', $data);
                $postId = $this->db->insert_id();
                if(!empty($_FILES['img'])){
                    $config['upload_path'] = './assets/hotuploads/post/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = 'hotfile_' .time();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('img')) {
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
                            $this->db->insert('hot_post_datas',  array('user_id'=>$this->session->userdata('keralaonroads'), 'datainfo'=>  $data['upload_data']['file_name'], 'post_id'=>$postId, 'type'=>1));
                        }
                    }
                }
                if(!empty($_POST['link'])){
                    $this->db->insert('hot_post_datas',  array('user_id'=>$this->session->userdata('keralaonroads'), 'post_id'=>$postId, 'datainfo'=> $this->input->post('link'), 'type'=>2));
                }
            }
            redirect('hotties/index');
        }
        $this->db->order_by("id", "desc");
        $this->db->select("text,type,hot_post.user_id,hot_post.id, username");
        $this->db->join('users',  'users.user_id=hot_post.user_id');
        $webData['posts'] = $this->db->get_where('hot_post',  array('type'=>1));
        $webData['tittle'] = "Welcome To Hot Group";
        $webData['style'][] = "index";
        $webData['script'][] = "index";
        $webData['content'][] = 'index';
        $this->load->view('hotTemplates/welcome', $webData);
    }
    public function hotBike() {
        if (isset($_POST['textarea'])) {
            $data['text'] = $_POST['textarea'];
            $data['user_id'] = $this->session->userdata('keralaonroads');
            $data['type']=2;
            if (!trim($_POST['textarea']) == ""){
                $this->db->insert('hot_post', $data);
                $postId = $this->db->insert_id();
                $this->db->update('hot_post_datas', array('post_id'=>$postId), array('user_id' =>$this->session->userdata('keralaonroads'), 'post_id'=>0));
            }
            redirect('hotties/hotBike');
        }
        $this->db->order_by("id", "desc");
        $this->db->select("text,type,hot_post.user_id,hot_post.id, username");
        $this->db->join('users',  'users.user_id=hot_post.user_id');
        $webData['posts'] = $this->db->get_where('hot_post',  array('type'=>2));
        $webData['tittle'] = "Welcome To Hot Group";
        $webData['style'][] = "index";
        $webData['script'][] = "index";
        $webData['content'][] = 'index';
        $this->load->view('hotTemplates/welcome', $webData);
    }
    
    public function events(){
        $webData['tittle'] = "Welcome To Hot Group";
        $webData['tittle'] = $this->load->view('hotTemplates/welcome', $webData);
    }
    public function gallery(){
        $webData['tittle'] = "Welcome To Hot Group";
        $webData['content'][] = 'gallery';
        $webData['script'][] = "imageList";
        $webData['style'][] = "imageList";
        $this->db->order_by('user_id', 'DESC');
        $qry=$this->db->get_where('hot_post_datas',  array('type'=>1));
        $webData['images']=$qry->result();
        $this->load->view('hotTemplates/welcome', $webData);
    }
    public function contact(){
        $webData['tittle'] = "Welcome To Hot Group";
        $this->load->view('hotTemplates/welcome', $webData);
    }
    public function links(){
        $webData['tittle'] = "Welcome To Hot Group";
        $webData['content'][] = 'links';
        $this->db->select('datainfo,text,username,hot_post_datas.id');
        $this->db->join('hot_post','hot_post.id=hot_post_datas.post_id');
        $this->db->join('users',  'users.user_id=hot_post.user_id');
        $qry=$this->db->get_where('hot_post_datas',  array('hot_post_datas.type'=>2));
        $webData['links']=$qry->result();
        $this->load->view('hotTemplates/welcome', $webData);
    }
    public function map(){
        $webData['tittle'] = "Welcome To Hot Group";
        $this->load->view('hotTemplates/welcome', $webData);
    }
    public function imgsSlid(){
    	if(isset($_POST['imgId'])){
    		$imgs=$this->db->get_where("hot_post_datas",array('user_id'=>$this->input->post('imgId'),'type'=>1))->result();
    		echo '<div class="tab-pane" id="colors"><div id="carousel-example-generic1" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
    		$i = 0;
    		foreach ($imgs as $row) {
                                echo '<div class="item';
                                if ($i == 0) {
                                    echo ' active ';
                                }
                                echo '"><img class="image" align="center"  src="';
                                echo HOT_UPLOADS.'post/'. $row->datainfo;
                                echo '" alt=""/><div class="carousel-caption"></div></div>';
                                $i++;
                            }
                            echo ' 
    </div></div><a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a></div>';
    		 		
    	}
    }
}

?>