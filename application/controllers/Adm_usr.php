<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_usr extends CI_Controller {

	private $idpengguna;

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_usr");
	}

	public function index(){

		$data['idpengguna'] = $this->Mdl_usr->Next_ID();
		if(empty($data['idpengguna'])){
			$idpengguna = "U001";
		}else{
			$max = substr($data['idpengguna'][0]->idpengguna,1,3);
			$no = (int) substr($max,1,3);
			$no++;
			$idpengguna = "U".sprintf("%03s",$no);
		}
		$data['id'] = $idpengguna;

		$data['usr'] = $this->Mdl_usr->Dt_usr();
		$this->load->view('admin/pengguna',$data);
	}

	public function add(){

		//posting array
		$insert = array(
			'idpengguna' => $this->input->post('idpengguna'),
			'nmpengguna' => $this->input->post('nmpengguna'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'password' => '123',
		 );
		 $this->Mdl_usr->Ins_usr($insert);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Pengguna berhasil di tambahkan.
                          </div>');
		 redirect("Adm_usr");

	}

	public function edt(){
		$id = $this->input->post('idpengguna');
		//posting array
		$update = array(
			'nmpengguna' => $this->input->post('nmpengguna'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
		 );

		 $this->Mdl_usr->Upd_usr($id,$update);
		 $this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Pengguna berhasil di ubah.
                          </div>');
		 redirect("Adm_usr");

	}

	public function del(){
		$ID = $this->uri->segment(3);
		$this->Mdl_usr->Del_usr($ID);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Pengguna berhasil di hapus.
                          </div>');
		redirect("Adm_usr");
	}

}
