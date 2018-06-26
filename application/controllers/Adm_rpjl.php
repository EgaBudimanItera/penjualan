<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_rpjl extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_rep");
	}

	public function index(){
		$data['pjl'] = $this->Mdl_rep->Dt_pjl();
		$this->load->view('admin/rpenjualan',$data);
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
			$data['pjl'] = $this->Mdl_rep->Dt_srcpjl($a,$b);
		}else{
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Menampilkan seluruh data.
                          </div>');
			$data['pjl'] = $this->Mdl_rep->Dt_pjl();
		}
		if($for == "cetak"){
			$this->load->view("admin/cetakpenjualan",$data);
		}elseif($for == "cari"){			
			$this->load->view("admin/rpenjualan",$data);
		}
	}

}
