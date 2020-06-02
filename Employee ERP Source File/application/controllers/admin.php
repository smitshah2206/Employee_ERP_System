<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function index()
	{
		$session_array = $this->session->userdata();
        if(isset($session_array['id']))
        {
            redirect('route/dashboard');
        }
        else
        {
            $data=$this->input->post();
            if ($this->form_validation->run('login') == FALSE)
            {
                $this->load->view('index');
            }
            else
            {
                $this->load->model('admin_model');
                $result=$this->admin_model->login($data);
                if ($result->num_rows()) 
                {
                    $res=$result->result_array();
                    $this->session->set_userdata($res[0]);
                    $this->session->set_flashdata('message', 'Welcome');
                    redirect('route/dashboard');
                }
                else
                {
                    $this->session->set_flashdata('message', 'Email Id / Password Incorrect');
                    redirect('route/index');    
                }
            }   
        }
	}
	public function addproject()
	{
                $data=$this->input->post();
                if ($this->form_validation->run('addproject') == FALSE)
                {
                        $this->load->model('admin_model');
                        $project_result=$this->admin_model->fetch_project();
                        $this->load->view('addproject',['project_array'=> $project_result->result_array()]);
                }
                else
                {
                        $this->load->model('admin_model');
                        $result=$this->admin_model->add_project($data);
                        if ($result) 
                        {
                            $this->session->set_flashdata('message', 'Project Added Sucessfully');
                            redirect('route/addproject');
                        }
                        else
                        {
                            redirect('route/dashboard');        
                        }
                }
        }
        public function editproject()
        {
            $project_id=$this->uri->segment('3');
            $session_array = $this->session->userdata('role');
            if($session_array=='Admin')
            {
                $this->load->model('admin_model');
                $project_details=$this->admin_model->fetch_project($project_id);
                $project_result=$this->admin_model->fetch_project();
                $this->load->view('editproject',['project_array'=> $project_result->result_array(),'project_details' => $project_details->result_array(),'project_id' => $project_id]);
            }
            else
            {
                redirect('route/index');        
            }   
        }
    public function updateproject()
    {
        $project_id=$this->uri->segment('3');
        $data=$this->input->post();
        if ($this->form_validation->run('addproject') == FALSE)
        {
            $this->load->model('admin_model');
            $project_details=$this->admin_model->fetch_project($project_id);
            $project_result=$this->admin_model->fetch_project();
            $this->load->view('editproject',['project_array'=> $project_result->result_array(),'project_details' => $project_details->result_array(),'project_id' => $project_id]);
        }
        else
        {
                $this->load->model('admin_model');
                $result=$this->admin_model->update_project($data,$project_id);
                if ($result) 
                {   
                    $this->session->set_flashdata('message', 'Details Updated Sucessfully');
                    redirect('admin/viewproject/'.$project_id);
                }
                else
                {
                    redirect('route/dashboard');        
                }
        }
    }
    public function viewproject()
    {
            $project_id=$this->uri->segment('3');
            $this->load->model('admin_model');
            $project_array=$this->admin_model->fetch_project($project_id);
            $employee_array=$this->admin_model->fetch_employee_details($project_id);
            if ($project_array) 
            {
                
                $this->load->view('viewprojecthistroy',['project_details'=> $project_array->result_array(),'employee_details'=> $employee_array->result_array(),'message' => $this->session->flashdata('message')]);
            }
            else
            {
                redirect('route/dashboard');        
            }
    }
    public function deleteproject()
    {
        $project_id=$this->uri->segment('3');
        $session_array = $this->session->userdata('role');
        if($session_array=='Admin')
        {
            $this->load->model('admin_model');
            $project_details=$this->admin_model->delete_project($project_id);
            $this->session->set_flashdata('message', 'Delete Details Sucessfully');
            redirect('route/dashboard');
        }
        else
        {
            redirect('route/index');        
        }
    }
    public function addemployee()
    {
        $data=$this->input->post();
        if ($this->form_validation->run('addemployee') == FALSE)
        {
                        $this->load->model('admin_model');
                        $employee_result=$this->admin_model->fetch_employee();
                        $this->load->view('addemployee',['employee_array'=> $employee_result->result_array()]);
                }
                else
                {
                    $this->load->model('admin_model');
                    $result=$this->admin_model->add_employee($data);
                    if ($result) 
                    {
                        $this->session->set_flashdata('message', 'Employee Added Sucessfully');
                        redirect('route/addemployee');
                    }
                    else
                    {
                        redirect('route/dashboard');    
                    }
                }
    }
        public function editemployee()
        {
                $employee_id=$this->uri->segment('3');
                $session_array = $this->session->userdata('role');
                if($session_array=='Admin')
                {
                        $this->load->model('admin_model');
                        $employee_details=$this->admin_model->fetch_employee($employee_id);
                        $employee_result=$this->admin_model->fetch_employee();
                        if ($employee_details) 
                        {
                            $this->load->view('editemployee',['employee_array' => $employee_result->result_array(),'employee_details' => $employee_details->result_array(),'employee_id' => $employee_id]);
                        }
                        else
                        {
                            redirect('route/dashboard');        
                        }
                }
                else
                {
                    redirect('route/index');        
                }
        }
        public function updateemployee()
        {
            $data=$this->input->post();
            $employee_id=$this->uri->segment('3');
            if ($this->form_validation->run('addemployee') == FALSE)
            {
                $this->load->model('admin_model');
                $employee_details=$this->admin_model->fetch_employee($employee_id);
                $employee_result=$this->admin_model->fetch_employee();
                $this->load->view('editemployee',['employee_array'=> $employee_result->result_array(),'employee_details'=> $employee_details->result_array(),'employee_id' => $employee_id]);
            }
            else
            {
                $this->load->model('admin_model');
                $result=$this->admin_model->update_employee($data,$employee_id);
                if ($result) 
                {
                    $this->session->set_flashdata('message', 'Details Updated Sucessfully');
                    redirect('admin/viewemployee/'.$employee_id);
                }
                else
                {
                    redirect('route/dashboard');    
                }
            }
        }    
        public function viewemployee()
        {
                $employee_id=$this->uri->segment('3');
                $session_array = $this->session->userdata('role');
                if($session_array=='Admin')
                {
                        $this->load->model('admin_model');
                        $employee_array=$this->admin_model->fetch_employee($employee_id);
                        $this->load->model('employee_model');
                        $project_array=$this->employee_model->fetch_project($employee_id);
                        if ($employee_array) 
                        {
                                $this->load->view('viewemployeehistroy',['employee_details'=> $employee_array->result_array(),'project_details'=> $project_array->result_array(),'message' => $this->session->flashdata('message')]);
                        }
                        else
                        {
                                redirect('route/dashboard');        
                        }
                }
        }
        public function deleteemployee()
        {
            $employee_id=$this->uri->segment('3');
            $session_array = $this->session->userdata('role');
            if($session_array=='Admin')
            {
                $this->load->model('admin_model');
                $project_details=$this->admin_model->delete_employee($employee_id);
                $this->session->set_flashdata('message', 'Delete Details Sucessfully');
                redirect('route/dashboard');
            }
            else
            {
                redirect('route/index');        
            }
        }
        public function updatework()
        {
                $data=$this->input->post();
                $session_array = $this->session->userdata();
                if ($this->form_validation->run('updatework') == FALSE)
                {
                        $this->load->model('employee_model');
                        $employee_project_array=$this->employee_model->fetch_project($session_array['employee_id']);
                        $project_id_array=$this->employee_model->fetch_project_id();
                        $this->load->view('employeedashboard',['employee_project_array'=> $employee_project_array->result_array(),'project_id_array'=> $project_id_array->result_array(),'header_value' => 'Employee Profile Histroy']);
                }
                else
                {
                        $this->load->model('employee_model');
                        $result=$this->employee_model->addwork($data,$session_array['employee_id'],$session_array['first_name'],$session_array['last_name']);
                        if ($result) 
                        {
                            $this->session->set_flashdata('message', 'Work Added Sucessfully');
                            redirect('route/dashboard');
                        }
                        else
                        {
                                redirect('route/dashboard');    
                        }
                }         
        }
}
