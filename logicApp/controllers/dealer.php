<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dealer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = ($this->session->userdata('keralaonroads_name')) ? $this->session->userdata('keralaonroads_name') : "Guest";
        $trafic = Array(
            'ip' => $this->input->ip_address(),
            'page' => uri_string(),
            'username' => $user,
            'date' => date("Y-m-d")
        );
        $this->db->insert('traffic', $trafic);
    }

    public function index() {
        $this->message = '';
        $this->error = '';
        $this->db->order_by("placename", "ASC");
        $query = $this->db->get_where('place', array('type' => 3, 'root_id' => 2));
        $webData['place'] = $query->result();
        $placeid = ((int) $this->uri->segment(5)) ? $this->uri->segment(5) : $webData['place'][1]->place_id;
        if ($this->uri->segment(3) == "new") {
            $vtype = ($this->uri->segment(4) == "car") ? 2 : 1;
            $this->db->select('dealer_id');
            $res = $this->db->get_where('dealer_branch', array('district_id' => $placeid));
            $delId = Array();
            foreach ($res->result() As $val)
                $delId[] = $val->dealer_id;
            $this->db->distinct('c.cmp_id');
            $this->db->select('c.companyname, c.image, c.cmp_id');
            $this->db->join('company c', 'cmp_id=company_id');
            $this->db->order_by('c.companyname', 'ASC');
            $this->db->where_in('id', $delId);
            $this->db->where('c.type', $vtype);
            $this->db->from('dealer');
            $qry = $this->db->get();
            $webData['brands'] = $qry->result();
        } else {
            $this->db->select('branch_id,ph1,address,dealer_branch.name');
            $this->db->order_by('dealer_branch.name', 'ASC');
            $this->db->from('dealer_branch');
            $this->db->where('district_id', $placeid);
            $this->db->limit(5);
            $this->db->join('dealer', 'dealer_id=id');
            if ($this->uri->segment(4) == "car")
                $this->db->where('dealer.type', 2);
            else
                $this->db->where('dealer.type', 1);
            $query = $this->db->get();
            $webData['delers'] = $query->result();
        }
        $webData['upload_data'] = '';
        $webData['tittle'] = "Welcome To KeralaOnRoad- Dealers";
        $webData['value'] = '';
        $webData['style'][] = "dealers";
        $webData['script'][] = "dealers";
        $webData['content'][] = 'dealers';
        $this->load->view('templates/welcome', $webData);
    }

    public function service() {
        $webData['content'][] = 'service';
        if ($this->uri->segment(3) == "bike")
            $this->db->where('type', 1);
        else
            $this->db->where('type', 2);
        $this->db->order_by("companyname", "ASC");
        $webData['company'] = $this->db->get('company')->result();
        $webData['uri'] = $this->uri->segment(3);
        $this->db->order_by("placename", "ASC");
        $webData['district'] = $this->db->get_where('place', array('root_id' => 2))->result();
        $this->load->view('templates/welcome', $webData);
    }

    public function del_deal_branch() {
        if (isset($_POST['branchId'])) {
            $this->db->delete('dealer_branch', array('branch_id' => $this->input->post('branchId')));
            echo "deleted";
        }
    }
    
    public function dealerPage() {
        $banchqry = $this->db->get_where('dealer_branch', array('branch_id' => $this->uri->segment(3)));
        $webData['tittle'] = "Welcome To KeralaOnRoads- Brands";
        if ((int) $this->uri->segment(3)) {
            $webData['content'][] = 'dealerPage';
            $brancid = (int) $this->uri->segment(3);
            $brngQr = $this->db->get_where('dealer_branch', array('branch_id' => $brancid));
            $webData['branch'] = $brngQr->result();
            $dealer_id = $brngQr->result()[0]->dealer_id;
            $delQr = $this->db->get_where('dealer', array('id' => $dealer_id));
            $webData['comp_id'] = $delQr->result();
            $cid = $delQr->result()[0]->company_id;
            $userId = $delQr->result()[0]->usid;
            if ($cid) {
                $webData['brands'] = $this->commanmodel->selectAll('company', array('cmp_id' => $cid));
                $this->db->from('model');
                $this->db->select('model_image,model.status,model.model_id,model_name,brochure,about_model');
                $this->db->order_by("model.status", "desc");
                $this->db->join('model_images', 'model_images.model_id=model.model_id', 'left');
                $this->db->distinct('model.model_id');
                $this->db->group_by('model.model_id');
                $this->db->where_in('model.status', array(1, 2));
                $this->db->where('cmp_id =' . $cid);
                $query = $this->db->get();
                $webData['models'] = $query->result();
                $this->db->select('place.placename, branch_id, name, address, ph1, ph2, sale_ph, sar_ph, sale_email, sar_email');
                $this->db->join('place','place.place_id=dealer_branch.town_id');
                $this->db->where('branch_id !=', $this->uri->segment(3));
                $queryBranch = $this->db->get_where('dealer_branch',['district_id'=>$webData['branch'][0]->district_id,'dealer_id'=>$webData['branch'][0]->dealer_id]);
                if($queryBranch->row()){
                    $webData['otherBranches']=$queryBranch->result();
                }                
            } elseif ($userId !== 0 || $banchqry->result()[0]->usid !== 0) {
                if (!$this->session->userdata('keralaonroads')) {
                    redirect('welcome/login?url=' . uri_string());
                } else {
                    if ($userId) {
                        $this->db->from('vehicle_details vd');
                        $this->db->select('image,vd.model_id, vd.varient_id, title_name,vd.discription,vd.pro_id');
                        $this->db->order_by("vd.pro_id", "desc");
                        $this->db->join('vehicle_images vi', 'vi.pro_id=vd.pro_id', 'left');
                        $this->db->distinct('vd.pro_id');
                        $this->db->group_by('vd.pro_id');
                        $this->db->where_in('vd.status', array(1, 2));
                        $this->db->where(array('vd.status' => 1, 'vd.user_id' => $userId));
                        $query = $this->db->get();
                        $webData['userVehi'] = $query->result();
                    }
                    if ($banchqry->result()[0]->usid) {
                        $this->db->from('vehicle_details vd');
                        $this->db->select('image,vd.model_id, vd.varient_id, title_name,vd.discription,vd.pro_id');
                        $this->db->order_by("vd.pro_id", "desc");
                        $this->db->join('vehicle_images vi', 'vi.pro_id=vd.pro_id', 'left');
                        $this->db->distinct('vd.pro_id');
                        $this->db->group_by('vd.pro_id');
                        $this->db->where_in('vd.status', array(1));
                        $this->db->where(array('vd.status' => 1, 'vd.user_id' => $banchqry->result()[0]->usid));
                        $query = $this->db->get();
                        $webData['userVehiDel'] = $query->result();
                    }
                }
            } else {
                if (!$this->session->userdata('keralaonroads')) {
                    redirect('welcome/login?url=' . uri_string());
                }
            }
        } else {
            $webData['brands'] = $this->commanmodel->selectAll('company');
            $webData['content'][] = 'dealerPage';
        }
        $this->load->view('templates/welcome', $webData);
    }
    
    public function getnewDel() {
        $this->db->select('branch_id, dealer.name, address, dealer_branch.email, dealer_branch.ph1, dealer_branch.ph2');
        $this->db->join('dealer_branch', 'dealer_id=id');
        $this->db->where('sale_email !=', '');
        $qry = $this->db->get_where('dealer',array('company_id' => $this->uri->segment(3), 'district_id' => $this->uri->segment(4),'dealer_branch.status' => 1));
        echo "<div class='col-xs-50 tittle'>Select a Dealer<br/> </div>";
        foreach ($qry->result() as $val) {
            echo "<a href='#'><div onclick='dealerpageLoad($val->branch_id)' class='col-xs-50 dotBorderBox'><div class=' col-xs-50 col-xs-offset-1'><b><br />$val->name </b><div>" . nl2br($val->address) . "</div><ul><li><i class='glyphicon glyphicon-envelope'>&nbsp;</i>$val->email</li><li><i class='glyphicon glyphicon-phone-alt'>&nbsp;</i>$val->ph1</li><li class='glyphicon glyphicon-phone-alt'> $val->ph2</li></ul></div></div></a>";
        }
    }
}
