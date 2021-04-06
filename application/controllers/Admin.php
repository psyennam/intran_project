<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Admin extends CI_controller
{
	private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('Admin_model');
		$this->data["title"] = "Login";
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
					
					redirect('Admin/forgetpassword');
				}
				else
				{
					redirect('Admin/dashboard');	
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
					redirect('Admin/components/layout');				
				}
				else
				{
					redirect('Admin/forgetpassword');
					
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
			redirect('Admin/logout');
		}
	}
	/**
		Master Admin Logout
	**/
	function logout()
	{
		$this->session->sess_destroy($arr);
		redirect('Admin/login');
	}
	/**
		 Admin role
	**/
	function role()
	{
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/role';
		$data['roledetails']=$this->Admin_model->viewdata();
		$this->load->view('admin/components/layout',$data);
	}
	function roleinsert()
	{
		//echo "Hi";
		if($_POST)
		{
			$insert=$this->Admin_model->roleinsert();
			if($insert>0)
			{
				redirect('Admin/role');		
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
		$data['row']=$this->Admin_model->databyid($id);
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/update_role';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
		{
			$res=$this->Admin_model->roleedit($id);
			if($res>0)
			{
				redirect('Admin/role');
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
		$res=$this->Admin_model->deleterole($id);
		if($res>0)
		{
			redirect('Admin/role');	
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
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/department';
		$data['departmentdetails']=$this->Admin_model->viewdepartment();
		$this->load->view('admin/components/layout',$data);
	}
	function departmentinsert()
	{
		if($_POST)
		{
			$insert=$this->Admin_model->departmentinsert();
			if($insert>0)
			{
				redirect('Admin/department');		
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
		$data['row']=$this->Admin_model->departmentbyid($id);
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/update_department';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
		{
			$res=$this->Admin_model->departmentedit($id);
			if($res>0)
			{
				redirect('Admin/department');
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
		$res=$this->Admin_model->deletedepartment($id);
		if($res>0)
		{
			redirect('Admin/department');	
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
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/employee';
		$data['employeedetails']=$this->Admin_model->viewemployee();
		$data['empdetails']=$this->Admin_model->viewdepartment();
		$data['designatiodetails']=$this->Admin_model->viewdesignation();
		$data['roledetails']=$this->Admin_model->viewdata();
		$this->load->view('admin/components/layout',$data);
	}
	function employeeinsert()
	{
		
		
		if($_POST)
		{

			$insert=$this->Admin_model->employeeinsert();
			if($insert>0)
			{
				redirect('Admin/employee');		
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
		$res=$this->Admin_model->deleteemployee($id);
		if($res>0)
		{
			redirect('Admin/employee');	
		}
		else
		{
			echo "Data is not updated";
		}
	}

	function updateemployee()
	{
		$id=$this->input->get('employee_code');
		$data['row']=$this->Admin_model->employeebyid($id);
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/update_employee';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
		{
			$res=$this->Admin_model->employeeedit($id);
			if($res>0)
			{
				redirect('Admin/employee');
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

		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/designation';
		$data['depts']=$this->Admin_model->viewdepartment();
		$data['designationdetails']=$this->Admin_model->viewdesignation();
		$this->load->view('admin/components/layout',$data);
	}
	function designationinsert()
	{
		if($_POST)
		{
			$insert=$this->Admin_model->designationinsert();
			if($insert>0)
			{
				redirect('Admin/designation');		
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
		$data['row']=$this->Admin_model->designationbyid($id);
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/update_designation';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
		{
			$res=$this->Admin_model->designationedit($id);
			if($res>0)
			{
				redirect('Admin/designation');
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
		$res=$this->Admin_model->deletedesignation($id);
		if($res>0)
		{
			redirect('Admin/designation');	
		}
		else
		{
			echo "Data is not updated";
		}
	}
	/*
		Country View
	*/
	function country()
	{
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/country';
		$data['countrydetails']=$this->Admin_model->viewcountry();
		$this->load->view('admin/components/layout',$data);
	}
	/*
		Country Insert
	*/
	function countryinsert()
	{
		if($_POST)
		{
			$insert=$this->Admin_model->countryinsert();
			if($insert>0)
			{
				redirect('Admin/country');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/*
		State View
	*/
	function state()
	{
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/state';
		$data['countrydetails']=$this->Admin_model->viewcountry();
		$data['statedetails']=$this->Admin_model->viewstate();
		$this->load->view('admin/components/layout',$data);
	}
	/*
		State Insert
	*/
	function stateinsert()
	{
		if($_POST)
		{
			$insert=$this->Admin_model->stateinsert();
			if($insert>0)
			{
				redirect('Admin/state');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/*
		City View
	*/
	function city()
	{
		$data['id']=$this->input->get('citycode');
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/city';
		$data['countrydetails']=$this->Admin_model->viewcountry();
		$data['statedetails']=$this->Admin_model->viewstate();
		$data['citydetails']=$this->Admin_model->viewcity();
		$this->load->view('admin/components/layout',$data);
	}
	/*
		City Insert
	*/
	function cityinsert()
	{
		if($_POST)
		{
			$insert=$this->Admin_model->cityinsert();
			if($insert>0)
			{
				redirect('Admin/city');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/*
		Pincode View
	*/
	function pincode()
	{
		$data['header']='admin/header';
		$data['nav']='admin/nav';
		$data['footer']='admin/footer';
		$data['content']='admin/pincode';
		// $data['countrydetails']=$this->Admin_model->viewcountry();
		// $data['statedetails']=$this->Admin_model->viewstate();
		$data['citydetails']=$this->Admin_model->viewcity();
		$data['pincodedetails']=$this->Admin_model->viewpincode();
		$this->load->view('admin/components/layout',$data);
	}
	/*
		City Insert
	*/
	function pincodeinsert()
	{
		if($_POST)
		{
			$insert=$this->Admin_model->pincodeinsert();
			if($insert>0)
			{
				redirect('Admin/pincode');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
}
?>