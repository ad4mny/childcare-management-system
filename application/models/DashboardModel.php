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
}
