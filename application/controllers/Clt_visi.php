<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clt_visi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_cord");
	}

	public function index(){
		$this->load->view('front/visi');
	}

}
