<?php
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
			'id'=>$this->input->post('NULL'),
			'organizationid'=>$randomid,
			'clientname'=>$this->input->post('ClientName'),
			'address'=>$this->input->post('Address'),
		    'contactpersonname'=>$this->input->post('ContactPersonName'),
			'contactpersonemailid'=>$this->input->post('ContactPersonEmailId'),
			'contactpersonmobileno'=>$this->input->post('ContactPersonMobileNo'),
			'contactpersonemergencycontactno'=>$this->input->post('ContactPersonEmergencyNo'),
			'noofbranches'=>$this->input->post('NoofBranches'),
			'status'=>'active',
			'ipaddress'=>$ip,
			'regdate'=>$this->input->post('RegistrationDate'),
			'validity'=>$this->input->post('ValidityDate'),
			'url'=>$this->input->post('Url'),
			'logo'=>$filename
		];
		$this->db->trans_start();
		if($this->db->insert('organization',$data))
		{
			$user_data=[
				'organizationid'=>$randomid,
				'username'=>$randomid,
				'password'=>$randomid,
				'status'=>'active',
				'ipaddress'=>$ip
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
		
			$data=$this->db->select('organizationid')->where('id',$id)->get('organization');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>'terminate'
						];
				$id=$data->row();
				$this->db->where('organizationid',$id->organizationid);	
				$res=$this->db->update('organization',$user);
				if($res>0)
				{
					$user=[
						'status'=>'terminate'
						];
					$this->db->where('organizationid',$id->organizationid);	
					$user=$this->db->update('user',$user);
					return $user;
				} 
			}
	}
	function databyid($id)
	{
		return $this->db->select('*')->from('organization')->where('organizationid',$id)->get()->result();
	}
	function edit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'clientname'=>$this->input->post('ClientName'),
			'address'=>$this->input->post('Address'),
		    'contactpersonname'=>$this->input->post('ContactPersonName'),
			'contactpersonemailid'=>$this->input->post('ContactPersonEmailId'),
			'contactpersonmobileno'=>$this->input->post('ContactPersonMobileNo'),
			'contactpersonemergencycontactno'=>$this->input->post('ContactPersonEmergencyNo'),
			'noofbranches'=>$this->input->post('NoofBranches'),
			'status'=>$this->input->post('statuscombo'),
			'regdate'=>$this->input->post('RegistrationDate'),
			'validity'=>$this->input->post('ValidityDate'),
			'url'=>$this->input->post('Url'),
			'ipaddress'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('organizationid',$id)->update('organization',$data))
		 {
			$usr_tbl=[
				'status'=>$this->input->post('statuscombo')
			];
			if($this->db->where('organizationid',$id)->update('user',$usr_tbl))
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