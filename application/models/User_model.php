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
		$user=$this->db->select('*')->where(['org_code'=>$this->input->post('ClientID'),'password'=>$this->input->post('password'),'status'=>0])->get('user');
		if($user->num_rows()>0)
		{
			$org=$this->db->select('*')->where(['org_code'=>$this->input->post('ClientID')])->get('organization');
			$org_tbl=$org->row();
			$usertb_data=$user->row();
			$arr=[
				'id'=>$usertb_data->id,
				'org_code'=>$usertb_data->org_code,
				'role'=>$usertb_data->role,
				'clientname'=>$org_tbl->org_name
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

		$flag=$this->db->where(['org_code'=>$this->session->userdata('org_code'),'status'=>0,'password_flag'=>0])->get('user');
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
			'password_flag'=>1
		];
		$this->db->where('org_code',$this->session->userdata('org_code'));
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
				'org_code'=>$this->session->userdata('org_code'),
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
		return $this->db->select('*')->from('role')->where('role_code',$id)->get()->result();
	}
	function roleedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'role'=>$this->input->post('RoleName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('role_code',$id)->update('role',$data))
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
		
			$data=$this->db->select('role_code')->where('role_code',$id)->get('role');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>0
						];
				$id=$data->row();
				$this->db->where('role_code',$id->role_code);	
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
	
	function viewemployee()
	{
		return $this->db->select('*')->from('employee')->get()->result();
	}

	function employeeinsert()
	{
		$randomid=random_string('alnum',10);
		$ip=$this->input->ip_address();
		$data=[
				'employee'=>$this->input->post('employeeName'),
				'employee_code'=>$randomid,
				'org_code'=>$this->session->userdata('org_code'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip,
				'status'=>1
			];
		$this->db->trans_start();
		if($this->db->insert('employee',$data)) 
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

	function employeebyid($id)
	{
		return $this->db->select('*')->from('employee')->where('employee_code',$id)->get()->result();
	}

	function deleteemployee($id)
	{
		
			$data=$this->db->select('employee_code')->where('employee_code',$id)->get('employee');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>0
						];
				$id=$data->row();
				$this->db->where('employee_code',$id->employee_code);	
				$res=$this->db->update('employee',$user);
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

	function employeeedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'employee'=>$this->input->post('employeeName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('employee_code',$id)->update('employee',$data))
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
				'department'=>$this->input->post('DepartmentName'),
				'department_code'=>$randomid,
				'org_code'=>$this->session->userdata('org_code'),
				'ip_address'=>$ip,
				'status'=>1,
				'created_at'=>date('y-m-d H:i:s')
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
	function departmentbyid($id)
	{
		return $this->db->select('*')->from('department')->where('department_code',$id)->get()->result();
	}
	function departmentedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'department'=>$this->input->post('DepartmentName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('department_code',$id)->update('department',$data))
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
	function deletedepartment($id)
	{
		
			$data=$this->db->select('department_code')->where('department_code',$id)->get('department');
			if($data->num_rows()>0)
			{
				$user=[
						'status'=>0
						];
				$id=$data->row();
				$this->db->where('department_code',$id->department_code);	
				$res=$this->db->update('department',$user);
				if($res>0)
				{
					$id=$data->row();
					$tb_user=[
						'status'=>0
						];
					$this->db->where('department_code',$id->department_code);	
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
				'designation'=>$this->input->post('DesignationName'),
				'designation_code'=>$randomid,
				'org_code'=>$this->session->userdata('org_code'),
				'department_code'=>$this->input->post('designationtcombo'),
				'created_at'=>date('y-m-d H:i:s'),
				'status'=>1,
				'ip_address'=>$ip
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
	function designationbyid($id)
	{
		return $this->db->select('*')->from('designation')->where('designation_code',$id)->get()->result();
	}
	function designationedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'designation'=>$this->input->post('DesignationName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('designation_code',$id)->update('designation',$data))
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
		In this deletedesignation function if Oragnsation admin want to termiante any designation  then this function will change the active=terminate  
	**/
	function deletedesignation($id)
	{
		
			$data=$this->db->select('designation_code')->where('designation_code',$id)->get('designation');
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