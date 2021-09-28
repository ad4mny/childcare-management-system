<?php

class TeacherController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TeacherModel');
        $this->load->model('DashboardModel');
        $this->load->model('AnnouncementModel');
        $this->load->model('ProfileModel');
    }

    public function index($page = 'dashboard')
    {
        $this->authentication->verifyUserLogin();
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');

        switch ($page) {
            case 'announcement':
                $data['announcements'] = $this->getAnnouncementList();
                $this->load->view('teacher/AnnouncementView.php', $data);
                break;
            case 'attendence':
                $data['attendences'] = $this->getAttendenceList();
                $this->load->view('teacher/AttendenceView.php', $data);
                break;
            case 'payment':
                $data['payments'] = $this->getPaymentList();
                $this->load->view('teacher/PaymentView.php', $data);
                break;
            case 'profile':
                $data['profiles'] = $this->getProfileInfo();
                $this->load->view('teacher/ProfileView.php', $data);
                break;
            default:
                $data['childrens'] = $this->getChildrenList();
                $this->load->view('teacher/DashboardView.php', $data);
                break;
        }

        $this->load->view('templates/FooterTemplate.php');
    }

    public function getChildrenList()
    {
        return $this->TeacherModel->getChildrenListModel();
    }

    public function getAnnouncementList()
    {
        return $this->AnnouncementModel->getAnnouncementListModel();
    }

    public function getAttendenceList()
    {
        return $this->TecaherModel->getAttendenceListModel();
    }

    public function getPaymentList()
    {
        return $this->TeacherModel->getPaymentListModel();
    }

    public function getProfileInfo()
    {
        return $this->ProfileModel->getProfileInfoModel();
    }

    public function removeChildInfo($child_id)
    {
        if ($this->TeacherModel->removeChildInfoModel($child_id) === true) {
            $this->session->set_tempdata('notice', 'Selected child info has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing child info error, try again later.', 1);
        }

        redirect(base_url() . 'teacher/dashboard');
    }

    public function viewChildInfo($child_id)
    {
        $data['childs'] = $this->getChildInfoByID($child_id);

        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('teacher/ChildInfoView.php', $data);
        $this->load->view('templates/FooterTemplate.php');
    }

    public function getChildInfoByID($child_id)
    {
        return $this->DashboardModel->getChildInfoByIDModel($child_id);
    }
}
