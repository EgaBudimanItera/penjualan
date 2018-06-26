<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_log extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_auth");
	}

	public function index(){
    	$this->load->view("adminlogin");
	}

	public function log(){
		$u = $this->input->post("username");
		$p = $this->input->post("password");

		if($log = $this->Mdl_auth->login($u,$p)){
			$this->session->set_userdata($log);
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Berhasil Login, Silahkan Gunakan sistem dengan baik.
                          </div>');
			redirect("Adm_dash");
		}else{
			$this->session->set_flashdata('status','<div class="alert alert-danger">
                              <button data-dismiss="alert" class="close">×</button>
                               Login Gagal, Username atau Password Salah.
                          </div>');
			redirect("Adm_log");
		}

	}

}
