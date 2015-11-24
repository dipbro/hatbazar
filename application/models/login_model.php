<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function check_user()
	{
		$this->db->from('Users');
		$this->db->where('UserName',$this->input->post('username'));
		$this->db->where('Password',$this->encrypt->sha1($this->input->post('password')));
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			$data=$query->result();
			$tempid=$data[0]->LoginTypeId;
			$userid=$data[0]->UserId;
			$this->set_session($tempid,$userid);
			return true;
		}
		else
		{
			return false;
		}
	}	

	public function set_session($loginid,$userid)
	{
		$newdata = array(
					'userid'=>$userid,
                   'username'  => $this->input->post('username'),
                   'logintypeid'=>$loginid,
                   'logged_in' => TRUE
               );

			$this->session->set_userdata($newdata);
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */