<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends CI_Controller {

	public function index()
	{
		$data['laki'] = $this->DataHandle->getAllWhere('ms_superhero', '*', ['jk'=>'L']);
		$data['perempuan'] = $this->DataHandle->getAllWhere('ms_superhero', '*', ['jk'=>'P']);
		$this->load->view('simulasi/index', $data);
	}

	public function get_skill_simulasi()
	{
		$input = $this->input->post();
		$kondisi = " id_superhero in (".$input['id_papa'].", ".$input['id_mama'].")";
		$data['skill'] = $this->DataHandle->getAllWhere('v_skill_superhero','*', $kondisi);		
		$this->load->view('simulasi/get_skill', $data);
	}
}
