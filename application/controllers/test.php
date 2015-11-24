<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->library('encrypt');
		$this->load->library('parser');
		$data=array('title'=>'first parser engine',
			'name'=>'hello im from parser engine');
		$key="im dipesh";
		$data['key']=$this->encrypt->sha1($key);
		$this->parser->parse('user',$data);

		//$this->load->view('user');
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */