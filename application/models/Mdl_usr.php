<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_usr extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_usr(){
		$res = $this->db->query("SELECT * FROM tb_pengguna")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Ins_usr($insert){
		$this->db->insert("tb_pengguna",$insert);
	}

	function Next_ID(){

		$res = $this->db->query("SELECT MAX(idpengguna)as idpengguna FROM tb_pengguna")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}

	}

	function Upd_usr($id,$update){
		$this->db->where("idpengguna",$id);
		$this->db->update("tb_pengguna",$update);
	}

	function Del_usr($ID){
		$this->db->where("idpengguna",$ID);
		$this->db->delete("tb_pengguna");
	}
}
