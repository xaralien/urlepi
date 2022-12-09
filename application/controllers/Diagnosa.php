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
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('diagnosa/diagnosa');
            $this->load->view('templates/footer');
        } else {
            redirect('home/login');
        }
    }
    public function proses()
    {

        // $metode_pembayaran = $this->input->post('metode_pembayaran');

        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'type' => 'Diagnosa',
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            // 'total_harga' => '100000',
            'metode_kirim' => '-',
            'metode_pembayaran' => '-',
            'tanggal' => date('Y-m-d'),
            'status' => 'Proses Konsultasi'

        ];
        $this->ModelDiagnosa->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda Berhasil membuat janji Service</div>');
        redirect('diagnosa/user');
    }
    public function admin()
    {
        $data = [
            'title' => "Tabel Order",
            'order' => $this->ModelDiagnosa->getOrder()->result(),
        ];
        // $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            if ($this->session->userdata('role_id') == 1) {
                $data['user'] = $user['nama'];
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('Diagnosa/list', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('diagnosa/user');
            }
        } else {
            redirect('home/login');
        }
    }
    public function user()
    {
        $id_user = $this->session->userdata('id_user');
        $data['order'] = $this->ModelDiagnosa->oderWhere(['id_user' => $id_user])->result();


        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            if ($this->session->userdata('role_id') == 2) {
                $data['user'] = $user['nama'];
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('Diagnosa/list', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('diagnosa/admin');
            }
        } else {
            redirect('home/login');
        }
    }
    public function detail()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $id = $this->uri->segment(3);
            $pesanan = $this->ModelDiagnosa->joinDiagnosa(['diagnosa.id' => $id])->result();
            $data['user'] = $user['nama'];
            $data['title'] = "Detail Buku";
            foreach ($pesanan as $fields) {
                $data['id'] = $id;
                $data['nama'] = $fields->nama;
                $data['alamat'] = $fields->alamat;
                $data['nomor_tlp'] = $fields->nomor_tlp;
                $data['type'] = $fields->type;
                $data['judul'] = $fields->judul;
                $data['deskripsi'] = $fields->deskripsi;
                $data['solusi'] = $fields->solusi;
                $data['bukti_harga'] = $fields->bukti_harga;
                $data['total_harga'] = $fields->total_harga;
                $data['metode_kirim'] = $fields->metode_kirim;
                $data['metode_pembayaran'] = $fields->metode_pembayaran;
                $data['durasi_kerja'] = $fields->durasi_kerja;
                $data['status'] = $fields->status;
                $data['bukti_pembayaran'] = $fields->bukti_pembayaran;
                $data['tanggal_selesai'] = $fields->tanggal_selesai;
                $data['status_garansi'] = $fields->status_garansi;
                // $data['id'] = $id;
            }
            if ($this->session->userdata('role_id') == 1) {
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('diagnosa/detail_admin', $data);
                $this->load->view('templates/footer');
            } else if ($this->session->userdata('role_id') == 2) {
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('diagnosa/detail', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('home/login');
            }
        }
    }
    public function solusi()
    {

        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'solusi' => $this->input->post('solusi'),
            'status' => 'Solusi Terkirim!'
        ];

        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Mengirim Solusi</div>');
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function selesai()
    {
        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'status' => "SELESAI!",
            'status_garansi' => 'TERSEDIA'

        ];
        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function servicesekarang()
    {
        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'status' => "Admin Sedang menghitung Harga"
        ];
        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }

    public function tentukan()
    {
        // $id_diagnosa = $this->uri->segment(3);

        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/header', $data);
            $this->load->view('main/home');
            $this->load->view('diagnosa/detail_service');
            $this->load->view('templates/footer');
        } else {
            redirect('home/login');
        }
    }

    public function selesaihitung()
    {
        $id_diagnosa = $this->uri->segment(3);
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '300000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'bukti_harga' . $id_diagnosa;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_harga')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon Upload Bukti/Nota dengan benar, Max. Size: 3MB, Max. Width: 1024px, Max. Height: 1000px.</div>');
            redirect('diagnosa/detail/' . $id_diagnosa);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);

            $data = [
                'bukti_harga' => $file_encode,
                'total_harga' => $this->input->post('total'),
                'status' => 'Proses Persetujuan'
            ];

            $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Mengunggah Bukti</div>');
            redirect('diagnosa/detail/' . $id_diagnosa);
        }
    }
    public function pilih()
    {
        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'metode_kirim' => $this->input->post('metode_kirim'),
            'metode_pembayaran' => $this->input->post('metode_pembayaran'),
            'status' => 'Proses Pembayaran',
            'durasi_kerja' => '1-5 Hari'
        ];

        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Membuat ajuan Service</div>');
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function bataldiagnosa()
    {
        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'status' => "BATAL!"
        ];
        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function buktipembayaran()
    {
        $id_diagnosa = $this->uri->segment(3);
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'bukti_pembayaran' . $id_diagnosa;


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon Upload Bukti dengan benar, Max. Size: 3MB, Max. Width: 1024px, Max. Height: 1000px.</div>');
            // $this->session->set_flashdata("danger", "");
            redirect('diagnosa/detail/' . $id_diagnosa);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data = [
                'bukti_pembayaran' => $file_encode,
                'status' => 'Proses Konfirmasi'
            ];
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Mengunggah Bukti</div>');
            $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
            redirect('diagnosa/detail/' . $id_diagnosa);
        }
    }
    public function buktikonfirmasi()
    {
        $id_diagnosa = $this->uri->segment(3);
        $metode = $this->input->post('metode_kirim');
        if ($metode == "Antar Jemput") {
            $status = "Petugas sedang Menjemput Laptop";
        } elseif ($metode == "Di Tempat") {
            $status = "Petugas sedang menuju Lokasi";
        } elseif ($metode == "Di Toko") {
            $status = "Silahkan antar Laptop Anda";
        }

        $data = [
            'status' => $status
        ];
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Bukti Telah Di Konfirmasi</div>');
        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }

    public function buktitolak()
    {
        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'status' => "Bukti Pembayaran Di Tolak!"
        ];
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Bukti berhasil di Tolak</div>');

        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function perbaiki()
    {
        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'status' => "Sedang Di Perbaiki"
        ];
        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function selesaiperbaiki()
    {
        $id_diagnosa = $this->uri->segment(3);
        $metode = $this->input->post('metode_kirim');
        if ($metode == "Antar Jemput") {
            $status = "Laptop Sedang di Antar";
        } elseif ($metode == "Di Tempat") {
            $status = "SELESAI!";
            $tanggal_selesai = date('Y-m-d');
        } elseif ($metode == "Di Toko") {
            $status = "SELESAI!";
            $tanggal_selesai = date('Y-m-d');
        }
        if ($tanggal_selesai == Null) {
            $data = [
                'status' => $status,
            ];
        } else {
            $data = [
                'status' => $status,
                'tanggal_selesai' => $tanggal_selesai,
                'status_garansi' => 'TERSEDIA'
            ];
        }
        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function exportToPdf()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        $dompdf = new \Dompdf\Dompdf();
        // title dari pdf
        $id = $this->uri->segment(3);
        $pesanan = $this->ModelDiagnosa->joinDiagnosa(['diagnosa.id' => $id])->result();
        foreach ($pesanan as $fields) {
            $data['id'] = $id;
            $data['nama'] = $fields->nama;
            $data['alamat'] = $fields->alamat;
            $data['nomor_tlp'] = $fields->nomor_tlp;
            $data['type'] = $fields->type;
            $data['judul'] = $fields->judul;
            $data['deskripsi'] = $fields->deskripsi;
            $data['solusi'] = $fields->solusi;
            $data['total_harga'] = $fields->total_harga;
            $data['metode_kirim'] = $fields->metode_kirim;
            $data['metode_pembayaran'] = $fields->metode_pembayaran;
            $data['durasi_kerja'] = $fields->durasi_kerja;
            $data['tanggal_selesai'] = $fields->tanggal_selesai;
            $data['status_garansi'] = $fields->status_garansi;
            $data['status'] = $fields->status;

            // $data['id'] = $id;
        }

        // filename dari pdf ketika didownload
        $file_pdf = 'bukti_service_urlepi';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('diagnosa/pdf_diagnosa', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
    public function pakaigaransi()
    {
        $id_diagnosa = $this->uri->segment(3);

        $data = [
            'status_garansi' => "Sudah Di Pakai"
        ];
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Garansi Berhasil di gunakan</div>');
        $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        redirect('diagnosa/detail/' . $id_diagnosa);
    }
    public function cekgaransi()
    {
        $id_diagnosa = $this->uri->segment(3);
        $pesanan = $this->ModelDiagnosa->joinDiagnosa(['diagnosa.id' => $id_diagnosa])->result();
        foreach ($pesanan as $fields) {
            $tanggal_selesai = $fields->tanggal_selesai;
        }
        $date_now = date("Y-m-d");
        $garansi = date('Y-m-d', strtotime($tanggal_selesai . ' + 3 months'));

        if ($date_now > $garansi) {
            $data = [
                'status_garansi' => "Kadaluwarsa"
            ];
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">MAAF! Garansi sudah Kadaluwarsa</div>');
            $this->ModelDiagnosa->updateOrder($data, ['id' => $id_diagnosa]);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Garansi Masih bisa digunakan</div>');
        }

        redirect('diagnosa/detail/' . $id_diagnosa);
    }
}
