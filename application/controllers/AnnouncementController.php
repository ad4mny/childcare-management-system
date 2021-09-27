<?php

class AnnouncementController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AnnouncementModel');
    }

    public function index()
    {
        $data['announcements'] = $this->getAnnouncementList();
        $this->load->view('templates/HeaderTemplate.php');
        $this->load->view('templates/NavigationTemplate.php');
        $this->load->view('AnnouncementView.php', $data);
        $this->load->view('templates/FooterTemplate.php');
    }

    public function getAnnouncementList()
    {
        return $this->AnnouncementModel->getAnnouncementListModel();
    }

    
}
