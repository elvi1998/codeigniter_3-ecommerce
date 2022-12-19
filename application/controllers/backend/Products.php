<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Products_model','products_md');
    }
	
	public function index()
	{
        $data['title'] = 'Products List';

        $products = new Products_model();

        $data['lists'] = $products->select_all();
        
		$this->load->admin('products/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('brand_id', 'Brand_id', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('sales_prices', 'Sales_prices', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('products/create');
            }

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'description' => $this->security->xss_clean($this->input->post('description')),
                'brand_id' => $this->security->xss_clean($this->input->post('brand_id')),
                'quantity' => $this->security->xss_clean($this->input->post('quantity')),
                'price' => $this->security->xss_clean($this->input->post('price')),
                'sales_prices' => $this->security->xss_clean($this->input->post('sales_prices')),
            ];

            $insert_id = $this->products_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/products');
            }

        }

        $data['title'] = 'Products List';
        $data['brands'] = $this->products_md->getActiveBrands();


        $this->load->admin('products/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('brand_id', 'Brand_id', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('sales_prices', 'Sales_prices', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('products/create');
            }

            $request_data = [
                'title' => $this->security->xss_clean($this->input->post('title')),
                'description' => $this->security->xss_clean($this->input->post('description')),
                'brand_id' => $this->security->xss_clean($this->input->post('brand_id')),
                'quantity' => $this->security->xss_clean($this->input->post('quantity')),
                'price' => $this->security->xss_clean($this->input->post('price')),
                'sales_prices' => $this->security->xss_clean($this->input->post('sales_prices')),
            ];


            $affected_rows = $this->products_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/products/edit/'.$id);
            }

        }

        $item = $this->products_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/products');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Products Edit';
        $data['brands'] = $this->products_md->getActiveBrands();
        $this->load->admin('products/edit',$data);

    }
    public function delete($id)
    {
        $delete = $this->products_md->delete($id);

        if($delete){
            redirect(base_url('backend/products'));
        }
    }

}
