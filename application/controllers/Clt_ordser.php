<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clt_ordser extends CI_Controller {

	private $idorder;

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_cltord");
	}

	public function index(){
		$data['ord'] = $this->Mdl_cltord->Dt_ord($this->session->userdata("idpelanggan"));
		$this->load->view('front/orderservis',$data);
	}

	public function add(){
		$data['idorder'] = $this->Mdl_cltord->Next_ID();
		if(empty($data['idorder'])){
			$idorder = "O0001";
		}else{
			$max = substr($data['idorder'][0]->idorder,1,4);
			$no = (int) substr($max,1,4);
			$no++;
			$idorder = "O".sprintf("%04s",$no);
		}
		$id = $idorder;

		$insert = array(
			"idorder" => $id,
			"tglorder" => date("Y-m-d"),
			"idpelanggan" => $this->session->userdata("idpelanggan"),
			"ketkerusakan" => $this->input->post("ket"),
			"statusorder" => 'ORDER'
		);
		$this->Mdl_cltord->Ins_ord($insert);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Berhasil Order, Silahkan Tunggu Konfirmasi Admin.
                          </div>');
		redirect("Clt_ordser");
	}

}
