<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Employee extends CI_controller
{
	private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('Employee_model');
		$this->data["title"] = "Login";
	}
}