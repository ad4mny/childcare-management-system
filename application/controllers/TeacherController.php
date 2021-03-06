<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') or exit('No direct script access allowed');

class TeacherController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TeacherModel');
        $this->load->model('AnnouncementModel');
        $this->load->library('upload');
    }

    public function index($page = 'dashboard', $parent_id = NULL)
    {
        $this->authentication->verifyUserLogin();
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');

        switch ($page) {
            case 'announcement':
                $data['announcements'] = $this->getAnnouncementList();
                $this->load->view('admin/AnnouncementView.php', $data);
                break;
            case 'attendence':
                $data['childrens'] = $this->getChildrenList();
                $data['attendences'] = $this->getAttendenceList();
                $this->load->view('admin/AttendenceView.php', $data);
                break;
            case 'payment':
                $data['childrens'] = $this->getChildrenList();
                $data['payments'] = $this->getPaymentList();
                $this->load->view('admin/PaymentView.php', $data);
                break;
            case 'teacher':
                $data['teachers'] = $this->getTeacherList();
                $this->load->view('admin/TeacherView.php', $data);
                break;
            case 'report':
                $data['reports'] = $this->getAnalyticReport();
                $this->load->view('admin/ReportView.php', $data);
                break;
            default:
                if ($parent_id !== NULL) {
                    $data['childrens'] = $this->getChildByParentID($parent_id);
                }
                $data['parents'] = $this->getParentList();
                $this->load->view('admin/ParentView.php', $data);
                break;
        }

        $this->load->view('templates/FooterTemplate.php');
    }

    public function getChildrenList()
    {
        return $this->TeacherModel->getChildrenListModel();
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

    public function getTeacherList()
    {
        return $this->TeacherModel->getTeacherListModel();
    }

    public function getTeacherInfoByID($teacher_id)
    {
        return $this->TeacherModel->getTeacherInfoByIDModel($teacher_id);
    }

    public function getAnalyticReport()
    {
        return $this->TeacherModel->getAnalyticReportModel();
    }

    public function deleteParentInfo($parent_id)
    {
        if ($this->TeacherModel->deleteParentInfoModel($parent_id) === true) {
            $this->session->set_tempdata('notice', 'Selected parent info has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing parent info error, try again later.', 1);
        }

        redirect(base_url() . 'manage/parent');
    }

    public function removeChildInfo($child_id)
    {
        if ($this->TeacherModel->removeChildInfoModel($child_id) === true) {
            $this->session->set_tempdata('notice', 'Selected child info has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing child info error, try again later.', 1);
        }

        redirect(base_url() . 'manage/parent');
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

        redirect(base_url() . 'manage/attendence');
    }

    public function removeAttendence($attendence_id)
    {
        if ($this->TeacherModel->removeAttendenceModel($attendence_id) === true) {
            $this->session->set_tempdata('notice', 'Selected attendence has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing attendence error, try again later.', 1);
        }

        redirect(base_url() . 'manage/attendence');
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

        redirect(base_url() . 'manage/announcement');
    }

    public function removeAnnouncement($announcement_id)
    {
        if ($this->TeacherModel->removeAnnouncementModel($announcement_id) === true) {
            $this->session->set_tempdata('notice', 'Selected announcement has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing announcement error, try again later.', 1);
        }

        redirect(base_url() . 'manage/announcement');
    }

    public function addPayment()
    {
        $ids = explode("/", $this->input->post('childid'));
        $child_id = $ids[0];
        $parent_id = $ids[1];
        $amount = $this->input->post('amount');
        $month = $this->input->post('month');
        $status = $this->input->post('status');
        $date = $this->input->post('date');

        if ($this->TeacherModel->addPaymentModel($parent_id, $child_id, $amount, $month, $status, $date) === true) {
            $this->session->set_tempdata('notice', 'Payment has been added successfully.', 1);
        } else {
            $this->session->set_tempdata('error', 'Failed to add payment, try again later.', 1);
        }

        redirect(base_url() . 'manage/payment');
    }

    public function removePayment($payment_id)
    {
        if ($this->TeacherModel->removePaymentModel($payment_id) === true) {
            $this->session->set_tempdata('notice', 'Selected payment has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing payment error, try again later.', 1);
        }

        redirect(base_url() . 'manage/payment');
    }

    public function addTeacher()
    {
        $fullname = $this->input->post('fullname');
        $icnumber = $this->input->post('icnumber');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $username = $this->input->post('username');

        $config['upload_path'] = './assets/photo/teacher';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '0';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_tempdata('error', $this->upload->display_errors('', ''), 1);
        } else {
            $photo = $this->upload->data('file_name');
            if ($this->TeacherModel->addTeacherModel($fullname, $icnumber, $phone, $address, $username, md5($username),  $photo) === true) {
                $this->session->set_tempdata('notice', 'Account has been created successfully, please proceed login.', 1);
            } else {
                $this->session->set_tempdata('error', 'Registration failed, please register again.', 1);
            }
        }

        redirect(base_url() . 'manage/teacher');
    }

    public function removeTeacher($teacher_id)
    {
        if ($this->TeacherModel->removeTeacherModel($teacher_id) === true) {
            $this->session->set_tempdata('notice', 'Selected teacher has been removed from database.', 1);
        } else {
            $this->session->set_tempdata('error', 'Removing teacher error, try again later.', 1);
        }

        redirect(base_url() . 'manage/teacher');
    }

    public function viewTeacherInfo($teacher_id)
    {
        $data['teachers'] = $this->getTeacherInfoByID($teacher_id);

        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('admin/TeacherInfoView.php', $data);
        $this->load->view('templates/FooterTemplate.php');
    }

    // API
    public function addAttendenceAPI()
    {
        $child_id = $this->input->post('child_id');
        $status = 'Present';
        $date = date('Y/m/d');

        echo json_encode($this->TeacherModel->addAttendenceModel($child_id, $status, $date));
        exit;
    }

    public function getAttendenceListAPI()
    {
        echo json_encode($this->TeacherModel->getAttendenceListModel());
        exit;
    }

    public function getAnnouncementListAPI()
    {
        echo json_encode($this->AnnouncementModel->getAnnouncementListModel());
        exit;
    }
}
