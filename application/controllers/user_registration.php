<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registration extends CI_Controller {
	var $data=array();
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in')==false)
		{
			show_404();
			return;

		}
		if($this->session->userdata('LoginTypeId')=="1")
		{
			$this->data['admin']="admin";
		}
		$this->load->library('encrypt');
		$this->load->model('user_registration_model','register');
		
		//Do your magic here
	}

	public function index()
	{
		if($this->session->userdata('logintypeid')==2)
		{
			$this->data['message']="You have not sufficient previlage to register new user !";
			$this->data['pagepath']="home";
			$this->load->template('auth_error',$this->data);
			return;
		}
		$this->users_list();
		$this->load->template('user_registration_view',$this->data);
	}

	public function registration()
	{
		if($this->session->userdata('logintypeid')==2)
		{
			$this->data['message']="You have not sufficient previlage to register new user !";
			$this->data['pagepath']="home";
			$this->load->template('auth_error',$this->data);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('fullname', 'FullName', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->register->register_user();
			$this->data['pagepath']="user_registration";
			$this->data['message']="user registered successfully !";
			$this->load->template('success',$this->data);
		}
	}

	public function users_list()
	{
		$this->data['users_list']=$this->register->display_users();

	}

	public function edit()
	{
		$this->load->template('user_edit_view',$this->data);
	}

	public function delete()
	{
		if(isset($_POST['ok']))
		{
			if($this->input->post('userid'))
			{
				$this->register->delete_user($this->input->post('userid'));
				$this->data['message']="delete successfully!";
				$this->data['pagepath']="user_registration";
				$this->load->template('success',$this->data);
			}
		}
		else if(isset($_POST['cancel']))
		{
			redirect('user_registration','refresh');
		}
		else
		{
			if($this->uri->segment(3))
			{
				$this->data['userid']=$this->uri->segment(3);
			}
			else
			{
				show_404();
			}
			$this->load->template('confirm_form',$this->data);
		}
	}

}

/* End of file user_registration.php */
/* Location: ./application/controllers/user_registration.php */