<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Package extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('package/package');
        $this->load->view('templates/footer');
    }
    public function detail()
    {
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('package/detail');
        $this->load->view('templates/footer');
    }
    public function konfirmasi()
    {
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('proses/konfirmasi');
        $this->load->view('templates/footer');
    }
}
