<?php

class AnnouncementModel extends CI_Model
{

    public function getAnnouncementListModel()
    {
        $this->db->select('*');
        $this->db->from('announcements');
        $this->db->order_by('announcementid', 'DESC');
        return $this->db->get()->result_array();
    }

}
