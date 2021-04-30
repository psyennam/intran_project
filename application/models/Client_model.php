<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Client_model extends CI_model
{
	// private $emp_code;
	// private $org_code;
	function __construct()
	{
		parent::__construct();
	}

	function view_client()
	{
		return $this->db->select('*')->get('client')->result();
	}
 	
 	function clientinsert()
	{
		$randomid=random_string('alnum',4);
		$ip=$this->input->ip_address();
		$data=[
				'client'=>$this->input->post('ClientName'),
				'client_code'=>$randomid,
				'org_code'=>$this->session->userdata('org_code'),
				'email'=>$this->input->post('email'),
				'dob'=>$this->input->post('dob'),
				'Address'=>$this->input->post('address'),
				'contact'=>$this->input->post('contact'),
				'zone_code'=>$this->input->post('city'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip,
			];
		$this->db->trans_start();
		if($this->db->insert('client',$data)) 
		{
			$this->db->trans_complete();
			return true;
		}
		else
		{
			$this->db->trans_rollback();
			return false;
		}
	}
	/***
		Client Data By Client Code
	 ***/
	function clientbyid($id)
	{
		return $this->db->select('*')->from('client')->where('client_code',$id)->get()->result();
	}
	function clientedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
				'client'=>$this->input->post('ClientName'),
				'email'=>$this->input->post('Email'),
				'contact'=>$this->input->post('Conatact'),
				'dob'=>$this->input->post('dob'),
				'Address'=>$this->input->post('Address'),
				'status'=>$this->input->post('status'),
				'ip_address'=>$ip,
			];
		
		$this->db->trans_start();
		if($this->db->where('client_code',$id)->update('client',$data))
		 {
				$this->db->trans_complete();
				return true;
		}
		else
		{
			$this->db->trans_rollback();
			return false;
		}
	}

	/**
		In this deletedata function if Oragnsation admin want to termiante any role  then this function will change the active=terminate  
	**/
	function deleteclient($id)
	{
		$data=$this->db->select('client_code')->where('client_code',$id)->get('client');
		if($data->num_rows()>0)
		{
			$client=[
					'status'=>1
					];
			$id=$data->row();
			$this->db->where('client_code',$id->client_code);	
			$res=$this->db->update('client',$client);
			if($res>0)
			{

				return true;
			} 
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	/**
		In this function it gives all the data from the zone table 
	**/
	function viewzone()
	{
		return $this->db->select('zone_code as code,zone')->join('employee','employee.employee_code=zone.employee')->where('parent',null)->get('zone')->result();
	}

	function viewleadlist()
	{
		return $this->db->select('*')->get('lead')->result();
	}

	function leadlist_insert()
	{
		$leadcode=$this->input->post('lead_code');

		$data=[
			'lead_code'=>$leadcode,
			'concerned_person'=>$this->input->post('concernperson'),
			'quotation_require'=>$this->input->post('quotationreq'),
			'visit_type'=>$this->input->post('visitetype'),
			'additional_remark'=>$this->input->post('remark'),
		];
		
		$this->db->trans_start();
		if($insert=$this->db->insert('discussion_with_customer',$data))
		{
			$contact_person = [];
			for($i=0;$i<sizeof($_POST['cp_name']);$i++)
			{
				$contact_person[] =[
					'lead_code'=>$leadcode,
					'person_name'=>$_POST['cp_name'][$i],
					'designation'=>$_POST['cp_designation'][$i],
					'mobile_no'=>$_POST['cp_mobile'][$i],
					'email'=>$_POST['cp_email'][$i]
				];
			}
			if($insert=$this->db->insert_batch('mapping_lead',$contact_person))
			{
				$data2=[
					'lead_code'=>$leadcode,
					'quotation_require'=>$this->input->post('quotationreq'),
					'ip_address'=>$this->input->ip_address(),
				];
				if($this->db->insert('followup',$data2))
				{
					$this->db->trans_complete();
					return $leadcode;
				}
				else{
					$this->db->trans_rollback();
					return false;
				}
			}
			else{
				$this->db->trans_rollback();
				return false;		
			}
		}
		else{
			$this->db->trans_rollback();
			return false;	
		}
	}

	function companydetails()
	{
		return $this->db->select('*')->get('company')->result();
	}

	function productdetails()
	{
		return $this->db->select('*')->get('product')->result();
	}

	function viewquotation()
	{
		return $this->db->select('*')->get('quotation')->result();
	}
	function viewquotationbyid($id)
	{
		return $this->db->select('*')->where('id',$id)->get('quotation')->result();
	}
	function quotationinsert($id)
	{
		$quotation=[
			'lead_code'=>$id,
			'product_code'=>$this->input->post('productname'),
			'quantity'=>$this->input->post('qty'),
			'price'=>$this->input->post('Productprice'),
			'approved_price'=>$this->input->post('approvedprice'),
			'rate'=>$this->input->post('rate'),
			'discount_type'=>$this->input->post('discounttype'),
			'discount'=>$this->input->post('discount'),
			'total'=>$this->input->post('total'),
			'ip_address'=>$this->input()->ip_address()
		];
		if($this->db->insert('quotation',$quotation))
		{
			return true;
		}
		else{
			return false;
		}
	}
	/**
		In this function we get pending quotation list
	**/
	function pendingdetails()
	{
		return $this->db->select('*')->where('quotation_status',0)->get('quotation')->result();
	}
	/**
		In this function we get pending quotation list by leadcode
	**/
	function pending_leadcode($leadcode)
	{
		return $this->db->select('*')->where(['quotation_status'=>0,'lead_code'=>$leadcode])->get('quotation')->result();
	}
	/**
		In this function pending quotation will be updated by leadcode
	**/
	function quotation_confirm($leadcode)
	{
		$confirm=[
			'quotation_status'=>1,
			'quotation_close_date'=>date('Y-m-d H:i:s')
		];
		$this->db->where('lead_code',$leadcode);
		$res=$this->db->update('quotation',$confirm);
		return $res;
	}
	/**
		In this function we get quotation close list
	**/
	function quotationcloselist()
	{
		return $this->db->select('*')->where('quotation_status',1)->get('quotation')->result();
	}
	/**
		In this function we get expense list
	**/
	function expenselist()
	{
		return $this->db->select('*')->get('expense')->result();
	}
	/**
		In this function we get expense list
	**/
	function expenseinsert()
	{
		$ip=$this->input->ip_address();
		$this->load->helper('upload_helper');
		$expense=[
			'date'=>$this->input->post('date'),
			'type'=>$this->input->post('expense_type'),
			'description'=>$this->input->post('description'),
			'amount'=>$this->input->post('amount'),
			'expense_for'=>$this->input->post('expense_for'),
			'expense_image'=>file_upload('expimage'),
			'ip_address'=>$ip
		];
		$this->db->trans_start();	
		if($this->db->insert('expense',$expense))
		{
			$this->db->trans_complete();
			return true;
		}
		else
		{
			$this->db->trans_rollback();
			return false;
		}
	}
	function viewcompany($id)
	{
		return $this->db->select('company_name,address')->from('quotation')->join('lead','lead.lead_code=quotation.lead_code')->where('id',$id)->get()->result();	
	}	
}