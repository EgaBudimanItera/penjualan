<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_pel extends CI_Controller {

	private $idpelanggan;

	public function __construct(){
		parent::__construct();
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
		$this->load->view('admin/pelanggan',$data);
	}

	public function add(){

		//posting array
		$insert = array(
			'idpelanggan' => $this->input->post('idpelanggan'),
			'nmpelanggan' => $this->input->post('nmpelanggan'),
			'noktp' => $this->input->post('noktp'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'password' => '123',
		 );
		 $this->Mdl_pel->Ins_pel($insert);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Pelanggan berhasil di tambahkan.
                          </div>');
		 redirect("Adm_pel");

	}

	public function edt(){
		$id = $this->input->post('idpelanggan');
		//posting array
		$update = array(
			'nmpelanggan' => $this->input->post('nmpelanggan'),
			'noktp' => $this->input->post('noktp'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
		 );

		 $this->Mdl_pel->Upd_pel($id,$update);
		 $this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Pelanggan berhasil di ubah.
                          </div>');
		 redirect("Adm_pel");

	}

	public function del(){
		$ID = $this->uri->segment(3);
		$this->Mdl_pel->Del_pel($ID);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Pelanggan berhasil di hapus.
                          </div>');
		redirect("Adm_pel");
	}

}
