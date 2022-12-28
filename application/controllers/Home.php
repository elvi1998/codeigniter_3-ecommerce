<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


    }

    public function index()
    {
        $data['title'] = 'Home List';

        $template = [
            'includes/spotlight1',
            'includes/spotlight2',
            'includes/banner',
            'includes/supercategory1',
            'includes/supercategory2',
            'includes/banner2',
            'includes/spotlight4',
            'includes/spotlight5'
        ];

        $this->load->main($template, $data);
    }

}