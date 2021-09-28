<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
    public function verifyUserLogin()
    {
        $CI = get_instance();
        $CI->load->library('session');

        if (!$CI->session->has_userdata('userid')) {
            redirect(base_url());
            exit();
        } 
    }
}
