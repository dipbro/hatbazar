<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->databse();
	}	

	

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */