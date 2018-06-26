<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_rep extends CI_Model{
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

	function Dt_pdtk(){
		$res = $this->db->query("SELECT *,SUM(biaya * 40/100)AS pendapatan FROM tb_service
			JOIN tb_teknisi ON(tb_teknisi.idteknisi=tb_service.idteknisi)
			GROUP BY tb_service.idteknisi")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_gpjl(){
		$res = $this->db->query("SELECT COUNT(*) AS total,MONTH(tglpenjualan) AS bln FROM tb_penjualan GROUP BY MONTH(tglpenjualan)")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_gsrcpjl($a){
		$res = $this->db->query("SELECT COUNT(*) AS total,MONTH(tglpenjualan) AS bln FROM tb_penjualan WHERE YEAR(tglpenjualan) = '$a' GROUP BY MONTH(tglpenjualan)")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_thnpjl(){
		$res = $this->db->query("SELECT YEAR(tglpenjualan)as tahun FROM tb_penjualan GROUP BY tahun")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_gser(){
		$res = $this->db->query("SELECT COUNT(*) AS total,MONTH(tglmulaiservice) AS bulan FROM tb_service GROUP BY MONTH(tglmulaiservice)")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_gsrcser($a){
		$res = $this->db->query("SELECT COUNT(*) AS total,MONTH(tglmulaiservice) AS bulan FROM tb_service WHERE YEAR(tglmulaiservice) = '$a' GROUP BY MONTH(tglmulaiservice)")->result();
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
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
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

	function Dt_srcord($a,$b){
		$this->db->select('*');
		$this->db->from("tb_order");
		$this->db->join("tb_pelanggan","tb_pelanggan.idpelanggan=tb_order.idpelanggan");
		$this->db->where(array("tb_order.tglorder>="=>$a,"tb_order.tglorder<="=>$b));
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_srcser($a,$b){
		$this->db->select('*');
		$this->db->from("tb_service");
		$this->db->join("tb_teknisi","tb_teknisi.idteknisi=tb_service.idteknisi");
		$this->db->where(array("tb_service.tglmulaiservice>="=>$a,"tb_service.tglmulaiservice<="=>$b));
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_srcpdtk($a,$b){
		$res = $this->db->query("SELECT *,SUM(biaya * 40/100)AS pendapatan FROM tb_service
			JOIN tb_teknisi ON(tb_teknisi.idteknisi=tb_service.idteknisi)
			WHERE tb_service.tglmulaiservice>='$a' AND tb_service.tglmulaiservice<='$b'
			GROUP BY tb_service.idteknisi")->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

	function Dt_srcpjl($a,$b){
		$this->db->select('*');
		$this->db->from("tb_penjualan");
		$this->db->join("tb_sparepart","tb_sparepart.idsparepart=tb_penjualan.idsparepart");
		$this->db->where(array("tb_penjualan.tglpenjualan>="=>$a,"tb_penjualan.tglpenjualan<="=>$b));
		$res = $this->db->get()->result();
		if(!empty($res)) {
			foreach($res as $data){
				$result[] = $data;
			} return $result;
		}else{
			return FALSE;
		}
	}

}
