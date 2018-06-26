<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_dash extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_rep");
	}

	public function index(){
		$data['pjl'] = $this->Mdl_rep->Dt_gpjl();
		$data['ser'] = $this->Mdl_rep->Dt_gser();
		$this->load->view('admin/dashboard',$data);
	}

}
