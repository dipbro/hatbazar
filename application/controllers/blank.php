<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	public function __construct()
	{
		//This is constructor which is call by this class when its object initialized...
		parent::__construct();
	}

	public function index()
	{
		//This is view which is call
		$this->load->template('blank_view');
	}

}

/* End of file blank.php */
/* Location: ./application/controllers/blank.php */