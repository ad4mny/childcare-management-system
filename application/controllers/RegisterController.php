<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RegisterModel');
    }

    public function index()
    {
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('RegisterView.php');
        $this->load->view('templates/FooterTemplate.php');
    }

    public function registerUser()
    {
        $fullname = $this->input->post('fullname');
        $icnumber = $this->input->post('icnumber');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $c_password = $this->input->post('confirmpassword');

        if ($password !== $c_password) {
            $this->session->set_tempdata('error', 'Password not match, please register again.', 1);
            redirect(base_url() . 'register');
        } else {
            if ($this->RegisterModel->registerUserModel($fullname, $icnumber, $phone, $address, $username, md5($password)) === true) {
                $this->session->set_tempdata('notice', 'Account has been created successfully, please proceed login.', 1);
                redirect(base_url() . 'login');
            } else {
                $this->session->set_tempdata('error', 'Registration failed, please register again.', 1);
                redirect(base_url() . 'register');
            }
        }
    }
}
