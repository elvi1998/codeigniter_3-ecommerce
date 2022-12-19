<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_methods extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Delivery_methods_model','delivery_methods_md');

    }
	
	public function index()
	{
        $data['title'] = 'Delivery_methods List';

        $delivery_methods = new Delivery_methods_model();

        $data['lists'] = $delivery_methods->select_all();
        
		$this->load->admin('delivery_methods/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('order', 'order', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('delivery_methods/create');
            }

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'order' => $this->security->xss_clean($this->input->post('order')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            $insert_id = $this->delivery_methods_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/delivery_methods');
            }

        }

        $data['title'] = 'Delivery_methods List';

        $this->load->admin('delivery_methods/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('order', 'order', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('delivery_methods/create');
            }

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'order' => $this->security->xss_clean($this->input->post('order')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];


            $affected_rows = $this->delivery_methods_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/delivery_methods');
            }

        }

        $item = $this->delivery_methods_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/delivery_methods/edit/'.$id);
        }

        $data['item'] = $item;
        
        $data['title'] = 'Delivery_methods Edit';

        $this->load->admin('delivery_methods/edit',$data);

    }
    public function delete($id)
    {
        $delete = $this->delivery_methods_md->delete($id);

        if($delete){
            redirect(base_url('backend/delivery_methods'));
        }
    }

}
