<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Master_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	/*
		Organisation Registration Form
	*/
	function registrationform()
	{			
				$randomid=random_string('alnum',10);
				$ip=$this->input->ip_address();
				$path = base_url().'uploads/';
				$config['upload_path']='./uploads/';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']=2000;
		        $config['max_width']=null;
		        $config['max_height']=0;
		         $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('uploadpic'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('Organisationfrom', $error);
                }
                

               	$file_name=$this->upload->file_name;
				$img = array('upload_data' => $this->upload->data());
				$filename= $path.$img['upload_data']['file_name'];

				$data=[
					'org_code'=>$randomid,
					'org_name'=>$this->input->post('OraganizationName'),
					'address'=>$this->input->post('Address'),
				    'client_name'=>$this->input->post('ContactPersonName'),
					'client_email'=>$this->input->post('ContactPersonEmailId'),
					'client_mobileno'=>$this->input->post('ContactPersonMobileNo'),
					'emergency_contact'=>$this->input->post('ContactPersonEmergencyNo'),
					'no_branch'=>$this->input->post('NoofBranches'),
					'status'=>'Active',
					'ip_address'=>$ip,
					'regdate'=>$this->input->post('RegistrationDate'),
					'validity'=>$this->input->post('ValidityDate'),
					'url'=>$this->input->post('Url'),
					'logo'=>$filename
				];
				$this->db->trans_start();
					if($this->db->insert('organization',$data))
					{
						$user_data=[
							'org_code'=>$randomid,
							'username'=>$randomid,
							'password'=>$randomid,
							'ip_address'=>$ip
						];
						if($this->db->insert('user',$user_data))
						{
							$this->db->trans_complete();
							return true;
						}
						else
						{
							$this->db->trans_rollback();
						}
					}
					else
					{
						$this->db->trans_rollback();
						return false;
					}
	}
	/**
		In this Viewdata function it will give all the data from the oraganisation table 
		->this data is used in the master admin view
	**/
	function viewdata()
	{
		return $this->db->select('*')->from('organization')->get()->result();
	}
	/**
		In this deletedata function if Master admin want to termiante with organisation then this function will change the active=terminate  
	**/
	function deletedata($id)
	{
		
			$data=$this->db->select('org_code')->where('org_code',$id)->get('organization');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>'Terminated'
					];
					$id=$data->row();
				$this->db->where('org_code',$id->org_code);	
				$res=$this->db->update('organization',$user);
				if($res>0)
				{
					$user=[	
						'status'=>'1'
						];
					$this->db->where('org_code',$id->org_code);	
					$user=$this->db->update('user',$user);
					return $user;
				} 
			}
	}
	function databyid($id)
	{
		return $this->db->select('*')->from('organization')->where('org_code',$id)->get()->result();
	}
	function edit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'org_name'=>$this->input->post('OraganizationName'),
			'address'=>$this->input->post('Address'),
		    'client_name'=>$this->input->post('ContactPersonName'),
			'client_email'=>$this->input->post('ContactPersonEmailId'),
			'client_mobileno'=>$this->input->post('ContactPersonMobileNo'),
			'emergency_contact'=>$this->input->post('ContactPersonEmergencyNo'),
			'no_branch'=>$this->input->post('NoofBranches'),
			'status'=>$this->input->post('statuscombo'),
			'regdate'=>$this->input->post('RegistrationDate'),
			'validity'=>$this->input->post('ValidityDate'),
			'url'=>$this->input->post('Url'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('org_code',$id)->update('organization',$data))
		 {
			$usr_tbl=[
				'status'=>$this->input->post('statuscombo')
			];
			if($this->db->where('org_code',$id)->update('user',$usr_tbl))
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
}
?>