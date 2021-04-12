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
}