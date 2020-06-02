<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class route extends CI_Controller {

	public function index()
	{
		$session_array = $this->session->userdata();
		if(isset($session_array['id']))
		{
			redirect('route/dashboard');
		}
		else
		{
			$this->load->view('index',['message' => $this->session->flashdata('message')]);		
		}
	}
	public function logout()
	{
		$session_array = $this->session->userdata();
		if(isset($session_array['id']))
		{
			$this->session->sess_destroy();
			$this->session->set_flashdata('message', 'Logout Sucessfully');
			redirect('route/index');	
		}
		else
		{
			redirect('route/index');		
		}
	}
	public function dashboard()
	{
		$session_array = $this->session->userdata();
		if(isset($session_array['id']))
		{
			if($session_array['role']=='Admin')
			{
				$this->load->model('admin_model');
	        	$employee_result=$this->admin_model->fetch_employee();
	        	$project_result=$this->admin_model->fetch_project();
	            $this->load->view('dashboard',['employee_array'=> $employee_result->result_array(),'project_array'=> $project_result->result_array(),'message' => $this->session->flashdata('message')]);
			}
			else
			{
				$this->load->model('employee_model');
	        	$employee_project_array=$this->employee_model->fetch_project($session_array['employee_id']);
	            $project_id_array=$this->employee_model->fetch_project_id();
	            $this->load->view('employeedashboard',['employee_project_array'=> $employee_project_array->result_array(),'project_id_array'=> $project_id_array->result_array(),'header_value' => 'Employee Profile Histroy','message' => $this->session->flashdata('message')]);
			}	
		}
		else
		{
			redirect('route/index');		
		}
	}
	public function addproject()
	{
		$session_array = $this->session->userdata();
		if(isset($session_array['id']))
		{
			$this->load->model('admin_model');
        	$project_result=$this->admin_model->fetch_project();
            $this->load->view('addproject',['project_array'=> $project_result->result_array(),'message' => $this->session->flashdata('message')]);
		}
		else
		{
			redirect('route/index');		
		}
	}
	public function addemployee()
	{
		$session_array = $this->session->userdata();
		if(isset($session_array['id']))
		{
			$this->load->model('admin_model');
        	$employee_result=$this->admin_model->fetch_employee();
            $this->load->view('addemployee',['employee_array'=> $employee_result->result_array(),'message' => $this->session->flashdata('message')]);
		}
		else
		{
			redirect('route/index');		
		}
	}
	public function viewemployeehistroy()
	{
		$session_array = $this->session->userdata();
		if(isset($session_array['id']))
		{
			$this->load->view('viewemployeehistroy');
		}
		else
		{
			redirect('route/index');		
		}
	}
	public function header()
	{
		$this->load->view('header');
	}
}
