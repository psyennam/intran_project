<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class Warranty extends CI_controller
 {
 	
 	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('Warranty_model');
	}
	function warrantytype()
	{
		$data['page']='admin/pages/view/warrantytype';
		$data['warrantydetails']=$this->Warranty_model->view_warrantytype();
		$this->load->view('admin/components/layout',$data);
	}
	function warrantytype_insert()
	{
		if($_POST)
		{
			//set validation rules
			$this->form_validation->set_rules('WarrantyType','Warranty Type','required');
			//run validation check
        	if ($this->form_validation->run() == FALSE)
        	{   //validation fails
            	echo validation_errors();
        	}
        	else
        	{
				$res=$this->Warranty_model->warrantytype_insert();
				if($res==true)
				{
					echo "Yes";
				}
				else
				{
					echo "NO";
				}
			}
		}
	}
	function update_warranty()
	{
		// echo $invoice_number;
		$res=$this->Warranty_model->warranty_update();
		if($res>0)
		{
			redirect('Client/quotationcloselist');
		}
		else
		{
			echo "Data is not updated";
		}
	}
 }