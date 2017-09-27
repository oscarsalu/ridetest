<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Getride_model extends CI_Model {
	//start of CONSTRUCT
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	//Retrieve all records
	public function getGetride()
	{
		$results = $this->db->select('getride.*,users.first_name ,users.last_name')
                    ->from('getride')
                    ->join('users', 'users.id = getride.driverid')
                    ->where('getride.time >= NOW()')
                    ->get()
                    ->result();

        return $results;
	}
	//insert data to table
	public function create_getride($data)
	{
		if($this->db->insert('getride', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//return a particular row
	public function get_getride($id)
	{
		return $this->db->get_where('getride', array('id'=>$id));
	}
	//update a particular record
	public function update_getride($id, $data)
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
	public function delete_getride($id='')
	{
		$this->db->where('id', $id);
		if ($this->db->delete('getride'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
