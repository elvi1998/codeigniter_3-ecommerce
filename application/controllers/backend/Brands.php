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

            if ($this->form_validation->run() === FALSE){
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

    public function edit($id)
    {

        $unlink = 0;

        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');

            $this->form_validation->set_message('required', 'Boş keçilə bilməz');

            if ($this->form_validation->run()) {


                $request_data = [
                    'title' => $this->security->xss_clean($this->input->post('title')),
                    'status' => $this->security->xss_clean($this->input->post('status'))
                ];

                if ($_FILES["logo"]["tmp_name"]) {

                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = 'false';


                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('logo')) {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error);

                    } else {

                        $file_data = $this->upload->data();
                        $request_data['logo'] = $file_data['file_name'];
                        $unlink++;
                    }
                }


                $img = $this->input->post('logo');

                $affected_rows = $this->brands_md->update($id, $request_data);

                if ($affected_rows > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdirildi');

                    if ($unlink > 0 and file_exists($img)) {
                        unlink($img);
                    }

                    redirect('backend/brands/edit/' . $id);
                } else {
                    $this->session->set_flashdata('error_message', 'Dəyişdirmə uğursuz oldu');
                    redirect('backend/brands/edit/' . $id);
                }
            }
        }


        $item = $this->brands_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/brands');
        }

        $data['item'] = $item;

        $data['title'] = 'Edit Brand ';

        $this->load->admin('brands/edit', $data);

    }

    public function delete($id)
    {
        $delete = $this->brands_md->delete($id);

        if($delete){
            redirect(base_url('backend/brands'));
        }
    }

}
