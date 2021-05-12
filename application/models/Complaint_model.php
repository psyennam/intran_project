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
		return $this->db->select('*')->get('complaint')->result();
	}
	function viewtechnician()
	{

		return $this->db->select('employee.employee_code,employee')
		->from('employee')
		->join('mapping_employee','mapping_employee.employee_code=employee.employee_code')
		->join('designation','mapping_employee.designation_code=designation.designation_code')
		->where('designation.designation',"Service Technician")->get()->result();
	}



	function complaint_form_insert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();

		$org=$this->db->select('org_code')->where('invoice_number',$this->input->post('invoice'))->get('warranty')->row();

		$data=[
				//'id'=>$this->input->post('NULL'),
				'complaint_code'=>$randomid,
				'customer_code'=>$this->input->post('clientnumber'),
				'invoice_number'=>$this->input->post('invoice'),
				'product_code'=>$this->input->post('product'),
				'org_code'=>$org->org_code,
				'email'=>$this->input->post('email'),
				'mobile_no'=>$this->input->post('mobilenumber'),
				'subject'=>$this->input->post('subject'),
				'description'=>$this->input->post('discription'),
				// 'branch_code'=>$this->input->post('CountryName'),
				'ip_address'=>$ip
			];
		$this->db->trans_start();
		if($this->db->insert('complaint',$data)) 
		{
			# code...
			$this->db->trans_complete();
			return true;
		}
		else
		{
			$this->db->trans_rollback();
			return false;
		}
	}
	function insert_complaint_tracking()
	{
		$ip=$this->input->ip_address();
		$data=$this->db->select('description')->where('complaint_code',$this->input->post('complaint_code'))->get('complaint')->row();
		$data=[
		'complaint_code'=>$this->input->post('complaint_code'),
		'employee_code'=>$this->input->post('warrantytype_combo'),
		'remark'=>$data->description,
		'ip_address'=>$ip
		];
		$this->db->trans_start();
		if($this->db->insert('complaint_tracking',$data)) 
		{
			$this->db->trans_complete();
			return true;
		}
		else
		{
			$this->db->trans_rollback();
			return false;
		}

	}
}
?>