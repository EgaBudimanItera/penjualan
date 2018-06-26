<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clt_reglog extends CI_Controller {

	private $idpelanggan;

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_reglog");
		$this->load->model("Mdl_pel");
	}

	public function index(){
		$data['idpelanggan'] = $this->Mdl_pel->Next_ID();
		if(empty($data['idpelanggan'])){
			$idpelanggan = "P001";
		}else{
			$max = substr($data['idpelanggan'][0]->idpelanggan,1,3);
			$no = (int) substr($max,1,3);
			$no++;
			$idpelanggan = "P".sprintf("%03s",$no);
		}
		$data['id'] = $idpelanggan;
		$data['pel'] = $this->Mdl_pel->Dt_pel();
		$this->load->view('front/reglog',$data);
	}

	public function reg(){
		//posting array
		$insert = array(
			'idpelanggan' => $this->input->post('idpelanggan'),
			'nmpelanggan' => $this->input->post('nmpelanggan'),
			'noktp' => $this->input->post('noktp'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		$this->Mdl_pel->Ins_pel($insert);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Berhasil Registrasi, Silahkan Login menggunakan Email dan Password anda.
                          </div>');
		redirect("Clt_reglog");
	}

	public function log(){
		$u = $this->input->post("username");
		$p = $this->input->post("password");

		if($log = $this->Mdl_reglog->login($u,$p)){
			$this->session->set_userdata($log);
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Berhasil Login, Silahkan Gunakan sistem dengan baik.
                          </div>');
			redirect("Welcome");
		}else{
			$this->session->set_flashdata('status','<div class="alert alert-danger">
                              <button data-dismiss="alert" class="close">×</button>
                               Login Gagal, Username atau Password Salah.
                          </div>');
			redirect("Clt_reglog");
		}

	}

}
