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
		return $this->db->select('*')->order_by('status')->get('complaint')->result();
	}
	function viewtechnician()
	{

		return $this->db->select('employee.employee_code,employee')
		->from('employee')
		->join('mapping_employee','mapping_employee.employee_code=employee.employee_code')
		->join('designation','mapping_employee.designation_code=designation.designation_code')
		->where('designation.designation',"Chief Technician")->get()->result();
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
		'assigned_by'=>$this->session->userdata('emp_code'),
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
	function view_tracking()
	{
		return $this->db->select('*')->where(['complaint_tracking.employee_code'=>$this->session->userdata('emp_code'),'complaint_tracking.status'=>0])->join('complaint','complaint.complaint_code=complaint_tracking.complaint_code')->join('lead','complaint.customer_code=lead.lead_code')->get('complaint_tracking')->result();
		// return $this->db->select('*')->from('complaint_tracking')->get()->result();
	}

	function accept_complaint()
	{
		$ip=$this->input->ip_address();
		$data=$this->db->select('*')->where('complaint_code',$this->input->post('complaint_code'))->get('complaint_tracking')->row();
		$comp_tr=[
		'complaint_code'=>$this->input->post('complaint_code'),
		'employee_code'=>$data->employee_code,
		'assigned_by'=>$data->assigned_by,
		'remark'=>$this->input->post('remark'),
		'ip_address'=>$ip,
		'status'=>2
		];
		$this->db->trans_start();
		if($this->db->insert('complaint_tracking',$comp_tr)) 
		{
			$comp=[
				'status'=>1
			];
			if($this->db->where('complaint_code',$data->complaint_code)->update('complaint',$comp))
			{
				if($this->db->where(['complaint_code'=>$data->complaint_code,'status'=>0])->update('complaint_tracking',$comp))
				{
					$this->db->trans_complete();
					return true;
				}
				else{
					$this->db->trans_rollback();
					return false;
				}
			}
			else{
				$this->db->trans_rollback();
				return false;
			}
		}
		else
		{
			$this->db->trans_rollback();
			return false;
		}

	}
	function close_tracking()
	{
		return $this->db->select('*')->from('complaint_tracking')->where('status',2)->get()->result();
	}
}
?>