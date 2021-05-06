<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill extends CI_Controller {

	public function index()
	{
		$this->load->view('skill/index');
	}

	public function get($id = null)
	{		
		$data['skill'] = $this->DataHandle->getAllWhere('ms_skill', '*', 'id is not null');
        $this->load->view('skill/all', $data);
	}

	public function delete($id=null)
	{
		$data=['id'=>$id];
		if($this->DataHandle->delete('ms_skill', $data)):
			$response = [
				'status' => 20,
				'message' => 'data berhasil dihapus',
			];
		else:
			$response = [
				'status' => 0,
				'message' => 'data gagal dihapus',
			];
		endif;

		echo json_encode($response);
	}

	public function edit()
	{
		$input = $this->input->post();
		if($input['nama_skill'] == null):
			$response = [
				'status'=>0,
				'message'=>'Maaf nama Skill tidak boleh kosong!',
			];
			echo json_encode($response);
			die;
		endif;

		$data = [
			'nama_skill'=>$input['nama_skill'],
		];

		$kondisi = [
			'id'=>$input['id'],
		];

		if($this->DataHandle->update('ms_skill', $data, $kondisi)):
			$response = [
				'status'=>20,
				'id'=>$input['id'],
				'message'=>'Update data berhasil',
			];			
		else:
			$response = [
				'status'=>0,
				'message'=>'Update data gagal :(',
			];			

		endif;

		echo json_encode($response);
	}
}
