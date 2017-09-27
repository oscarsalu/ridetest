<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bookrid_model extends CI_Model {
	//start of CONSTRUCT
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	//Retrieve all records
	public function getBookrid()
	{
		$results = $this->db->select('bookrid.*,users.first_name ,users.last_name, getride.origin, getride.destination, getride.vehiclename')
                    ->from('bookrid')
                    ->join('users', 'users.id = bookrid.bookerid')
                    ->join('getride', 'getride.id = bookrid.getrideid')
                    ->get()
                    ->result();

        return $results;
	}
	//insert data to table
	public function create_bookrid($data)
	{
		if($this->db->insert('bookrid', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//return a particular row
	public function get_bookrid($id)
	{
		return $this->db->get_where('bookrid', array('id'=>$id));
	}
	//update a particular record
	public function update_bookrid($id, $data)
	{
		$this->db->where('id', $id);
		if ($this->db->update('bookrid', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function updateremaining($id, $data)
	{
		$this->db->where('id', $id);
		if ($this->db->update('getride', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	//delete a record
	public function delete_bookrid($id='')
	{
		$this->db->where('id', $id);
		if ($this->db->delete('bookrid'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
