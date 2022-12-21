<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Blog_model','blog_md');

    }
	
	public function index()
	{
        $data['title'] = 'Blog List';

        $blog = new Blog_model();

        $data['lists'] = $blog->select_all();
        
		$this->load->admin('blog/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('image', 'image', 'required');
            $this->form_validation->set_rules('content', 'content', 'required');

            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 6000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $path = 'uploads/';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->admin('blog/create', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('blog/create');
            }
            $data_upload_files = $this->upload->data();
            $image = $data_upload_files['file_name'];

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'description' => $this->security->xss_clean($this->input->post('description')),
                'image' => $image,
                'content' => $this->security->xss_clean($this->input->post('content')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            $insert_id = $this->blog_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/blog');
            }

        }

        $data['title'] = 'Blog List';

        $this->load->admin('blog/create',$data);

    }

    public function edit($id)
    {

        $unlink = 0;

        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('content', 'content', 'required');

            if ($this->form_validation->run()) {


                $request_data = [
                    'title' => $this->security->xss_clean($this->input->post('title')),
                    'description' => $this->security->xss_clean($this->input->post('description')),
                    'content' => $this->security->xss_clean($this->input->post('content')),
                    'status' => $this->security->xss_clean($this->input->post('status'))
                ];
                //print_r($request_data); exit();

                if ($_FILES["image"]["tmp_name"]) {

                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = 'false';


                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error);

                    } else {

                        $file_data = $this->upload->data();
                        $request_data['image'] = $file_data['file_name'];
                        $unlink++;
                    }
                }


                $img = $this->input->post('image');

                $affected_rows = $this->blog_md->update($id, $request_data);

                if ($affected_rows > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdirildi');

                    if ($unlink > 0 and file_exists($img)) {
                        unlink($img);
                    }

                    redirect('backend/blog/edit/' . $id);
                } else {
                    $this->session->set_flashdata('error_message', 'Dəyişdirmə uğursuz oldu');
                    redirect('backend/blog/edit/' . $id);
                }
            }
        }


        $item = $this->blog_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/blog');
        }

        $data['item'] = $item;

        $data['title'] = 'Edit Blog ';

        $this->load->admin('blog/edit', $data);

    }

    public function delete($id)
    {
        $delete = $this->blog_md->delete($id);

        if($delete){
            redirect(base_url('backend/blog'));
        }
    }

}
