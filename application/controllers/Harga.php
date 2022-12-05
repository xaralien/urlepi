<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Harga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function harga()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('main/harga');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('main/home');
            $this->load->view('main/harga');
            $this->load->view('templates/footer');
        }
    }
}
