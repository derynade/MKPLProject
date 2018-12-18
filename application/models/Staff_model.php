<?php
/**
 * 
 */
class Staff_model extends CI_Model
{
	var $table = 'staff';
	public function staff_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function get_all_staff()
	{
		$this->db->from('staff');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('staff_id', $id);
		$query = $this->db->get();

		return $query->row();
	}
	public function staff_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function delete_by_id($id){
		$this->db->where('staff_id', $id);
		$this->db->delete($this->table);
	}

}