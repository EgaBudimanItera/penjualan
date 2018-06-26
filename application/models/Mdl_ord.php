<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_ord extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_ord(){
			$this->db->select('*');
			$this->db->from("tb_order");
			$this->db->join("tb_pelanggan","tb_pelanggan.idpelanggan=tb_order.idpelanggan");
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

}
