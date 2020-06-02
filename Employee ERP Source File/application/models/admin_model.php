<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_model extends CI_Model
{
	public function login($value)
	{
		$data = array(
				        'role'					=> $value['select'],
				        'contact_email' 		=> $value['contact_email'],
				        'password' 				=> md5($value['password']),
						'status'				=> 0
				);
		$result=$this->db->where($data)
				 		 ->get('employee_details');
		return $result;		
	}
	public function fetch_employee($value='')
	{
		if($value)
		{
			$data= array(
							'employee_id'	=> $value,
							'status'		=> 0
						);
			$result=$this->db->order_by('id','DESC')
							 ->where($data)
							 ->get('employee_details');
		}
		else
		{
			$data= array(
							'status'		=> 0
						);
			$result=$this->db->where($data)
							 ->order_by('id','DESC')
							 ->get('employee_details');
		}
		return $result;		
	}
	public function fetch_project($value='')
	{
		if($value)
		{
			$data= array(
							'project_id'	=> $value,
						);
			$result=$this->db->order_by('id','DESC')
							 ->where($data)
							 ->get('project_details');
		}
		else
		{
			$data= array(
							'status'		=> 0
						);
			$result=$this->db->order_by('id','DESC')
							 ->where($data)
							 ->get('project_details');
		}
		return $result;	
	}
	public function add_employee($value)
	{
		date_default_timezone_set('Asia/Kolkata');
		$date_of_joining=date('Y-m-d H:i:s');
		$result=$this->db->get('employee_details');
		$total_row=$result->num_rows()+1;
		if($total_row < 10)
		{
			$employee_id='EMP00'.$total_row;
		}
		else if($total_row < 100)
		{
			$employee_id='EMP0'.$total_row;
		}
		else
		{
			$employee_id='EMP'.$total_row;
		}
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'role' 				=> 'Employee',
						'employee_id'		=> $employee_id,
				        'first_name' 		=> $value['first_name'],
				        'last_name' 		=> $value['last_name'],
						'position'			=> $value['position'],
						'income' 			=> $value['income'],
				        'password'			=> md5($value['contact_number']),
				        'contact_number' 	=> $value['contact_number'],
						'contact_email'		=> $value['contact_email'],
						'description' 		=> $value['description'],
				        'location' 			=> 'Ahmedabad',
						'date_of_joining'	=> $date_of_joining,
						'last_project_id'	=> '---',
						'last_project_name'	=> '---',
						'last_work_time'	=> '---',
						'status'			=> 0,
						'created_by'		=> $created_by
				);
		$this->db->insert('employee_details', $data);
		return $this->db->affected_rows();
	}
	public function update_employee($value,$employee_id)
	{
		$employee_data=array(
								'employee_id'	=> $employee_id,
							);
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'first_name' 		=> $value['first_name'],
				        'last_name' 		=> $value['last_name'],
						'position'			=> $value['position'],
						'income' 			=> $value['income'],
				        'password'			=> md5($value['contact_number']),
				        'contact_number' 	=> $value['contact_number'],
						'contact_email'		=> $value['contact_email'],
						'description' 		=> $value['description'],
				        'created_by'		=> $created_by
				);
		$this->db->where($employee_data)
				 ->update('employee_details', $data);
		return $this->db->affected_rows();
	}
	public function add_project($value)
	{
		date_default_timezone_set('Asia/Kolkata');
		$date_of_created=date('Y-m-d H:i:s');
		$result=$this->db->get('project_details');
		$total_row=$result->num_rows()+1;
		if($total_row < 10)
		{
			$project_id='PRJ00'.$total_row;
		}
		else if($total_row < 100)
		{
			$project_id='PRJ0'.$total_row;
		}
		else
		{
			$project_id='PRJ'.$total_row;
		}
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'project_id'		=> $project_id,
				        'first_name' 		=> $value['first_name'],
				        'last_name' 		=> $value['last_name'],
						'project_name'		=> $value['project_name'],
						'deadline' 			=> $value['deadline'],
				        'contact_number' 	=> $value['contact_number'],
						'contact_email'		=> $value['contact_email'],
						'description' 		=> $value['description'],
						'date_of_created'	=> $date_of_created,
						'last_employee_id' 	=> '---',
						'last_employee_name'=> '---',
						'last_work_time' 	=> '---',
				        'status'			=> 0,
						'created_by'		=> $created_by
				);
		$this->db->insert('project_details', $data);
		return $this->db->affected_rows();
	}
	public function update_project($value,$project_id)
	{
		$project_data=array(
							 'project_id' => $project_id,
						);
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'first_name' 		=> $value['first_name'],
				        'last_name' 		=> $value['last_name'],
						'project_name'		=> $value['project_name'],
						'deadline' 			=> $value['deadline'],
				        'contact_number' 	=> $value['contact_number'],
						'contact_email'		=> $value['contact_email'],
						'description' 		=> $value['description'],
						'created_by'		=> $created_by
				);
		$this->db->where($project_data)
				 ->update('project_details', $data);
		return $this->db->affected_rows();
	}
	public function delete_employee($employee_id)
	{
		$employee_data=array(
								'employee_id'	=> $employee_id,
							);
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'status'		=> 1,
						'created_by'	=> $created_by
				);
		$this->db->where($employee_data)
				 ->update('employee_details', $data);
		return $this->db->affected_rows();
	}
	public function delete_project($project_id)
	{
		$project_data=array(
							 'project_id' => $project_id,
						);
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'status'		=> 1,
						'created_by'	=> $created_by
				);
		$this->db->where($project_data)
				 ->update('project_details', $data);
		return $this->db->affected_rows();
	}
	public function fetch_employee_details($value)
	{
		$data=array(
					'project_id'	=> $value,
			);
		$result =$this->db->select('update_work.id,update_work.description,update_work.created_time,employee_details.employee_id,employee_details.first_name,employee_details.last_name,employee_details.position,employee_details.contact_number,employee_details.contact_email')
						 ->where($data)
				 		 ->from('employee_details')
				         ->join('update_work', 'employee_details.employee_id = update_work.employee_id')
				         ->order_by('id','DESC')
		                 ->get();
		return $result;
	}
}
?>