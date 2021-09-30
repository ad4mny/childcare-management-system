<?php

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('LoginView.php');
        $this->load->view('templates/FooterTemplate.php');
    }

    public function loginUser()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $return = $this->LoginModel->loginUserModel($username, $password);

        if (isset($return) && $return !== false) {

            $this->session->set_userdata('userid', $return['userid']);
            $this->session->set_userdata('role', $return['role']);

            switch ($this->session->userdata('role')) {
                case 2:
                    redirect(base_url() . 'manage/parent');
                    break;
                case 1:
                    redirect(base_url() . 'teacher/dashboard');
                    break;
                default:
                    redirect(base_url() . 'children');
                    break;
            }
        } else {
            $this->session->set_tempdata('error', 'Wrong username or password entered.', 1);
            redirect(base_url());
        }
    }

    public function logoutUser()
    {
        $session_data = array(
            'userid',
            'role'
        );

        $this->session->set_tempdata('notice', 'You have logout successfully.', 1);
        $this->session->unset_userdata($session_data);

        redirect(base_url());
    }
}
