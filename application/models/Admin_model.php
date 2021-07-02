<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Admin_model extends CI_model
{
	private $emp_code;
	private $org_code;
	function __construct()
	{
		parent::__construct();
	}
	/**
		Organisation Admin Login
		->In this function the Admin will login with client id 
	**/

	private function get_role(){
		$res = $this->db->select('mapping_employee.role_code,employee.privileges,mapping_employee.designation_code')->from('employee')->join('mapping_employee','mapping_employee.employee_code=employee.employee_code')->where('mapping_employee.employee_code', $this->emp_code)->get();
		if($res->num_rows() > 0){
			$role_code = $res->row()->role_code;
			$designation_code=$res->row()->designation_code;
			$privileges = explode(',', $res->row()->privileges);
			$role = $this->db->where(['role_code' => $role_code, "org_code" => $this->org_code])->get('role')->row();
			$designation = $this->db->where(['designation_code' => $designation_code, "org_code" => $this->org_code])->get('designation')->row();
			$this->session->set_userdata('role', $role->role);
			$this->session->set_userdata('role_code', $role->role_code);
			$this->session->set_userdata('designation', $designation->designation);
			$this->session->set_userdata('emp_code', $this->emp_code);
			$this->session->set_userdata('privileges',$privileges);
		}else{
			$privileges=['C','R','U','D'];
			$this->session->set_userdata('role', 'Admin');
			$this->session->set_userdata('privileges',$privileges);
		}
	}
	function login()
	{
		$this->emp_code = $this->input->post('ClientID');
		$username = $this->input->post('ClientID');
		$password = $this->input->post('password');

		$user = $this->db->select('*')->where(['username'=>$username,'password'=>$password,'status'=>0])->get('user');

		if($user->num_rows() > 0)
		{
			$this->org_code = $user->row()->org_code;
			$this->get_role();
			$this->session->set_userdata('org_code',$this->org_code);
			$this->session->set_userdata('org_name', org_info($this->org_code));
			$this->session->set_userdata('is_login',true);
			return true;
		}
		else{
			echo "admin login is failed";
			return false;
		}
	}
	/**
		->Forget Password Function
	 **/
	function forgetpassword()
	{
		$username=$this->input->post('username');
		$this->session->set_userdata('username',$username);
		$data=$this->db->select('email')->from('employee')->where('employee_code',$username)->get();
		$email=$data->row();
		$this->session->set_userdata('email',$email->email);
		echo $email->email;
		return true;
		
	}
	/**
		Check Function
		->In this function it will check admin password flag is 0 or not
		->if it is 0 then it will return true
		->or return false 
	**/
	function check()
	{

		$flag=$this->db->where(['username'=>$this->input->post('ClientID'),'status'=>0,'password_flag'=>0])->get('user');
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
		// echo $this->session->userdata('emp_code');
		$data=[
			'password'=>$this->input->post('password'),
			'password_flag'=>1
		];
		$this->db->where(['org_code'=>$this->session->userdata('org_code'),'username'=>$this->session->userdata('emp_code')]);
		$res=$this->db->update('user',$data);
		return $res;
	}
	/**
	 * Employee Forget Password
	 **/
	function employeeforget()
	{
		$data=[
			'password'=>$this->input->post('password')
		];
		$this->db->where('username',$this->session->userdata('username'));
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
			];
		$this->db->trans_start();
		if($this->db->insert('role',$data)) 
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
						'status'=>1
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
				'dob'=>$this->input->post('employeeDob'),
				'email'=>$this->input->post('employeeEmail'),
				'contact'=>$this->input->post('employeeContact'),
				'Address'=>$this->input->post('employeeAddress'),
				'employee_code'=>$randomid,
				'org_code'=>$this->session->userdata('org_code'),
			
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip,
			];
		$this->db->trans_start();
		if($this->db->insert('employee',$data)) 
		{
			$mapping=[
				'employee_code'=>$randomid,
				'department_code'=>$this->input->post('departmentcombo'),
				'designation_code'=>$this->input->post('designationcombo'),
				'role_code'=>$this->input->post('rolecombo'),
			];

			if($this->db->insert('mapping_employee',$mapping))
			{
				$final=[
					'org_code'=>$this->session->userdata('org_code'),
					'role'=>$this->input->post('rolecombo'),
					'username'=>$randomid,
					'password'=>$randomid,
					'created_at'=>date('y-m-d H:i:s'),
					'ip_address'=>$ip,
				];
				if($this->db->insert('user',$final))
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
						'status'=>1
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
						'status'=>1
						];
				$id=$data->row();
				$this->db->where('department_code',$id->department_code);	
				$res=$this->db->update('department',$user);
				if($res>0)
				{
					$id=$data->row();
					$tb_user=[
						'status'=>1
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
				'department_code'=>$this->input->post('departmentcombo'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip
			];
		$this->db->trans_start();
		if($this->db->insert('designation',$data)) 
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
						'status'=>1
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
	/**
		In this function it gives all the data from the country table 
	**/
	function viewcountry()
	{
		return $this->db->select('*')->get('country')->result();
	}
	/**
		In this function Country data will be inserted
	**/
	function countryinsert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();
		$data=[
				//'id'=>$this->input->post('NULL'),
				'country_code'=>$randomid,
				'country'=>$this->input->post('CountryName'),
				'org_code'=>$this->session->userdata('org_code'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip
			];
		$this->db->trans_start();
		if($this->db->insert('country',$data)) 
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
	/***
		Country Data By Country Code
	 ***/
	function countrybyid($id)
	{
		return $this->db->select('*')->from('country')->where('country_code',$id)->get()->result();
	}
	function countryedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'country'=>$this->input->post('CountryName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('country_code',$id)->update('country',$data))
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
		In this deletecountry function if Oragnsation admin want to delete any country then this function will change the active=In-active and also changed in the country data related table 
	**/
	function deletecountry($id)
	{
		
			$data=$this->db->select('country_code')->where('country_code',$id)->get('country');
			if($data->num_rows()>0)
			{
				$country_status=[
						'status'=>1
						];
				$id=$data->row();
				$this->db->where('country_code',$id->country_code);	
				$this->db->trans_start();
				if($this->db->update('country',$country_status))
				{
					$state_status=[
						'status'=>1
						];
					$id=$data->row();
					$this->db->where('country_code',$id->country_code);
					if($this->db->update('state',$state_status))	
					{
						$city_status=[
						'status'=>1
						];
						$id=$data->row();
						$this->db->where('country_code',$id->country_code);
						if($this->db->update('city',$city_status))
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
					else
					{
						$this->db->trans_rollback();
						return false;
					}

				}
				else
				{
					$this->db->trans_rollback();
					return false;
				}
				
			}
			else
			{
				
				return false;
			}
	}

	/**
		In this function it gives all the data from the state table 
	**/
	function viewstate()
	{
		return $this->db->select('state_code as code,state')->get('state')->result();
	}

	function view_state()
	{
		return $this->db->select('*')->get('state')->result();
	}	

	function viewstatestar()
	{
		return $this->db->select('*')->get('state')->result();	
	}
	/***
		State Data By State Code
	 ***/
	function statebyid($id)
	{
		return $this->db->select('*')->from('state')->where('state_code',$id)->get()->result();
	}
	/**
		In this function State data will be inserted
	**/
	function stateinsert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();
		$data=[
				'country_code'=>$this->input->post('countrycombo'),
				'state_code'=>$randomid,
				'org_code'=>$this->session->userdata('org_code'),
				'state'=>$this->input->post('StateName'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip
			];
		$this->db->trans_start();
		if($this->db->insert('state',$data)) 
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
	function stateedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'state'=>$this->input->post('StateName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('state_code',$id)->update('state',$data))
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
		In this deletestate function if admin want to delete any state then this function will change the active=In-active and also changed in the state data related table 
	**/
	function deletestate($id)
	{
		
			$data=$this->db->select('state_code')->where('state_code',$id)->get('state');
			if($data->num_rows()>0)
			{
				$state_status=[
						'status'=>1
						];
				$id=$data->row();
				$this->db->where('state_code',$id->state_code);	
				$this->db->trans_start();
				if($this->db->update('state',$state_status))
				{
					$city_status=[
						'status'=>1
						];
					$id=$data->row();
					$this->db->where('state_code',$id->state_code);
					if($this->db->update('city',$city_status))	
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
				else
				{
					$this->db->trans_rollback();
					return false;
				}
				
			}
			else
			{
				return false;
			}
	}
	/**
		In this function it gives all the data from the city table 
	**/
	function viewcity()
	{
		return $this->db->select('*')->get('city')->result();
	}
	/***
		State Data By State Code
	 ***/
	function citybyid($id)
	{
		return $this->db->select('*')->from('city')->where('city_code',$id)->get()->result();
	}
	/**
		In this function City data will be inserted
	**/
	function cityinsert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();

		$data=[
			'country_code'=>$this->input->post('countrycombo'),
			'state_code'=>$this->input->post('statecombo'),
			'city_code'=>$randomid,
			'org_code'=>$this->session->userdata('org_code'),
			'city'=>$this->input->post('CityName'),
			'created_at'=>date('y-m-d H:i:s'),
			'ip_address'=>$ip
		];
		$this->db->trans_start();
		if($this->db->insert('city',$data)){
			$mapping_city=[
				'city_code'=>$randomid,
				'state_code'=>$this->input->post('statecombo'),
				'country_code'=>$this->input->post('countrycombo')
			];
			if($this->db->insert('mapping_city',$mapping_city)) {
				$this->db->trans_complete();
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}
	function cityedit($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'city'=>$this->input->post('CityName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('city_code',$id)->update('city',$data))
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
		In this function it gives all the data from the Pincode table 
	**/
	function viewpincode()
	{
		return $this->db->select('*')->from('pincode')->join('city','city.id=pincode.city_code')->get()->result();
	}
	/**
		In this function Pincode data will be inserted
	**/
	function pincodeinsert()
	{
		
		$ip=$this->input->ip_address();
		$data = [];
		for($i=0;$i<sizeof($_POST['zipCode']);$i++){
			$data[] =[
				'zip_code'=>$_POST['zipCode'][$i],
				'city_code'=>$this->input->post('city'),
				'area'=>$_POST['area'][$i],
				'org_code'=>$this->session->userdata('org_code'),
				'created_at'=>date('y-m-d H:i:s'),
				'ip_address'=>$ip
			];
		}

		$this->db->trans_start();
		if($this->db->insert_batch('pincode',$data)) {
			$this->db->trans_complete();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	/**
		In this function it gives all the data from the zone table 
	**/
	function viewzone()
	{
		return $this->db->select('*')->join('employee','employee.employee_code=zone.employee')->where('parent',null)->get('zone')->result();
	}
	/**
		In this function it gives all the data from the zone table 
	**/

	function subviewzone()
	{
		$subqry=$this->db->select('city_code')->from('city')->get()->result();		

		// print_r($subqry);

		return $this->db->select('*')->join('employee','employee.employee_code=zone.employee')->where_in('$subqry')->where('parent!=',null)->get('zone')->result();
	}
	/**
		In this function Zone data will be inserted
	**/
	function zoneinsert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();

		$data=[
			'zone_code'=>$randomid,
			'zone'=>$this->input->post('ZoneName'),
			'state_code'=>null,
			'employee'=>$this->input->post('Employee'),
			'org_code'=>$this->session->userdata('org_code'),
			'created_at'=>date('y-m-d H:i:s'),
			'ip_address'=>$ip
		];
		
		$insert=$this->db->insert('zone',$data);
		if($insert>0)
		{
			return true;
		}
		else{
			return false;
		}
	}

	/**
		In this function Zone data will be updated
	**/
	function zonedetails_by_id($zone_code)
	{
		return $this->db->select('*')->where('zone_code',$zone_code)->get('zone')->result();

		// return $this->db->select('*')->from('zone')->join('employee','employee.employee_code=zone.employee')->join('','')->where('zone_code',$zone_code)->get('zone')->result();

	}

	function employeedetails_by_id()
	{
		return $this->db->select('*')->from('mapping_employee')->join('designation','designation.designation_code=mapping_employee.designation_code')->join('employee','mapping_employee.employee_code=employee.employee_code')->where('designation','Sales Manager')->get()->result();
	}

	function updatezone($zonecode)
	{

		$data=[
			'zone'=>$this->input->post('ZoneName'),
			'employee'=>$this->input->post('Employee')
		];
		$this->db->where('zone_code',$zonecode);
		$res=$this->db->update('zone',$data);
		return $res;
	}

	/**
		In this function Sub-Zone data will be inserted
	**/
	function subzoneinsert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();

		$data=[
			'zone_code'=>$randomid,
			'zone'=>$this->input->post('SubZoneName'),
			'state_code'=>implode(',',$this->input->post('city[]')),
			'employee'=>$this->input->post('Employee'),
			'org_code'=>$this->session->userdata('org_code'),
			'created_at'=>date('y-m-d H:i:s'),
			'parent'=>$this->input->post('zonecode'),
			'ip_address'=>$ip
		];
		
		$insert=$this->db->insert('zone',$data);
		if($insert>0)
		{
			return true;
		}
		else{
			return false;
		}
	}

	function updatesubzone($zone_code)
	{
		$data=[
			'zone_code'=>$zone_code,
			'zone'=>$this->input->post('SubZoneName'),
			'state_code'=>implode(',',$this->input->post('city[]')),
			'employee'=>$this->input->post('Employee'),
		];
		$this->db->where('zone_code',$zonecode);
		$res=$this->db->update('zone',$data);
		return $res;
	}

	function get_manager()
	{
		return $this->db->select('employee.employee_code,employee')->from('employee')->join('mapping_employee','employee.employee_code=mapping_employee.employee_code')->join('designation','designation.designation_code=mapping_employee.designation_code')->where(['designation.designation'=>'Sales Manager'])->get()->result();
	}

	function productinsert()
	{
		$ip=$this->input->ip_address();
		$this->load->helper('upload_helper');

		$data=[
			'company'=>$this->input->post('companycombo'),
			'product'=>$this->input->post('name'),
			'product_code'=>$this->input->post('productcode'),
			'product_type'=>$this->input->post('producttype'),
			'description'=>$this->input->post('description'),
			'price'=>$this->input->post('customerprice'),
			'distributor_price'=>$this->input->post('distributorprice'),
			'HSN_code'=>$this->input->post('hsncode'),
			'weight'=>$this->input->post('weight'),
			'GST'=>$this->input->post('tax'),
			'information'=>$this->input->post('information'),
			'product_image' => file_upload('proimage'),
			'product_document' => (!empty($_FILES['procatg']['name']))?file_upload('procatg'):'',
			'org_code'=>$this->session->userdata('org_code'),
			'created_at'=>date('y-m-d H:i:s'),
			'ip_address'=>$ip
		];
		$this->db->trans_start();

		if($insert=$this->db->insert('product',$data))
		{
			$approved_price = [];
			for($i=0;$i<sizeof($_POST['c_name']);$i++)
			{
				$approved_price[] =[
					'product_id'=>$this->input->post('productcode'),
					'company_code'=>$_POST['c_name'][$i],
					'price'=>$_POST['c_price'][$i]
				];
			}
			if($insert=$this->db->insert_batch('approved_price',$approved_price))
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

	/**
		In this function it gives all the data from the city table 
	**/
	function viewcompany()
	{
		return $this->db->select('*')->get('company')->result();
	}
	function companyinsert()
	{
		$randomid=random_string('alnum',6);
		$ip=$this->input->ip_address();

		$data=[
			'company_code'=>$randomid,
			'company'=>$this->input->post('CompanyName'),
			'org_code'=>$this->session->userdata('org_code'),
			'created_at'=>date('y-m-d H:i:s'),
			'ip_address'=>$ip
		];
		
		$insert=$this->db->insert('company',$data);
		if($insert>0)
		{
			return true;
		}
		else{
			return false;
		}	
	}
	/**
		Comapny Update
	**/
	function editcompany($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'company'=>$this->input->post('CompanyName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('company_code',$id)->update('company',$data))
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
		In this function it gives all the data from Comapny by id
	**/
	function companybyid($id)
	{
		return $this->db->select('*')->where('company_code',$id)->get('company')->result();
	}
	/**
		In this function it gives all the data from the city table 
	**/
	function viewproduct()
	{
		return $this->db->select('*')->get('product')->result();
	}
	/**
		In this function it gives all the data from the city table 
	**/
	function viewproducttype()
	{
		return $this->db->select('*')->get('product_type')->result();
	}
	function producttypeinsert()
	{
		
		$ip=$this->input->ip_address();
		$data=[
			'company_code'=>$this->input->post('companycombo'),
			'product_type'=>$this->input->post('ProductName'),
			'org_code'=>$this->session->userdata('org_code'),
			'created_at'=>date('y-m-d H:i:s'),
			'ip_address'=>$ip
		];
		
		$insert=$this->db->insert('product_type',$data);
		if($insert>0)
		{
			return true;
		}
		else{
			return false;
		}	
	}
		/**
		Comapny Update
	**/
	function editproducttype($id)
	{
		$ip=$this->input->ip_address();
		 $data=[
			'product_type'=>$this->input->post('ProductTypeName'),
		    'status'=>$this->input->post('statuscombo'),
			'ip_address'=>$ip
		];
		
		$this->db->trans_start();

		if($this->db->where('id',$id)->update('product_type',$data))
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
		In this function it gives all the data from ProductType by id
	**/
	function producttypebyid($id)
	{
		return $this->db->select('*')->where('id',$id)->get('product_type')->result();
	}
	function leadinsert()
	{
		$ip=$this->input->ip_address();
		$randomid=random_string('alnum',6);
		$data=[
			'lead_code'=>$randomid,
			'org_code'=>$this->session->userdata('org_code'),
			'zone_code'=>$this->input->post('optzone'),
			'employee_code'=>$this->session->userdata('org_code'),
			'city_code'=>$this->input->post('optcity'),
			'zip_code'=>$this->input->post('optpin'),
			'supplier_code'=>$this->input->post('supplier'),
			'brand'=>$this->input->post('brand'),
			'company_name'=>$this->input->post('company_name'),
			'gst'=>$this->input->post('gst'),
			'address'=>$this->input->post('address'),
			'created_at'=>date('y-m-d H:i:s'),
			'ip_address'=>$ip
		];
		$this->db->trans_start();

		if($insert=$this->db->insert('lead',$data))
		{
			$contact_person= [];
			for($i=0;$i<sizeof($_POST['cp_name']);$i++)
			{
				$contact_person[] =[
					'lead_code'=>$randomid,
					'person_name'=>$_POST['cp_name'][$i],
					'designation'=>$_POST['cp_designation'][$i],
					'mobile_no'=>$_POST['cp_mobile'][$i],
					'email'=>$_POST['cp_email'][$i]
				];
			}
			if($insert=$this->db->insert_batch('mapping_lead',$contact_person))
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
	/*
		Lead Update
	*/
	function updatelead($leadcode){
		$data=[
			'zone_code'=>$this->input->post('optzone'),
			'city_code'=>$this->input->post('optcity'),
			'zip_code'=>$this->input->post('optpin'),
			'supplier_code'=>$this->input->post('supplier'),
			'brand'=>$this->input->post('brand'),
			'company_name'=>$this->input->post('company_name'),
			'gst'=>$this->input->post('gst'),
			'address'=>$this->input->post('address'),
		];

		$res=$this->db->where('lead_code',$leadcode)->update('lead',$data);
		if($res>0)
		{
			$contact_person= [];
			for($i=0;$i<sizeof($_POST['cp_name']);$i++)
			{
				$contact_person[] =[
					'lead_code'=>$leadcode,
					'person_name'=>$_POST['cp_name'][$i],
					'designation'=>$_POST['cp_designation'][$i],
					'mobile_no'=>$_POST['cp_mobile'][$i],
					'email'=>$_POST['cp_email'][$i]
				];
			}
			//$update=;
			if($this->db->update_batch('mapping_lead',$contact_person,'lead_code'))
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

	/*
		Client View
	*/
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
				'city_code'=>$this->input->post('city'),
				'zone_code'=>$this->input->post('subzone'),
				'zip_code'=>$this->input->post('Pincode'),
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
	function view_zone()
	{
		return $this->db->select('zone_code as code,zone')->join('employee','employee.employee_code=zone.employee')->where('parent',null)->get('zone')->result();
	}

	function viewleadlist()
	{
		return $this->db->select('*')->get('lead')->result();
	}

	function leadlist_insert()
	{
		$leadcode=$this->input->post('lead_code');

		$data=[
			'lead_code'=>$leadcode,
			'employee_code'=>$this->session->userdata('org_code'),
			'customer_available'=>$this->input->post('customercombo'),
			'concerned_person'=>$this->input->post('concernperson'),
			'contact_person'=>$this->input->post('Personname'),
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
					'lead_code'=>$leadcode,
					'person_name'=>$_POST['cp_name'][$i],
					'designation'=>$_POST['cp_designation'][$i],
					'mobile_no'=>$_POST['cp_mobile'][$i],
					'email'=>$_POST['cp_email'][$i]
				];
			}
			if($insert=$this->db->insert_batch('mapping_lead',$contact_person))
			{
				$data2=[
					'lead_code'=>$leadcode,
					'employee_code'=>$this->session->userdata('org_code'),
					'customer_available'=>$this->input->post('customercombo'),
					'concerned_person'=>$this->input->post('concernperson'),
					'contact_person'=>$this->input->post('Personname'),
					// 'location'=>
					// 'contact_no'=>
					'quotation_require'=>$this->input->post('quotationreq'),
					'visit_type'=>$this->input->post('visitetype'),
					'additional_remark'=>$this->input->post('remark'),
					'ip_address'=>$this->input->ip_address()
				];
				if($this->db->insert('followup',$data2))
				{
					$this->db->trans_complete();
					return $data2;
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

	

	// function updateleadlist($code)
	// {
	// 	// $this->db->where(['lead_code'=>$code]);
	// 	// $res=$this->db->update('quotation');
	// 	// return $res;
	// }

	function leaddetails_by_id($lead_code)
	{
		return $this->db->select('*')->where('lead_code',$lead_code)->get('lead')->result();
	}
	function maapingleaddetails_by_id($lead_code)
	{
		return $this->db->select('*')->where('lead_code',$lead_code)->get('mapping_lead')->result();
	}

	function companydetails()
	{
		return $this->db->select('*')->get('company')->result();
	}

	function productdetails()
	{
		return $this->db->select('*')->get('product')->result();
	}

	function viewquotation()
	{
		return $this->db->select('*')->get('quotation')->result();
	}
	function viewquotationbyid($id)
	{	
		return $this->db->select('*')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where('mapping_quotation.quotation_code',$id)->get('')->result();
	}
	function quotationinsert($id)
	{
		$randomid=random_string('alnum',5);
		$randominvoice=random_string('alnum',5);

		$ip=$this->input->ip_address();
		$quotation=[
			'quotation_code'=>$randomid,
			'lead_code'=>$id,
			'employee_code'=>$this->session->userdata('org_code'),
			// 'product_code'=>$this->input->post('productname'),
			//'total'=>$this->input->post('total'),
			'ip_address'=>$ip,
			'invoice_number'=>$randominvoice,

			// 'quantity'=>$this->input->post('qty'),
			// 'price'=>$this->input->post('Productprice'),
			// 'approved_price'=>$this->input->post('approvedprice'),
			// 'rate'=>$this->input->post('rate'),
			// 'discount_type'=>$this->input->post('discounttype'),
			// 'discount'=>$this->input->post('discount'),
		];
		if($this->db->insert('quotation',$quotation))
		{
			return $quotation['quotation_code'];
		}
		else{
			return false;
		}
	}


	function mapping_quotationinsert($lead_code,$quotation_code)
	{
		$mapping_quotation=[
			'lead_code'=>$lead_code,
			'quotation_code'=>$quotation_code,
			'product_code'=>$this->input->post('productname'),
			'quantity'=>$this->input->post('qty'),
			'price'=>$this->input->post('Productprice'),
			'approved_price'=>$this->input->post('approvedprice'),
			'rate'=>$this->input->post('rate'),
			'discount_type'=>$this->input->post('discounttype'),
			'discount'=>$this->input->post('discount'),
			'total'=>$this->input->post('total')
		];
		if($this->db->insert('mapping_quotation',$mapping_quotation))
		{
			return $quotation_code;
		}
		else{
			return false;
		}
	}

	function panding_quotationlist($code)
	{
		return $this->db->select('*')->from('quotation')->join('mapping_quotation','mapping_quotation.quotation_code=quotation.quotation_code')->where(['quotation.lead_code'=>$code,'mapping_quotation.quotation_status'=>0,'quotation.status'=>0])->get()->result();
	}
	function quotationConfirm($code)
	{
		$total=$this->db->select_sum('total')->from('mapping_quotation')->where('quotation_code',$code)->get()->row();
		
		$status=[
			'status'=>1,
			'total'=>$total->total
		];
		$this->db->where(['quotation_code'=>$code,'status'=>0]);
		$res=$this->db->update('quotation',$status);
		return $res;
		// return $this->db->update('quotation')->set('status',1)->where('status',0)->get()->result();
	}
	/**
		In this function we get pending quotation list
	**/
	function pendingdetails()
	{
		// return $this->db->select('*')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where(['quotation.status'=>1,'mapping_quotation.quotation_status'=>0])->get()->result();

		return $this->db->select('*')->where('status',1)->get('quotation')->result();
	}
	/**
		In this function we get pending quotation list by leadcode
	**/
	function pending_leadcode($leadcode)
	{
		return $this->db->select('*')->where(['quotation_status'=>0,'lead_code'=>$leadcode])->get('mapping_quotation')->result();
	}

	/**
		In this function we get pending quotation list by quotation
	**/
	function pending_quotation($quotation_code)
	{
		return $this->db->select('*')->where(['quotation_status'=>0,'quotation_code'=>$quotation_code])->get('mapping_quotation')->result();
	}
	/**
		In this function pending quotation will be updated by leadcode
	**/
	function quotation_confirm($quotation_code)
	{
		// echo $quotation_code;
	
		$status=[
			'quotation_status'=>1	
		];
		$this->db->where(['quotation_status'=>0,'quotation_code'=>$quotation_code]);
		$res=$this->db->update('mapping_quotation',$status);
		if($res>0)
		{	
			$close_date=[
			'quotation_close_date'=>date('Y-m-d H:i:s'),
			'status'=>2	
			];
			$this->db->where('quotation_code',$quotation_code);
			$res=$this->db->update('quotation',$close_date);
			return $res;	
		}
	}
	/**
		In this function we get quotation close list
	**/
	function quotationcloselist()
	{
		// return $this->db->select('quotation.id,quotation.lead_code,quotation.quotation_code,quotation.quotation_close_date,quotation.invoice_number')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where(['quotation.status'=>1,'mapping_quotation.quotation_status'=>1])->get()->result();
		return $this->db->select('*')->where('status',2)->get('quotation')->result();
	}
	/**
		In this function we get expense list
	**/
	function expenselist()
	{
		return $this->db->select('*')->get('expense')->result();
	}
	/**
		In this function we get expense list
	**/
	function expenseinsert()
	{
		$ip=$this->input->ip_address();
		$this->load->helper('upload_helper');
		$expense=[
			'date'=>$this->input->post('date'),
			'type'=>$this->input->post('expense_type'),
			'description'=>$this->input->post('description'),
			'amount'=>$this->input->post('amount'),
			'expense_for'=>$this->input->post('expense_for'),
			'expense_image'=>file_upload('expimage'),
			'ip_address'=>$ip,
			'employee_code'=>$this->session->userdata('emp_code'),
			'org_code'=>$this->session->userdata('org_code')
		];
		$this->db->trans_start();	
		if($this->db->insert('expense',$expense))
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
		In this function 
	**/
	function viewexpensebyid($id)
	{
		return $this->db->select('*')->where('id',$id)->get('expense')->result();
	}

	function view_close_quotation_by_id($id)
	{
		return $this->db->select('*')
		->from('quotation')
		->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code', 'inner')
		->where('quotation.quotation_code',$id)->get()->result();

		// return $this->db->select('DISTINCT(quotation.quotation_code),mapping_quotation.product_code,mapping_quotation.quantity,mapping_quotation.rate')->from('quotation')->join('mapping_quotation','quotation.quotation_code=mapping_quotation.quotation_code')->where('quotation.quotation_code',$id)->get()->result();
	}

	function followuplist()
	{
		return $this->db->select('*')->get('followup')->result();
	}
	/**
	Update-DetailsById
	**/
	function getdetailsbyid($quotation_code)
	{

	return $this->db->select('*')->where(['quotation_status'=>0,'quotation_code'=>$quotation_code])->get('mapping_quotation')->result();
	}
	function updatedetailsbyid($id)
	{
		return $this->db->select('*')->from('mapping_quotation')->join('product','mapping_quotation.product_code=product.product_code')->where('mapping_quotation.id',$id)->get()->result();
	}

	function fetch_productdetails()
	{
		return $this->db->select('*')->get('product')->result();
	}

	function fetch_organizationdetails()
	{
		return $this->db->select('*')->where('org_code',$this->session->userdata('org_code'))->get('organization')->result();
	}

	function fetch_supplierdetails($id)
	{
		$s_code=$this->db->select('lead.supplier_code')->from('lead')->join('quotation','lead.lead_code=quotation.lead_code')->where('quotation_code',$id)->get()->row();
		// echo $s_code->supplier_code;
		return $this->db->select('*')->where('client_code',$s_code->supplier_code)->get('client')->result();

	}
	function employee_manager()
	{
		return $this->db->select('*')->from('employee')
		->join('mapping_employee','employee.employee_code=mapping_employee.employee_code')
		->join('role','mapping_employee.role_code=role.role_code')
		->where('role.role',"Employee")
		->get()->result();
	}
	function expensereport()
	{
		return $this->db->select('*')->from('expense')
		->join('employee','expense.employee_code=employee.employee_code')
		->get()->result();
	}
	// function expense_name($code)
	// {
	// 	return $this->db->select('*')->from('expense')
	// 	->where('expense.employee_code',$code)
	// 	->join('employee','expense.employee_code=employee.employee_code')
	// 	->get()->result();
	// }
	// function expense_type($type)
	// {
	// 	return $this->db->select('*')->from('expense')
	// 	->where('type',$type)
	// 	->join('employee','expense.employee_code=employee.employee_code')
	// 	->get()->result();
	// }

	function common($type,$code,$fromdate,$todate)
	{
		$this->db->select('exp.*')->from('expense as exp');
			$this->db->join('employee','exp.employee_code=employee.employee_code');
		
		if(!empty($fromdate))
			$this->db->where('DATE(exp.date) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(exp.date) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($type))
			$this->db->where('type',$type);
		
		if(!empty($code))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('exp.employee_code',$code);
		return $this->db->get()->result();
	}

	function employee_common($role,$department,$designation,$fromdate,$todate)
	{
		$this->db->select('e1.*,r1.role,des1.designation,dep1.department')->from('employee as e1');
		$this->db->join('mapping_employee as m1','e1.employee_code=m1.employee_code');
		$this->db->join('role as r1','r1.role_code=m1.role_code');
		$this->db->join('designation as des1','des1.designation_code=m1.designation_code');
		$this->db->join('department as dep1','dep1.department_code=m1.department_code');
		
		if(!empty($fromdate))
			$this->db->where('DATE(e1.created_at) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(e1.created_at) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($role))
			$this->db->where('m1.role_code',$role);
		
		if(!empty($department))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('m1.department_code',$department);

		if(!empty($designation))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('m1.designation_code',$designation);

		return $this->db->get()->result();
	}

	function lead_common($optzone,$optcity,$fromdate,$todate)
	{
		$this->db->select('*')->from('lead as l1');
		$this->db->join('client s1','l1.supplier_code=s1.client_code');
		$this->db->join('zone as z1','z1.zone_code=l1.zone_code');
		$this->db->join('city as c1','c1.city_code=l1.city_code');
		$this->db->join('employee as e1','e1.employee_code=l1.employee_code');
		// $this->db->join('employee as e1','e1.employee_code=l1.employee');
		
		if(!empty($fromdate))
			$this->db->where('DATE(l1.created_at) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(l1.created_at) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($optzone))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('l1.zone_code',$optzone);

		if(!empty($optcity))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('l1.city_code',$optcity);

		return $this->db->get()->result();
	}

	function quotation_type($lead_code,$code,$fromdate,$todate)
	{
		$this->db->select('q.*')->from('quotation as q');
		$this->db->join('mapping_quotation as mq','q.quotation_code=mq.quotation_code');
		$this->db->join('lead as l','l.lead_code=mq.lead_code');

		if(!empty($fromdate))
			$this->db->where('DATE(q.quotation_close_date) >= ', $fromdate);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where('DATE(q.quotation_close_date) <= ', $todate);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($lead_code))
			$this->db->where('q.lead_code',$lead_code);
		
		if(!empty($code))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where('q.employee_code',$code);
		return $this->db->get()->result();
	}
	function leaddetails()
	{
		return $this->db->select('*')->get('lead')->result();
	}
	function complaint_type($lead_code,$code,$fromdate,$todate)
	{
		$this->db->select('*')->from('complaint as c');
		$this->db->join('complaint_tracking as ct','c.complaint_code=ct.complaint_code');
		if(!empty($fromdate))
			$this->db->where(['DATE(ct.created_at) >= '=>$fromdate,'ct.status'=>2]);
		// else
		// 	$this->db->where('DATE(exp.date) >= ', date('Y-m-d'));
		
		if(!empty($todate))
			$this->db->where(['DATE(ct.created_at) <= '=>$todate,'ct.status'=>2]);
		// else
		// 	$this->db->where('DATE(exp.date) <= ', date('Y-m-d'));

		if(!empty($lead_code))
			$this->db->where('q.lead_code',$lead_code);
		
		if(!empty($code))
			// $this->db->join('employee','exp.employee_code=employee.employee_code');
			$this->db->where(['ct.employee_code'=>$code,'ct.status'=>2]);
		return $this->db->get()->result();
	}
	function employeedetails()
	{
		return $this->db->select('*')->from('employee as e')
		->join('mapping_employee as me','e.employee_code=me.employee_code')
		->join('designation as d','d.designation_code=me.designation_code')
		->where('d.designation',"Service Technician")
		->get()->result();
	}

	function managerdetails()
	{
		return $this->db->select('*')->from('employee as e')
		->join('mapping_employee as me','e.employee_code=me.employee_code')
		->join('designation as d','d.designation_code=me.designation_code')
		->where('d.designation',"Manager")
		->get()->result();
	}
	
}
?>