<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


    }

    public function index()
    {
        $data['title'] = 'Home List';

        $template = [
            'pages/product',

        ];

        $this->load->main($template, $data);
    }

}
