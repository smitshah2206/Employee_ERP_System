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
		$transaction_result=$this->db->get('transaction_histroy');
		$transaction_total_row=$transaction_result->num_rows()+1;
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
		if($transaction_total_row < 10)
		{
			$transaction_id='TRP00'.$transaction_total_row;
		}
		else if($transaction_total_row < 100)
		{
			$transaction_id='TRP0'.$transaction_total_row;
		}
		else
		{
			$transaction_id='TRP'.$transaction_total_row;
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
		$transaction_data = array(
						'transaction_id' 			=> $transaction_id,
						'transaction_amount'		=> $value['income'],
						'transaction_date'			=> $date_of_joining,
						'transaction_description'	=> 'Employee Salary',
						'user_id'					=> $employee_id,
				        'credit_debit_status' 		=> 2,
				        'status'					=> 0
				);
		$this->db->insert('transaction_histroy',$transaction_data);
		return $this->db->affected_rows();
	}
	public function update_employee($value,$employee_id)
	{
		$employee_data = array(
								'employee_id'	=> $employee_id,
							  );
		$user_data = array(
							'user_id'		=> $employee_id
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
		$transaction_data = array(
									'transaction_amount' => $value['income']
								);
		$this->db->where($user_data)
				 ->update('transaction_histroy', $transaction_data);
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
		$transaction_result=$this->db->get('transaction_histroy');
		$transaction_total_row=$transaction_result->num_rows()+1;
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
		if($transaction_total_row < 10)
		{
			$transaction_id='TRP00'.$transaction_total_row;
		}
		else if($transaction_total_row < 100)
		{
			$transaction_id='TRP0'.$transaction_total_row;
		}
		else
		{
			$transaction_id='TRP'.$transaction_total_row;
		}
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'project_id'		=> $project_id,
				        'first_name' 		=> $value['first_name'],
				        'last_name' 		=> $value['last_name'],
						'project_name'		=> $value['project_name'],
						'project_amount'	=> $value['project_amount'],
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
		$transaction_data = array(
						'transaction_id'			=> $transaction_id,
						'transaction_amount'		=> $value['project_amount'],
						'transaction_date'			=> $date_of_created,
						'transaction_description'	=> 'Project Payment',
						'user_id'					=> $project_id,
				        'credit_debit_status' 		=> 1,
				        'status'					=> 0
				);
		$this->db->insert('transaction_histroy',$transaction_data);
		return $this->db->affected_rows();
	}
	public function update_project($value,$project_id)
	{
		$project_data=array(
							 'project_id' => $project_id,
						);
		$user_data = array(
							'user_id'		=> $project_id
						  );
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'first_name' 		=> $value['first_name'],
				        'last_name' 		=> $value['last_name'],
						'project_name'		=> $value['project_name'],
						'project_amount'	=> $value['project_amount'],
						'deadline' 			=> $value['deadline'],
				        'contact_number' 	=> $value['contact_number'],
						'contact_email'		=> $value['contact_email'],
						'description' 		=> $value['description'],
						'created_by'		=> $created_by
				);
		$transaction_data = array(
									'transaction_amount' => $value['project_amount']
								);
		$this->db->where($user_data)
				 ->update('transaction_histroy', $transaction_data);
		$this->db->where($project_data)
				 ->update('project_details', $data);
		return $this->db->affected_rows();
	}
	public function delete_employee($employee_id)
	{
		$employee_data=array(
								'employee_id'	=> $employee_id,
							);
		$user_data = array(
							'user_id'	=> $employee_id
						  );
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'status'		=> 1,
						'created_by'	=> $created_by
				);
		$transaction_data = array(
						'status'		=> 1,
				);
		$this->db->where($user_data)
				 ->update('transaction_histroy', $transaction_data);
		$this->db->where($employee_data)
				 ->update('employee_details', $data);
		return $this->db->affected_rows();
	}
	public function delete_project($project_id)
	{
		$project_data=array(
							 'project_id' => $project_id,
						);
		$user_data = array(
							'user_id'	=> $project_id
						  );
		$created_by = $this->session->userdata('employee_id');
		$data = array(
						'status'		=> 1,
						'created_by'	=> $created_by
				);
		$transaction_data = array(
						'status'		=> 1,
				);
		$this->db->where($user_data)
				 ->update('transaction_histroy', $transaction_data);
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
	public function transaction_histroy($value='')
	{
		if($value==2)
		{
			$data=array(
					'credit_debit_status'	=> $value,
					'status'				=> 0
			);
			$result=$this->db->where($data)
							 ->order_by('id','DESC')
							 ->get('transaction_histroy');
		}
		elseif ($value==1) 
		{
			$result=$this->db->query('SELECT * FROM transaction_histroy WHERE `transaction_date` >= CURRENT_DATE() - INTERVAL 1 MONTH AND `credit_debit_status`=1 AND `status`=0 ORDER BY `id` DESC');
		}
		else
		{
			$result=$this->db->order_by('id','DESC')
							 ->get('transaction_histroy');
		}
		return $result;
	}
	public function transaction_sum($value='')
	{
		if($value==2)
		{
			$data=array(
					'credit_debit_status'	=> $value,
					'status'				=> 0
			);
			$result = $this->db->select_sum('transaction_amount')
							   ->where($data)
						       ->get('transaction_histroy');
		}
		elseif ($value==1) 
		{
			$result=$this->db->query('SELECT SUM(transaction_amount) AS transaction_amount FROM transaction_histroy WHERE `transaction_date` >= CURRENT_DATE() - INTERVAL 1 MONTH AND `credit_debit_status`=1 AND `status`=0');
		}
		else
		{
			$result = $this->db->select_sum('transaction_amount')
							   ->get('transaction_histroy');	
		}
		return $result;
	}
	public function add_transaction($value)
	{
		date_default_timezone_set('Asia/Kolkata');
		$transaction_date=date('Y-m-d H:i:s');
		$transaction_result=$this->db->get('transaction_histroy');
		$transaction_total_row=$transaction_result->num_rows()+1;	
		if($transaction_total_row < 10)
		{
			$transaction_id='TRP00'.$transaction_total_row;
		}
		else if($transaction_total_row < 100)
		{
			$transaction_id='TRP0'.$transaction_total_row;
		}
		else
		{
			$transaction_id='TRP'.$transaction_total_row;
		}
		$data = array(
						'transaction_id'		  => $transaction_id,
						'transaction_amount'	  => $value['transaction_amount'],
						'transaction_date'		  => $transaction_date,
						'transaction_description' => $value['transaction_description'],
						'credit_debit_status'	  => $value['transaction_type']
				);
		$this->db->insert('transaction_histroy', $data);		
		return $this->db->affected_rows();
	}
}
?>