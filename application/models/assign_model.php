<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_data()
	{
		$data=array('VegPrice'=>$this->input->post('price'),
			'PlaceId'=>$this->input->post('placeid'),
			'VegId'=>$this->input->post('vegitable'),
			'StatusId'=>1);
		$this->db->insert('PlacesHasVegPrice',$data);
	}

	public function select_price_view($phvid)
	{
		$this->db->from('PHVP_View');
		$this->db->where('PHVID', $phvid);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function update_veg_price($phvid)
	{
		$data=array('VegPrice'=>$this->input->post('vegprice'));
		$this->db->where('PHVID', $phvid);
		$this->db->update('PlacesHasVegPrice', $data); 
		
	}

}

/* End of file assign_model.php */
/* Location: ./application/models/assign_model.php */