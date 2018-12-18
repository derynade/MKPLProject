<?php

class Mahasiswa extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
	}
	public function index()
	{
		$data['Mahasiswas'] = $this->mahasiswa_model->get_all_mahasiswa();
		$this->load->view('mahasiswa_view', $data);
	}

	public function mahasiswa_add()
	{
		$data = array(
				'nim' => $this->input->post('nim'),
				'student_name' => $this->input->post('student_name'),
				'student_dep' => $this->input->post('student_dep'),
				'student_major' => $this->input->post('student_major'),
				'year' => $this->input->post('year'),
				'city' => $this->input->post('city'),
				'address' => $this->input->post('address'),
		);
		$insert = $this->mahasiswa_model->mahasiswa_add($data);
		echo json_encode(array("status" => true));
	}

	public function ajax_edit($id)
	{
		$data = $this->mahasiswa_model->get_by_id($id);
		echo json_encode($data);
	}
	public function mahasiswa_update()
	{
		$data = array(
				'nim' => $this->input->post('nim'),
				'student_name' => $this->input->post('student_name'),
				'student_dep' => $this->input->post('student_dep'),
				'student_major' => $this->input->post('student_major'),
				'year' => $this->input->post('year'),
				'city' => $this->input->post('city'),
				'address' => $this->input->post('address'),
		);
		$this->mahasiswa_model->mahasiswa_update(array('student_id'=> $this->input->post('student_id')), $data);
		echo json_encode(array("status" => true));
	}
	public function mahasiswa_delete($id){
		$this->mahasiswa_model->delete_by_id($id);
		echo json_encode(array("status" => true));
	}
}