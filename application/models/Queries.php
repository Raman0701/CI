<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Queries extends CI_Model {

	//mysql function for user's Registration
	public function logIn($data){
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}

	//mysql function for User's Login
	public function signUp($data){
		$this->db->insert('student', $data);
	}

	public function Details($id){
		$this->db->select('class_id');
		$this->db->from('assign_classes');
		$this->db->where('teacher_id',$this->session->userdata('id'));
		$this->db->group_by('class_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->result_array();
			return $row;
		}
	}


	public function students($cls){
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('class',$this->input->get('class'));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->result_array();
			return $row;
		}
	}

	public function stuDetails(){
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('id',$this->input->get('id'));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}

	public function updateStu($data,$id){
		$this->db->where('id',$id);
		$this->db->update('student',$data);      
	}



	public function deleteStu($id){
		$this->db->where('id', $id);
		$this->db->delete('student');
	}

}