<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_spare extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_spare(){
		$this->db->select('*');
		$this->db->from("tb_sparepart");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Ins_spare($insert){
		$this->db->insert("tb_sparepart",$insert);
	}

	function Del_spare($id){
		$this->db->where("idsparepart",$id);
		$this->db->delete('tb_sparepart');
	}

	function Upd_spare($id,$update){
		$this->db->where("idsparepart",$id);
		$this->db->update("tb_sparepart",$update);
	}

	function Next_ID(){

		$res = $this->db->query("SELECT MAX(idsparepart)as idsparepart FROM tb_sparepart")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}

	}

}
