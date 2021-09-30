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
        $this->db->select('GROUP_CONCAT(childrens.fullname) as fullname, date, GROUP_CONCAT(status) as status, GROUP_CONCAT(time) as time');
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
}