<?php
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
	}
	/*
		Logim form
	*/
	function login()
	{
		$this->load->view('login');
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
		$data['header']='components/header';
		$data['nav']='components/nav';
		$data['footer']='components/footer';
		$data['orgdetails']=$this->Master_model->viewdata();	
		if($data['orgdetails']>0)
		{
			$data['details']='details';
		}
		$this->load->view('layout',$data);

	}
	/**
		Organisation Form
	**/
	function orgform()
	{
		$data['header']='components/header';
		$data['nav']='components/nav';
		$data['footer']='components/footer';
		$data['content']='Organisationform';
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
		$this->load->view('layout',$data);
	}
	/**
		Orgnisation Update Form
	**/
	function updatedata()
	{
		$id=$this->input->get('org_code');
		$data['row']=$this->Master_model->databyid($id);
		$data['header']='components/header';
		$data['nav']='components/nav';
		$data['footer']='components/footer';
		$data['content']='updateform';
		$this->load->view('layout',$data);
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