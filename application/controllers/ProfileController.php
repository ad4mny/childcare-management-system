<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->authentication->verifyUserLogin();
        $data['profiles'] = $this->getProfileInfo();
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('ProfileView.php', $data);
        $this->load->view('templates/FooterTemplate.php');
    }

    public function getProfileInfo()
    {
        return $this->ProfileModel->getProfileInfoModel();
    }

    public function updateProfileInfo()
    {
        $fullname = $this->input->post('fullname');
        $icnumber = $this->input->post('icnumber');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $username = $this->input->post('username');
     
        $config['upload_path'] = './assets/photo/parent';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '0';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_tempdata('error', $this->upload->display_errors('', ''), 1);
        } else {
            $photo = $this->upload->data('file_name');

            if ($this->ProfileModel->updateProfileInfoModel($fullname, $icnumber, $phone, $address, $username, $photo) === true) {
                $this->session->set_tempdata('notice', 'Your profile has been updated successfully.', 1);
            } else {
                $this->session->set_tempdata('error', 'Profile update failed, please try again later.', 1);
            }
        }
        redirect(base_url() . 'profile');

    }
    
}
