<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superhero extends CI_Controller {

	public function index()
	{
		$this->load->view('superhero/index');
	}

	public function get($id = null)
	{		
		if($id == 'all'):
			$data['superhero'] = $this->DataHandle->getAllWhere('ms_superhero', '*', 'id is not null');			
			$this->load->view('superhero/all', $data);
		else:
			$data['detail'] = $this->DataHandle->getAllWhere('ms_superhero', '*', array('id'=>$id))->row_array();
			$data['skill'] = $this->DataHandle->getAllWhere('v_skill_superhero', '*', array('id_superhero'=>$id));
	        $this->load->view('superhero/detail', $data);
       	endif;
	}

	public function delete($id=null)
	{
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

	public function edit()
	{
		$input = $this->input->post();
		if($input['nama'] == null):
			$response = [
				'status'=>0,
				'message'=>'Maaf nama superhero tidak boleh kosong!',
			];
			echo json_encode($response);
			die;
		endif;
		if($input['jk'] == null):
			$response = [
				'status'=>0,
				'message'=>'Maaf jenis kelamin superhero tidak boleh kosong!',
			];
			echo json_encode($response);

			die;
		endif;

		$data = [
			'nama'=>$input['nama'],
			'jk'=>$input['jk'],
		];

		$kondisi = [
			'id'=>$input['id'],
		];

		if($this->DataHandle->update('ms_superhero', $data, $kondisi)):
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

	public function add_skill($id)
	{
		$data['skill'] = $this->DataHandle->getAllWhere('ms_skill', '*', 'id is not null');	
		$data['detail'] = $this->DataHandle->getAllWhere('ms_superhero', '*', array('id'=>$id))->row_array();
		$this->load->view('superhero/add_skill', $data);
	}

	public function add_skill_proses()
	{
		$input = $this->input->post();
		if($input['id_skill'] == null):
			$response = [
				'status'=>0,
				'message'=>'Maaf skill tidak boleh kosong!',
			];
			echo json_encode($response);
			die;
		endif;

		$id_superhero = $input['id_superhero'];
		$id_skill = $input['id_skill'];

		$cek = $this->DataHandle->getAllWhere('tr_skill', '*', ['id_superhero'=>$id_superhero, 'id_skill'=>$id_skill])->num_rows();
		if($cek > 0):
			$response = [
				'status'=>0,
				'message'=>'Maaf skill sudah pernah ada!',
			];
			echo json_encode($response);
			die;			
		endif;

		$data = [
			'id_superhero'=>$id_superhero,
			'id_skill'=>$id_skill,
		];

		if($this->DataHandle->insert('tr_skill', $data)):
			$response = [
				'status'=>20,
				'message'=>'input skill berhasil',
			];			
		else:
			$response = [
				'status'=>0,
				'message'=>'input skill gagal :(',
			];			

		endif;

		echo json_encode($response);
	}

	public function delete_skill($id = null)
	{
		$data=['id'=>$id];
		if($this->DataHandle->delete('tr_skill', $data)):
			$response = [
				'status' => 20,
				'message' => 'skill berhasil dihapus',
			];
		else:
			$response = [
				'status' => 0,
				'message' => 'skill gagal dihapus',
			];
		endif;

		echo json_encode($response);		
	}
}
