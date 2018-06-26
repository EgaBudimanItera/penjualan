<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_spare");
	}

	public function index(){
		$data['produk'] = $this->Mdl_spare->Dt_spare();
		$this->load->view('welcome_message',$data);
	}

	public function Logout(){
		 $this->session->sess_destroy();
    	 redirect("Welcome");
	}

}
