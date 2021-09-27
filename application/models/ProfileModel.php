<?php

class ProfileModel extends CI_Model
{

    public function getProfileInfoModel()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userid', $_SESSION['userid']);
        return $this->db->get()->row_array();
    }

    public function updateProfileInfoModel($fullname, $icnumber, $phone, $address, $username, $photo)
    {
        $data = array(
            'fullname' => $fullname,
            'icnumber' => $icnumber,
            'phone' => $phone,
            'address' => $address,
            'username' => $username,
            'photo' => $photo,
            'datetime' => date('H:i:s Y-m-d'),
            'role' => 0
        );

        $this->db->where('userid', $_SESSION['userid']);
        return $this->db->update('users', $data);
    }
}
