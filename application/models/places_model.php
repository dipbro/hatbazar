<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//Do your magic here
	}

	public function insert_data()
	{
		$data = array(
			'PlaceName' =>$this->input->post('placename') ,
			'StatusId'=>1 );
		$this->db->insert('Places',$data);
	}
	public function display_data()
	{
		$this->db->from('places');
		$this->db->order_by('PlaceName','asc');
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

	public function get_data($placeid)
	{
		$this->db->from('places');
		$this->db->where('placeId',$placeid);
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

	public function update_data()
	{
		$StatusId;
		if($this->input->post('statuscheck')==true)
		{
			$StatusId=1;
		}
		else
		{
			$StatusId=2;
		}
		$data = array(
			'PlaceName' =>$this->input->post('placename') ,
			 'StatusId'=>$StatusId);
		$this->db->where('PlaceId',$this->input->post('placeid'));
		$this->db->update('Places', $data);
	}

	public function phvp($placeid)
	{
		$this->db->from('PHVP_View');
		$this->db->where('placeId',$placeid);
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

}

/* End of file places_model.php */
/* Location: ./application/models/places_model.php */