<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class User extends CI_controller
{
	// private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('Admin_model','Admin_model'));
		$this->data["title"] = "Login";
		// if(!$this->session->userdata('is_login'))
		// {
		// 	redirect('Admin/login');
		// }
	}
	/*
		Logim form
	*/
	function login()
	{
		$this->load->view('admin/adminlogin',$this->data);
		if($_POST)
		{
			
			$res=$this->Admin_model->login();
			if($res==true)
			{
			/**
				Check Function
				->In this function it will check that the user has changed he password or not 
				->if the password flag is 0 then it redirect to forgetpassword page
				->or Dasboard 
			**/	
				if($this->Admin_model->check())
				{
					
					redirect('User/forgetpassword');
				}
				else
				{

					redirect('User/dashboard');	
				}
			}
			else
			{
				//return false;
				echo "user not valid";
			}
		}
	}	
	/*
		Foreget Password
	*/
	function forgetpassword()
	{
		$this->load->view('admin/forgetpassword');
		if($_POST)
		{
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cnfpassword', 'Password Confirmation', 'required|matches[password]');
			if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admin/forgetpassword');
            }
            else
            {
				$res=$this->Admin_model->update();
				if($res>0)
				{
						redirect('User/dashboard');	
				}
				else
				{
					redirect('User/forgetpassword');
					
				}
			}
		}
	}
	/**
		Master Admin Dasboard
	**/
	function dashboard()
	{
		if($this->session->userdata('role'))
		{
			$data['page']='';
			$this->load->view('admin/components/layout',$data);
		}
		else{
			redirect('User/logout');
		}
	}

	function logout()
	{
		$this->session->sess_destroy($arr);
		redirect('User/login');
	}
}