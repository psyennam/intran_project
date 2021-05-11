<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('Complaint_model');
		// if(!$this->session->userdata('is_login'))
		// {
		// 	redirect('User/login');
		// }
	}

	function viewcomplaint()
	{
		$data['complaint']=$this->Complaint_model->viewcomplaint();
		$data['technician']=$this->Complaint_model->viewtechnician();
		$data['page']='employee/pages/view/complaint';
		$this->load->view('admin/components/layout',$data);
	}
}


?>