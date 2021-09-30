<?php

class TeacherModel extends CI_Model
{

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
            'date' => date("d/m/Y", strtotime($date)),
            'time' => date('h:i:s A')
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

    public function getPaymentListModel()
    {
        $this->db->select('*');
        $this->db->from('payments');
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
