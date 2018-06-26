<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_ser extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Dt_ser(){
		$this->db->select('*');
		$this->db->from("tb_service");
		$this->db->join("tb_teknisi","tb_teknisi.idteknisi=tb_service.idteknisi");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_detser($id){
		$this->db->select('*');
		$this->db->from("tb_detservice");
		$this->db->join("tb_sparepart","tb_sparepart.idsparepart=tb_detservice.idsparepart");
		$this->db->where("idservice",$id);
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

		$res = $this->db->query("SELECT MAX(idservice)as idservice FROM tb_service")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}

	}

	function Dt_ord(){
		$this->db->select('*');
		$this->db->from("tb_order");
		$this->db->join("tb_pelanggan","tb_pelanggan.idpelanggan=tb_order.idpelanggan");
		$this->db->where("tb_order.statusorder","ORDER");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
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

	function Ctk_ser($id){		
		$this->db->select('*');
		$this->db->from("tb_service");
		$this->db->join("tb_teknisi","tb_teknisi.idteknisi=tb_service.idteknisi");
		$this->db->join("tb_order","tb_order.idorder=tb_service.idorder");
		$this->db->join("tb_pelanggan","tb_pelanggan.idpelanggan=tb_order.idpelanggan");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Ctk_detser($id){		
		$this->db->select('*');
		$this->db->from("tb_detservice");
		$this->db->join("tb_sparepart","tb_sparepart.idsparepart=tb_detservice.idsparepart");
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Ctk_sumdetser($id){
		$res = $this->db->query("SELECT SUM(harga)as harga FROM tb_detservice WHERE idservice='$id'")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Ins_ser($insert){
		$this->db->insert("tb_service",$insert);
	}

	function Ins_detser($insert){
		$this->db->insert("tb_detservice",$insert);
	}

	function Del_ser($id){
		$this->db->where("idservice",$id);
		$this->db->delete("tb_service");

		$this->db->where("idservice",$id);
		$this->db->delete("tb_detservice");
	}

	function Del_detser($id){
		$this->db->where("iddetailservice",$id);
		$this->db->delete("tb_detservice");
	}

	function Upd_ord($id,$st){
		$this->db->where("idorder",$id);
		$this->db->update("tb_order",array("statusorder"=>$st));
	}

	function Upd_ketker($id,$st){
		$this->db->where("idorder",$id);
		$this->db->update("tb_order",$st);
	}
}
