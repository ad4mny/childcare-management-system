<?php

class AttendenceModel extends CI_Model
{
    public function getAttendenceListModel()
    {
        $this->db->select('GROUP_CONCAT(childrens.fullname) as fullname, date, GROUP_CONCAT(status) as status, GROUP_CONCAT(time) as time');
        $this->db->from('attendences');
        $this->db->join('childrens', 'attendences.childrenid = childrens.childrenid');
        $this->db->where('parentid', $_SESSION['userid']);
        $this->db->group_by('date');
        $this->db->order_by('date', 'DESC');
        return $this->db->get()->result_array();
    }
}
