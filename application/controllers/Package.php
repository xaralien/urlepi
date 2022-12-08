<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Package extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = [
            'title' => "Tabel Order",
            'paket' => $this->ModelPaket->getOrder()->result(),
        ];
        // $data['kategori'] = $this->ModelPaket->getKategori()->result_array();
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('package/list', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('package/list', $data);
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
    public function proses()
    {
        $id_paket = $this->uri->segment(3);

        $d = $this->db->query("Select * from paket where id='$id_paket'")->row();

        $metode_pembayaran = $this->input->post('metode_pembayaran');

        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_paket' => $id_paket,
            'type' => 'Package',
            'nama_paket' => $d->nama_paket,
            'total_harga' => $d->harga_paket,
            'metode_kirim' => $this->input->post('metode_kirim'),
            'metode_pembayaran' => $metode_pembayaran,
            'tanggal' => date('Y-m-d H:i:s'),
            'status' => 'Proses Pembayaran'

        ];
        $this->ModelBooking->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda Berhasil membuat janji Service</div>');
        redirect('pesanan/user');
    }

    public function konfirmasi()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('proses/konfirmasi');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('main/home');
            $this->load->view('proses/konfirmasi');
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('role_id') == 1) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('package/tambah');
            $this->load->view('templates/footer');
        } else {
            redirect('package/');
        }
    }

    public function tambahpaket()
    {

        // $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required|min_length[3]', [
        //     'required' => 'Nama Paket harus diisi',
        //     'min_length' => 'Nama Paket terlalu pendek'
        // ]);

        // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[3]', [
        //     'required' => 'Deskripsi harus diisi',
        //     'min_length' => 'Deskripsi terlalu pendek'
        // ]);
        // $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required|min_length[3]', [
        //     'required' => 'Harga Paket harus diisi',
        //     'min_length' => 'Harga Paket terlalu pendek'
        // ]);
        // $this->form_validation->set_rules('durasi_kerja1', 'Durasi Kerja 1', 'required|numeric', [
        //     'required' => 'Durasi Kerja Input 1 harus diisi',
        // ]);
        // $this->form_validation->set_rules('durasi_kerja2', 'Durasi Kerja 2', 'required|numeric', [
        //     'required' => 'Durasi Kerja Input 2 harus diisi',
        // ]);

        //konfigurasi sebelum gambar diupload
        $dk1 = $this->input->post('durasi_kerja1', true);
        $dk2 = $this->input->post('durasi_kerja2', true);
        $durasikerja = "$dk1-$dk2 Hari";
        // $gambar = 'a';
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon Upload Foto dengan benar, Max. Size: 3MB, Max. Width: 1024px, Max. Height: 1000px.</div>');
            redirect('package/tambah');
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['image'] = $file_encode;
            $data['nama_paket'] = $this->input->post('nama_paket');
            $data['deskripsi'] =  $this->input->post('deskripsi');
            $data['harga_paket'] =  $this->input->post('harga_paket');
            $data['durasi_kerja'] =  $durasikerja;

            $this->db->insert('paket', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Membuat Package Baru!</div>');
            unlink($image_data['full_path']);
        }

        // $image = $this->upload->data();
        // $gambar = $image['file_name'];
        // } else {
        //     $gambar = 'No Image';
        // }

        //     $data = [
        //         'image' => $gambar,
        //         'nama_paket' => $this->input->post('nama_paket', true),
        //         'deskripsi' => $this->input->post('deskripsi', true),
        //         'harga_paket' => $this->input->post('harga_paket', true),
        //         'durasi_kerja' => $durasikerja

        //     ];

        //     $this->ModelPaket->simpanOrder($data);
        //     redirect('package');
        // }
        // $data = [
        //     // 'image' => $gambar,
        //     'nama_paket' => $this->input->post('nama_paket'),
        //     'deskripsi' => $this->input->post('deskripsi'),
        //     'harga_paket' => $this->input->post('harga_paket'),
        //     'durasi_kerja' => $durasikerja

        // ];
        // $this->ModelPaket->simpanData($data);
        redirect('package');
    }
}
