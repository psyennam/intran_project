<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Client extends CI_controller
{
	private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('Client_model');
		$this->data["title"] = "Login";
	}

	function client()
	{
		$data['page']='admin/pages/view/client';
		$data['zonedetails']=$this->Client_model->viewzone();	
		$data['clientdetails']=$this->Client_model->view_client();
		$this->load->view('admin/components/layout',$data);
	}

	/*
		Client Insert
	*/
	function clientinsert()
	{
		if($_POST)
		{
			$insert=$this->Client_model->clientinsert();
			if($insert>0)
			{
				redirect('Client/client');		
			}
			else
			{
				echo "Data is not inserted";
			}
		}
	}
	/**
		Client Update Form
	**/
	function updateclient()
	{
		$id=$this->input->get('client_code');
		$data['row']=$this->Client_model->clientbyid($id);
		$data['page']='admin/pages/update/update_client';
		$this->load->view('admin/components/layout',$data);
		if($_POST)
		{
			$res=$this->Client_model->clientedit($id);
			if($res>0)
			{
				redirect('Client/client');
			}
			else
			{
				echo "Data not updated";
			}
		}
	}

	function deleteclient()
	{
		$id=$this->input->get('client_code');
		$res=$this->Client_model->deleteclient($id);
		if($res>0)
		{
			redirect('Client/client');	
		}
		else
		{
			echo "Data is not updated";
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
		$data['page']='employee/pages/view/leadlist';
		$data['leaddetails']=$this->Client_model->viewleadlist();
		$this->load->view('admin/components/layout',$data);	
	}
	/**
		Lead-Form
	**/
	function leadform()
	{
		$data['zone']=$this->Client_model->viewzone();
		$data['client']=$this->Client_model->view_client();
		$data['page']='employee/pages/view/leadform';
		$this->load->view('admin/components/layout',$data);	
	}

	function leadlist_insert()
	{
		if($_POST['btnsubmit1']=='Submit')
		{
			$res=$this->Client_model->leadlist_insert();
			if($res!==false)
			{
				redirect('Client/add_quotation/'.$res);				
			}
		}
	}

	function quotationlist()
	{
		$data['page']='employee/pages/view/quotationlist';
		$data['quotationdetails']=$this->Client_model->viewquotation();
		$this->load->view('admin/components/layout',$data);
	}

	function add_quotation($id)
	{
		$data['page']='employee/pages/view/add_quotation';
		$data['companydetails']=$this->Client_model->companydetails();
		// $data['productdetails']=$this->Client_model->productdetails();
		$this->load->view('admin/components/layout',$data);

		if($_POST)
		{
			$res=$this->Client_model->quotationinsert($id);

			if($res==false)
			{
				echo "Something Went Wrong";
			}
		}
	}

	function opt_producttype($company_code){
		
		try{
			$res = $this->db->select('id as code, product_type')->where('company_code',$company_code)->get('product_type')->result();
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
		$data['page']='employee/pages/view/pendinglist';
		$data['pendingdetails']=$this->Client_model->pendingdetails();
		//$data['leaddetails']=$this->Client_model->viewleadlist();
		$this->load->view('admin/components/layout',$data);
	}
	/**
		Quotation-CloseList 
	**/
	function quotationcloselist()
	{
		$data['page']='employee/pages/view/quotationcloselist';
		$data['quotationdetails']=$this->Client_model->quotationcloselist();
		$this->load->view('admin/components/layout',$data);
	}
	/**
		Expense-List 
	**/
	function expenselist()
	{
		$data['page']='employee/pages/view/expensedetails';
		$data['expensedetails']=$this->Client_model->expenselist();
		$this->load->view('admin/components/layout',$data);
	}
	/**
		Expense-Insert 
	**/
	function expenseinsert()
	{
		if($_POST)
		{
			$res=$this->Client_model->expenseinsert();
			if($res>0)
			{
				redirect('Client/expenselist');
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
		$leadcode=$this->input->get('lead_code');
		$data['pendingdetails']=$this->Client_model->pending_leadcode($leadcode);
		$data['page']='employee/pages/view/pendingconfirmlist';
		$this->load->view('admin/components/layout',$data);			
	}
	/**
		Pending-Edit 
	**/
	function pendingconfirm()
	{
		$leadcode=$this->input->get('lead_code');
		$res=$this->Client_model->quotation_confirm($leadcode);
		if($res>0)
		{
			$data['page']='employee/pages/view/quotationcloselist';	
		}
		$this->load->view('admin/components/layout',$data);			
	}
}

