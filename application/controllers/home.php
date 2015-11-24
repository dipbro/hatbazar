<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $data=array();
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in')==false)
		{
			show_404();
		}
	}
	public function index()
	{
		$tempplace=array();
		$this->load->model('places_model','place');
		if($this->place->display_data()==true)
		{
			$temp=$this->place->display_data();
			$this->data['places']=$temp;
			foreach ($temp as $value) {
				$temp2=$value->PlaceId;
				if($this->place->phvp($temp2)==true)
				{
					$tempplace['placeid-'.$value->PlaceId]=$this->place->phvp($temp2);
				}
				
			}
			$this->data['place']=$tempplace;

		}
		$this->load->template('home_view',$this->data);	
	}

	public function check()
	{
		

		
	}


}

/* End of file home */
/* Location: ./application/controllers/home */