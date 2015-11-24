<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vegitables_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function insert_data()
	{
		$vegname=$this->input->post('vegitablename');
		$data = array('VegName' =>$vegname,
			'StatusId'=>'1'
		 );
		$this->db->insert('vegitables',$data);
	}
	public function display_data()
	{
		$this->db->from('vegitables');
		$this->db->order_by('VegName','asc');
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
	public function get_data($vegid)
	{
		$this->db->from('vegitables');
		$this->db->where('VegId',$vegid);
		$qry=$this->db->get();
		if($qry->num_rows()>0)
		{
			return $qry->result();
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
			'VegName' =>$this->input->post('vegitablename') ,
			 'StatusId'=>$StatusId);
		$this->db->where('VegId',$this->input->post('vegid'));
		$this->db->update('Vegitables', $data);
	}

	public function vegitables_list($placeid)
	{
		$this->db->from('PHVP_View');
		$this->db->where('PlaceId',$placeid);
		$this->db->order_by('VegName', 'asc');
		$this->db->where('StatusId',1);
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

	public function get_vegitablelist($veglist)
	{
		$this->db->from('Vegitables');
		if(count($veglist)>0)
		{
			$this->db->where_not_in('VegId',$veglist);
		}
		$this->db->where('StatusId',1);
		$this->db->order_by('VegName', 'asc');
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

/* End of file vegitables_model.php */
/* Location: ./application/models/vegitables_model.php */