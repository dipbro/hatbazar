<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vegitables extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in')==false)
		{
			show_404();
		}
		$this->load->model('vegitables_model','veg');
	}

	public function index()
	{
		$data=array();
		if($this->veg->display_data())
		{
			$data['vegitables']=$this->veg->display_data();
		}
		$this->load->template('vegitables_view',$data);


	}

	public function insert()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error help-block">','</p>');
		$this->form_validation->set_rules('vegitablename', 'Vegitable name', 'trim|required|is_unique[Vegitables.VegName]|min_length[2]|max_length[40]|xss_clean');
		$this->form_validation->set_message('is_unique', 'Vegitable already exists');
		if($this->form_validation->run()==false)
		{
			$this->index();
		}
		else
		{
			if(isset($_POST['submit']))
			{
				$this->veg->insert_data();
				$data['message']="Data inserted successfully !";
				$data['pagepath']="vegitables";
				$this->load->template('success',$data);
			}
			else
			{
				echo("error not set submit");
			}
		}
	}
	public function edit()
	{
		//This if part will run when user click update button
		$data=array();
		if(isset($_POST['update']))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<p class="error help-block">','</p>');
			$this->form_validation->set_rules('vegitablename', 'Vegitable name', 'trim|required|min_length[2]|max_length[40]|xss_clean');
			if($this->form_validation->run()==false)
			{
				$data=array();
				if($this->veg->display_data())
				{
					$data['vegitables']=$this->veg->display_data();
				}
				$this->load->template('edit_vegitables_view',$data);
			}
			else
			{
				$this->veg->update_data();
				$data['message']="Update successfully !";
				$data['pagepath']='vegitables';
				$this->load->template('success',$data);
			}
		}
		//This else part run when edit form is load
		else
		{	
			if(!$this->uri->segment(3)==false)
			{
				$data['vegid']=$this->uri->segment(3);
				$vegid=$this->uri->segment(3);
				if($this->veg->get_data($vegid)==true)
				{
					$result=$this->veg->get_data($vegid);
					$data['chkstatus']=$result[0]->StatusId;
					$data['vegdata']=$result[0]->VegName;
				}
			}
			else
			{
				$data['vegdata']="";
			}

			if($this->veg->display_data())
			{
				$data['vegitables']=$this->veg->display_data();
			}
			$this->load->template('edit_vegitables_view',$data);

			
		}
		
	}

	public function delete()
	{

	}


}

/* End of file vegitables.php */
/* Location: ./application/controllers/vegitables.php */