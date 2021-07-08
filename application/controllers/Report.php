<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Report extends CI_controller
{
	private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('Report_model','Admin_model'));
		// $this->data["title"] = "Login";
		// if(!$this->session->userdata('is_login'))
		// {
		// 	redirect('User/login');
		// }

		// if($this->session->userdata('role')=="Admin")
		// {
		// }
		// else{
		// 	redirect('User/login');
		// }
	}

	function expensereport()
	{
		$data['page']='admin/pages/view/expensereport';
		$data['employee']=$this->Admin_model->employee_manager();
		$data['expensedetails']=$this->Report_model->expensereport();
		$this->load->view('admin/components/layout',$data);
	}

	function expense_type()
	{
		$emp_name = $this->input->post('empname');
		$type = $this->input->post('type');
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		
		$data=$this->Report_model->common($type,$emp_name,$fromdate,$todate);
		$i=1;
		foreach ($data as $key) 
		{
			echo "<tr>";
			echo "<td>".$i++."</td>";
			echo "<td>"?><a href="<?php echo base_url('Test/exp/'.$key->id);?>"><button type="button" class="btn btn-primary">PDF</button></a><?php echo "</td>";
			echo "<td>".__date_format($key->date,'ddmmyyyy')."</td>";
			echo "<td>".emp_name($key->employee_code)."</td>";
			echo "<td>".$key->type."</td>";
			echo "<td>".$key->amount."</td>";
			echo "</tr>";
		}
	}
	function employeereport()
	{
		$data['page']='admin/pages/view/employeereport';
		$data['department']=$this->Admin_model->viewdepartment();
		$data['role']=$this->Admin_model->viewdata();
		$data['designation']=$this->Admin_model->viewdesignation();
		$this->load->view('admin/components/layout',$data);
	}

	function employee_type()
	{
		$role= $this->input->post('role');
		$department = $this->input->post('department');
		$designation= $this->input->post('designation');
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		
		$data=$this->Report_model->employee_common($role,$department,$designation,$fromdate,$todate);
		foreach ($data as $key) 
		{
			echo "<tr>";
			echo "<td>".$key->id."</td>";
			echo "<td>".$key->employee."</td>";
			echo "<td>".$key->department."</td>";
			echo "<td>".$key->role."</td>";
			echo "<td>".$key->designation."</td>";
			echo "<td>".$key->contact."</td>";
			echo "<td>".__date_format($key->created_at,'ddmmyyyy')."</td>";
			echo "</tr>";
		}
	}

	function quotationreport()
	{
		$data['page']='admin/pages/view/quotationreport';
		$data['lead']=$this->Report_model->leaddetails();
		$data['employee']=$this->Report_model->managerdetails();
		$data['expensedetails']=$this->Report_model->expensereport();
		$this->load->view('admin/components/layout',$data);
	}

	function quotation_type()
	{
		$emp_name = $this->input->post('empname');
		$lead_code = $this->input->post('lead_code');
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		
		$data=$this->Report_model->quotation_type($lead_code,$emp_name,$fromdate,$todate);
		$i=1;
		foreach ($data as $key) 
		{
			echo "<tr>";
			echo "<td>".$i++."</td>";
			echo "<td>"?><a href="<?php echo base_url('Test/close/'.$key->quotation_code);?>"><button type="button" class="btn btn-primary">PDF</button></a><?php echo "</td>";
			echo "<td>".$key->	_number."</td>";
			echo "<td>".client_name($key->lead_code)."</td>";
			echo "<td>". __date_format($key->quotation_close_date,'ddmmyyyy')."</td>";
			echo "</tr>";
		}
	}

	function invoicereport()
	{
		$data['page']='admin/pages/view/invoicereport';
		$data['employee']=$this->Admin_model->employee_manager();
		$data['expensedetails']=$this->Report_model->expensereport();
		$this->load->view('admin/components/layout',$data);
	}

	/*function invoice_type()
	{
		$emp_name = $this->input->post('empname');
		$type = $this->input->post('type');
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		
		$data=$this->Report_model->common($type,$emp_name,$fromdate,$todate);
		foreach ($data as $key) 
		{
			echo "<tr>";
			echo "<td>".$key->id."</td>";
			echo "<td>"?><a href="<?php echo base_url('Test/exp/'.$key->id);?>"><button type="button" class="btn btn-primary">PDF</button></a><?php echo "</td>";
			echo "<td>".__date_format($key->date,'ddmmyyyy')."</td>";
			echo "<td>".emp_name($key->employee_code)."</td>";
			echo "<td>".$key->type."</td>";
			echo "<td>".$key->amount."</td>";
			echo "</tr>";
		}
	}*/

	function leadreport()
	{
		$data['page']='admin/pages/view/leadreport';
		$data['subzone']=$this->Admin_model->subviewzone();
		// $data['expensedetails']=$this->Report_model->subviewzone();
		$this->load->view('admin/components/layout',$data);
	}

	function lead_type()
	{
		$optzone = $this->input->post('optzone');
		$optcity = $this->input->post('optcity');
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		
		$data=$this->Report_model->lead_common($optzone,$optcity,$fromdate,$todate);
		$i=1;
		foreach ($data as $key) 
		{
			echo "<tr>";
			echo "<td>".$i++."</td>";
			echo "<td>".$key->company_name."</td>";
			echo "<td>".$key->client."</td>";
			echo "<td>".$key->employee."</td>";
			echo "<td>".$key->zone."</td>";
			echo "<td>".$key->city."</td>";
			echo "<td>".__date_format($key->created_at,'ddmmyyyy')."</td>";
			echo "</tr>";
		}
	}
	function complaintreport()
	{
		$data['page']='admin/pages/view/complaintreport';
		$data['employee']=$this->Report_model->employeedetails();
		// print_r($data['employee']);
		//$data['expensedetails']=$this->Report_model->expensereport();
		$this->load->view('admin/components/layout',$data);
	}

	function complaint_type()
	{
		$emp_code = $this->input->post('empname');
		$lead_code = $this->input->post('lead_code');
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		
		$data=$this->Report_model->complaint_type($lead_code,$emp_code,$fromdate,$todate);
		$i=1;
		foreach ($data as $key) 
		{
			echo "<tr>";
			echo "<td>".$i++."</td>";
			echo "<td>".emp_name($key->assigned_by)."</td>";
			echo "<td>".$key->remark."</td>";
			echo "<td>". __date_format($key->created_at,'ddmmyyyy')."</td>";
			echo "<td>".complaint_status($key->status)."</td>";
			echo "</tr>";
		}
	}

}