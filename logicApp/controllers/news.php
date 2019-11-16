<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('commanmodel'), '', true);
        $this->load->helper(array('form', 'url'));
        $user=($this->session->userdata('keralaonroads_name'))?$this->session->userdata('keralaonroads_name'):"Guest";
            $trafic = Array(
                        'ip' => $this->input->ip_address(),
                        'page' => uri_string(),
                        'username' => $user,
                        'date' => date("Y-m-d")
                    );
            $this->db->insert('traffic',$trafic);
    }

    public function index() {
        $webData['tittle'] = "KeralaOnRoad : News";
        $webData['content'][] = 'news';
        $webData['script'][] = "news";
        if($this->uri->segment(3)=="read")
            $this->db->order_by("read", "DESC");
        if($this->uri->segment(3)=="like")
            $this->db->order_by("like", "DESC");
        $this->db->order_by("id", "DESC");
        $this->db->limit(4);
        $qry=$this->db->get('newses');
        $webData['newses']=$qry->result();
        $this->db->select('id');
        $qry=$this->db->get('newses');
        $webData['count']=$qry->num_rows();
        $this->load->view('templates/welcome', $webData);
    }

    public function editnews() {
        if ($this->session->userdata('keralaonroads_admin')) {
            $webData['tittle'] = "KeralaOnRoad : EditNews";
            $webData['content'][] = 'editnews';
            echo $_GET['eid'];
            $query = $this->db->get_where('newses', array('id' => $_GET['eid']));
            $webData['enews'] = $query->result();
            $query = $this->db->get_where('news_image', array('news_id' => $_GET['eid']));
            $webData['eimage'] = $query->result();
            if (isset($_POST['ehead']) && isset($_POST['enews'])) {
                echo 'kljadjbv';
                $this->db->where('id', $_GET['eid']);
                $this->db->update('newses', array('head' => $this->input->post('ehead'), 'news' => $this->input->post('enews')));
            }
            $this->load->view('templates/welcome', $webData);
        }
    }

    public function manage() {
        if ($this->session->userdata('keralaonroads_admin')) {
            $webData['tittle'] = "News Management";
            $webData['content'][] = 'newsmanage';
            if (isset($_POST['head']) && isset($_POST['news'])) {
                $this->db->insert('newses', array('head' => $this->input->post('head'), 'news' => $this->input->post('news')));
                if ($this->db->affected_rows() > 0) {
                    $nesId = $this->db->insert_id();
                    if (isset($_FILES)) {
                        $config['upload_path'] = './assets/uploads/news/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '8048';
                        foreach ($_FILES['userfile']['name'] as $key => $image) {
                            $_FILES['newimg']['name'] = $_FILES['userfile']['name'][$key];
                            $_FILES['newimg']['type'] = $_FILES['userfile']['type'][$key];
                            $_FILES['newimg']['tmp_name'] = $_FILES['userfile']['tmp_name'][$key];
                            $_FILES['newimg']['error'] = $_FILES['userfile']['error'][$key];
                            $_FILES['newimg']['size'] = $_FILES['userfile']['size'][$key];
                            $config['file_name'] = 'keralaOnRoad_' . $nesId . $key;
                            $this->load->library('upload', $config);
                            if (!$this->upload->do_upload('newimg')) {
                                $error = array('error' => $this->upload->display_errors());
                                echo $this->upload->display_errors();
                            } else {
                                $data = array('upload_data' => $this->upload->data());
                                $this->db->set('news_id', $nesId);
                                $this->db->set('name', $data['upload_data']['file_name']);
                                $this->db->insert('news_image');
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
                            }
                        }
                    }
                } else {
                    
                }

                redirect('news/manage/newsmanage');
            }
            $query = $this->db->get('newses');
            $webData['news'] = $query->result();
            if (isset($_GET['dimg'])) {
                echo'<script> alert("do you want to delete ?");</script>';
                $this->db->where('id', $_GET['dimg']);
                $this->db->delete('newses');
                $this->db->where('news_id', $_GET['dimg']);
                $this->db->delete('news_image');
                $query = $this->db->get_where('news_image', array('news_id' => $_GET['dimg']));
            }
        
            $webData['tittle'] = "KeralaOnRoad : News";
            $webData['content'][] = 'news';
        
        
        $this->load->view('templates/welcome', $webData);
    }else
    {
    redirect('welcome/login');}
    }
    public function details(){
        if((int)$this->uri->segment(3)){
            $webData['tittle'] = "KeralaOnRoad : News";
            $webData['content'][] = 'newsDetails';
            $qry=$this->db->get_where('newses',  array('id'=>$this->uri->segment(3)));
            $webData['newses']=$qry->result();                       
            $this->db->update('newses', array('read'=>($qry->result()[0]->read+1)),array('id'=>$this->uri->segment(3)));
            $qry=$this->db->get_where('news_image',  array('news_id'=>$this->uri->segment(3)));
            $webData['newsimgs']=$qry->result();
            $this->load->view('templates/welcome', $webData);
        }
    }
    public function likes(){
        if($this->session->userdata('keralaonroads')){
            if(isset($_POST['newsId'])){
                $qry=$this->db->get_where('newses',  array('id'=>$this->input->post('newsId')));
                $news=$qry->result();
                $qry=$this->db->get_where('newse_likes', array('news_id'=>$this->input->post('newsId'),'user_id'=>$this->session->userdata('keralaonroads')));
                if($qry->result()){
                    $this->db->where('like_id', $qry->result()[0]->like_id);
                    $this->db->delete('newse_likes');
                    $this->db->update('newses',  array('like'=>($news->like-1)),array('id'=>$this->input->post('newsId')));
                    echo "Successfully Unlike";
                }
                else{
                    $this->db->insert('newse_likes',  array('news_id'=>$this->input->post('newsId'),'user_id'=>$this->session->userdata('keralaonroads'),'value'=>1));
                    $this->db->update('newses',  array('like'=>($news->like+1)),array('id'=>$this->input->post('newsId')));
                    echo "Successfully Like";
                }
            }
            else{
                echo "No news ";
            }
        }
        else{
            echo "Please login for Like operation";
        }
    }
    public function jindex(){
        $page=($_POST['page'])?$_POST['page']-1:0;
        $page*=4;
        if($this->uri->segment(3)=="read")
            $this->db->order_by("read", "DESC");
        if($this->uri->segment(3)=="like")
            $this->db->order_by("like", "DESC");
        $this->db->order_by("id", "DESC");
        $this->db->limit(4 , $page);
        $qry=$this->db->get('newses');
        foreach($qry->result() as $news){
                ?>
        <div class="col-xs-24" style="border: solid 1px; margin: 10px 5px 10px 5px; height: 450px;">
            <p style="height: 45px; overflow: hidden; background: #ccc; text-align: center; font-size: larger; padding: 20px 1px 20px 1px;"><?="<b>$news->head<b>"?></p>
            <div class="col-xs-48 col-xs-offset-1" style="height: 342px; overflow: hidden;">
                
                <?PHP
                    $qry=$this->db->get_where('news_image',  array('news_id'=>$news->id));
                    if(!empty($qry->result()[0])){
                        ?>
                <img class="col-xs-48 col-xs-offset-1" src="<?=UPLOAD_PATH."news/".$qry->result()[0]->name?>" />
                <?PHP
                    }
                ?>
                <p>
                    <?=$news->news;?>
                </p>
            </div>
            <div class="col-xs-48 col-xs-offset-1" style="text-align: center;">
                <label style="background: #ccc;" class="col-xs-14 col-xs-offset-1">
                    <a href="#" class="like" data-link="<?=$news->id?>">Like </a> 
                    <?PHP
                        $this->db->select_sum('value');
                        $qry=$this->db->get_where('newse_likes', array('news_id'=>$news->id));
                        echo ($qry->result()[0]->value)?$qry->result()[0]->value:0;
                    ?>
                </label>
                <label style="background: #ccc;" class="col-xs-14 col-xs-offset-3"><a href="<?=site_url('news/details/'.$news->id);?> ">View More</a></label>
                <label style="background: #ccc;" class="col-xs-14 col-xs-offset-3">Read <?= $news->read; ?></label>
            </div>
        </div>
        <?PHP
            }
    }
    
    public function newsgallery() {
        
        $webData['script'][] = "imageList";
        $webData['style'][] = "imageList";
        $webData['content'][] = 'newsgallery';
        $this->db->order_by('news_id', 'DESC');       
        $query=$this->db->get('news_image');
        $webData['name']=$query->result();        
        $this->load->view('templates/welcome', $webData);
    }
    
    public function newsImgs(){
    	if(isset($_POST['imgId'])){
    		$imgs=$this->db->get_where("news_image",array('news_id'=>$this->input->post('imgId')))->result();
    		echo '<div class="tab-pane" id="colors"><div id="carousel-example-generic1" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
    		$i = 0;
    		foreach ($imgs as $row) {
                                echo '<div class="item';
                                if ($i == 0) {
                                    echo ' active ';
                                }
                                echo '"><img class="image" align="center"  src="';
                                echo UPLOAD_PATH . 'news/' . $row->name;
                                echo '" alt=""/><div class="carousel-caption">
      </div></div> ';
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