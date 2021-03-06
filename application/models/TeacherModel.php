<?php

class TeacherModel extends CI_Model
{
    public function getAnalyticReportModel()
    {
        $reports = [];
        $this->db->select('COUNT(*) as count');
        $this->db->from('users');
        $this->db->where('role', 0);
        $reports['total_parent'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as count');
        $this->db->from('childrens');
        $reports['total_children'] = $this->db->get()->row_array();

        $this->db->select('SUM(fee) as total, COUNT(*) as count');
        $this->db->from('payments');
        $reports['total_invoice'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as count');
        $this->db->from('announcements');
        $reports['total_announcement'] = $this->db->get()->row_array();

        return $reports;
    }

    public function getParentListModel()
    {
        $this->db->select('userid,fullname,icnumber,address,phone,photo');
        $this->db->from('users');
        $this->db->where('role', 0);
        return $this->db->get()->result_array();
    }

    public function getChildrenListModel()
    {
        $this->db->select('*');
        $this->db->from('childrens');
        return $this->db->get()->result_array();
    }

    public function getChildByParentIDModel($parent_id)
    {
        $this->db->select('*');
        $this->db->from('childrens');
        $this->db->where('parentid', $parent_id);
        return $this->db->get()->result_array();
    }

    public function deleteParentInfoModel($parent_id)
    {
        $this->db->where('userid', $parent_id);
        return $this->db->delete('users');
    } 
    
    public function removeChildInfoModel($child_id)
    {
        $this->db->where('childrenid', $child_id);
        return $this->db->delete('childrens');
    }

    public function getAttendenceListModel()
    {
        $this->db->select('GROUP_CONCAT(attendenceid) as attendenceid, GROUP_CONCAT(childrens.fullname) as fullname, date, GROUP_CONCAT(status) as status, GROUP_CONCAT(time) as time');
        $this->db->from('attendences');
        $this->db->join('childrens', 'attendences.childrenid = childrens.childrenid');
        $this->db->group_by('date');
        $this->db->order_by('date', 'DESC');
        return $this->db->get()->result_array();
    }

    public function addAttendenceModel($child_id, $status, $date)
    {
        $data = array(
            'childrenid' => $child_id,
            'status' => $status,
            'date' => date("Y/m/d", strtotime($date)),
            'time' => date('h:iA')
        );

        return $this->db->insert('attendences', $data);
    }

    public function removeAttendenceModel($attendence_id)
    {
        $this->db->where('attendenceid', $attendence_id);
        return $this->db->delete('attendences');
    }

    public function addAnnouncementModel($title, $description)
    {
        $data = array(
            'teacherid' => $_SESSION['userid'],
            'title' => $title,
            'description' => $description,
            'datetime' => date('h:i a d/m/Y')
        );

        return $this->db->insert('announcements', $data);
    }

    public function removeAnnouncementModel($announcement_id)
    {
        $this->db->where('announcementid', $announcement_id);
        return $this->db->delete('announcements');
    }

    public function addPaymentModel($parent_id, $child_id, $amount, $month, $status, $date)
    {
        $data = array(
            'parentid' => $parent_id,
            'childid' => $child_id,
            'fee' => $amount,
            'month' => $month,
            'status' => $status,
            'date' => date("d/m/Y", strtotime($date)),
            'time' => date('h:i A')
        );

        return $this->db->insert('payments', $data);
    }

    public function removePaymentModel($payment_id)
    {
        $this->db->where('paymentid', $payment_id);
        return $this->db->delete('payments');
    }

    public function getPaymentListModel()
    {
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->join('childrens', 'childrens.childrenid = payments.childid');
        $this->db->order_by('date', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getTeacherListModel()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 1);
        return $this->db->get()->result_array();
    }

    public function getTeacherInfoByIDModel($teacher_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userid', $teacher_id);
        return $this->db->get()->row_array();
    }


    public function addTeacherModel($fullname, $icnumber, $phone, $address, $username, $password, $photo)
    {
        $data = array(
            'fullname' => $fullname,
            'icnumber' => $icnumber,
            'phone' => $phone,
            'address' => $address,
            'username' => $username,
            'password' => $password,
            'photo' => $photo,
            'datetime' => date('H:i:s Y-m-d'),
            'role' => 1
        );

        return $this->db->insert('users', $data);
    }

    public function removeTeacherModel($teacher_id)
    {
        $this->db->where('userid', $teacher_id);
        return $this->db->delete('users');
    }

}
