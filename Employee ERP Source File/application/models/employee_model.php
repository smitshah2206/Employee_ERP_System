<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class employee_model extends CI_Model
{
	public function fetch_project($value)
	{
		$data=array(
					'employee_id'	=> $value,
			);
		$result =$this->db->select('update_work.id,update_work.description,update_work.created_time,project_details.project_id,project_details.first_name,project_details.last_name,project_details.deadline,project_details.contact_number,project_details.contact_email')
						 ->where($data)
				 		 ->from('project_details')
				         ->join('update_work', 'project_details.project_id = update_work.project_id')
				         ->order_by('id','DESC')
		                 ->get();
		return $result;
	}
	public function fetch_project_id()
	{
		$data=array(
					'status'	=> 0,
			);
		$result=$this->db->select('project_id')
						 ->where($data)
						 ->get('project_details');
		return $result;
	}
	public function addwork($value,$employee_id,$employee_first_name,$employee_last_name)
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_time=date('Y-m-d H:i:s');
		$result=$this->db->select('project_name')
						 ->where('project_id',$value['project_id'])
						 ->get('project_details');
		$project_name=$result->result_array()[0]['project_name'];
		$employee_data=array(
							 'last_project_id'   => $value['project_id'],
							 'last_project_name' => $project_name,
							 'last_work_time'	 => $current_time,
						);
		$this->db->where('employee_id', $employee_id);
		$this->db->update('employee_details', $employee_data);
		$project_data=array(
							 'last_employee_id'   => $employee_id,
							 'last_employee_name' => $employee_first_name.' '.$employee_last_name,
							 'last_work_time'	  => $current_time,
						);
		$this->db->where('project_id', $value['project_id']);
		$this->db->update('project_details', $project_data);
		$work_data=array(
					'project_id'	=> $value['project_id'],
					'employee_id'	=> $employee_id,
					'description'	=> $value['description'],
					'created_time'	=> $current_time,
			);
		$this->db->insert('update_work', $work_data);
		return $this->db->affected_rows();
	}	
}
?>