<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Complaint_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function viewcomplaint()
	{
		return $this->db->select('*')->get('complient')->result();
	}
	function viewtechnician()
	{

		return $this->db->select('employee.employee_code,employee')
		->from('employee')
		->join('mapping_employee','mapping_employee.employee_code=employee.employee_code')
		->join('role','mapping_employee.role_code=role.role_code')
		->where('role.role',"employee")->get()->result();
	}
}
?>