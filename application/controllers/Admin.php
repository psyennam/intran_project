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
		$this->load->model(array('Admin_model','Admin_model'));
		$this->load->library('form_validation');
		$this->load->helper('email');
		// $this->data["title"] = "Login";
		if(!$this->session->userdata('is_login'))
		{
			redirect('User/login');
		}

		if($this->session->userdata('role')=="Admin")
		{
		}
		else{
			redirect('User/login');
		}

	}
	/*
		Logim form
	*/
	// function login()
	// {
	// 	$this->load->view('admin/adminlogin',$this->data);
	// 	if($_POST)
	// 	{
			
	// 		$res=$this->Admin_model->login();
	// 		if($res==true)
	// 		{
	// 		/**
	// 			Check Function
	// 			->In this function it will check that the user has changed he password or not 
	// 			->if the password flag is 0 then it redirect to forgetpassword page
	// 			->or Dasboard 
	// 		**/	
	// 			if($this->Admin_model->check())
	// 			{
					
	// 				redirect('Admin/forgetpassword');
	// 			}
	// 			else
	// 			{

	// 				redirect('Admin/dashboard');	
	// 			}
	// 		}
	// 		else
	// 		{
	// 			//return false;
	// 			echo "user not valid";
	// 		}
	// 	}
	// }	
	// /*
	// 	Foreget Password
	// */
	// function forgetpassword()
	// {
	// 	$this->load->view('admin/forgetpassword');
	// 	if($_POST)
	// 	{
	// 		$this->form_validation->set_rules('password', 'Password', 'required');
	// 		$this->form_validation->set_rules('cnfpassword', 'Password Confirmation', 'required|matches[password]');
	// 		if ($this->form_validation->run() == FALSE)
 //            {
 //                $this->load->view('admin/forgetpassword');
 //            }
 //            else
 //            {
	// 			$res=$this->Admin_model->update();
	// 			if($res>0)
	// 			{
	// 					redirect('Admin/dashboard');	
	// 			}
	// 			else
	// 			{
	// 				redirect('Admin/forgetpassword');
					
	// 			}
	// 		}
	// 	}
	// }
	
	/**
		Master Admin Logout
	**/
	// function logout()
	// {
	// 	$this->session->sess_destroy($arr);
	// 	redirect('Admin/login');
	// }
	/**
		 Admin role
	**/
	function role()
	{
		$data['page']='admin/pages/view/role';
		//$data['content']='admin/pages/view/role';
		$data['roledetails']=$this->Admin_model->viewdata();
		$this->load->view('admin/components/layout',$data);
	}
	function roleinsert()
	{

		if(in_array('C',$this->session->userdata('privileges')))
		{
			//set validation rules
			$this->form_validation->set_rules('RoleName','Role Name','required');
			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
			else
			{
					//$data['rolename']=$this->input->post('RoleName');
					$insert=$this->Admin_model->roleinsert();
					if($insert>0)
					{
						echo "Yes";
					}
					else
					{
						echo "No";
					}
			}
		}
		else
		{
			redirect('/User/logout');
		}
		
	}
	/**
		Role Update Form
	**/
	function updaterole()
	{
		$id=$this->input->get('id');
		$data['row']=$this->Admin_model->databyid($id);
		$data['page']='admin/pages/update/update_role';
		if($_POST)
		{
			$this->form_validation->set_rules('RoleName','RoleName','required');
			if($this->form_validation->run()==true)
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
		$this->load->view('admin/components/layout',$data);
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
		$data['page']='admin/pages/view/department';
		$data['departmentdetails']=$this->Admin_model->viewdepartment();
		$this->load->view('admin/components/layout',$data);
	}
	function departmentinsert()
	{
		if($_POST)
		{
			//set validation rules
			$this->form_validation->set_rules('DepartmentName','Department Name','required');
			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
			else
			{
				$insert=$this->Admin_model->departmentinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
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
		$data['page']='admin/pages/update/update_department';
		if($_POST)
		{
			$this->form_validation->set_rules('DepartmentName','Department Name','required');

			if($this->form_validation->run()==true)
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
		$this->load->view('admin/components/layout',$data);
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
		$data['page']='admin/pages/view/employee';
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
				// $to =$insert['email'];  // User email pass here
		  //       $subject = 'username and password';
		  //       $from = 'yennam20@gmail.com';
		  //       $emailContent=$insert['username'].' '."your username and password";            

			 //    $config['protocol']    = 'smtp';
			 //    $config['smtp_host']    = 'ssl://smtp.gmail.com';
			 //    $config['smtp_port']    = '465';
			 //    $config['smtp_timeout'] = '60';

			 //    $config['smtp_user']    = 'yennam20@gmail.com';    //Important
			 //    $config['smtp_pass']    = '@vishalyennam11';  //Important

			 //    $config['charset']    = 'utf-8';
			 //    $config['newline']    = "\r\n";
			 //    $config['mailtype'] = 'html'; // or html
			 //    $config['validation'] = TRUE; // bool whether to validate email or not 

			 //    $this->email->initialize($config);
			 //    $this->email->set_mailtype("html");
			 //    $this->email->from($from);
			 //    $this->email->to($to);
			 //    $this->email->subject($subject);
			 //    $this->email->message($emailContent);
			 //    $this->email->send();  
      
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
		$data['page']='admin/pages/update/update_employee';
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
		$data['page']='admin/pages/view/designation';
		$data['depts']=$this->Admin_model->viewdepartment();
		$data['designationdetails']=$this->Admin_model->viewdesignation();
		$this->load->view('admin/components/layout',$data);
	}
	function designationinsert()
	{
		if($_POST)
		{
			//set validation rules
			$this->form_validation->set_rules('DesignationName','Designation Name','required');

			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
			else
			{

				// $data['DesignationName']=$this->input->post('DesignationName');
				// $data['DepartmentCode']=$this->input->post('DepartmentCode');
				// print_r($data['DesignationName']); 			
				$insert=$this->Admin_model->designationinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
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
		$data['page']='admin/pages/update/update_designation';
		if($_POST)
		{
			$this->form_validation->set_rules('DesignationName','Designation Name','required');

			if($this->form_validation->run()==true)
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
		$this->load->view('admin/components/layout',$data);
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
		$data['page']='admin/pages/view/country';
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
			//set validation rules
			$this->form_validation->set_rules('CountryName','Country Name','required');

			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
			else
			{

				// $data['DesignationName']=$this->input->post('DesignationName');
				// $data['DepartmentCode']=$this->input->post('DepartmentCode');
				// print_r($data['DesignationName']); 			
				$insert=$this->Admin_model->countryinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			}
		}
	}
	/**
		Country Update Form
	**/
	function updatecountry()
	{
		$id=$this->input->get('id');
		$data['row']=$this->Admin_model->countrybyid($id);
		$data['page']='admin/pages/update/update_country';
		if($_POST)
		{
			$this->form_validation->set_rules('CountryName','Country Name','required');

			if($this->form_validation->run()==true)
			{
				$res=$this->Admin_model->countryedit($id);
				if($res>0)
				{
					redirect('Admin/country');
				}
				else
				{
					echo "Data not updated";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}
	/*
		Country Delete
	*/
	function deletecountry()
	{
		$id=$this->input->get('id');
		$res=$this->Admin_model->deletecountry($id);
		if($res>0)
		{
			redirect('Admin/country');	
		}
		else
		{
			echo "Data is not updated";
		}
	}
	/*
		State View
	*/
	function state()
	{
		$data['page']='admin/pages/view/state';
		$data['countrydetails']=$this->Admin_model->viewcountry();
		$data['statedetails']=$this->Admin_model->viewstatestar();
		$this->load->view('admin/components/layout',$data);
	}
	/*
		State Insert
	*/

	function stateinsert()
	{
		if($_POST)
		{
			//set validation rules
			$this->form_validation->set_rules('StateName','State Name','required');

			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
			else
			{			
				$insert=$this->Admin_model->stateinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			}
		}
	}
	/**
		State Update Form
	**/
	function updatestate()
	{
		$id=$this->input->get('id');
		$data['row']=$this->Admin_model->statebyid($id);
		$data['page']='admin/pages/update/update_state';
		if($_POST)
		{
			$this->form_validation->set_rules('StateName','State Name','required');

			if($this->form_validation->run()==true)
			{
				$res=$this->Admin_model->stateedit($id);
				if($res>0)
				{
					redirect('Admin/state');
				}
				else
				{
					echo "Data not updated";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}
	/*
		State Delete
	*/
	function deletestate()
	{
		$id=$this->input->get('id');
		$res=$this->Admin_model->deletestate($id);
		if($res>0)
		{
			redirect('Admin/state');	
		}
		else
		{
			echo "Data is not updated";
		}
	}
	/*
		City View
	*/
	function city()
	{
		$data['id']=$this->input->get('citycode');
		$data['page']='admin/pages/view/city';
		$data['countrydetails']=$this->Admin_model->viewcountry();
		$data['statedetails']=$this->Admin_model->view_state();
		$data['citydetails']=$this->Admin_model->viewcity();
		$this->load->view('admin/components/layout',$data);
	}
	/*
		City Insert
	*/
	/*
		City Insert
	*/
	function cityinsert()
	{
		if($_POST)
		{
			//set validation rules
			$this->form_validation->set_rules('CityName','City Name','required');

			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
			else
			{			
				$insert=$this->Admin_model->cityinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			}
		}
	}
	/**
		City Update Form
	**/
	function updatecity()
	{
		$id=$this->input->get('id');
		$data['row']=$this->Admin_model->citybyid($id);
		$data['page']='admin/pages/update/update_city';
		if($_POST)
		{
			$this->form_validation->set_rules('CityName','City Name','required');

			if($this->form_validation->run()==true)
			{
				$res=$this->Admin_model->cityedit($id);
				if($res>0)
				{
					redirect('Admin/city');
				}
				else
				{
					echo "Data not updated";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}
	/*
		Pincode View
	*/
	function pincode()
	{
		$data['page']='admin/pages/view/pincode';
		// $data['countrydetails']=$this->Admin_model->viewcountry();
		// $data['statedetails']=$this->Admin_model->viewstate();
		$data['citydetails']=$this->Admin_model->viewcity();
		$data['pincodedetails']=$this->Admin_model->viewpincode();

		// print_r($data['page']);
		$this->load->view('admin/components/layout',$data);
	}
	/*
		Pincode Insert
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

	/*
		zone View
	*/
	function zone()
	{
		$data['page']='admin/pages/view/zone';

		$data['zonedetails']=$this->Admin_model->viewzone();
		$data['subzonedetails']=$this->Admin_model->subviewzone();
		$data['info']=$this->Admin_model->get_manager();
		//$data['info']=$this->Admin_model->get_manager();
		// print_r($data['info']);
		$data['state']=$this->Admin_model->viewstate();
		$this->load->view('admin/components/layout',$data);
	}

	/*
		Zone Insert
	*/
	function zoneinsert()
	{
		
		if($_POST)
		{
			//set validation rules
			$this->form_validation->set_rules('ZoneName','Zone Name','required');
			$this->form_validation->set_rules('Employee','Select Employee','required');
			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
        	else
        	{
				$insert=$this->Admin_model->zoneinsert();
				if($insert>0)
				{
					echo "Yes";		
				}
				else
				{
					echo "No";
				}
			}
		}
	}

/**
		Change the active status to termiante
	**/
	function deletezone()
	{
		$id=$this->input->get('zone_code');
		$res=$this->Admin_model->deletezone($id);
		if($res>0)
		{
			redirect('Admin/zone');	
		}
		else
		{
			echo "Data is not deleted";
		}
	}

/**
		Change the active status to termiante
	**/
	function deletesubzone()
	{
		$id=$this->input->get('zone_code');
		$res=$this->Admin_model->deletesubzone($id);
		if($res>0)
		{
			redirect('Admin/zone');	
		}
		else
		{
			echo "Data is not deleted";
		}
	}
	/*
		Zone Update
	*/

	function updatezone()
	{
		$zone_code=$this->input->get('zone_code');
		$data['page']="admin/pages/update/update_zone";
		$data['empdetails']=$this->Admin_model->get_manager();
		$data['zonedetails']=$this->Admin_model->zonedetails_by_id($zone_code);
		if($_POST)
		{
			$this->form_validation->set_rules('ZoneName','Zone Name','required');
			$this->form_validation->set_rules('Employee','Select Employee','required');
			$this->form_validation->set_rules('statuscombo','Select Status','required');
			if($this->form_validation->run()==TRUE)
			{
				$res=$this->Admin_model->updatezone($zone_code);
				if($res>0)
				{
					redirect('Admin/zone');
				}
				else{
					echo "Something Went Wrong";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}

	function updatesubzone()
	{
		$zone_code=$this->input->get('zone_code');
		$data['page']="admin/pages/update/update_subzone";
		$data['empdetails']=$this->Admin_model->employeedetails_by_id();
		$data['state']=$this->Admin_model->viewstate();
		$data['zonedetails']=$this->Admin_model->zonedetails_by_id($zone_code);
		if($_POST)
		{
			$this->form_validation->set_rules('SubZoneName','Sub Zone','required');
			$this->form_validation->set_rules('state','Select State','required');
			$this->form_validation->set_rules('city[]','Select City','required');
			$this->form_validation->set_rules('Employee','Select Employee','required');
			$this->form_validation->set_rules('statuscombo','Select Status','required');
			if($this->form_validation->run()==TRUE)
			{
				$res=$this->Admin_model->updatesubzone($zone_code);
				if($res>0)
				{
					redirect('Admin/zone');
				}
				else{
					echo "Something Went Wrong";
				}
			}
		}

		$this->load->view('admin/components/layout',$data);
	}

	function opt_city($state){
		try{
			$res = $this->db->select('city_code as code, city')->where('state_code', $state)->get('city')->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}

	function subzoneinsert()
	{
		if($_POST)
		{
			$this->form_validation->set_rules('emp','Select Employee','required');
			$this->form_validation->set_rules('SubZoneName','Sub Zone Name','required');
			$this->form_validation->set_rules('state[]','Select State','required');
			if($this->form_validation->run()==FALSE)
			{
				echo validation_errors();
			}
			else
			{
				$insert=$this->Admin_model->subzoneinsert();
				if($insert>0)
				{
					echo "Yes";	
				}
				else
				{
					echo "No";
				}
			}
		}
	}
	function productmanagement()
	{
		$data['productdetails']=$this->Admin_model->viewproduct();
		//print_r($data['productdetails']);
		$data['page']='admin/pages/view/productmanagement';
		$this->load->view('admin/components/layout',$data);
	}
	function productinsert()
	{
		$data['page']='admin/pages/view/productinsert';
		$data['producttypedetails']=$this->Admin_model->viewproducttype();
		$data['companydetails']=$this->Admin_model->viewcompany();

		if($_POST)
		{
			$this->form_validation->set_rules('companycombo','Select Company','required');
			$this->form_validation->set_rules('producttype','Select ProductType','required');
			$this->form_validation->set_rules('name','Select Name','required');
			$this->form_validation->set_rules('productcode','Product Code','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('customerprice','Price','required|numeric');
			$this->form_validation->set_rules('distributorprice','Distributor Price','required|numeric');
			$this->form_validation->set_rules('hsncode','HSN Code','required|numeric');
			$this->form_validation->set_rules('weight','Weight','required|numeric');
			$this->form_validation->set_rules('tax','Tax','required|numeric');
			$this->form_validation->set_rules('information','Information','required');
			$this->form_validation->set_rules('c_name[]','Company Name','required');
			$this->form_validation->set_rules('c_price[]','Company Price','required|numeric');
			if($this->form_validation->run()==TRUE) 
			{
				$insert=$this->Admin_model->productinsert();
				if($insert>0)
				{
					redirect('Admin/productmanagement');		
				}
				else
				{
					echo "Data is not inserted";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}

	// function productinsert()
	// {
	// 	if($_POST)
	// 	{
	// 		$insert=$this->Admin_model->productinsert();
	// 		if($insert>0)
	// 		{
	// 			redirect('Admin/productmanagement');		
	// 		}
	// 		else
	// 		{
	// 			echo "Data is not inserted";
	// 		}
	// 	}
	// }

	function company()
	{
		$data['page']='admin/pages/view/company';
		$data['companydetails']=$this->Admin_model->viewcompany();
		$this->load->view('admin/components/layout',$data);	
	}
	function companyinsert()
	{
		if ($_POST) 
		{
			$this->form_validation->set_rules('CompanyName','Company','required');
			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
        	else
        	{	
				$insert=$this->Admin_model->companyinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			}
		}
	}
	/***
		Company Update
	***/
	function updatecompany($id)
	{
		$data['data']=$this->Admin_model->companybyid($id);
		$data['page']='admin/pages/update/update_company';
		
		if($_POST)
		{	
			$this->form_validation->set_rules('CompanyName','Company','required');
			$this->form_validation->set_rules('statuscombo','Select Status','required');
			//run validation check
        	if ($this->form_validation->run() == TRUE)
        	{   
				$res=$this->Admin_model->editcompany($id);
				if($res==true)
				{
					redirect('Admin/company');
				}
				else
				{
					echo "Data is not updated";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}
	function producttype()
	{
		$data['page']='admin/pages/view/producttype';
		$data['producttypedetails']=$this->Admin_model->viewproducttype();
		$data['companydetails']=$this->Admin_model->viewcompany();
		$this->load->view('admin/components/layout',$data);	
	}
	function producttypeinsert()
	{
		if ($_POST) 
		{
			//set validation rules
			$this->form_validation->set_rules('companycombo','Select Company','required');
			$this->form_validation->set_rules('ProductName','Product Name','required');
			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
        	else
        	{
				$insert=$this->Admin_model->producttypeinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			}
		}
	}
	/***
		Product Update
	***/
	function updateproduct()
	{
		$product_code=$this->input->get('id');
		$data['page']='admin/pages/update/update_product';
		$data['producttypedetails']=$this->Admin_model->viewproducttype();
		$data['companydetails']=$this->Admin_model->viewcompany();
		$data['value']=$this->Admin_model->productinformation_by_code($product_code);
		$data['approvedprice']=$this->Admin_model->approvedprice_by_productcode($product_code);
		if($_POST)
		{
			$this->form_validation->set_rules('companycombo','Select Company','required');
			$this->form_validation->set_rules('producttype','Select ProductType','required');
			$this->form_validation->set_rules('name','Select Name','required');
			$this->form_validation->set_rules('productcode','Product Code','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('customerprice','Price','required|numeric');
			$this->form_validation->set_rules('distributorprice','Distributor Price','required|numeric');
			$this->form_validation->set_rules('hsncode','HSN Code','required|numeric');
			$this->form_validation->set_rules('weight','Weight','required|numeric');
			$this->form_validation->set_rules('tax','Tax','required|numeric');
			$this->form_validation->set_rules('information','Information','required');
			$this->form_validation->set_rules('c_name[]','Company Name','required');
			$this->form_validation->set_rules('c_price[]','Company Price','required|numeric');
			if($this->form_validation->run()==TRUE) 
			{
				$update=$this->Admin_model->updateproduct($product_code);
				if($update>0)
				{
					redirect('Admin/productmanagement');		
				}
				else
				{
					echo "Data is not updated";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}

	function deleteproduct()
	{
		$product_code=$this->input->get('id');
		$res=$this->Admin_model->deleteproduct($product_code);
		if($res>0)
		{
			redirect('Admin/productmanagement');	
		}
		else
		{
			echo "Data deleted";
		}
	}

	/***
		ProductType Update
	***/
	function updateproducttype($id)
	{
		$data['data']=$this->Admin_model->producttypebyid($id);
		$data['page']='admin/pages/update/update_producttype';
		
		if($_POST)
		{	
			//set validation rules
			$this->form_validation->set_rules('ProductTypeName','Product Type Name','required');
			$this->form_validation->set_rules('statuscombo','Select Status','required');
			//run validation check
        	if ($this->form_validation->run() == TRUE)
        	{  
				$res=$this->Admin_model->editproducttype($id);
			
				if($res==true)
				{
					redirect('Admin/producttype');
				}
				else
				{
					echo "Data is not updated";
				}
			}
		}
		$this->load->view('admin/components/layout',$data);
	}
	// function opt_producttype($state){
		
	// 	try{
	// 		$res = $this->db->select('id, product_type')->where('company_code',$state)->get('product_type')->result();
	// 		json_response($res, 200);
	// 	}catch(Exception $e){
	// 		json_response($e->getMessage(), 500);
	// 	}
	// }
	// /**
	// 	Dealer-List
	// **/
	// function leadlist()
	// {
	// 	$data['page']='admin/pages/view/leadlist';
	// 	$data['leaddetails']=$this->Admin_model->viewleadlist();
	// 	$this->load->view('admin/components/layout',$data);	
	// }
	// /**
	// 	Lead-Form
	// **/
	// function leadform()
	// {
	// 	$data['zone']=$this->Admin_model->viewzone();
	// 	$data['page']='admin/pages/view/leadform';
	// 	$this->load->view('admin/components/layout',$data);	
	// }
	// /**
	// 	Lead-Form
	// **/
	// function leadinsert()
	// {
	// 	if ($_POST) 
	// 	{
	// 		$insert=$this->Admin_model->leadinsert();
	// 		if($insert>0)
	// 		{
	// 			redirect('Admin/leadlist');
	// 		}
	// 		else
	// 		{
	// 			echo "Data is not inserted";
	// 		}
	// 	}	
	// }

	// function sub_city($subzone)
	// {
	// 	try{
	// 		$res = $this->db->select('city.city_code as code,city.city')->from('client')->join('city','client.city_code=city.city_code')->where('zone_code',$subzone)->get()->result();
	// 		json_response($res, 200);
	// 	}catch(Exception $e){
	// 		json_response($e->getMessage(), 500);
	// 	}
	// }
	// function opt_pincode($citycode)
	// {
	// 	try{
	// 		$res = $this->db->distinct()->select('zip_code as code')->from('client')->where('city_code',$citycode)->get()->result();
	// 		json_response($res, 200);
	// 	}catch(Exception $e){
	// 		json_response($e->getMessage(), 500);
	// 	}
	// }
	// function opt_supplier($pincode)
	// {
	// 	try{
	// 		$res = $this->db->select('client_code as code,client')->from('client')->where('zip_code',$pincode)->get()->result();
	// 		json_response($res, 200);
	// 	}catch(Exception $e){
	// 		json_response($e->getMessage(), 500);
	// 	}
	// }

	function client()
	{
		$data['page']='admin/pages/view/client';
		$data['zonedetails']=$this->Admin_model->view_zone();	
		$data['clientdetails']=$this->Admin_model->view_client();
		$this->load->view('admin/components/layout',$data);
	}
	function opt_subzone($zone_code){
		
		try{
			$res = $this->db->select('zone_code as code,zone')->where('parent',$zone_code)->get('zone')->result();
			print_r($res);
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	function opt_cityy($subzone_code){
		
		try{
			$res = $this->db->select('zone.state_code')->from('zone as zone')->where('zone.zone_code',$subzone_code)->get()->row();
			$data=$this->db->select('city_code as code,city')->from('city')->where_in('city_code',explode(',',$res->state_code))->get()->result();
			json_response($data, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	
		
	/*
		Client Insert
	*/
	function clientinsert()
	{
		if($_POST)
		{
			//set validation rules
			$this->form_validation->set_rules('ClientName','Client Name','required');
			$this->form_validation->set_rules('email','email','required');
			$this->form_validation->set_rules('dob','dob','required');
			$this->form_validation->set_rules('zone','zone','required');
			$this->form_validation->set_rules('subzone','SubZone','required');
			$this->form_validation->set_rules('city','city','required');
			$this->form_validation->set_rules('address','address','required');
			$this->form_validation->set_rules('contact','contact','required');
			$this->form_validation->set_rules('Pincode','Pincode','required');

			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
			else
			{ 			
				$insert=$this->Admin_model->clientinsert();
				if($insert>0)
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			}
		}
	}
	/**
		Client Update Form
	**/
	function updateclient()
	{
		$id=$this->input->get('client_code');
		$data['row']=$this->Admin_model->clientbyid($id);
		$data['page']='admin/pages/update/update_client';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
		{
			$res=$this->Admin_model->clientedit($id);
			if($res>0)
			{
				redirect('Admin/client');
			}
			else
			{
				echo "Data not updated";
			}
		}
	}

	/*
		Delete Client(Supplier)
	*/
	function deleteclient()
	{
		$id=$this->input->get('client_code');
		$res=$this->Admin_model->deleteclient($id);
		if($res>0)
		{
			redirect('Admin/client');	
		}
		else
		{
			echo "Data deleted";
		}
	}

	function opt_zone($zone)
	{
		try{
			$res = $this->db->select('zone_code as code, zone')->where('parent', $zone)->get('zone')->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}

	function discuss()
	{
		$data['page']='employee/pages/view/discussion_with_customer';
		// $data['page']='employee/pages/view/add_quotation';
		$this->load->view('admin/components/layout',$data);
	}

	/**
		Dealer-List
	**/
	function leadlist()
	{
		$data['page']='admin/pages/view/leadlist';
		$data['leaddetails']=$this->Admin_model->viewleadlist();
		$this->load->view('admin/components/layout',$data);	
	}

	function updatelead()
	{
		$code=$this->input->get('lead_code');
		$data['page']='admin/pages/update/update_lead';
		$data['zone']=$this->Admin_model->view_zone();
		$data['client']=$this->Admin_model->view_client();
		$data['leadinfo']=$this->Admin_model->leaddetails_by_id($code);
		$data['mappingleadinfo']=$this->Admin_model->maapingleaddetails_by_id($code);
		//$data['leaddetails']=$this->Admin_model->updateleadlist($code);
		if($_POST)
		{
			$this->form_validation->set_rules('zone','Select Zone','required');
			$this->form_validation->set_rules('optzone','Select Sub-Zone','required');
			$this->form_validation->set_rules('optcity','Select City','required');
			$this->form_validation->set_rules('optpin','Select Pin-Code','required');
			$this->form_validation->set_rules('supplier','Select Sub-Zone','required');
			$this->form_validation->set_rules('brand','Select Brand','required');
			$this->form_validation->set_rules('company_name','Company Name','required');
			$this->form_validation->set_rules('gst','GST','required|numeric');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('cp_name[]','Name','required');
			$this->form_validation->set_rules('cp_designation[]','Designation','required');
			$this->form_validation->set_rules('cp_mobile[]','Mobile','required');
			$this->form_validation->set_rules('cp_email[]','Email','required');
			if($this->form_validation->run()==TRUE)
			{	
				$update['data']=$this->Admin_model->updatelead($code);
				if($update['data']>0)
				{
					redirect('Admin/leadlist');
				// print_r($update['data']);
				}
				else
				{
					// print_r($update['data']);
					echo "Data not updated";
				}
			}	
		}
		$this->load->view('admin/components/layout',$data);
	}

	/*
		Delete Lead(Lead)
	*/
	function deletelead()
	{
		$id=$this->input->get('lead_code');
		$res=$this->Admin_model->deletelead($id);
		if($res>0)
		{
			redirect('Admin/leadlist');	
		}
		else
		{
			echo "Data is not updated";
		}
	}
	/**
		Lead-Form
	**/
	function leadform()
	{
		$data['zone']=$this->Admin_model->view_zone();
		$data['client']=$this->Admin_model->view_client();
		//$data['person']=$this->Admin_model->view_person();

		$data['page']='admin/pages/view/leadform';
		$this->load->view('admin/components/layout',$data);	
	}

	function opt_personname($lead_code)
	{
		try{
			$res = $this->db->select('lead_code as code,person_name,mobile_no,email')->where('lead_code',$lead_code)->get('mapping_lead')->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	/**
		Lead-Form
	**/
	function leadinsert()
	{
		if ($_POST) 
		{
			$this->form_validation->set_rules('zone','Select Zone','required');
			$this->form_validation->set_rules('optzone','Select Sub-Zone','required');
			$this->form_validation->set_rules('optcity','Select City','required');
			$this->form_validation->set_rules('optpin','Select Pin-Code','required');
			$this->form_validation->set_rules('supplier','Select Sub-Zone','required');
			$this->form_validation->set_rules('brand','Select Sub-Zone','required');
			$this->form_validation->set_rules('company_name','Company Name','required');
			$this->form_validation->set_rules('gst','GST','required|numeric');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('cp_name[]','Name','required');
			$this->form_validation->set_rules('cp_designation[]','Designation','required');
			$this->form_validation->set_rules('cp_mobile[]','Mobile','required');
			$this->form_validation->set_rules('cp_email[]','Email','required|valid_email');
			if($this->form_validation->run()==TRUE)
			{
				$insert=$this->Admin_model->leadinsert();
				if($insert>0)
				{
					redirect('Admin/leadlist');
				}
				else
				{
					echo "Data is not inserted";
				}
			}
			else
			{
				$data['zone']=$this->Admin_model->view_zone();
				$data['client']=$this->Admin_model->view_client();
				$data['page']='admin/pages/view/leadform';
				$this->load->view('admin/components/layout',$data);
			}
		}	
	}

	function leadlist_insert()
	{
		if($_POST)
		{
				$res=$this->Admin_model->leadlist_insert();
				if($res['quotation_require']==="Yes")
				{
					redirect('Admin/add_quotation/'.$res['lead_code']);				
				}
				else{
					redirect('Admin/followuplist');	
				}
/*			$this->form_validation->set_rules('customercombo','Customer Availabel','required');
			$this->form_validation->set_rules('visitetype','Visit Type','required');
			$this->form_validation->set_rules('concernperson','Concern Person','required');
			$this->form_validation->set_rules('Personname','Customer Availabel','required');
			$this->form_validation->set_rules('quotationreq','Visit Type','required');
			$this->form_validation->set_rules('remark','Concern Person','required|alpha');

			if($this->form_validation->run()==FALSE)
			{
				echo validation_errors();
			}
			else
			{
*/					
			/*}*/
			
		}
	}

	function opt_supplier($pincode)
	{
		try{
			$res = $this->db->select('client_code as code,client')->from('client')->where('zip_code',$pincode)->get()->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	function sub_city($subzone)
	{
		try{
			$res = $this->db->distinct()->select('city.city_code as code,city.city')->from('client')->join('city','client.city_code=city.city_code')->where('zone_code',$subzone)->get()->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	function opt_pincode($citycode)
	{
		try{
			$res = $this->db->distinct()->select('zip_code as code')->from('client')->where('city_code',$citycode)->get()->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	function quotationlist()
	{
		$data['page']='admin/pages/view/quotationlist';
		$data['quotationdetails']=$this->Admin_model->viewquotation();
		$this->load->view('admin/components/layout',$data);
	}


	function add_quotation($id)
	{
		$code=$id;
		$data['page']='admin/pages/view/add_quotation';
		$data['companydetails']=$this->Admin_model->companydetails();
		// $data['productdetails']=$this->Admin_model->productdetails();

		if($_POST)
		{
			if($this->input->post('qcode')=="")
			{
				$res=$this->Admin_model->quotationinsert($id);
				$data['qcode'] = $res;
			}
			else
			{
				$data['qcode'] = $this->input->post('qcode');
			}
			
			$mapping_res=$this->Admin_model->mapping_quotationinsert($id,$data['qcode']);
			$data['qcode'] = $mapping_res;
			
			if($mapping_res)
			{
				// redirect('Admin/add_quotation/'.$code);	
			}
			else
			{
				echo "Something went wrong";
			}
		}
		$data['panding_quotationlist']=$this->Admin_model->panding_quotationlist($code);
		$this->load->view('admin/components/layout',$data);
	}

	function quotationconfirm($code)
	{
		$ress=$this->Admin_model->quotationConfirm($code);
		if($ress==false)
		{
			echo "Something Went Wrong";
		}
		else{
			redirect('Admin/pendinglist');
			//echo "updated";
		}
	}

	function opt_producttype($company_code){
		
		try{
			$res = $this->db->select('id as code,product_type')->where('company_code',$company_code)->get('product_type')->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	function opt_productname($producttype_code)
	{
		try{
			$res = $this->db->select('product_code as code,product')->from('product')->where('product_type', $producttype_code)->get()->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}

	function opt_price($product_code)
	{
		try{
			$res = $this->db->select('price')->from('product')->where('product_code', $product_code)->get()->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	function opt_approvedprice($product_code)
	{
		try{
			$res = $this->db->select('company_code as code,price')->from('approved_price')->where('product_id',$product_code)->get()->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	/**
		Pending-QuotationList 
	**/
	function pendinglist()
	{
		$data['page']='admin/pages/view/pendinglist';
		$data['pendingdetails']=$this->Admin_model->pendingdetails();
		//$data['leaddetails']=$this->Admin_model->viewleadlist();
		$this->load->view('admin/components/layout',$data);
	}

	function quotation_delete()
	{
		$q_code=$this->input->get("quotation_code");
		$del=$this->Admin_model->quotation_delete($q_code);
		if($del>0)
		{
			redirect('Admin/pendinglist');
		}
		else{
			echo "<script>alert('data is not deleted');</script>";
		}
	}

	/**
		Quotation-CloseList 
	**/
	function quotationcloselist()
	{
		$data['page']='admin/pages/view/quotationcloselist';
		$data['quotationdetails']=$this->Admin_model->quotationcloselist();
		//print_r($data['quotationdetails']);
		$this->load->view('admin/components/layout',$data);
	}
	/**
		Expense-List 
	**/
	function expenselist()
	{
		$data['page']='admin/pages/view/expensedetails';
		$data['expensedetails']=$this->Admin_model->expenselist();
		$this->load->view('admin/components/layout',$data);
	}
	/**
		Expense-Insert 
	**/
	function expenseinsert()
	{
		if($_POST)
		{
			$res=$this->Admin_model->expenseinsert();
			if($res>0)
			{
				redirect('Admin/expenselist');
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/**
		Pending-Edit 
	**/
	function pendingupdate()
	{
		$data['quotation_code']=$this->input->get('quotation_code');
		// echo $quotation_code;
		$data['pendingdetails']=$this->Admin_model->pending_quotation($data['quotation_code']);
		$data['page']='admin/pages/view/pendingconfirmlist';
		$this->load->view('admin/components/layout',$data);			
	}
	/**
		Pending-Confirm
	**/
	function pendingconfirm($quotation_code)
	{
		$res=$this->Admin_model->quotation_confirm($quotation_code);
		if($res>0)
		{
			// $data['page']='employee/pages/view/quotationcloselist';	
			redirect('Admin/quotationcloselist');
		}
		$this->load->view('admin/components/layout',$data);			
	}
	/**
		Update Quotation
	**/
	function update_quotation($quotation_code)
	{
		//echo $quotation_code;
		$data['details']=$this->Admin_model->getdetailsbyid($quotation_code);
		//print_r($data['details']);
		$data['page']='employee/pages/update/update_quotation';	
		$this->load->view('admin/components/layout',$data);			
	}
	/**
		Update Quotation
	**/
	function update_quotation_form($id)
	{
		//echo $this->input->get("id");
		print_r($id);

		$data['details']=$this->Admin_model->updatedetailsbyid($id);
		$data['productdetails']=$this->Admin_model->fetch_productdetails();
		$data['companydetails']=$this->Admin_model->companydetails();
		$data['page']='employee/pages/update/update_quotationform';	
		if($_POST)
		{
			$res=$this->Admin_model->update_quotation($id);
			if($res>0)
			{
				redirect('Admin/pendinglist');
			}
			else
			{
				echo "data is not updated";
			}
		}
		$this->load->view('admin/components/layout',$data);		
	}
	/**
		Delete Quotation
	**/
	function delete_quotation($quotation_code)
	{
		//echo $quotation_code;
		$res=$this->Admin_model->delete_quotation($quotation_code);
		if($res>0)
		{
			redirect('Admin/quotationlist');	
		}
		else
		{
			echo "Data is not updated";
		}			
	}
	function followuplist()
	{
		$data['page']='admin/pages/view/followuplist';
		$data['followupdetails']=$this->Admin_model->followuplist();
		$this->load->view('admin/components/layout',$data);
	}
		
}
?>