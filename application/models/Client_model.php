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
				'city_code'=>$this->input->post('city'),
				'zone_code'=>$this->input->post('subzone'),
				'zip_code'=>$this->input->post('Pincode'),
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
			'customer_available'=>$this->input->post('customercombo'),
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
					'customer_available'=>$this->input->post('customercombo'),
					'concerned_person'=>$this->input->post('concernperson'),
					// 'location'=>
					// 'contact_no'=>
					'quotation_require'=>$this->input->post('quotationreq'),
					'visit_type'=>$this->input->post('visitetype'),
					'additional_remark'=>$this->input->post('remark'),
					'ip_address'=>$this->input->ip_address()
				];
				if($this->db->insert('followup',$data2))
				{
					$this->db->trans_complete();
					return $data2;
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

	// function updateleadlist($code)
	// {
	// 	// $this->db->where(['lead_code'=>$code]);
	// 	// $res=$this->db->update('quotation');
	// 	// return $res;
	// }

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
		return $this->db->select('*')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where('mapping_quotation.quotation_code',$id)->get('')->result();
	}
	function quotationinsert($id)
	{
		$randomid=random_string('alnum',5);
		$ip=$this->input->ip_address();
		$quotation=[
			'quotation_code'=>$randomid,
			'lead_code'=>$id,
			// 'product_code'=>$this->input->post('productname'),
			//'total'=>$this->input->post('total'),
			'ip_address'=>$ip
			// 'invoice_number'=>

			// 'quantity'=>$this->input->post('qty'),
			// 'price'=>$this->input->post('Productprice'),
			// 'approved_price'=>$this->input->post('approvedprice'),
			// 'rate'=>$this->input->post('rate'),
			// 'discount_type'=>$this->input->post('discounttype'),
			// 'discount'=>$this->input->post('discount'),
		];
		if($this->db->insert('quotation',$quotation))
		{
			return $quotation['quotation_code'];
		}
		else{
			return false;
		}
	}


	function mapping_quotationinsert($lead_code,$quotation_code)
	{
		$mapping_quotation=[
			'lead_code'=>$lead_code,
			'quotation_code'=>$quotation_code,
			'product_code'=>$this->input->post('productname'),
			'quantity'=>$this->input->post('qty'),
			'price'=>$this->input->post('Productprice'),
			'approved_price'=>$this->input->post('approvedprice'),
			'rate'=>$this->input->post('rate'),
			'discount_type'=>$this->input->post('discounttype'),
			'discount'=>$this->input->post('discount'),
			'total'=>$this->input->post('total')
		];
		if($this->db->insert('mapping_quotation',$mapping_quotation))
		{
			return $quotation_code;
		}
		else{
			return false;
		}
	}

	function panding_quotationlist($code)
	{
		return $this->db->select('*')->from('quotation')->join('mapping_quotation','mapping_quotation.quotation_code=quotation.quotation_code')->where(['quotation.lead_code'=>$code,'mapping_quotation.quotation_status'=>0,'quotation.status'=>0])->get()->result();
	}
	function quotationConfirm($code)
	{
		$total=$this->db->select_sum('total')->from('mapping_quotation')->where('quotation_code',$code)->get()->row();
		
		$status=[
			'status'=>1,
			'total'=>$total->total
		];
		$this->db->where(['quotation_code'=>$code,'status'=>0]);
		$res=$this->db->update('quotation',$status);
		return $res;
		// return $this->db->update('quotation')->set('status',1)->where('status',0)->get()->result();
	}
	/**
		In this function we get pending quotation list
	**/
	function pendingdetails()
	{
		// return $this->db->select('*')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where(['quotation.status'=>1,'mapping_quotation.quotation_status'=>0])->get()->result();

		return $this->db->select('*')->where('status',1)->get('quotation')->result();
	}
	/**
		In this function we get pending quotation list by leadcode
	**/
	function pending_leadcode($leadcode)
	{
		return $this->db->select('*')->where(['quotation_status'=>0,'lead_code'=>$leadcode])->get('mapping_quotation')->result();
	}

	/**
		In this function we get pending quotation list by quotation
	**/
	function pending_quotation($quotation_code)
	{
		return $this->db->select('*')->where(['quotation_status'=>0,'quotation_code'=>$quotation_code])->get('mapping_quotation')->result();
	}
	/**
		In this function pending quotation will be updated by leadcode
	**/
	function quotation_confirm($quotation_code)
	{
		// echo $quotation_code;
	
		$status=[
			'quotation_status'=>1	
		];
		$this->db->where(['quotation_status'=>0,'quotation_code'=>$quotation_code]);
		$res=$this->db->update('mapping_quotation',$status);
		if($res>0)
		{	
			$close_date=[
			'quotation_close_date'=>date('Y-m-d H:i:s'),
			'status'=>2	
			];
			$this->db->where('quotation_code',$quotation_code);
			$res=$this->db->update('quotation',$close_date);
			return $res;	
		}
	}
	/**
		In this function we get quotation close list
	**/
	function quotationcloselist()
	{
		// return $this->db->select('quotation.id,quotation.lead_code,quotation.quotation_code,quotation.quotation_close_date,quotation.invoice_number')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where(['quotation.status'=>1,'mapping_quotation.quotation_status'=>1])->get()->result();
		return $this->db->select('*')->where('status',2)->get('quotation')->result();
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
			'ip_address'=>$ip,
			'employee_code'=>$this->session->userdata('emp_code'),
			'org_code'=>$this->session->userdata('org_code')
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
	/**
		In this function 
	**/
	function viewexpensebyid($id)
	{
		return $this->db->select('*')->where('id',$id)->get('expense')->result();
	}

	function view_close_quotation_by_id($id)
	{
		return $this->db->select('*')
		->from('quotation')
		->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code', 'inner')
		->where('quotation.quotation_code',$id)->get()->result();

		// return $this->db->select('DISTINCT(quotation.quotation_code),mapping_quotation.product_code,mapping_quotation.quantity,mapping_quotation.rate')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where('quotation.quotation_code',$id)->get()->result();
	}

	function followuplist()
	{
		return $this->db->select('*')->get('followup')->result();
	}
	/**
	Update-DetailsById
	**/
	function getdetailsbyid($quotation_code)
	{

	return $this->db->select('*')->where(['quotation_status'=>0,'quotation_code'=>$quotation_code])->get('mapping_quotation')->result();
	}
	function updatedetailsbyid($id)
	{
		return $this->db->select('*')->from('mapping_quotation')->join('product','mapping_quotation.product_code=product.product_code')->where('mapping_quotation.id',$id)->get()->result();
	}

	function fetch_productdetails()
	{
		return $this->db->select('*')->get('product')->result();
	}

	function fetch_organizationdetails()
	{
		return $this->db->select('*')->where('org_code',$this->session->userdata('org_code'))->get('organization')->result();
	}

	function fetch_supplierdetails($id)
	{
		$s_code=$this->db->select('lead.supplier_code')->from('lead')->join('quotation','lead.lead_code=quotation.lead_code')->where('quotation_code',$id)->get()->row();
		// echo $s_code->supplier_code;
		return $this->db->select('*')->where('client_code',$s_code->supplier_code)->get('client')->result();

	}

	function viewstate()
	{
		return $this->db->select('*')->get('state')->result();	
	}
}