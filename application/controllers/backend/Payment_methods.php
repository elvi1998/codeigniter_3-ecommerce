<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_methods extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Payment_methods_model','payment_methods_md');

    }
	
	public function index()
	{
        $data['title'] = 'Payment_methods List';

        $payment_methods = new Payment_methods_model();

        $data['lists'] = $payment_methods->select_all();
        
		$this->load->admin('payment_methods/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('order', 'order', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('payment_methods/create');
            }

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'order' => $this->security->xss_clean($this->input->post('order')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];

            $insert_id = $this->payment_methods_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/payment_methods');
            }

        }

        $data['title'] = 'Payment_methods List';

        $this->load->admin('payment_methods/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('order', 'order', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('payment_methods/create');
            }

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'order' => $this->security->xss_clean($this->input->post('order')),
                'status' => $this->security->xss_clean($this->input->post('status'))
            ];


            $affected_rows = $this->payment_methods_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/payment_methods/edit/'.$id);
            }

        }

        $item = $this->payment_methods_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/payment_methods');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Payment_methods Edit';

        $this->load->admin('payment_methods/edit',$data);

    }
    public function delete($id)
    {
        $delete = $this->payment_methods_md->delete($id);

        if($delete){
            redirect(base_url('backend/payment_methods'));
        }
    }

}
