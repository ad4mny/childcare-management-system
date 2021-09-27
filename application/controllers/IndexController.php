<?php

class IndexController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('IndexView.php');
        $this->load->view('templates/FooterTemplate.php');
    }
}