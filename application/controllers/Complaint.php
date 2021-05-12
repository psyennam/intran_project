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
	}

	function viewcomplaint()
	{
		$data['complaint']=$this->complaint_model->viewcomplaint();
		$data['technician']=$this->complaint_model->viewtechnician();
		$data['page']='employee/pages/view/complaint';
		$this->load->view('admin/components/layout',$data);
	}
}


?>