<?php class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    function index()
    {
        $this->load->view('upload_form', array('error' => ' '));
    }
    function do_upload()
    {
        $this->message='';
        if (isset($_POST['upload_id']))
        {
            $webData['value'] = $this->input->post('upload_id');
            $pro = $this->input->post('upload_id') - 1111;
            $this->db->order_by('pro_id', 'DESC');
            $this->db->limit(1);
            $onroad_vehicle_detailsquery = $this->db->get_where('vehicle_details', array('pro_id' =>$pro));
            if ($onroad_vehicle_detailsquery->num_rows() > 0){
                foreach ($onroad_vehicle_detailsquery->result() as $rowonroad_vehicle_details){
                    $vehicleid = $rowonroad_vehicle_details->pro_id;
                }
            } else{
                $this->message = "Invalid attempt";
                $this->error = true;
            }
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['max_width'] = '6000';
            $config['max_height'] = '4000';
            $config['file_name'] = 'keralaOnRoad_' .time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                $webData['tittle'] = "Welcome To KeralaONRoads- Sell Your Car";
                $webData['error'] = $this->upload->display_errors();
                $webData['upload_data'] = '';
                $webData['style'][] = "sell";
                $webData['script'][] = "validation";
                $webData['content'][] = 'sellCar';
                $this->load->view('templates/welcome', $webData);
            } else{
                $data = array('upload_data' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = $data['upload_data']['full_path'];
                $config['new_image'] = $data['upload_data']['file_path'] . "/thumb/";
                $config['create_thumb'] = true;
                $config['width'] = 350;
                $config['height'] = '1';
                $config['maintain_ratio'] = true;
                $config['master_dim'] = 'width';
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize())
                {
                    $this->message = "Sorry Unable to make thumb image ,Please Try again";
                    $this->error = true;
                } else
                {
                    $this->db->insert('vehicle_images', array('pro_id' => $vehicleid, 'image' => $data['upload_data']['file_name']));
                    $this->message = "uploaded successfully";
                    $this->error = false;
                }
            }
             $webData['upload_data'] = $this->upload->data();
        } else
        {
            $this->message = "Session restored";
        }
        $webData['tittle'] = "Welcome To KeralaONRoads- Sell Your Car";
        $webData['error'] = $this->message;
       
        $webData['style'][] = "sell";
        $webData['script'][] = "validation";
        $webData['content'][] = 'sellCar';
        $this->load->view('templates/welcome', $webData);
    }
    function do_upload_new()
    {
        $this->message='';
        if (isset($_POST['upload_id']))
        {
             $webData['value'] = $this->input->post('upload_id');
            $pro = $this->input->post('upload_id') - 1111;
            $this->db->order_by('vehicle_id', 'DESC');
            $this->db->limit(1);
            $onroad_vehicle_detailsquery = $this->db->get_where('new_vehicle', array('vehicle_id' =>
                    $pro));
            if ($onroad_vehicle_detailsquery->num_rows() > 0)
            {
                foreach ($onroad_vehicle_detailsquery->result() as $rowonroad_vehicle_details)
                {
                    $vehicleid = $rowonroad_vehicle_details->vehicle_id;
                }
            } else
            {
                $this->message = "Invalid attempt";
                $this->error = true;
            }
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['max_width'] = '6000';
            $config['max_height'] = '4000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                $webData['tittle'] = "Welcome To KeralaONRoads- Sell Your Car";
                $webData['error'] = $this->upload->display_errors();
                $webData['upload_data'] = '';
                $webData['style'][] = "sell";
                $webData['script'][] = "validation";
                $webData['content'][] = 'sellnew';
                $this->load->view('templates/welcome', $webData);
            } else
            {
                $data = array('upload_data' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = $data['upload_data']['full_path'];
                $config['new_image'] = $data['upload_data']['file_path'] . "/thumb/";
                $config['create_thumb'] = true;
                $config['width'] = 350;
                $config['height'] = '1';
                $config['maintain_ratio'] = true;
                $config['master_dim'] = 'width';
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize())
                {
                    $this->message = "Sorry Unable to make thumb image ,Please Try again";
                    $this->error = true;
                } else
                {
                    $this->db->insert('vehicle_new_images', array('pro_id' => $vehicleid, 'image' => $data['upload_data']['file_name']));
                    $this->message = "uploaded successfully";
                    $this->error = false;
                }
            }
             $webData['upload_data'] = $this->upload->data();
        } else
        {
            $this->message = "Session restored";
        }
        $webData['tittle'] = "Welcome To KeralaONRoads- Sell Your Car";
        $webData['error'] = $this->message;
       
        $webData['style'][] = "sell";
        $webData['script'][] = "validation";
        $webData['content'][] = 'sellnew';
        $this->load->view('templates/welcome', $webData);
    }
    function success()
    {
    }
    public function multyUpload() {
        $upload_dir = './assets/uploads/';
        $allowed_ext = array('jpg','jpeg','png','gif');
        print_r($_FILES);
        if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
            echo json_encode(array('Error! Wrong HTTP method!'));
            exit;
        }
        if (array_key_exists('userfile', $_FILES) && $_FILES['userfile']['error'] == 0) {
        	
            $pic = $_FILES['userfile'];
            $ext = explode('.', $pic['name']);
            $ext = array_pop($ext);
            $ext = strtolower($ext);
            $picName1="keralaon_".time();
            $picName=$picName1.".".$ext;
            if (!in_array($ext, $allowed_ext)) {
            	echo json_encode(array('status'=>'Only '.implode(',',$allowed_ext).' files are allowed!'));
                exit;
            }
            if(move_uploaded_file($pic['tmp_name'], $upload_dir.$picName)){
            	$config['image_library'] = 'gd2';
                $config['source_image'] = $upload_dir.$picName;
                $config['new_image'] = $upload_dir."/thumb/";
                $config['create_thumb'] = true;
                $config['width'] = 350;
                $config['height'] = '1';
                $config['maintain_ratio'] = true;
                $config['master_dim'] = 'width';
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize()) {
                    echo json_encode(array('status'=>'Image Probilam'));
                    exit;
                } else {
                    $this->db->insert('vehicle_images', array('pro_id' => (int) $this->uri->segment(3), 'image' => $picName));
                    echo json_encode(array('status'=>'File was uploaded successfuly!'));
                    exit;
                }
	    }
        }
        $this->datas->status = 'Something went wrong with your upload!';
        $this->datas->output();
        exit;
    }
}
?>