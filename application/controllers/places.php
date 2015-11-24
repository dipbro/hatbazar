<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends CI_Controller {
	var $data = array();
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')==false)
		{
			show_404();
		}
		$this->load->model('places_model','place');
		$this->data['name']="dipesh pokhrel from constructor";
	}
	public function index()
	{
		if($this->place->display_data())
		{
			$this->data['places']=$this->place->display_data();
		}
		$this->load->template('places_view',$this->data);
	}
	//This function is used for insert data to database from places_view page.
	public function insert()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error help-block">','</p>');
		$this->form_validation->set_rules('placename', 'place name', 'trim|required|is_unique[Places.PlaceName]|min_length[2]|max_length[40]|xss_clean');
		$this->form_validation->set_message('is_unique', 'Given place is already exists !');
		if(isset($_POST['submit']))
		{
			if($this->form_validation->run()==false)
			{
			
				$this->index();
			}
			else
			{
				$this->place->insert_data();
				$this->data['message']="Place inserted successully !";
				$this->data['pagepath']="places";
				$this->load->template('success',$this->data);
			}
		}
		else
		{
			$this->index();
		}
		//$this->load->template('places_view',$this->data);
	}
	//This function is used for update data to database from places_view page.
	public function update()
	{
		if(isset($_POST['update']))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<p class="error help-block">','</p>');
			$this->form_validation->set_rules('placename', 'Place name', 'trim|required|min_length[2]|max_length[40]|xss_clean');
			if($this->form_validation->run()==false)
			{
				$this->load->template('edit_places_view',$this->data);
			}
			else
			{
				$this->place->update_data();
				$this->data['message']="Update successfully !";
				$this->data['pagepath']='places';
				$this->load->template('success',$this->data);
			}
		}
		//This else part run when edit form is load
		else
		{	
			if(!$this->uri->segment(3)==false)
			{
				$this->data['placeid']=$this->uri->segment(3);
				$placeid=$this->uri->segment(3);
				if($this->place->get_data($placeid)==true)
				{
					$result=$this->place->get_data($placeid);
					$this->data['chkstatus']=$result[0]->StatusId;
					$this->data['place']=$result[0]->PlaceName;
				}
			}
			else
			{
				$this->data['place']="";
			}

			$this->load->template('edit_places_view',$this->data);

			
		}
		
	}
	//This function is used for delete data to database from places_view page.
	public function delete()
	{

	}

}

/* End of file places.php */
/* Location: ./application/controllers/places.php */