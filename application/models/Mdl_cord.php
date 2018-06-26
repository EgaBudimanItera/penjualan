<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_cord extends CI_Model{
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

}
