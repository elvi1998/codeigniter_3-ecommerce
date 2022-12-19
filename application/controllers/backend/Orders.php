<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Orders_model','orders_md');
    }
	
	public function index()
	{
        $data['title'] = 'Orders List';

        $orders = new Orders_model();

        $data['lists'] = $orders->select_all();
        
		$this->load->admin('orders/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('user_id', 'user_id', 'required');
            $this->form_validation->set_rules('payments_method', 'payments_method', 'required');
            $this->form_validation->set_rules('delivery_method', 'delivery_method', 'required');
            $this->form_validation->set_rules('total_amount', 'total_amount', 'required');
            $this->form_validation->set_rules('payment_json', 'payment_json', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('orders/create');
            }

            $request_data = [
                'user_id' => $this->security->xss_clean($this->input->post('user_id')),
                'payments_method' => $this->security->xss_clean($this->input->post('payments_method')),
                'delivery_method' => $this->security->xss_clean($this->input->post('delivery_method')),
                'total_amount' => $this->security->xss_clean($this->input->post('total_amount')),
                'payment_json' => $this->security->xss_clean($this->input->post('payment_json')),
                'status' => $this->security->xss_clean($this->input->post('status')),
            ];

            $insert_id = $this->orders_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/orders');
            }

        }

        $data['title'] = 'Orders List';
        $data['users'] = $this->orders_md->getActiveUsers();
        $data['payment_methods'] = $this->orders_md->getActivePayment_methods();
        $data['delivery_methods'] = $this->orders_md->getActiveDelivery_methods();


        $this->load->admin('orders/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('user_id', 'user_id', 'required');
            $this->form_validation->set_rules('payments_method', 'payments_method', 'required');
            $this->form_validation->set_rules('delivery_method', 'delivery_method', 'required');
            $this->form_validation->set_rules('total_amount', 'total_amount', 'required');
            $this->form_validation->set_rules('payment_json', 'payment_json', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('orders/create');
            }

            $request_data = [
                'user_id' => $this->security->xss_clean($this->input->post('user_id')),
                'payments_method' => $this->security->xss_clean($this->input->post('payments_method')),
                'delivery_method' => $this->security->xss_clean($this->input->post('delivery_method')),
                'total_amount' => $this->security->xss_clean($this->input->post('total_amount')),
                'payment_json' => $this->security->xss_clean($this->input->post('payment_json')),
                'status' => $this->security->xss_clean($this->input->post('status')),
            ];


            $affected_rows = $this->orders_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/orders/edit/'.$id);
            }

        }

        $item = $this->orders_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/orders');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Orders Edit';
        $data['users'] = $this->orders_md->getActiveUsers();
        $data['payment_methods'] = $this->orders_md->getActivePayment_methods();
        $data['delivery_methods'] = $this->orders_md->getActiveDelivery_methods();
        $this->load->admin('orders/edit',$data);

    }
    public function delete($id)
    {
        $delete = $this->orders_md->delete($id);

        if($delete){
            redirect(base_url('backend/orders'));
        }
    }

}
