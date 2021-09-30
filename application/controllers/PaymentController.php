<?php

class PaymentController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PaymentModel');
    }

    public function index()
    {
        $this->authentication->verifyUserLogin();
        $data['payments'] = $this->getPaymentList();
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('PaymentView.php', $data);
        $this->load->view('templates/FooterTemplate.php');
    }

    public function getPaymentList()
    {
        return $this->PaymentModel->getPaymentListModel();
    }
}
