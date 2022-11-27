<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function service()
    {
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('main/Service');
        $this->load->view('templates/footer');
    }
}
