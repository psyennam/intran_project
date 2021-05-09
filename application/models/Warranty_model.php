<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Warranty_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
	/***
		Warranty Type View
	***/
	function view_warrantytype()
	{
		return $this->db->select('*')->where('parent',null)->get('warranty_type')->result();
	}
	/***
		Warranty Type Insert
	***/
	function warrantytype_insert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();
		$data=[
				'title'=>$this->input->post('WarrantyType'),
				'warranty_type_code'=>$randomid,
				'org_code'=>$this->session->userdata('org_code'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip,
			];
		$this->db->trans_start();
		if($this->db->insert('warranty_type',$data)) 
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
		Warranty Insert
	***/
	function warranty_insert($quotation_code)
	{
		 $row=$this->db->select('*')
		->from('mapping_quotation')
		->where('mapping_quotation.quotation_code',$quotation_code)
		->join('lead','mapping_quotation.lead_code=lead.lead_code')
		->get()->row();
		$randomid=random_string('alnum',6);
		$sr_no=random_string('alnum',6);
		$ip=$this->input->ip_address();
		
		$data=[
			'warranty_code'=>$randomid,
			'supplier_code'=>$row->supplier_code,
			'org_code'=>$this->session->userdata('org_code'),
			'product_code'=>$row->product_code,
			'start_at'=>date('y-m-d H:i:s'),
			'quantity'=>$row->quantity,
			'sr_no'=>$sr_no,
			'created_at'=>date('y-m-d H:i:s'),
			'ip_address'=>$ip
		];

		$this->db->trans_start();
		if($this->db->insert('warranty',$data)) 
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
}