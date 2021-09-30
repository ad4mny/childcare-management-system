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

    public function index($page = 'dashboard', $parent_id = NULL)
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
                if ($parent_id !== NULL) {
                    $data['childrens'] = $this->getChildByParentID($parent_id);
                }
                $data['parents'] = $this->getParentList();
                $this->load->view('teacher/DashboardView.php', $data);
                break;
        }

        $this->load->view('templates/FooterTemplate.php');
    }

    public function getChildByParentID($parent_id)
    {
        return $this->TeacherModel->getChildByParentIDModel($parent_id);
    }

    public function getParentList()
    {
        return $this->TeacherModel->getParentListModel();
    }

    public function getAnnouncementList()
    {
        return $this->AnnouncementModel->getAnnouncementListModel();
    }

    public function getAttendenceList()
    {
        return $this->TeacherModel->getAttendenceListModel();
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

    public function addAttendence()
    {
        $child_id = $this->input->post('childid');
        $status = $this->input->post('status');
        $date = $this->input->post('date');

        if ($this->TeacherModel->addAttendenceModel($child_id, $status, $date) === true) {
            $this->session->set_tempdata('notice', 'Attendence has been added successfully.', 1);
        } else {
            $this->session->set_tempdata('error', 'Failed to add attendence, try again later.', 1);
        }

        redirect(base_url() . 'teacher/attendence');
    }  
    
    public function addAnnouncement()
    {
        $title = $this->input->post('title');
        $description = nl2br(htmlspecialchars($this->input->post('description')));

        if ($this->TeacherModel->addAnnouncementModel($title, $description) === true) {
            $this->session->set_tempdata('notice', 'Announcement has been added successfully.', 1);
        } else {
            $this->session->set_tempdata('error', 'Failed to add announcement, try again later.', 1);
        }

        redirect(base_url() . 'teacher/announcement');
    }

    public function removeAnnouncement($announcement_id)
    {
        if ($this->TeacherModel->removeAnnouncementModel($announcement_id) === true) {
            $this->session->set_tempdata('notice', 'Selected announcement has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing announcement error, try again later.', 1);
        }

        redirect(base_url() . 'teacher/announcement');
    }
}