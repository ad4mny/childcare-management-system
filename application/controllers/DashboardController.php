<?php

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->authentication->verifyUserLogin();
        $data['childrens'] = $this->getChildrenList();
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('DashboardView.php', $data);
        $this->load->view('templates/FooterTemplate.php');
    }

    public function getChildrenList()
    {
        return $this->DashboardModel->getChildrenListModel();
    }

    public function registerChild()
    {
        $fullname = $this->input->post('fullname');
        $icnumber = $this->input->post('icnumber');
        $age = $this->input->post('age');
        $allergic = $this->input->post('allergic');

        $config['upload_path'] = './assets/photo/children';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '0';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_tempdata('error', $this->upload->display_errors('', ''), 1);
        } else {
            $photo = $this->upload->data('file_name');

            if ($this->DashboardModel->registerChildModel($fullname, $icnumber, $age, $allergic, $photo) === true) {
                $this->session->set_tempdata('notice', 'Your child has been added to database.', 1);
            } else {
                $this->session->set_tempdata('error', 'Registration failed, please register your child again.', 1);
            }
        }
        
        redirect(base_url() . 'dashboard');
    }
}
