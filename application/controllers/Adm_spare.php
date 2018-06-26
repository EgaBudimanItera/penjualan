<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_spare extends CI_Controller {

	private $idsparepart;

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('session'));
		$this->load->model("Mdl_spare");
	}

	public function index(){
		$data['idsparepart'] = $this->Mdl_spare->Next_ID();
		if(empty($data['idsparepart'])){
			$idsparepart = "R0001";
		}else{
			$max = substr($data['idsparepart'][0]->idsparepart,1,4);
			$no = (int) substr($max,1,4);
			$no++;
			$idsparepart = "R".sprintf("%04s",$no);
		}
		$data['id'] = $idsparepart;
		$data['spare'] = $this->Mdl_spare->Dt_spare();		
		$this->load->view('admin/sparepart',$data);
	}

	public function add(){

		$uploadpath = "./upload/";
		$file_name = date("Ymdhis");
		$config =  array(
					'upload_path'     => $uploadpath,
					'allowed_types'   => "jpg|png|bmp|jpeg",
					'overwrite'       => TRUE,
					'max_size'        => "20480000000",  // Can be set to particular file size
					'max_height'      => "768000",
					'max_width'       => "1024000",
					'file_name' 	  => $file_name
                );

		$this->load->library('upload', $config);
		if($this->upload->do_upload('gambar')){
				$data = $this->upload->data();
				$insert = array(
					'idsparepart' => $this->input->post("idsparepart"),
					'nmsparepart' => $this->input->post("nmsparepart"),
					'hargajual' => $this->input->post("hargajual"),
					'gambar' => $config['file_name'].".".basename($_FILES['gambar']['type']),
					'spesifikasi' => $this->input->post("spesifikasi")
				);
			$data = array('upload_data' => $this->upload->data());
			$this->Mdl_spare->Ins_spare($insert);
			$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Sparepart berhasil di tambahkan.
                          </div>');
		}else{
			$this->session->set_flashdata('status','<div class="alert alert-danger">
                              <button data-dismiss="alert" class="close">×</button>
                               Maaf, Proses penambahan gagal.
                          </div>');
		}
		$error = array('error' => $this->upload->display_errors());
		redirect("Adm_spare");
		
	}

	public function edt(){

		if(empty($_FILES['gambar']['tmp_name'])){

			$update = array(
				'nmsparepart' => $this->input->post("nmsparepart"),
				'hargajual' => $this->input->post("hargajual"),
				'spesifikasi' => $this->input->post("spesifikasi")
			);			
			$this->Mdl_spare->Upd_spare($this->input->post("idsparepart"),$update);
			$this->session->set_flashdata('status','<div class="alert alert-info">
	                              <button data-dismiss="alert" class="close">×</button>
	                               Sparepart berhasil di ubah.
	                          </div>');
		}else{

			$uploadpath = "./upload/";
			$file_name = date("Ymdhis");
			$config =  array(
						'upload_path'     => $uploadpath,
						'allowed_types'   => "jpg|png|bmp",
						'overwrite'       => TRUE,
						'max_size'        => "20480000000",  // Can be set to particular file size
						'max_height'      => "768000",
						'max_width'       => "1024000",
						'file_name' 	  => $file_name
	                );

			$this->load->library('upload', $config);
			if($this->upload->do_upload('gambar')){
					$data = $this->upload->data();
					$update = array(
						'nmsparepart' => $this->input->post("nmsparepart"),
						'hargajual' => $this->input->post("hargajual"),
						'gambar' => $config['file_name'].".".basename($_FILES['gambar']['type']),
						'spesifikasi' => $this->input->post("spesifikasi")
					);
				$data = array('upload_data' => $this->upload->data());
				$this->Mdl_spare->Upd_spare($this->input->post("idsparepart"),$update);
				$this->session->set_flashdata('status','<div class="alert alert-info">
	                              <button data-dismiss="alert" class="close">×</button>
	                               Sparepart berhasil di ubah.
	                          </div>');
			}else{
				$this->session->set_flashdata('status','<div class="alert alert-danger">
	                              <button data-dismiss="alert" class="close">×</button>
	                               Maaf, Proses pengubahan gagal.
	                          </div>');
			}
		}
		redirect("Adm_spare");

	}

	public function del(){
		$ID = $this->uri->segment(3);		
		$this->Mdl_spare->Del_spare($ID);
		$this->session->set_flashdata('status','<div class="alert alert-info">
	                              <button data-dismiss="alert" class="close">×</button>
	                               Sparepart berhasil di hapus.
	                          </div>');
		redirect("Adm_spare");
	}

}
