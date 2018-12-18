<?php

class Staff extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');
	}
	public function index()
	{
		$data['staffs'] = $this->staff_model->get_all_staff();
		$this->load->view('staff_view', $data);
	}

	public function staff_add()
	{
		$data = array(
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'degree' => $this->input->post('degree'),
				'email' => $this->input->post('email'),
				'room' => $this->input->post('room'),
				'departement' => $this->input->post('departement'),
		);
		$insert = $this->staff_model->staff_add($data);
		echo json_encode(array("status" => true));
	}

	public function ajax_edit($id)
	{
		$data = $this->staff_model->get_by_id($id);
		echo json_encode($data);
	}
	public function staff_update()
	{
		$data = array(
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'degree' => $this->input->post('degree'),
				'email' => $this->input->post('email'),
				'room' => $this->input->post('room'),
				'departement' => $this->input->post('departement'),
		);
		$this->staff_model->staff_update(array('staff_id'=> $this->input->post('staff_id')), $data);
		echo json_encode(array("status" => true));
	}
	public function staff_delete($id){
		$this->staff_model->delete_by_id($id);
		echo json_encode(array("status" => true));
	}
}