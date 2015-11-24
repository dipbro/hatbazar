<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign extends CI_Controller {

	var $data=array();

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in')==false)
		{
			show_404();
		}
		
		$this->load->model('extract');
		$this->load->model('vegitables_model','veg');
		$this->load->model('assign_model','assign');
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$vegidlist=array();
		if($this->uri->segment(3)==true)
		{
			$this->data['placeid']=$this->uri->segment(3);
			$temp=$this->extract->get_place_name($this->uri->segment(3));
			$this->data['placename']=$temp[0]->PlaceName;

			if($this->veg->vegitables_list($this->uri->segment(3))==true)//for display list of added vegitables
			{
				$this->data['vegitables']=$this->veg->vegitables_list($this->uri->segment(3));
				$tempveglist=$this->veg->vegitables_list($this->uri->segment(3));
				foreach ($tempveglist as $value) 
				{
					$vegidlist[]=$value->VegId;
				}
			}

			if($this->veg->get_vegitablelist($vegidlist)==true)//for fill combobox
			{
				$this->data['vegitablelist']=$this->veg->get_vegitablelist($vegidlist);
			}
		}
		else
		{
			show_404();
		}
		if(isset($_POST['submit']))
		{
			$placeid=$this->input->post('placeid');
			if($this->input->post('vegitable')==0)
			{
				$this->data['errorselect']="vegitable must be selected ";
				$this->load->template('assign_view',$this->data);
			}
			else
			{
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			$this->form_validation->set_rules('price', 'Price', 'trim|required|min_length[2]|max_length[12]|xss_clean');
			if($this->form_validation->run()==false)
			{
				$this->load->template('assign_view',$this->data);
			}
			else
			{
				$this->assign->insert_data();
				$this->data['message']="Data Inserted successfully !";
				$this->data['pagepath']="assign/index/$placeid";
				$this->load->template('success',$this->data);
			}
			
			}
		}
		else
		{
			$this->load->template('assign_view',$this->data);
		}
			
	}

	public function insert()
	{
		if(!isset($_POST['submit']))
		{
			show_404();
		}
		else
		{
			
			//$this->form_validation->set_rules('vegitable', 'Vegitable', 'trim|required|min_length[2]|max_length[20]|xss_clean');
			
		}
		
	}

	public function update()//this function is for update price of vegitable
	{
		if($this->uri->segment(3)==true)
		{
			$phvid=$this->uri->segment(3);
			$this->data['phvid']=$phvid;
			$vegeditdata=$this->assign->select_price_view($phvid);
			if($vegeditdata==true)
			{
				$this->data['vegname']=$vegeditdata[0]->VegName;
				$this->data['vegprice']=$vegeditdata[0]->VegPrice;
				$this->data['placeid']=$vegeditdata[0]->PlaceId;
			}
			$this->load->template('edit_price_view',$this->data);
		}
		else
		{
			show_404();
		}
		
	}

	public function update_price()
	{
		if(isset($_POST['phvid']))
		{
			//$this->form_validation->set_rules('vegprice', 'Veg price', 'trim|required|min_length[1]|max_length[20]|xss_clean');
			$this->assign->update_veg_price($this->input->post('phvid'));
			$phvid=$this->input->post('phvid');
			$this->data['message']="Data updated successfully !";
			$this->data['pagepath']="assign/index/".$this->input->post('placeid');
			$this->load->template('success',$this->data);
		}
		else
		{
			show_404();
		}
		
	}


}

/* End of file assign.php */
/* Location: ./application/controllers/assign.php */