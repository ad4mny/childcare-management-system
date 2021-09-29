<?php

class TeacherModel extends CI_Model
{

    public function getChildrenListModel()
    {
        $this->db->select('*');
        $this->db->from('childrens');
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
}
