<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Userpanel extends CI_controller
{
	private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
		$this->data["title"] = "Login";
	}
	/*
		Logim form
	*/
	function login()
	{
		$this->load->view('admincomponents/adminlogin', $this->data);
		if($_POST)
		{
			
			$res=$this->User_model->login();
			if($res==true)
			{
			/**
				Check Function
				->In this function it will check that the user has changed he password or not 
				->if the password flag is 0 then it redirect to forgetpassword page
				->or Dasboard 
			**/	
				if($this->User_model->check())
				{
					
					redirect('Userpanel/forgetpassword');
				}
				else
				{
					redirect('Userpanel/dashboard');	
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
		$this->load->view('admincomponents/forgetpassword');
		if($_POST)
		{
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cnfpassword', 'Password Confirmation', 'required|matches[password]');
			if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admincomponents/forgetpassword');
            }
            else
            {
				$res=$this->User_model->update();
				if($res>0)
				{
					redirect('Userpanel/dashboard');				
				}
				else
				{
					redirect('Userpanel/forgetpassword');
					
				}
			}
		}
	}
	/**
		Master Admin Dasboard
	**/
	function dashboard()
	{
		if($this->session->userdata('role') !== "")
		{
			$data['header']='admincomponents/header';
			$data['nav']='admincomponents/nav';
			$data['footer']='admincomponents/footer';
			$this->load->view('admincomponents/dashboard',$data);
		}
		else{
			redirect('Userpanel/logout');
		}
	}
	/**
		Master Admin Logout
	**/
	function logout()
	{
		$this->session->sess_destroy($arr);
		redirect('Userpanel/login');
	}
	/**
		 Admin role
	**/
	function role()
	{
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/role';
		$data['roledetails']=$this->User_model->viewdata();
		$this->load->view('admincomponents/dashboard',$data);
	}
	function roleinsert()
	{
		//echo "Hi";
		if($_POST)
		{
			$insert=$this->User_model->roleinsert();
			if($insert>0)
			{
				redirect('Userpanel/role');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/**
		Role Update Form
	**/
	function updaterole()
	{
		$id=$this->input->get('id');
		$data['row']=$this->User_model->databyid($id);
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/update_role';
		$this->load->view('admincomponents/dashboard',$data);
		if($_POST)
		{
			$res=$this->User_model->roleedit($id);
			if($res>0)
			{
				redirect('Userpanel/role');
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
	function deleterole()
	{
		$id=$this->input->get('id');
		$res=$this->User_model->deleterole($id);
		if($res>0)
		{
			redirect('Userpanel/role');	
		}
		else
		{
			echo "Data is not updated";
		}
	}
	/**
		 Admin Department
	**/
	function department()
	{
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/department';
		$data['departmentdetails']=$this->User_model->viewdepartment();
		$this->load->view('admincomponents/dashboard',$data);
	}
	function departmentinsert()
	{
		if($_POST)
		{
			$insert=$this->User_model->departmentinsert();
			if($insert>0)
			{
				redirect('Userpanel/department');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/**
		Department Update Form
	**/
	function updatedepartment()
	{
		$id=$this->input->get('id');
		$data['row']=$this->User_model->departmentbyid($id);
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/update_department';
		$this->load->view('admincomponents/dashboard',$data);
		if($_POST)
		{
			$res=$this->User_model->departmentedit($id);
			if($res>0)
			{
				redirect('Userpanel/department');
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
	function deletedepartment()
	{
		$id=$this->input->get('id');
		$res=$this->User_model->deletedepartment($id);
		if($res>0)
		{
			redirect('Userpanel/department');	
		}
		else
		{
			echo "Data is not updated";
		}
	}
	/**
		 Admin Employee
	**/
	function employee()
	{
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/employee';
		$data['employeedetails']=$this->User_model->viewemployee();
		$data['empdetails']=$this->User_model->viewdepartment();
		$data['designatiodetails']=$this->User_model->viewdesignation();
		$data['roledetails']=$this->User_model->viewdata();
		$this->load->view('admincomponents/dashboard',$data);
	}
	function employeeinsert()
	{
		
		
		if($_POST)
		{

			$insert=$this->User_model->employeeinsert();
			if($insert>0)
			{
				redirect('Userpanel/employee');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}


	function deleteemployee()
	{
		$id=$this->input->get('employee_code');
		$res=$this->User_model->deleteemployee($id);
		if($res>0)
		{
			redirect('Userpanel/employee');	
		}
		else
		{
			echo "Data is not updated";
		}
	}

	function updateemployee()
	{
		$id=$this->input->get('employee_code');
		$data['row']=$this->User_model->employeebyid($id);
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/update_employee';
		$this->load->view('admincomponents/dashboard',$data);
		if($_POST)
		{
			$res=$this->User_model->employeeedit($id);
			if($res>0)
			{
				redirect('Userpanel/employee');
			}
			else
			{
				echo "Data not updated";
			}
		}
	}
	/**
		 Admin Designation
	**/
	function designation()
	{

		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/designation';
		$data['depts']=$this->User_model->viewdepartment();
		$data['designationdetails']=$this->User_model->viewdesignation();
		$this->load->view('admincomponents/dashboard',$data);
	}
	function designationinsert()
	{
		if($_POST)
		{
			$insert=$this->User_model->designationinsert();
			if($insert>0)
			{
				redirect('Userpanel/designation');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/**
		Designation Update Form
	**/
	function updatedesignation()
	{
		$id=$this->input->get('id');
		$data['row']=$this->User_model->designationbyid($id);
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/update_designation';
		$this->load->view('admincomponents/dashboard',$data);
		if($_POST)
		{
			$res=$this->User_model->designationedit($id);
			if($res>0)
			{
				redirect('Userpanel/designation');
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
	function deletedesignation()
	{
		$id=$this->input->get('id');
		$res=$this->User_model->deletedesignation($id);
		if($res>0)
		{
			redirect('Userpanel/designation');	
		}
		else
		{
			echo "Data is not updated";
		}
	}


	function country()
	{
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='admincomponents/country';
		$data['countrydetails']=$this->User_model->viewcountry();
		$this->load->view('admincomponents/dashboard',$data);
	}

	function countryinsert()
	{
		if($_POST)
		{
			$insert=$this->User_model->countryinsert();
			if($insert>0)
			{
				redirect('Userpanel/country');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
}
?>