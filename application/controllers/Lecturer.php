<?php

class Lecturer extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lecturer_model');
	}
	public function index()
	{
		$data['lecturers'] = $this->lecturer_model->get_all_lecturer();
		$this->load->view('lecturer_view', $data);
	}

	public function lecturer_add()
	{
		$data = array(
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'degree' => $this->input->post('degree'),
				'concentration' => $this->input->post('concentration'),
				'email' => $this->input->post('email'),
				'room' => $this->input->post('room'),
				'position' => $this->input->post('position'),
		);
		$insert = $this->lecturer_model->lecturer_add($data);
		echo json_encode(array("status" => true));
	}

	public function ajax_edit($id)
	{
		$data = $this->lecturer_model->get_by_id($id);
		echo json_encode($data);
	}
	public function lecturer_update()
	{
		$data = array(
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'degree' => $this->input->post('degree'),
				'concentration' => $this->input->post('concentration'),
				'email' => $this->input->post('email'),
				'room' => $this->input->post('room'),
				'position' => $this->input->post('position'),
		);
		$this->lecturer_model->lecturer_update(array('lecturer_id'=> $this->input->post('lecturer_id')), $data);
		echo json_encode(array("status" => true));
	}
	public function lecturer_delete($id){
		$this->lecturer_model->delete_by_id($id);
		echo json_encode(array("status" => true));
	}
}