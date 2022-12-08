<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
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
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('home/admin');
            } else {
                $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
                $data['user'] = $user['nama'];
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('main/about');
                $this->load->view('templates/modal');
                $this->load->view('templates/footer');
            }
        } else {
            $this->load->view('templates/header');
            $this->load->view('main/home');
            $this->load->view('main/about');
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
    }
    public function contact()
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
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/contact');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('main/contact');
            $this->load->view('templates/footer');
        }
    }
    public function admin()
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
        if ($this->session->userdata('role_id') == 1) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('admin/home');
            $this->load->view('main/about');
            $this->load->view('templates/footer');
        } else {
            $this->index();
        }
    }
    public function register()
    {
        if ($this->session->userdata('email')) {
            $this->index();
        } else {
            // $this->load->view('templates/header');
            $this->load->view('templates/register');
            // $this->load->view('templates/footer');
        }
    }
    public function registeradmin()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('templates/admin/register');
        } else {
            // $this->load->view('templates/header');
            $this->index();
            // $this->load->view('templates/footer');
        }
    }
    public function login()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('main/about');
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } else {
            // $this->load->view('templates/header');
            $this->load->view('templates/login');
            // $this->load->view('templates/footer');
        }
    }
    // public function harga()
    // {
    //     $this->load->view('templates/header');
    //     $this->load->view('main/home');
    //     $this->load->view('main/harga');
    //     $this->load->view('templates/footer');
    // }
}
