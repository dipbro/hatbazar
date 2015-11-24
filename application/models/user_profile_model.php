<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function update_user_profile($userid)
	{
		$data=array
		(
			'UserName'=>$this->input->post('username')
		);
		
		$this->db->where('UserId',$userid);
		$this->db->update('Users',$data);
	}	

	public function update_user_password($userid,$newpass)
	{
		$password=$this->encrypt->sha1($newpass);
		$data=array('Password'=>$password);
		$this->db->update('Users', $data);
	}
}

/* End of file user_profile_model.php */
/* Location: ./application/models/user_profile_model.php */