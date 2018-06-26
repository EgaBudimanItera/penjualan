<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_tek extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_tek(){
		$this->db->select('*');
		$this->db->from("tb_teknisi");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Next_ID(){

		$res = $this->db->query("SELECT MAX(idteknisi)as idteknisi FROM tb_teknisi")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}

	}

	function Ins_tek($insert){
		$this->db->insert("tb_teknisi",$insert);
	}

	function Del_tek($ID){
		$this->db->where("idteknisi",$ID);
		$this->db->delete("tb_teknisi");
	}
	
	function Upd_tek($id,$update){
		$this->db->where('idteknisi',$id);
		$this->db->update('tb_teknisi',$update);
	}
}
