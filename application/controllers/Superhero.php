<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superhero extends CI_Controller {

	public function index()
	{
		$data['superhero'] = $this->DataHandle->getAllWhere('ms_superhero', '*', 'id is not null');
		$this->load->view('superhero/index', $data);
	}

	public function get($id = null)
	{		
		$data['detail'] = $this->DataHandle->getAllWhere('ms_superhero', '*', array('id'=>$id))->row_array();
        $this->load->view('superhero/detail', $data);
	}

	public function delete($id=null){
		$data=['id'=>$id];
		if($this->DataHandle->delete('ms_superhero', $data)):
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
}
