<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Users_model','users_md');

    }
	
	public function index()
	{
        $data['title'] = 'Users List';

        $users = new Users_model();

        $data['lists'] = $users->select_all();
        
		$this->load->admin('users/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('surnname', 'Surname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('password', 'Şifrə', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('users/create');
            }

            $request_data = [
                'name' => $this->security->xss_clean($this->input->post('name')),
                'surname' => $this->security->xss_clean($this->input->post('surname')),
                'email' => $this->security->xss_clean($this->input->post('email')),
                'phone' => $this->security->xss_clean($this->input->post('phone')),
                'password' => md5($this->input->post('password')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            $insert_id = $this->users_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/users');
            }

        }

        $data['title'] = 'Users List';

        $this->load->admin('users/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('surnname', 'Surname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('users/create');
            }

            $request_data = [
                'name' => $this->security->xss_clean($this->input->post('name')),
                'surname' => $this->security->xss_clean($this->input->post('surname')),
                'email' => $this->security->xss_clean($this->input->post('email')),
                'phone' => $this->security->xss_clean($this->input->post('phone')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            if(!empty($this->input->post('password'))){
                $request_data['password'] = md5($this->input->post('password'));
            }

            $affected_rows = $this->users_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/users/edit/'.$id);
            }

        }

        $item = $this->users_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');
            redirect('backend/users');
        }

        $data['item'] = $item;
        $data['title'] = 'Users Edit';
        $this->load->admin('users/edit',$data);


    }
    public function delete($id)
    {
        $delete = $this->users_md->delete($id);

        if($delete){
            redirect(base_url('backend/users'));
        }
    }

}
