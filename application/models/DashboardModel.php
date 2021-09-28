<?php

class DashboardModel extends CI_Model
{

    public function getChildrenListModel()
    {
        $this->db->select('*');
        $this->db->from('childrens');
        $this->db->where('parentid', $_SESSION['userid']);
        return $this->db->get()->result_array();
    }

    public function registerChildModel($fullname, $icnumber, $age, $allergic, $photo)
    {
        $data = array(
            'parentid' => $_SESSION['userid'],
            'fullname' => $fullname,
            'icnumber' => $icnumber,
            'age' => $age,
            'allergic' => $allergic,
            'photo' => $photo,
            'datetime' => date('H:i:s Y-m-d')
        );

        return $this->db->insert('childrens', $data);

    }

    public function getChildInfoByIDModel($child_id)
    {
        $this->db->select('*, a.fullname as childName, b.fullname as parentName, a.photo as childPhoto, a.icnumber as childIC, b.icnumber as parentIC');
        $this->db->from('childrens a');
        $this->db->join('users b', 'userid = parentid');
        $this->db->where('childrenid', $child_id);
        return $this->db->get()->result_array();
    }

}
