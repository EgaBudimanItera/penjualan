<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_tek extends CI_Controller {

	private $idteknisi;
	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_tek");
	}

	public function index(){
		$data['idteknisi'] = $this->Mdl_tek->Next_ID();
		if(empty($data['idteknisi'])){
			$idteknisi = "T001";
		}else{
			$max = substr($data['idteknisi'][0]->idteknisi,1,3);
			$no = (int) substr($max,1,3);
			$no++;
			$idteknisi = "T".sprintf("%03s",$no);
		}
		$data['id'] = $idteknisi;
		$data['tek'] = $this->Mdl_tek->Dt_tek();
		$this->load->view('admin/teknisi',$data);
	}

	public function add(){

		//posting array
		$insert = array(
			'idteknisi' => $this->input->post('idteknisi'),
			'nmteknisi' => $this->input->post('nmteknisi'),
		 );
		 $this->Mdl_tek->Ins_tek($insert);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Teknisi berhasil di tambahkan.
                          </div>');
		 redirect("Adm_tek");

	}

	public function edt(){
		$id = $this->input->post('idteknisi');
		//posting array
		$update = array(
			'nmteknisi' => $this->input->post('nmteknisi'),
		 );

		 $this->Mdl_tek->Upd_tek($id,$update);
		 $this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Teknisi berhasil di ubah.
                          </div>');
		 redirect("Adm_tek");

	}

	public function del(){
		$ID = $this->uri->segment(3);
		$this->Mdl_tek->Del_tek($ID);
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Teknisi berhasil di hapus.
                          </div>');
		redirect("Adm_tek");
	}

}
