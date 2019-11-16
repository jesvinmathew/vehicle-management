<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user=($this->session->userdata('keralaonroads_name'))?$this->session->userdata('keralaonroads_name'):"Guest";
            $trafic = Array(
                        'ip' => $this->input->ip_address(),
                        'page' => uri_string(),
                        'username' => $user,
                        'date' => date("Y-m-d")
                    );
            $this->db->insert('traffic',$trafic);
    }
    public function index()
    {
        $webData['tittle'] = "Welcome To KeralaONRoads";
        $webData['style'][] = "index";
        $webData['script'][] = "index";
        $webData['content'][] = 'welcome';
        $this->load->view('templates/welcome', $webData);
    }
    
    public function messages(){
        if (!$this->session->userdata('keralaonroads_admin')) {
            redirect('welcome/login');
        } else {
            $this->db->limit(50);
            $this->db->from('message');
            $this->db->where('type = 1');
            $query = $this->db->get();
            $webData['users']=$query->result();
            $webData['utypes']=$this->commanmodel->selectAll('type_msg');
            $webData['content'][] = "messages";
            $webData['script'][] = "messages";
            $this->load->view('templates/welcome', $webData);
        }
    }
   
    public function getmsg()
    {
        $userType = (int) $this->input->post('value1');
        if ($userType) {
            $this->db->limit(50);
            $this->db->from('message');
            $this->db->order_by("id", "DESC");
            $this->db->where('type = ' . $userType);
            $query = $this->db->get();
            $this->datas->data = $query->result();
            $this->datas->output();
        }
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
