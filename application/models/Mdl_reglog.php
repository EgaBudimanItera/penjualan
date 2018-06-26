<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_reglog extends CI_Model{
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

	function login($u,$p){
		$this->db->select('*');
		$this->db->from("tb_pelanggan");
		$this->db->where(array("email"=>$u,"password"=>$p));
		$res = $this->db->get()->row_array();
		if(!empty($res)) {
			return $res;
		}else{
			return FALSE;
		}
	}

}
