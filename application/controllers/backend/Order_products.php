<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_products extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Order_products_model','order_products_md');
    }
	
	public function index()
	{
        $data['title'] = 'Order_products List';

        $order_products = new Order_products_model();

        $data['lists'] = $order_products->select_all();
        
		$this->load->admin('order_products/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('order_id', 'order_id', 'required');
            $this->form_validation->set_rules('product_id', 'product_id', 'required');
            $this->form_validation->set_rules('amount', 'amount', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('order_products/create');
            }

            $request_data = [
                'order_id' => $this->security->xss_clean($this->input->post('order_id')),
                'product_id' => $this->security->xss_clean($this->input->post('product_id')),
                'amount' => $this->security->xss_clean($this->input->post('amount')),
                'quantity' => $this->security->xss_clean($this->input->post('quantity')),
                'price' => $this->security->xss_clean($this->input->post('price')),
            ];

            $insert_id = $this->order_products_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/order_products');
            }

        }

        $data['title'] = 'Order_products List';
        $data['orders'] = $this->order_products_md->getActiveOrders();
        $data['products'] = $this->order_products_md->getActiveProducts();


        $this->load->admin('order_products/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('order_id', 'order_id', 'required');
            $this->form_validation->set_rules('product_id', 'product_id', 'required');
            $this->form_validation->set_rules('amount', 'amount', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('order_products/create');
            }

            $request_data = [
                'order_id' => $this->security->xss_clean($this->input->post('order_id')),
                'product_id' => $this->security->xss_clean($this->input->post('product_id')),
                'amount' => $this->security->xss_clean($this->input->post('amount')),
                'quantity' => $this->security->xss_clean($this->input->post('quantity')),
                'price' => $this->security->xss_clean($this->input->post('price')),
            ];


            $affected_rows = $this->order_products_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/order_products/edit/'.$id);
            }

        }

        $item = $this->order_products_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/order_products');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Order_products Edit';
        $data['orders'] = $this->order_products_md->getActiveOrders();
        $data['products'] = $this->order_products_md->getActiveProducts();
        $this->load->admin('order_products/edit',$data);


    }
    public function delete($id)
    {
        $delete = $this->order_products_md->delete($id);

        if($delete){
            redirect(base_url('backend/order_products'));
        }
    }

}
