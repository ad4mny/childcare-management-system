<?php

class RegisterModel extends CI_Model
{
    public function register_new_user($fullname, $icnumber, $phone, $address, $username, $password)
    {
        $data = array(
            'fullname' => $fullname,
            'icnumber' => $icnumber,
            'phone' => $phone,
            'address' => $address,
            'username' => $username,
            'password' => $password,
            'datetime' => date('H:i:s Y-m-d'),
            'role' => 0
        );

        return $this->db->insert('users', $data);
    }
}
