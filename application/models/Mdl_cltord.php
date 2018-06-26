<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_cltord extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_ord($id){
			$this->db->select('*');
			$this->db->from("tb_order");
			$this->db->where("idpelanggan",$id);
      $query = $this->db->get()->result();
      return $query;
  	}

  	function Dt_srt($id){
			$this->db->select('*');
			$this->db->from("tb_order");
			$this->db->join("tb_pelanggan","tb_pelanggan.idpelanggan=tb_order.idpelanggan");
			$this->db->where("tb_order.idorder",$id);
      $query = $this->db->get()->result();
      return $query;
  	}

	function Upd_ord($id){
		$this->db->where("idorder",$id);
		$this->db->update("tb_order",array("statusorder"=>"PROSES"));
	}

	function Next_ID(){

		$res = $this->db->query("SELECT MAX(idorder)as idorder FROM tb_order")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}

	}

	function Ins_ord($ins){
		$this->db->insert("tb_order",$ins);
	}
}
