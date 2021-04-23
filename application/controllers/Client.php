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
}

