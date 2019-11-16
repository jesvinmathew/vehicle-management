<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newjson extends CI_Controller {

    public function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-type: application/json; charset=utf8');
        $this->load->helper(array('form', 'url'));
        $this->load->model('datas');
        $this->load->model('CommanModel');
        $this->load->model('validate');
        $this->load->model('users');
    }

    public function getmake() {
        $this->db->select('cmp_id as id,companyname as content');
        $this->db->order_by('companyname', 'ASC');
        $this->db->where('status !=', 0);
        $query = $this->db->get_where('company', array('type' => $this->input->post('value1')));
        $this->datas->data = $query->result();
        $this->datas->output();
    }

    public function getmodel() {
        $this->db->select('model_id as id,model_name as content');
        $this->db->where('status !=', 0);
        $query = $this->db->get_where('model', array('cmp_id' => $this->input->post('value1')));
        $this->datas->data = $query->result();
        $this->datas->output();
    }

    public function getvariant() {
        $this->db->select('varient_id as id,var_name as content');
        $this->db->where('status !=', 0);
        $query = $this->db->get_where('variant', array('model_id' => $this->input->post('value1')));
        $this->datas->data = $query->result();
        $this->datas->output();
    }
   

    public function insucalcu() {
        $query = $this->db->get_where('variant', array('varient_id' => $this->input->post('value1')));
        $regdate = date("Y/m/d", strtotime($this->input->post('value3')));
        $expdate = date("Y/m/d", strtotime($this->input->post('value4')));
        $diff = abs(strtotime($expdate) - strtotime($regdate));
        /* $years = floor($diff / (365 * 60 * 60 * 24));
          $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
          $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
          if ($months > 10)
          $years++; */
        $years = (date('Y') - $this->input->post('value6'));
        foreach ($query->result() as $varient) {
            $cc = $varient->cubicc;
            $sc = $varient->seatingc;
            $this->db->where('startcc <', $cc);
            $this->db->where('endcc >=', $cc);
            $query = $this->db->get_where('tp_rate', array('v_type' => $this->input->post('value2')));
            foreach ($query->result() as $amount) {
                $tp = $amount->amount;
                $this->datas->data->tp = $tp;
                if ($years <= 5)
                    $tarif = $amount->upto5;
                else if ($years <= 10)
                    $tarif = $amount->up5to10;
                else
                    $tarif = $amount->abow10;
                $query = $this->db->get_where('idv_chart', array('variant_id' => $this->input->post('value1')));
                foreach ($query->result() as $idvs) {
                    if (!$years)
                        $idv = $idvs->ageless6mon;
                    elseif ($years == 1) {
                        $idv = $idvs->age1to2;
                    } elseif ($years == 2) {
                        $idv = $idvs->age2to3;
                    } elseif ($years == 3) {
                        $idv = $idvs->age3to4;
                    } elseif ($years == 4) {
                        $idv = $idvs->age4to5;
                    } elseif ($years == 5) {
                        $idv = $idvs->age5to6;
                    } elseif ($years == 6) {
                        $idv = $idvs->age6to7;
                    } elseif ($years == 7) {
                        $idv = $idvs->ag7to8;
                    } elseif ($years == 8) {
                        $idv = $idvs->ag8to9;
                    } elseif ($years == 9) {
                        $idv = $idvs->ag9to10;
                    } elseif ($years == 10) {
                        $idv = $idvs->ag10to11;
                    } elseif ($years == 11) {
                        $idv = $idvs->ag11to12;
                    } else {
                        $idv = $idvs->age12abow;
                    }
                    $normel = $idv * $tarif / 100;
                    $reduction1 = $normel + $normel * 12.36 / 100;
                    $this->datas->data->normel = round($reduction1);
                }
                if (isset($_POST['value5'])) {
                    $query = $this->db->get_where('ncb_rate', array('id' => $years));
                    foreach ($query->result() as $bone) {
                        $bonus = $bone->bonus;
                    }
                    if ((!isset($bonus) ) && $years > 4)
                        $bonus = 50;
                    else if (!isset($bonus))
                        $bonus = 1;
                    $dis = $normel * $bonus / 100;
                    $reduction = ($normel - $dis) + ($normel - $dis) * 12.36 / 100;
                    $this->datas->data->normel = round($reduction);
                }
            }
        }
        $this->datas->output();
    }

    public function getidvvariant() {
        $this->db->select('idv_id,varient_id,ageless6mon,age6to1,age1to2,age2to3,age3to4,age4to5,age5to6,age6to7,ag7to8,ag8to9,ag9to10,ag10to11,ag11to12,age12abow,var_name,cubicc,seatingc');
        $this->db->from('variant');
        $this->db->join('idv_chart', 'varient_id = variant_id', 'left outer');
        $this->db->where(array('variant.model_id' => $this->input->post('value1')));
        $query = $this->db->get();
        $this->datas->data = $query->result();
        $this->datas->output();
    }

    public function viewdealers() {
        if (isset($_POST['placeid'])) {
            $start = isset($_POST['page']) ? ($_POST['page'] - 1) * 5 : 0;
            $vtype = ($_POST['vehicle'] == "car") ? 2 : 1;
            $dis = $this->input->post('placeid');
            if (isset($_POST['condition']) && $this->input->post('condition') == "new") {
                $this->db->select('dealer_id');
                $res = $this->db->get_where('dealer_branch', array('district_id' => $dis));
                $delId = Array();
                foreach ($res->result() As $val)
                    $delId[] = $val->dealer_id;
                $this->db->distinct('c.cmp_id');
                $this->db->select('c.companyname, c.image, c.cmp_id');
                $this->db->join('company c', 'cmp_id=company_id');
                $this->db->order_by('c.companyname', 'ASC');
                $this->db->where_in('id', $delId);
                if (!empty($_POST['vehicle']))
                    $this->db->where('c.type', $vtype);
                $this->db->from('dealer');
                $qry = $this->db->get();
                $this->datas->data = $qry->result();
            }
            else if (isset($_POST['vehicle'])) {
                $this->db->join('dealer_branch', 'dealer_id=id');
                $this->db->order_by('dealer_branch.name', 'ASC');
                $this->db->limit(5, $start);
                $this->db->where(array('company_id' => 0, 'district_id' => $dis, 'dealer.type' => $vtype));
                $this->db->from('dealer');
                $qry = $this->db->get();
                $this->datas->data = $qry->result();
            } else {
                $this->db->limit(5, $start);
                $this->db->join('dealer_branch', 'dealer_id=id');
                $this->db->order_by('dealer_branch.name', 'ASC');
                $this->db->where(array('company_id' => 0, 'district_id' => $dis));
                $this->db->from('dealer');
                $qry = $this->db->get();
                $this->datas->data = $qry->result();
            }
        }
        $this->datas->output();
    }

    public function getPlace() {
        if (isset($_POST['value1'], $_POST['value2'])) {
            $qry = $this->db->get_where('place', array('type' => $this->input->post('value2'), 'root_id' => $this->input->post('value1')));
            $this->datas->data = $qry->result();
            $this->datas->output();
        }
    }

    public function addPlace() {
        if (isset($_POST['value1'], $_POST['value2'], $_POST['value3'])) {
            if ($this->input->post('value3') == -1) {
                $this->db->insert('place', array('placename' => $this->input->post('value1'), 'type' => $this->input->post('value4'), 'root_id' => $this->input->post('value2')));
            } else {
                $this->db->update('place', array('placename' => $this->input->post('value1')), array('place_id' => $this->input->post('value3')));
            }
            echo "success";
        }
    }

    public function service() {
        $this->db->join('dealer', 'dealer.id=dealer_id');
        if (($this->input->post('dist'))) {
            $this->db->where('district_id', $this->input->post('dist'));
        }
        if (($this->input->post('comp'))) {
            $this->db->where('company_id', $this->input->post('comp'));
        }
        $this->db->order_by("dealer_branch.name", "ASC");
        $this->db->where('sar_email !=""');
        if (($this->input->post('uuri') == 'car')) {
            $this->db->where('dealer.type', 8);
        } else {
            $this->db->where('dealer.type', 4);
        }
        $qry = $this->db->get('dealer_branch');
        $this->datas->data = $qry->result();
        $this->datas->output();
    }

    public function get_dealer_dist() {
        if (isset($_POST['dist'])) {
            $delId = Array();
            $this->db->select('id');
            $res = $this->db->get_where('dealer', array('company_id' => $this->input->post('cmpid')));
            foreach ($res->result() As $val)
                $delId[] = $val->id;
            $this->db->where('sale_email !=""');
            $this->db->where_in('dealer_id', $delId);
            $qry = $this->db->get_where('dealer_branch', array('district_id' => $this->input->post('dist')));
            $this->datas->data = $qry->result();
            $this->datas->output();
        }
    }

}
