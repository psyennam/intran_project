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
	}
	/*
		Logim form
	*/
	function login()
	{
		
		if($_POST)
		{
			$this->form_validation->set_rules('ClientID','User Name','required');
			$this->form_validation->set_rules('password','password','required');
			
			if($this->form_validation->run()==true)
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
					echo "<script>alert('user not valid')</script>";
				}
			}
		}
			$this->load->view('admin/adminlogin',$this->data);
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
	function forget_form()
	{
		$this->load->view('admin/verifyusername');
		if($_POST)
		{
			$this->form_validation->set_rules('username','Username','required'); 
			if ($this->form_validation->run() == FALSE)
            {
                echo validation_errors();            
            }
            else
            {
				$res=$this->Admin_model->forgetpassword();
				if($res>0)
				 { 
				 	redirect('Email_send/verifyotp');	
				 }
				 else
				 {
				 	echo "incorrect username";
				 }
			}
		}
	}
	/**
	 	Employee Forget Password 
	 **/
	 function forgetemployee()
	 {
	 	
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
				$res=$this->Admin_model->employeeforget();
				if($res>0)
				{
						redirect('User/login');	
				}
				else
				{
					echo "data is not updated";
				}
			}
		}
		$this->load->view('admin/forgetpassword');
	 }
	/**
		Master Admin Dasboard
	**/
	function dashboard()
	{
		if($this->session->userdata('role'))
		{
			
			$data['page']='admin/pages/view/dasboard';
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

	function opt_invoice($lead_code)
	{
		try{
			$res = $this->db->select('invoice_number as code')->where('lead_code',$lead_code)->where('status',2)->get('quotation')->result();

			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}

	function opt_product($invoice_number)
	{
		try{
			$res = $this->db->select('mapping_quotation.product_code as code,product.product')->where('invoice_number',$invoice_number)->join('quotation','quotation.quotation_code=mapping_quotation.quotation_code')->join('product','product.product_code=mapping_quotation.product_code')->get('mapping_quotation')->result();

			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
	function opt_warranty($product_code)
	{
		try{
			$res = $this->db->select('warranty_code as code,title,DATE(start_at) as start_at,DATE(ADDDATE(start_at,INTERVAL 365 DAY)) as end_at')->where(['product_code'=>$product_code])->join('warranty_type','warranty_type.warranty_type_code=warranty.warranty_type')->get('warranty')->result();
			json_response($res, 200);
		}catch(Exception $e){
			json_response($e->getMessage(), 500);
		}
	}
}