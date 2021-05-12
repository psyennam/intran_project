<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('complaint_model');
		// if(!$this->session->userdata('is_login'))
		// {
		// 	redirect('User/login');
		// }
	}

	function complaint_form()
	{
		$this->load->view('employee/pages/view/complaint_form');
		if($_POST)
		{
		$res=$this->complaint_model->complaint_form_insert();
		if($res==true)
		{
			redirect('Complaint/viewcomplaint');
		}
		}
	}

	function viewcomplaint()
	{
		$data['complaint']=$this->complaint_model->viewcomplaint();
		$data['technician']=$this->complaint_model->viewtechnician();
		$data['page']='employee/pages/view/complaint';
		$this->load->view('admin/components/layout',$data);
		// print_r($data['technician']);
	}
	function insert_complaint_tracking()
	{
		if($_POST)
		{
			$res=$this->complaint_model->insert_complaint_tracking();
			if($res>0)
			{
				redirect('Complaint/viewcomplaint');
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	function complaint_tracking()
	{
		$data['complaint']=$this->complaint_model->view_tracking();
		// $data['technician']=$this->complaint_model->viewtechnician();
		// $data['page']='employee/pages/view/complaint';
		$data['page']='employee/pages/view/complaint_tracking';
		$this->load->view('admin/components/layout',$data);
		// print_r($data['technician']);
	}

	function accept_complaint()
	{
		if($_POST)
		{
			$res=$this->complaint_model->accept_complaint();
			if($res>0)
			{
				redirect('Complaint/complaint_tracking');
			}
			else
			{
				echo "Data is not inserted";
			}	
		}
	}
	
}


?>