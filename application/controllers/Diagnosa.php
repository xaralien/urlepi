<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $data = [
        //     'title' => "Katalog Buku",
        //     'buku' => $this->ModelBuku->getBuku()->result(),
        // ];

        // //jika sudah login dan jika belum login
        // if ($this->session->userdata('email')) {
        //     $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        //     $data['user'] = $user['nama'];
        //     $this->load->view('templates/templates-user/header', $data);
        //     $this->load->view('buku/daftarbuku', $data);
        //     $this->load->view('templates/templates-user/modal');
        //     $this->load->view('templates/templates-user/footer', $data);
        // } else {

        //     $data['user'] = 'Pengunjung';
        //     $this->load->view('templates/templates-user/header', $data);
        //     $this->load->view('buku/daftarbuku', $data);
        //     $this->load->view('templates/templates-user/modal');
        //     $this->load->view('templates/templates-user/footer', $data);
        $this->load->view('templates/header');
        $this->load->view('main/home');
        $this->load->view('diagnosa/diagnosa');
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
