<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_auth extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function login($username,$password){
		$this->db->select('*');
		$this->db->from("tb_pengguna");
		$this->db->where(array("nmpengguna"=>$username,"password"=>$password));
		$res = $this->db->get()->row_array();
		if(!empty($res)) {
			return $res;
		}else{
			return FALSE;
		}
	}

	function Chk_pass($id,$pwlama){
		$res = $this->db->query("SELECT * FROM tb_pengguna WHERE email='$id' AND password='$pwlama'")->row_array();
		if(!empty($res)) {
			return $res;
		}else{
			return FALSE;
		}
	}

	function Chk_cltpass($id,$pwlama){
		$res = $this->db->query("SELECT * FROM tb_pelanggan WHERE email='$id' AND password='$pwlama'")->row_array();
		if(!empty($res)) {
			return $res;
		}else{
			return FALSE;
		}
	}

	function Upd_pass($id,$pw){
		$arr = array("password"=>$pw);
		$this->db->where("u",$id);
		$this->db->update("tb_pengguna",$arr);
	}

	function Upd_cltpass($id,$pw){
		$arr = array("password"=>$pw);
		$this->db->where("email",$id);
		$this->db->update("tb_pelanggan",$arr);
	}

}
