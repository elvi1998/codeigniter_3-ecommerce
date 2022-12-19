<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Images_model','images_md');
    }
	
	public function index()
	{
        $data['title'] = 'Images List';

        $images = new Images_model();

        $data['lists'] = $images->select_all();
        
		$this->load->admin('images/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('product_id', 'product_id', 'required');
            $this->form_validation->set_rules('path', 'path', 'required');
            $this->form_validation->set_rules('main', 'main', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('images/create');
            }

            $request_data = [
                'product_id' => $this->security->xss_clean($this->input->post('product_id')),
                'path' => $this->security->xss_clean($this->input->post('path')),
                'main' => $this->security->xss_clean($this->input->post('main')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            $insert_id = $this->images_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/images');
            }

        }

        $data['title'] = 'Images List';
        $data['products'] = $this->images_md->getActiveProducts();

        $this->load->admin('images/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('product_id', 'product_id', 'required');
            $this->form_validation->set_rules('path', 'path', 'required');
            $this->form_validation->set_rules('main', 'main', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('images/create');
            }

            $request_data = [
                'product_id' => $this->security->xss_clean($this->input->post('product_id')),
                'path' => $this->security->xss_clean($this->input->post('path')),
                'main' => $this->security->xss_clean($this->input->post('main')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];


            $affected_rows = $this->images_md->update($id,$request_data);
            redirect('backend/images');
            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/images/edit/'.$id);
            }

        }

        $item = $this->images_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/images');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Images Edit';
        $data['products'] = $this->images_md->getActiveProducts();
        $this->load->admin('images/edit',$data);

    }
    public function delete($id)
    {
        $delete = $this->images_md->delete($id);

        if($delete){
            redirect(base_url('backend/images'));
        }
    }

}
