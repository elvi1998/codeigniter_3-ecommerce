<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Settings_model','settings_md');

    }
	
	public function index()
	{
        $data['title'] = 'Settings List';

        $settings = new Settings_model();

        $data['lists'] = $settings->select_all();
        
		$this->load->admin('settings/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('_key', '_key', 'required');
            $this->form_validation->set_rules('value', 'value', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('settings/create');
            }

            $request_data = [
                '_key' => $this->security->xss_clean($this->input->post('_key')),
                'value' => $this->security->xss_clean($this->input->post('value')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            $insert_id = $this->settings_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/settings');
            }

        }

        $data['title'] = 'Settings List';

        $this->load->admin('settings/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('_key', '_key', 'required');
            $this->form_validation->set_rules('value', 'value', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('settings/create');
            }

            $request_data = [
                '_key' => $this->security->xss_clean($this->input->post('_key')),
                'value' => $this->security->xss_clean($this->input->post('value')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            $affected_rows = $this->settings_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/settings/edit/'.$id);
            }

        }

        $item = $this->settings_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/settings');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Settings Edit';

        $this->load->admin('settings/edit',$data);


    }
    public function delete($id)
    {
        $delete = $this->settings_md->delete($id);

        if($delete){
            redirect(base_url('backend/settings'));
        }
    }

}
