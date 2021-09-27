<?php

class AnnouncementModel extends CI_Model
{

    public function getAnnouncementListModel()
    {
        $this->db->select('*');
        $this->db->from('announcements');
        return $this->db->get()->result_array();
    }

}
