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
		$data=[
			'lead_code'=>$this->input->post('lead_code'),
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
					'lead_code'=>$this->input->post('lead_code'),
					'person_name'=>$_POST['cp_name'][$i],
					'designation'=>$_POST['cp_designation'][$i],
					'mobile_no'=>$_POST['cp_mobile'][$i],
					'email'=>$_POST['cp_email'][$i]
				];
			}
			if($insert=$this->db->insert_batch('mapping_lead',$contact_person))
			{
				$data2=[
					'lead_code'=>$this->input->post('lead_code'),
					'quotation_require'=>$this->input->post('quotationreq'),
					'ip_address'=>$this->input->ip_address(),
				];
				if($this->db->insert('followup',$data2))
				{
					$this->db->trans_complete();
					return true;
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

}