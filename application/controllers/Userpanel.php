<?php
/**
 * 
 */
class Userpanel extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
	}
	/*
		Logim form
	*/
	function login()
	{
		$this->load->view('adminlogin');
		if($_POST)
		{
			
			$res=$this->User_model->login();
			if($res>0)
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
				echo "failed";
			}
		}
	}
	/*
		Foreget Password
	*/
	function forgetpassword()
	{
		$this->load->view('forgetpassword');
		if($_POST)
		{
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cnfpassword', 'Password Confirmation', 'required|matches[password]');
			if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('forgetpassword');
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
		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$this->load->view('dashboard',$data);
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
		$data['content']='role';
		$data['roledetails']=$this->User_model->viewdata();
		$this->load->view('dashboard',$data);
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
		$data['content']='update_role';
		$this->load->view('dashboard',$data);
		if($_POST)
		{
			$res=$this->Master_model->roleedit($id);
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
		$data['content']='department';
		$data['departmentdetails']=$this->User_model->viewdepartment();
		$this->load->view('dashboard',$data);
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
		$data['content']='employee';
		$this->load->view('dashboard',$data);
	}
	/**
		 Admin Designation
	**/
	function designation()
	{

		$data['header']='admincomponents/header';
		$data['nav']='admincomponents/nav';
		$data['footer']='admincomponents/footer';
		$data['content']='designation';
		$data['depts']=$this->User_model->viewdepartment();
		$data['designationdetails']=$this->User_model->viewdesignation();
		$this->load->view('dashboard',$data);
	}
	function designationinsert()
	{
		if($_POST)
		{
			$insert=$this->User_model->designationinsert();
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
}
?>