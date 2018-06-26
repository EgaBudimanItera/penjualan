<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_rord extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_rep");
	}

	public function index(){
		$data['ord'] = $this->Mdl_rep->Dt_ord();
		$this->load->view('admin/rorder',$data);
	}

	public function src(){
		$a = $this->input->post("tglawal");
		$b = $this->input->post("tglakhir");
		$for = $this->input->post("submit");
		if(!empty($a) and !empty($b)){
			$a = date_format(date_create($this->input->post("tglawal")),"Y-m-d");
			$b = date_format(date_create($this->input->post("tglakhir")),"Y-m-d");
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Dari Tanggal '.$a.' Sampai Tanggal '.$b.'.
                          </div>');
			$data['ord'] = $this->Mdl_rep->Dt_srcord($a,$b);
		}else{
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Menampilkan seluruh data.
                          </div>');
			$data['ord'] = $this->Mdl_rep->Dt_ord();
		}
		if($for == "cetak"){
			$this->load->view("admin/cetakorder",$data);
		}elseif($for == "cari"){			
			$this->load->view("admin/rorder",$data);
		}
	}

}
