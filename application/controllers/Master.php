<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Master extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('Master_model');
		$this->data["title"]="Login";	
	}
	/*
		Logim form
	*/
	function login()
	{
		$this->load->view('master/pages/login',$this->data);
		if($_POST)
		{
			$username=$this->input->post('email');
			$password=$this->input->post('password');

			if($username=="admin" && $password=="admin")
			{
				redirect('Master/dashboard');
			}
			else
			{
				echo "Username and password is incorrect";
			}
		}
	}
	/**
		Master Admin Dasboard
	**/
	function dashboard()
	{
		$data['orgdetails']=$this->Master_model->viewdata();	
		if($data['orgdetails']>0)
		{
			$data['details']='master/pages/details';
		}
		$this->load->view('master/pages/layout',$data);

	}
	/**
		Organisation Form
	**/
	function orgform()
	{
		$data['content']='master/pages/Organisationform';
		if($_POST)
		{
			$res=$this->Master_model->registrationform();
			if($res>0)
			{
				redirect('Master/dashboard');
			}
			else
			{
				echo "Data is not inserted";
			}
		}
		$this->load->view('master/pages/layout',$data);
	}
	/**
		Orgnisation Update Form
	**/
	function updatedata()
	{
		$id=$this->input->get('org_code');
		$data['row']=$this->Master_model->databyid($id);
		$data['content']='master/pages/updateform';
		$this->load->view('master/pages/layout',$data);
		if($_POST)
		{
			$res=$this->Master_model->edit($id);
			if($res>0)
			{
				redirect('Master/dashboard');
			}
			else
			{
				echo "Data not updated";
			}
		}
	}
	/**
		Change the active status to termiante
	**/
	function deletedata()
	{
		$id=$this->input->get('org_code');
		$res=$this->Master_model->deletedata($id);
		if($res>0)
		{
			redirect('Master/dashboard');	
		}
		else
		{
			echo "Data is not updated";
		}
	}
}
?>