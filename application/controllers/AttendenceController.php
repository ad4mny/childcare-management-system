<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') or exit('No direct script access allowed');

class AttendenceController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AttendenceModel');
    }

    public function index()
    {
        $this->authentication->verifyUserLogin();
        $data['attendences'] = $this->getAttendenceList();
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('AttendenceView.php', $data);
        $this->load->view('templates/FooterTemplate.php');
    }

    public function getAttendenceList()
    {
        return $this->AttendenceModel->getAttendenceListModel();
    }

    //API
    public function getAttendenceListAPI()
    {
        $_SESSION['userid'] = $this->input->post('uid');
        echo json_encode($this->AttendenceModel->getAttendenceListModel());
        exit;
    }
}
