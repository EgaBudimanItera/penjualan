<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_graf extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_rep");
	}

	public function index(){
		$data['pjl'] = $this->Mdl_rep->Dt_gpjl();
		$data['thn'] = $this->Mdl_rep->Dt_thnpjl();
		$data['ser'] = $this->Mdl_rep->Dt_gser();
		$this->load->view('admin/grafik',$data);
	}

	public function src(){
		$data['pjl'] = $this->Mdl_rep->Dt_gpjl();
		$a = $this->input->post("tahun");
		if(!empty($a)){
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Tahun '.$a.'.
                          </div>');
			$data['pjl'] = $this->Mdl_rep->Dt_gsrcpjl($a);
			$data['ser'] = $this->Mdl_rep->Dt_gsrcser($a);
		}else{
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Menampilkan seluruh data.
                          </div>');
			$data['pjl'] = $this->Mdl_rep->Dt_gpjl();
			$data['ser'] = $this->Mdl_rep->Dt_gser();
		}
		$this->load->view("admin/grafik",$data);
		
	}

}
