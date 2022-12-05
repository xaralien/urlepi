<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('transaksi/transaksi');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('main/home');
            $this->load->view('transaksi/transaksi');
            $this->load->view('templates/footer');
        }
    }
    public function detail()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('package/detail');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('main/home');
            $this->load->view('package/detail');
            $this->load->view('templates/footer');
        }
    }
}
