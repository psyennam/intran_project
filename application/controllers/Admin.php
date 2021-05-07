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
		$this->load->model(array('Admin_model','Client_model'));
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
						redirect('Admin/dashboard');	
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
		$data['page']='admin/pages/view/role';
		//$data['content']='admin/pages/view/role';
		$data['roledetails']=$this->Admin_model->viewdata();
		$this->load->view('admin/components/layout',$data);
	}
	function roleinsert()
	{
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
		$data['page']='admin/pages/update/update_role';
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
		$data['page']='admin/pages/view/department';
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
		$data['page']='admin/pages/update/update_department';
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
		$data['page']='admin/pages/update/update_designation';
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
	/**
		Country Update Form
	**/
	function updatecountry()
	{
		$id=$this->input->get('id');
		$data['row']=$this->Admin_model->countrybyid($id);
		$data['page']='admin/pages/update/update_country';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
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
	/**
		State Update Form
	**/
	function updatestate()
	{
		$id=$this->input->get('id');
		$data['row']=$this->Admin_model->statebyid($id);
		$data['page']='admin/pages/update/update_state';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
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
	/**
		City Update Form
	**/
	function updatecity()
	{
		$id=$this->input->get('id');
		$data['row']=$this->Admin_model->citybyid($id);
		$data['page']='admin/pages/update/update_city';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
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
			$insert=$this->Admin_model->zoneinsert();
			if($insert>0)
			{
				redirect('Admin/zone');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}

	/*
		Zone Update
	*/

	function updatezone()
	{
		$zone_code=$this->input->get('zone_code');
		$data['page']="admin/pages/update/update_zone";
		$data['empdetails']=$this->Admin_model->employeedetails_by_id();
		$data['zonedetails']=$this->Admin_model->zonedetails_by_id($zone_code);
		if($_POST)
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
			$res=$this->Admin_model->updatesubzone($zone_code);
			if($res>0)
			{
				redirect('Admin/zone');
			}
			else{
				echo "Something Went Wrong";
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
			$insert=$this->Admin_model->subzoneinsert();
			if($insert>0)
			{
				redirect('Admin/zone');		
			}
			else
			{
				echo "Data is not inserted";
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

		$this->load->view('admin/components/layout',$data);

		if($_POST)
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
			$insert=$this->Admin_model->companyinsert();
			if($insert>0)
			{
				redirect('Admin/company');
			}
			else
			{
				echo "Data is not inserted";
			}
		}
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
			$insert=$this->Admin_model->producttypeinsert();
			if($insert>0)
			{
				redirect('Admin/producttype');
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	function opt_producttype($state){
		
		try{
			$res = $this->db->select('id, product_type')->where('company_code',$state)->get('product_type')->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
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
	/**
		Lead-Form
	**/
	function leadform()
	{
		$data['zone']=$this->Client_model->viewzone();
		//print_r($data['zone']);
		//$data['client']=$this->Client_model->view_client();
		$data['page']='admin/pages/view/leadform';
		$this->load->view('admin/components/layout',$data);	
	}
	/**
		Lead-Form
	**/
	function leadinsert()
	{
		if ($_POST) 
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
	function sub_city($subzone)
	{
		try{
			$res = $this->db->select('city.city_code as code,city.city')->from('client')->join('city','client.city_code=city.city_code')->where('zone_code',$subzone)->get()->result();
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
	function opt_supplier($pincode)
	{
		try{
			$res = $this->db->select('client_code as code,client')->from('client')->where('zip_code',$pincode)->get()->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}

	/**
		Quotation-List
	**/
	function quotationlist()
	{
		$data['page']='admin/pages/view/quotationlist';
		$this->load->view('admin/components/layout',$data);		
	}
	/**
		QuotationClose-List
	**/
	function quotationcloselist()
	{
		$data['page']='admin/pages/view/quotationcloselist';
		$this->load->view('admin/components/layout',$data);		
	}
	/**
		Pending-QuotationList
	**/
	function pendinglist()
	{
		$data['page']='admin/pages/view/pendinglist';
		$this->load->view('admin/components/layout',$data);		
	}
	/**
		Expense-List
	**/
	function expenselist()
	{
		$data['page']='admin/pages/view/expenselist';
		$this->load->view('admin/components/layout',$data);		
	}
	/**
		Add-Expense
	**/
	function addexpense()
	{
		$data['page']='admin/pages/view/addExpense';
		$this->load->view('admin/components/layout',$data);		
	}
}
?>