<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registration_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function register_user()
	{
		$admin=2;
		if(isset($_POST['usercheck']))
		{
			$admin=1;
		}
		$data = array(
						'FullName' =>$this->input->post('fullname'),
						'username'=>$this->input->post('username'),
						'password'=>$this->encrypt->sha1($this->input->post('password')),
						'LoginTypeId'=>$admin,
						'StatusId'=>'1'
					);
		$this->db->insert('Users',$data);

	}

	public function display_users()
	{
		$this->db->from('users_view');
		$query=$this->db->get();
		return $query->result();
	}

	public function delete_user($userid)
	{
		$this->db->where('UserId', $userid);
		$this->db->delete('Users'); 
	}

}

/* End of file user_registration_model.php */
/* Location: ./application/models/user_registration_model.php */	