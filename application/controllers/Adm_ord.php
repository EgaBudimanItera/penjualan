<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_ord extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_ord");
	}

	public function index(){
		$data['ord'] = $this->Mdl_ord->Dt_ord();
		$this->load->view('admin/order',$data);
	}

	public function Ctk_srt(){
		$id = $this->uri->segment(3);
		$data['srt'] = $this->Mdl_ord->Dt_srt($id);
		$this->load->view('admin/suratjalan',$data);
	}

	public function del(){
		$id = $this->uri->segment(3);
		$this->Mdl_ord->Del_ord($id);
		redirect("Adm_ord");
	}	

}
