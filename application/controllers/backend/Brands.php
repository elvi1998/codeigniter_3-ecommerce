<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brands extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Brands_model','brands_md');

    }

    public function index()
    {
        $data['title'] = 'Brands List';

        $brands = new Brands_model();

        $data['lists'] = $brands->select_all();

        $this->load->admin('brands/index',$data);
    }

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('logo', 'logo', 'required');

            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 6000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->admin('brands/create', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('brands/create');
            }
            $data_upload_files = $this->upload->data();
            $image = $data_upload_files['file_name'];
            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'logo' => $image,
                'status' =>$this->security->xss_clean($this->input->post('status'))
            ];


            $insert_id = $this->brands_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/brands');
            }

        }

        $data['title'] = 'Brands List';

        $this->load->admin('brands/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('logo', 'logo', 'required');

            $old_filename = $this->create()->image;
            $new_filename = $_FILES['logo']['name'];
            if($new_filename == TRUE)
            {
                $update_filename = time()."-".str_replace('','-', $new_filename);
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6000;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['file_name'] = $new_filename;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    if (file_exists("./uploads/".$old_filename)) {
                        unlink("./uploads/".$old_filename);
                        $data = array('upload_data' => $this->upload->data());
                    }
                }
            } else {
                $update_filename = $old_filename;
                $data = array('upload_data' => $this->upload->data());
            }
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('brands/edit');
            }
            //$data_upload_files = $this->upload->data();
            //$image = $data_upload_files['file_name'];

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'logo' => $new_filename,
                'status' =>$this->security->xss_clean($this->input->post('status')),
            ];

            $affected_rows = $this->brands_md->update($id, $request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/brands');
            }
        }

        $item = $this->brands_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/brands');
        }

        $data['item'] = $item;

        $data['title'] = 'Brands Edit';

        $this->load->admin('brands/edit',$data);

    }
    public function delete($id)
    {
        $delete = $this->brands_md->delete($id);

        if($delete){
            redirect(base_url('backend/brands'));
        }
    }

}
