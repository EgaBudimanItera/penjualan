<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_pel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_pel(){
		$this->db->select('*');
		$this->db->from("tb_pelanggan");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Ins_pel($insert){
		$this->db->insert("tb_pelanggan",$insert);
	}

	function Upd_pel($id,$update){
		$this->db->where("idpelanggan",$id);
		$this->db->update("tb_pelanggan",$update);
	}

	function Next_ID(){

		$res = $this->db->query("SELECT MAX(idpelanggan)as idpelanggan FROM tb_pelanggan")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}

	}

	function Del_pel($ID){
		$this->db->where("idpelanggan",$ID);
		$this->db->delete("tb_pelanggan");
	}

}
