<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_images extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('product_images_model','product_images_md');
    }
	
	public function index()
	{
        $data['title'] = 'Product_images List';

        $product_images = new Product_images_model();

        $data['lists'] = $product_images->select_all();
        
		$this->load->admin('product_images/index',$data);
	}

    public function create(){

        if($this->input->post()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('images_id', 'images_id', 'required');
            $this->form_validation->set_rules('product_id', 'product_id', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->admin('product_images/create');
            }

            $request_data = [
                'images_id' => $this->security->xss_clean($this->input->post('images_id')),
                'products_id' => $this->security->xss_clean($this->input->post('products_id')),
            ];

            $insert_id = $this->product_images_md->insert($request_data);

            if($insert_id > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla əlavə edildi');

                redirect('backend/product_images');
            }

        }

        $data['images'] = $this->product_images_md->getActiveImages();
        $data['products'] = $this->product_images_md->getActiveProducts();


        $this->load->admin('product_images/create',$data);

    }

    public function edit($id){

        if($this->input->post()){
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('images_id', 'images_id', 'required');
            $this->form_validation->set_rules('products_id', 'products_id', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->load->admin('product_images/create');
            }

            $request_data = [
                'images_id' => $this->security->xss_clean($this->input->post('images_id')),
                'products_id' => $this->security->xss_clean($this->input->post('products_id')),
            ];


            $affected_rows = $this->product_images_md->update($id,$request_data);

            if($affected_rows > 0){
                $this->session->set_flashdata('success_message','Məlumat uğurla dəyişdirildi');

                redirect('backend/product_images/edit/'.$id);
            }

        }

        $item = $this->product_images_md->selectDataById($id);

        if(empty($item)){
            $this->session->set_flashdata('error_message','Bu məlumat tapılmadı');

            redirect('backend/product_images');
        }

        $data['item'] = $item;
        
        $data['title'] = 'Product_images Edit';
        $data['images'] = $this->product_images_md->getActiveImages();
        $data['products'] = $this->product_images_md->getActiveProducts();
        $this->load->admin('product_images/edit',$data);


    }
    public function delete($id)
    {
        $delete = $this->product_images_md->delete($id);

        if($delete){
            redirect(base_url('backend/product_images'));
        }
    }

}
