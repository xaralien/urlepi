<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('transaksi/transaksi');
        $this->load->view('templates/footer');
    }
    public function detail()
    {
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('package/detail');
        $this->load->view('templates/footer');
    }
}
