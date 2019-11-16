<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class commanmodel extends CI_Model{
	public function insert($tname,$data){
		$this->db->insert($tname, $data); 
		return $this->db->insert_id();
	}
	public function selectAll($table,$id=''){
		if($id){
			$this->db->where($id);
		}
		return $this->db->get($table)->result();
	}
	public function update($table,$id,$data){
		$this->db->where('i_d', $id);
		$this->db->update($table, $data);
	}
}
?>