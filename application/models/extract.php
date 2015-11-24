<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extract extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_place_name($placeid)
	{
		$this->db->from('places');
		$this->db->where('PlaceId',$placeid);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_user_detail($userid)
	{
		$this->db->from('Users_view');
		$this->db->where('UserId',$userid);
		$query=$this->db->get();
		return $query->result();
	}

	public function get_old_password($userid)
	{
		$this->db->from('Users');
		$this->db->where('UserId',$userid);
		$query=$this->db->get();
		return $query->result();
	}
}

/* End of file extract.php */
/* Location: ./application/models/extract.php */