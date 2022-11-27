<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Harga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function harga()
    {
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('main/harga');
        $this->load->view('templates/footer');
    }
}
