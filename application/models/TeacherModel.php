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
    
  
}
