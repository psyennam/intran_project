<?php
/**
 * 
 */
class Main extends CI_Controller
{
	public $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function index()
	{
		$this->data['page']='components/content';
		$this->load->view('homepage',$this->data);
	}
	function login()
	{
		$this->data['page']='components/login';
		if($this->input->post('save'))
		{
			$email=$this->input->post('txtemail');
			$password=$this->input->post('txtpassword');
			if($email=="vishal20" && $password=="vishal")
			{
				redirect('Main/data');
			}
			else
			{
				echo "incorrect username or password";
			}
		}
		$this->load->view('homepage',$this->data);
	}

	function data()
	{
		$this->data['page']='data';
		if($this->input->post('submit'))
		{
			$this->data['page']='viewdata';
			$this->data['name']=$this->input->post('txtname');
			$this->data['email']=$this->input->post('txtemail');	
			$this->data['no']=$this->input->post('txtno');	
			//print_r($this->data);
			//redirect('Main/viewdata/',$this->data);
			$this->load->view('homepage',$this->data);
		}
		else
		{
		$this->load->view('homepage',$this->data);
		}
	}
}
?>