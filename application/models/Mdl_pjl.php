<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_pjl extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_pjl(){
		$this->db->select('*');
		$this->db->from("tb_penjualan");
		$this->db->join("tb_sparepart","tb_sparepart.idsparepart=tb_penjualan.idsparepart");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
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

	function Dt_nota($id){
		$this->db->select('*');
		$this->db->from("tb_sparepart");
		$this->db->where("idsparepart",$id);
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Ins_pjl($insert){
		$this->db->insert("tb_penjualan",$insert);
	}

	function Del_pjl($id){
		$this->db->where("idpenjualan",$id);
		$this->db->delete("tb_penjualan");
	}

	function Next_ID(){

		$res = $this->db->query("SELECT MAX(idpenjualan)as idpenjualan FROM tb_penjualan")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}

	}

}
