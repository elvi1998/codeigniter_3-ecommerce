<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_categories extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('product_categories_model','product_categories_md');
    }
	
	public function index()
	{
        $data['title'] = 'Product_categories List';

        $product_categories = new Product_categories_model();

        $data['lists'] = $product_categories->select_all();
        
		$this->load->admin('product_categories/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('categories_id', 'categories_id', 'required');
            $this->form_validation->set_rules('products_id', 'products_id', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('product_categories/create');
            }

            $request_data = [
                'categories_id' => $this->security->xss_clean($this->input->post('categories_id')),
                'products_id' => $this->security->xss_clean($this->input->post('products_id')),
            ];

            $insert_id = $this->product_categories_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/product_categories');
            }

        }

        $data['categories'] = $this->product_categories_md->getActivecategories();
        $data['products'] = $this->product_categories_md->getActiveProducts();


        $this->load->admin('product_categories/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('categories_id', 'categories_id', 'required');
            $this->form_validation->set_rules('product_id', 'product_id', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('product_categories/create');
            }

            $request_data = [
                'categories_id' => $this->security->xss_clean($this->input->post('categories_id')),
                'products_id' => $this->security->xss_clean($this->input->post('products_id')),
            ];


            $affected_rows = $this->product_categories_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/product_categories/edit/'.$id);
            }

        }

        $item = $this->product_categories_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/product_categories');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Product_categories Edit';
        $data['categories'] = $this->product_categories_md->getActivecategories();
        $data['products'] = $this->product_categories_md->getActiveProducts();
        $this->load->admin('product_categories/edit',$data);


    }
    public function delete($id)
    {
        $delete = $this->product_categories_md->delete($id);

        if($delete){
            redirect(base_url('backend/product_categories'));
        }
    }

}
