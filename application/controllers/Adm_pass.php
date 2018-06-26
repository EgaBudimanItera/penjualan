<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_pass extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_auth");
	}

	public function index(){
		$this->load->view('admin/password');
	}

	public function edt(){
		$pwlama = $this->input->post("passlama");
	    $pwbaru = $this->input->post("passbaru");
	    $pwkonf = $this->input->post("konfpass");

	    if($pwbaru == $pwkonf){
	      $pwlamadb = $this->Mdl_auth->Chk_pass($this->session->userdata("email"),$pwlama);
	      if(!empty($pwlamadb)){
	        $this->Mdl_auth->Upd_pass($this->session->userdata("email"),$pwbaru);
	        $this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Password Berhasil Diubah.
                          </div>');
	      }else{
	      	$this->session->set_flashdata('status','<div class="alert alert-danger">
                              <button data-dismiss="alert" class="close">×</button>
                               Password Gagal Diubah.
                          </div>');
	      }
	    }else{
	      	$this->session->set_flashdata('status','<div class="alert alert-danger">
                              <button data-dismiss="alert" class="close">×</button>
                               Password Gagal Diubah.
                          </div>');
	    }

	    redirect("Adm_pass");
	}

}
