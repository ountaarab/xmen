<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skill extends CI_Controller
{

	public function index()
	{
		$this->load->view('skill/index');
	}

	public function get($id = null)
	{
		if ($id == 'all') :
			$data['skill'] = $this->DataHandle->getAllWhere('ms_skill', '*', 'id is not null');
			$this->load->view('skill/all', $data);
		elseif ($id != null) :
			$data['skill'] = $this->DataHandle->getAllWhere('ms_skill', '*', "nama_skill LIKE '%" . urldecode($id) . "%'");
			$this->load->view('skill/all', $data);
		else :
			$data['detail'] = $this->DataHandle->getAllWhere('ms_skill', '*', array('id' => $id))->row_array();
			$data['heroes'] = $this->DataHandle->getAllWhere('v_skill_superhero', '*', array('id_skill' => $id));
			$this->load->view('skill/detail', $data);
		endif;
	}

	public function delete($id = null)
	{
		$data = ['id' => $id];
		if ($this->DataHandle->delete('ms_skill', $data)) :
			$response = [
				'status' => 20,
				'message' => 'data berhasil dihapus',
			];
		else :
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
		if ($input['nama_skill'] == null) :
			$response = [
				'status' => 0,
				'message' => 'Maaf nama Skill tidak boleh kosong!',
			];
			echo json_encode($response);
			die;
		endif;

		$data = [
			'nama_skill' => $input['nama_skill'],
		];

		$kondisi = [
			'id' => $input['id'],
		];

		if ($this->DataHandle->update('ms_skill', $data, $kondisi)) :
			$response = [
				'status' => 20,
				'id' => $input['id'],
				'message' => 'Update data berhasil',
			];
		else :
			$response = [
				'status' => 0,
				'message' => 'Update data gagal :(',
			];

		endif;

		echo json_encode($response);
	}

	public function delete_hero($id = null)
	{
		$data = ['id' => $id];
		if ($this->DataHandle->delete('tr_skill', $data)) :
			$response = [
				'status' => 20,
				'message' => 'hero berhasil dihapus',
			];
		else :
			$response = [
				'status' => 0,
				'message' => 'hero gagal dihapus',
			];
		endif;

		echo json_encode($response);
	}

	public function add_hero($id)
	{
		$data['hero'] = $this->DataHandle->getAllWhere('ms_superhero', '*', 'id is not null');
		$data['detail'] = $this->DataHandle->getAllWhere('ms_skill', '*', array('id' => $id))->row_array();
		$this->load->view('skill/add_hero', $data);
	}


	public function add_hero_proses()
	{
		$input = $this->input->post();
		if ($input['id_superhero'] == null) :
			$response = [
				'status' => 0,
				'message' => 'Maaf Superhero tidak boleh kosong!',
			];
			echo json_encode($response);
			die;
		endif;

		$id_superhero = $input['id_superhero'];
		$id_skill = $input['id_skill'];

		$cek = $this->DataHandle->getAllWhere('tr_skill', '*', ['id_superhero' => $id_superhero, 'id_skill' => $id_skill])->num_rows();
		if ($cek > 0) :
			$response = [
				'status' => 0,
				'message' => 'Maaf hero sudah pernah ada!',
			];
			echo json_encode($response);
			die;
		endif;

		$data = [
			'id_superhero' => $id_superhero,
			'id_skill' => $id_skill,
		];

		if ($this->DataHandle->insert('tr_skill', $data)) :
			$response = [
				'status' => 20,
				'message' => 'input hero berhasil',
			];
		else :
			$response = [
				'status' => 0,
				'message' => 'input hero gagal :(',
			];

		endif;

		echo json_encode($response);
	}
}
