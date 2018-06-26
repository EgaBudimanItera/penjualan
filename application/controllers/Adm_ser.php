<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_ser extends CI_Controller {

	private $idservice;

	public function __construct(){
		parent::__construct();
		$this->load->model("Mdl_ser");
	}

	public function index(){
		$data['idservice'] = $this->Mdl_ser->Next_ID();
		if(empty($data['idservice'])){
			$idservice = "S00001";
		}else{
			$max = substr($data['idservice'][0]->idservice,1,5);
			$no = (int) substr($max,1,5);
			$no++;
			$idservice = "S".sprintf("%05s",$no);
		}
		$data['id'] = $idservice;
		$data['ser'] = $this->Mdl_ser->Dt_ser();
		$data['ord'] = $this->Mdl_ser->Dt_ord();
		$data['tek'] = $this->Mdl_ser->Dt_tek();
		$this->load->view('admin/service',$data);
	}

	public function add(){
		//posting array
		$insert = array(
			'idservice' => $this->input->post('idservice'),
			'tglmulaiservice' => date_format(date_create($this->input->post('tglmulaiservice')),"Y-m-d"),
			'tglselesaiservice' => date_format(date_create($this->input->post('tglselesaiservice')),"Y-m-d"),
			'idorder' => $this->input->post('idorder'),
			'idteknisi' => $this->input->post('idteknisi'),
			'biaya' => $this->input->post('biaya')
		 );
		 $this->Mdl_ser->Ins_ser($insert);
		 $this->Mdl_ser->Upd_ord($insert['idorder'],"PROSES");
		 $this->Mdl_ser->Upd_ketker($insert['idorder'],array("ketkerusakan"=>$this->input->post("ketkerusakan")));
		 $this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Service berhasil di tambahkan.
                          </div>');
		 redirect("Adm_ser");

	}
	
	public function del(){
		$id = $this->uri->segment(3);
		$this->Mdl_ser->Del_ser($id);		
		redirect("Adm_ser");
	}

	public function Det_ser(){
		$id = $this->uri->segment(3);
		$data['detser'] = $this->Mdl_ser->Dt_detser($id);
		$data['spare'] = $this->Mdl_ser->Dt_spare();
		$this->load->view("admin/detailservice",$data);
	}

	public function add_det(){
		$exp_spare = explode("|", $this->input->post('idsparepart'));
		//posting array
		$insert = array(
			'idservice' => $this->input->post('idservice'),
			'idsparepart' => $exp_spare[0],
			'jumlahitem' => $this->input->post('jumlahitem'),
			'harga' => $this->input->post('harga')
		 );
		 $this->Mdl_ser->Ins_detser($insert);
		 $this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Detail Service berhasil di tambahkan.
                          </div>');
		 redirect("Adm_ser/Det_ser/".$insert['idservice']);
	}

	public function del_det(){
		$iddet = $this->uri->segment(3);
		$idser = $this->uri->segment(4);
		$this->Mdl_ser->Del_detser($iddet);	
		$this->session->set_flashdata('status','<div class="alert alert-info">
                              <button data-dismiss="alert" class="close">×</button>
                               Detail Service berhasil di hapus.
                          </div>');	
		redirect("Adm_ser/Det_ser/".$idser);
	}

	public function Fin_ser(){
		$id = $this->uri->segment(3);
		$idorder = $this->uri->segment(4);
		$data['ser'] = $this->Mdl_ser->Ctk_ser($id);
		$data['detser'] = $this->Mdl_ser->Ctk_detser($id);
		$data['sum'] = $this->Mdl_ser->Ctk_sumdetser($id);
		$this->Mdl_ser->Upd_ord($idorder,"SELESAI");
		$this->load->view("admin/tandaterima",$data);
	}

}
