<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Controller {

	var $data=array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('extract');
		$this->load->model('user_profile_model');
		$this->load->library('encrypt');
		
	}

	public function index()
	{
		if($this->session->userdata('userid'))
		{
			$userid=$this->session->userdata('userid');
			if($this->extract->get_user_detail($userid))
			{
				$this->data['user_detail']=$this->extract->get_user_detail($userid);
				$this->load->template('user_profile_view',$this->data);
			}
			
		}
		else
		{
			show_404();
		}
		
		
	}

	public function change_password()
	{
		if(isset($_POST['update']))
		{
			$userid=$this->session->userdata('userid');
			if($this->extract->get_old_password($userid))
			{
				$oldpass=$this->extract->get_old_password($userid);
				$newpass=$this->encrypt->sha1($this->input->post('oldpassword'));
				if($oldpass[0]->Password==$newpass)
				{
				
					$this->user_profile_model->update_user_password($userid,$this->input->post('newpassword'));
					$this->data['pagepath']="user_profile/change_password";
					$this->data['message']="Password changed successfully !";
					$this->load->template('success',$this->data);
				}
				else
				{
					$this->data['perror']="Password didn't match !";
					$this->load->template('change_password_view',$this->data);
				}
			}
		}
		else
		{
			$this->load->template('change_password_view');
		}
		
	}

	public function update_profile()
	{
		if(isset($_POST['update']))
		{
			if($this->input->post('temp_username')==$this->input->post('username'))
			{
				$userid=$this->session->userdata('userid');
				$this->user_profile_model->update_user_profile($userid);
				$this->success_page();
			}
			else
			{
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'User name', 'trim|required|xss_clean|is_unique[Users.UserName]');
				if($this->form_validation->run()==false)
				{
					$this->index();
				}
				else
				{
					$userid=$this->session->userdata('userid');
					$this->user_profile_model->update_user_profile($userid);
					$this->success_page();
				}
			}
			
			

		}
		else
		{
			show_404();
		}
	}

	public function success_page()
	{
		$this->data['message']="Username updated successfully !";
		$this->data['pagepath']="user_profile";
		$this->load->template('success',$this->data);
	}
}

/* End of file user_profile.php */
/* Location: ./application/controllers/user_profile.php */