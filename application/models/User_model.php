<?php
/**
 * 
 */
class User_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
	/**
		Organisation Admin Login
		->In this function the Admin will login with client id 
	**/
	function login()
	{
		$user=$this->db->select('*')->where(['org_code'=>$this->input->post('ClientID'),'password'=>$this->input->post('password')])->get('user');
		if($user->num_rows()>0)
		{
			$org=$this->db->select('*')->where(['org_code'=>$this->input->post('ClientID')])->get('organization');
			$org_tbl=$org->row();
			$usertb_data=$user->row();
			$arr=[
				'id'=>$usertb_data->id,
				'clientid'=>$usertb_data->org_code,
				'role'=>$usertb_data->role,
				'clientname'=>$org_tbl->client_name
			];
			$this->session->set_userdata($arr);
			return true;
		}
		else
		{
			return false;
		}	
		
	}
	/**
		Check Function
		->In this function it will check admin password flag is 0 or not
		->if it is 0 then it will return true
		->or return false 
	**/
	function check()
	{

		$flag=$this->db->where(['org_code'=>$this->session->userdata('clientid'),'status'=>0])->get('user');
		if($flag->num_rows()>0)
		{	
			return true;
		}
		else
		{
			return false;
		}
	}
	/**
		Organisation Admin Update password
		->In this function the admin will update he password and set the password flag to 1 
	**/
	function update()
	{
		$data=[
			'password'=>$this->input->post('password'),
			'status'=>1
		];
		$this->db->where('org_code',$this->session->userdata('clientid'));
		$res=$this->db->update('user',$data);
		return $res;
	}
	/**
		In this Viewdata function it will give all the data from the oraganisation table 
		->this data is used in the master admin view
	**/
	function viewdata()
	{
		return $this->db->select('*')->from('role')->get()->result();
	}
	function roleinsert()
	{
		$randomid=random_string('alnum',10);
		$ip=$this->input->ip_address();
		$data=[
				'role'=>$this->input->post('RoleName'),
				'role_code'=>$randomid,
				'org_code'=>$this->session->userdata('clientid'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip,
				'status'=>1
			];
		$this->db->trans_start();
		if($this->db->insert('role',$data)) 
		{
			# code...
			$this->db->trans_complete();
			return true;
		}
		else
		{
			$this->db->trans_rollback();
			return false;
		}
	}
	function databyid($id)
	{
		return $this->db->select('*')->from('role')->where('rolecode',$id)->get()->result();
	}
	function roleedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'rolename'=>$this->input->post('RoleName'),
		    'status'=>$this->input->post('statuscombo'),
			'ipaddress'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('rolecode',$id)->update('role',$data))
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
	function deleterole($id)
	{
		
			$data=$this->db->select('rolecode')->where('rolecode',$id)->get('role');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>'terminate'
						];
				$id=$data->row();
				$this->db->where('rolecode',$id->rolecode);	
				$res=$this->db->update('role',$user);
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
		In this Viewdata function it will give all the data from the oraganisation table 
		->this data is used in the master admin view
	**/
	function viewdepartment()
	{
		return $this->db->select('*')->from('department')->get()->result();
	}
	function departmentinsert()
	{
		$randomid=random_string('alnum',10);
		$ip=$this->input->ip_address();
		$data=[
				//'id'=>$this->input->post('NULL'),
				'departmentname'=>$this->input->post('DepartmentName'),
				'departmentcode'=>$randomid,
				'clientid'=>$this->session->userdata('clientid'),
				'ipaddress'=>$ip,
				'status'=>'active'
			];
		$this->db->trans_start();
		if($this->db->insert('department',$data)) 
		{
			# code...
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
	function deletedepartment($id)
	{
		
			$data=$this->db->select('departmentcode')->where('departmentcode',$id)->get('department');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>'terminate'
						];
				$id=$data->row();
				$this->db->where('departmentcode',$id->departmentcode);	
				$res=$this->db->update('department',$user);
				if($res>0)
				{
					$id=$data->row();
					$tb_user=[
						'status'=>'terminate'
						];
					$this->db->where('departmentid',$id->departmentcode);	
					$user=$this->db->update('designation',$tb_user);
					return $user;
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
		In this Viewdata function it will give all the data from the oraganisation table 
		->this data is used in the master admin view
	**/
	function viewdesignation()
	{
		return $this->db->select('*')->from('designation')->get()->result();
	}
	function designationinsert()
	{
		$randomid=random_string('alnum',10);
		$ip=$this->input->ip_address();
		$data=[
				//'id'=>$this->input->post('NULL'),
				'designationname'=>$this->input->post('DesignationName'),
				'designationcode'=>$randomid,
				'clientid'=>$this->session->userdata('clientid'),
				'departmentid'=>$this->input->post('designationtcombo'),
				'status'=>'active',
				'ipaddress'=>$ip
			];
		$this->db->trans_start();
		if($this->db->insert('designation',$data)) 
		{
			# code...
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
		In this deletedesignation function if Oragnsation admin want to termiante any designation  then this function will change the active=terminate  
	**/
	function deletedesignation($id)
	{
		
			$data=$this->db->select('designationcode')->where('designationcode',$id)->get('designation');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>'terminate'
						];
				$id=$data->row();
				$this->db->where('designationcode',$id->designationcode);	
				$res=$this->db->update('designation',$user);
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
?>