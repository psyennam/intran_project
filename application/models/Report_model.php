<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Report_model extends CI_model
{
	// private $emp_code;
	// private $org_code;
	function __construct()
	{
		parent::__construct();
	}

	function expensereport()
	{
		return $this->db->select('*')->from('expense')
		->join('employee','expense.employee_code=employee.employee_code')
		->get()->result();
	}
	// function expense_name($code)
	// {
	// 	return $this->db->select('*')->from('expense')
	// 	->where('expense.employee_code',$code)
	// 	->join('employee','expense.employee_code=employee.employee_code')
	// 	->get()->result();
	// }
	// function expense_type($type)
	// {
	// 	return $this->db->select('*')->from('expense')
	// 	->where('type',$type)
	// 	->join('employee','expense.employee_code=employee.employee_code')
	// 	->get()->result();
	// }

	function common($type,$code,$fromdate,$todate)
	{
		$this->db->select('exp.*')->from('expense as exp');
			$this->db->join('employee','exp.employee_code=employee.employee_code');
		
		if(!empty($fromdate))
			$this->db->where('DATE(exp.date) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(exp.date) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($type))
			$this->db->where('type',$type);
		
		if(!empty($code))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('exp.employee_code',$code);
		return $this->db->get()->result();
	}

	function employee_common($role,$department,$designation,$fromdate,$todate)
	{
		$this->db->select('e1.*,r1.role,des1.designation,dep1.department')->from('employee as e1');
		$this->db->join('mapping_employee as m1','e1.employee_code=m1.employee_code');
		$this->db->join('role as r1','r1.role_code=m1.role_code');
		$this->db->join('designation as des1','des1.designation_code=m1.designation_code');
		$this->db->join('department as dep1','dep1.department_code=m1.department_code');
		
		if(!empty($fromdate))
			$this->db->where('DATE(e1.created_at) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(e1.created_at) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($role))
			$this->db->where('m1.role_code',$role);
		
		if(!empty($department))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('m1.department_code',$department);

		if(!empty($designation))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('m1.designation_code',$designation);

		return $this->db->get()->result();
	}

	function lead_common($optzone,$optcity,$fromdate,$todate)
	{
		$this->db->select('*')->from('lead as l1');
		$this->db->join('client s1','l1.supplier_code=s1.client_code');
		$this->db->join('zone as z1','z1.zone_code=l1.zone_code');
		$this->db->join('city as c1','c1.city_code=l1.city_code');
		$this->db->join('employee as e1','e1.employee_code=l1.employee_code');
		// $this->db->join('employee as e1','e1.employee_code=l1.employee');
		
		if(!empty($fromdate))
			$this->db->where('DATE(l1.created_at) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(l1.created_at) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($optzone))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('l1.zone_code',$optzone);

		if(!empty($optcity))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('l1.city_code',$optcity);

		return $this->db->get()->result();
	}

	function quotation_type($lead_code,$code,$fromdate,$todate)
	{
		$this->db->select('q.*')->from('quotation as q');
		$this->db->join('mapping_quotation as mq','q.quotation_code=mq.quotation_code');
		$this->db->join('lead as l','l.lead_code=mq.lead_code');

		if(!empty($fromdate))
			$this->db->where('DATE(q.quotation_close_date) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(q.quotation_close_date) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($lead_code))
			$this->db->where('q.lead_code',$lead_code);
		
		if(!empty($code))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('q.employee_code',$code);
		return $this->db->get()->result();
	}
	function leaddetails()
	{
		return $this->db->select('*')->get('lead')->result();
	}
	function complaint_type($lead_code,$code,$fromdate,$todate)
	{
		$this->db->select('*')->from('complaint as c');
		$this->db->join('complaint_tracking as ct','c.complaint_code=ct.complaint_code');
		if(!empty($fromdate))
			$this->db->where(['DATE(ct.created_at) >= '=>$fromdate,'ct.status'=>2]);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where(['DATE(ct.created_at) <= '=>$todate,'ct.status'=>2]);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($lead_code))
			$this->db->where('q.lead_code',$lead_code);
		
		if(!empty($code))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where(['ct.employee_code'=>$code,'ct.status'=>2]);
		return $this->db->get()->result();
	}
	function employeedetails()
	{
		return $this->db->select('*')->from('employee as e')
		->join('mapping_employee as me','e.employee_code=me.employee_code')
		->join('designation as d','d.designation_code=me.designation_code')
		->where('d.designation',"Service Technician")
		->get()->result();
	}

	function managerdetails()
	{
		return $this->db->select('*')->from('employee as e')
		->join('mapping_employee as me','e.employee_code=me.employee_code')
		->join('designation as d','d.designation_code=me.designation_code')
		->where('d.designation',"Manager")
		->get()->result();
	}

}