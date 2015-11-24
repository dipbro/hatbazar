<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	var $data=array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}

	public function index()
	{
		$this->load->view('login_view',$this->data);

	}

	public function checklogin()
	{
		if(isset($_POST['submit']))
		{
			$this->load->model('login_model');
			if($this->login_model->check_user()==true)
			{
				redirect('home','refresh');
			}
			else
			{
				$this->data['message']="user name and password doesn't match !";
				$this->index();
			}
		}
		else
		{
			$this->index();
		}
	}
	public function logout()
	{
		$data = array('username' => '', 'logintypeid' => '','logged_in'=>'');
		$this->session->unset_userdata($data);
		redirect('login','refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */