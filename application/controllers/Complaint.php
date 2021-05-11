<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('Admin_model','Admin_model'));
		// if(!$this->session->userdata('is_login'))
		// {
		// 	redirect('User/login');
		// }
	}

	function index()
	{
		echo "Hello";
	}
}


?>