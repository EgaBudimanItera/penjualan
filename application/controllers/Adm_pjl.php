<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_pjl extends CI_Controller {

	private $idpenjualan;

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_pjl");
	}

	public function index(){
		$data['pjl'] = $this->Mdl_pjl->Dt_pjl();
		$data['spare'] = $this->Mdl_pjl->Dt_spare();
		$this->load->view('admin/penjualan',$data);
	}

	public function add(){
		$data['idpenjualan'] = $this->Mdl_pjl->Next_ID();
		if(empty($data['idpenjualan'])){
			$idpenjualan = "J00001";
		}else{
			$max = substr($data['idpenjualan'][0]->idpenjualan,1,5);
			$no = (int) substr($max,1,5);
			$no++;
			$idpenjualan = "J".sprintf("%05s",$no);
		}
		$idpenjualan = $idpenjualan;

		$ex_spare = explode("|",$this->input->post("idsparepart"));

		$insert = array(
			"idpenjualan" => $idpenjualan,
			"tglpenjualan" => date("Y-m-d"),
			"idsparepart" => $ex_spare[0],
			"jumlahitem" => $this->input->post("jumlahitem"),
			"harga" => $this->input->post("harga"),
		);
		$this->Mdl_pjl->Ins_pjl($insert);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Penjualan berhasil di tambahkan.
                          </div>');
		$this->session->set_userdata($insert);
		//redirect("Adm_pjl");
		//
		redirect("Adm_pjl/Ctk_nota");
	}

	function Ctk_nota(){
		$data["spare"] = $this->Mdl_pjl->Dt_nota($this->session->userdata("idsparepart"));
		$this->load->view("admin/notapenjualan",$data);
	}

	public function del(){
		$id = $this->uri->segment(3);
		$this->Mdl_pjl->Del_pjl($id);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Penjualan berhasil di hapus.
                          </div>');
		redirect("Adm_pjl");
	}

}
