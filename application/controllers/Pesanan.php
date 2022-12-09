<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => "Tabel Order",
            'order' => $this->ModelPesanan->getOrder()->result(),
        ];
        // $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            if ($this->session->userdata('role_id') == 1) {
                $data['user'] = $user['nama'];
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('pesanan/main', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('pesanan/user');
            }
        } else {
            redirect('home/login');
        }
    }
    public function user()
    {
        $id_user = $this->session->userdata('id_user');
        $data['order'] = $this->ModelBooking->oderWhere(['id_user' => $id_user])->result();


        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            if ($this->session->userdata('role_id') == 2) {
                $data['user'] = $user['nama'];
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('pesanan/main', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('pesanan/');
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
            $pesanan = $this->ModelBooking->joinPesanan(['booking.id' => $id])->result();
            $data['user'] = $user['nama'];
            $data['title'] = "Detail Buku";
            foreach ($pesanan as $fields) {
                $data['id'] = $id;
                $data['nama'] = $fields->nama;
                $data['alamat'] = $fields->alamat;
                $data['nomor_tlp'] = $fields->nomor_tlp;
                $data['type'] = $fields->type;
                $data['nama_paket'] = $fields->nama_paket;
                $data['deskripsi'] = $fields->deskripsi;
                $data['harga_paket'] = $fields->harga_paket;
                $data['metode_kirim'] = $fields->metode_kirim;
                $data['metode_pembayaran'] = $fields->metode_pembayaran;
                $data['durasi_kerja'] = $fields->durasi_kerja;
                $data['status'] = $fields->status;
                $data['bukti_pembayaran'] = $fields->bukti_pembayaran;
                $data['tanggal_selesai'] = $fields->tanggal_selesai;
                $data['status_garansi'] = $fields->status_garansi;
                if (!empty($fields->total_tambahan)) {
                    $data['total_tambahan'] = $fields->total_tambahan;
                    $data['bukti_tambahan'] = $fields->bukti_tambahan;
                    $data['bukti_kedua'] = $fields->bukti_kedua;
                } else {
                    $data['total_tambahan'] = NULL;
                }
                // $data['id'] = $id;
            }
            if ($this->session->userdata('role_id') == 1) {
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('pesanan/detail_admin', $data);
                $this->load->view('templates/footer');
            } else if ($this->session->userdata('role_id') == 2) {
                $this->load->view('templates/header', $data);
                $this->load->view('main/home');
                $this->load->view('pesanan/detail', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('home/login');
            }
        }
    }
    public function buktipembayaran()
    {
        $id_pesanan = $this->uri->segment(3);
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'bukti_pembayaran' . $id_pesanan;


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon Upload Bukti dengan benar, Max. Size: 3MB, Max. Width: 1024px, Max. Height: 1000px.</div>');
            // $this->session->set_flashdata("danger", "");
            redirect('pesanan/detail/' . $id_pesanan);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data = [
                'bukti_pembayaran' => $file_encode,
                'status' => 'Proses Konfirmasi'
            ];
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Mengunggah Bukti</div>');
            $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
            redirect('pesanan/detail/' . $id_pesanan);
        }
    }

    public function buktikonfirmasi()
    {
        $id_pesanan = $this->uri->segment(3);
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
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }

    public function buktitolak()
    {
        $id_pesanan = $this->uri->segment(3);

        $data = [
            'status' => "Bukti Pembayaran Di Tolak!"
        ];
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Bukti berhasil di Tolak</div>');

        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    public function perbaiki()
    {
        $id_pesanan = $this->uri->segment(3);

        $data = [
            'status' => "Sedang Di Perbaiki"
        ];
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    public function selesaiperbaiki()
    {
        $tanggal_selesai = '';
        $id_pesanan = $this->uri->segment(3);
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
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    public function perbaikipart()
    {
        $id_pesanan = $this->uri->segment(3);
        $data = [
            'status' => "Menghitung Total"
        ];
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    public function selesai()
    {
        $id_pesanan = $this->uri->segment(3);
        $tanggal_selesai = date('Y-m-d');
        $data = [
            'status' => 'SELESAI!',
            'tanggal_selesai' => $tanggal_selesai,
            'status_garansi' => 'TERSEDIA'

        ];
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    public function selesaihitung()
    {
        $id_booking = $this->uri->segment(3);
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '300000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'bukti_tambahan' . $id_booking;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_tambahan')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon Upload Bukti/Nota dengan benar, Max. Size: 3MB, Max. Width: 1024px, Max. Height: 1000px.</div>');
            redirect('pesanan/detail/' . $id_booking);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            // $data['total'] = $this->input->post('total');
            // $data['id_booking'] = $id_booking;
            // $data['bukti_kedua'] =  $this->input->post('deskripsi');
            // $data['bukti_tambahan'] = $file_encode;
            $data = [
                'bukti_Tambahan' => $file_encode,
                'total_tambahan' => $this->input->post('total'),
                'status' => 'Proses Pembayaran Akhir'
            ];

            $this->ModelPesanan->updateOrder($data, ['id' => $id_booking]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Mengunggah Bukti</div>');
            redirect('pesanan/detail/' . $id_booking);
            // $this->db->insert('tambahan', $data);
            // unlink($image_data['full_path']);
        }

        // $data2 = [
        //     'status' => "Proses Pembayaran Akhir"
        // ];
        // $this->ModelPesanan->updateOrder($data2, ['id' => $id_booking]);
        // redirect('pesanan/detail/' . $id_booking);
    }
    // public function pembayaran_tambahan()
    // {
    //     $id_pesanan = $this->uri->segment(3);
    //     $config['upload_path'] = './assets/img/upload/';
    //     $config['allowed_types'] = 'jpg|png|jpeg';
    //     $config['max_size'] = '3000';
    //     $config['max_width'] = '1024';
    //     $config['max_height'] = '1000';

    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('pembayaran_tambahan')) {
    //         $error = array('error' => $this->upload->display_errors());
    //         redirect('pesanan/detail' . $id_pesanan . '/' . $error);
    //     } else {
    //         $image_data = $this->upload->data();
    //         $imgdata = file_get_contents($image_data['full_path']);
    //         $file_encode = base64_encode($imgdata);
    //         $data = [
    //             'bukti_pembayaran_tambahan' => $file_encode
    //         ];
    //         $this->ModelPesanan->updateOrderTambahan()($data, ['id_booking' => $id_pesanan]);
    //         $data2 = [
    //             'status' => 'Proses Konfirmasi Tambahan'
    //         ];
    //         $this->ModelPesanan->updateOrder($data2, ['id' => $id_pesanan]);
    //         redirect('pesanan/detail/' . $id_pesanan);
    //     }
    // }
    public function pembayaran_tambahan()
    {
        $id_pesanan = $this->uri->segment(3);
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'bukti_kedua' . $id_pesanan;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('pembayaran_tambahan')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon Upload Bukti dengan benar, Max. Size: 3MB, Max. Width: 1024px, Max. Height: 1000px.</div>');
            redirect('pesanan/detail/' . $id_pesanan);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            // $data['total'] = $this->input->post('total');
            // $data['id_booking'] = $id_booking;
            // $data['bukti_kedua'] =  $this->input->post('deskripsi');
            // $data['bukti_tambahan'] = $file_encode;
            $data = [
                'bukti_kedua' => $file_encode,
                'status' => 'Proses Konfirmasi Tambahan'
            ];
            $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Anda berhasil Mengunggah Bukti</div>');
            redirect('pesanan/detail/' . $id_pesanan);
        }
    }
    // public function buktikonfirmasitambahan()
    // {
    //     $id_pesanan = $this->uri->segment(3);
    //     $metode = $this->input->post('metode_kirim');
    //     if ($metode == "Antar Jemput") {
    //         $status = "Petugas sedang Menjemput Laptop";
    //     } elseif ($metode == "Di Tempat") {
    //         $status = "Petugas sedang menuju Lokasi";
    //     } elseif ($metode == "Di Toko") {
    //         $status = "Silahkan antar Laptop Anda";
    //     }

    //     $data = [
    //         'status' => $status
    //     ];
    //     $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
    //     redirect('pesanan/detail/' . $id_pesanan);
    // }

    public function buktitolaktambahan()
    {
        $id_pesanan = $this->uri->segment(3);

        $data = [
            'status' => "Bukti Pembayaran Tambahan Di Tolak!"
        ];
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    public function batalpesanan()
    {
        $id_pesanan = $this->uri->segment(3);

        $data = [
            'status' => "BATAL!"
        ];
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    // public function exportToPdf()
    // {
    //     // $id_user = $this->session->userdata('id_user');
    //     // $data['user'] = $this->session->userdata('nama');
    //     // $data['judul'] = "Cetak Bukti Booking";
    //     // $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();

    //     // $data['items'] = $this->db->query("select*from booking bo, booking_detail d, buku bu where d.id_booking=bo.id_booking and d.id_buku=bu.id and bo.id_user='$id_user'")->result_array();
    //     // $this->load->library('dompdf_gen');
    //     $id = $this->uri->segment(3);
    //     $pesanan = $this->ModelBooking->joinPesanan(['booking.id' => $id])->result();
    //     foreach ($pesanan as $fields) {
    //         $data['id'] = $id;
    //         $data['nama'] = $fields->nama;
    //         $data['alamat'] = $fields->alamat;
    //         $data['nomor_tlp'] = $fields->nomor_tlp;
    //         $data['type'] = $fields->type;
    //         $data['nama_paket'] = $fields->nama_paket;
    //         $data['deskripsi'] = $fields->deskripsi;
    //         $data['harga_paket'] = $fields->harga_paket;
    //         $data['metode_kirim'] = $fields->metode_kirim;
    //         $data['metode_pembayaran'] = $fields->metode_pembayaran;
    //         $data['durasi_kerja'] = $fields->durasi_kerja;
    //         $data['status'] = $fields->status;
    //         $data['bukti_pembayaran'] = $fields->bukti_pembayaran;
    //         if (!empty($fields->total_tambahan)) {
    //             $data['total_tambahan'] = $fields->total_tambahan;
    //             $data['bukti_tambahan'] = $fields->bukti_tambahan;
    //             $data['bukti_kedua'] = $fields->bukti_kedua;
    //         } else {
    //             $data['total_tambahan'] = NULL;
    //         }
    //         $sroot = $_SERVER['DOCUMENT_ROOT'];
    //         include $sroot . "/urlepi/application/third_party/dompdf/autoload.inc.php";
    //         $dompdf = new Dompdf\Dompdf();
    //         $this->load->view('pesanan/pdf_pesanan', $data);
    //         $paper_size = 'A4'; // ukuran kertas
    //         $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    //         $html = $this->output->get_output();
    //         $dompdf->set_paper($paper_size, $orientation);
    //         //Convert to PDF
    //         $dompdf->load_html($html);
    //         $dompdf->render();
    //         $dompdf->stream("bukti-pesanan-$id_user.pdf", array('Attachment' => 0));
    //         // nama file pdf yang di hasilkan
    //     }
    // }
    public function exportToPdf()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        $dompdf = new \Dompdf\Dompdf();
        // title dari pdf
        $id = $this->uri->segment(3);
        $pesanan = $this->ModelBooking->joinPesanan(['booking.id' => $id])->result();
        foreach ($pesanan as $fields) {
            $data['id'] = $id;
            $data['nama'] = $fields->nama;
            $data['alamat'] = $fields->alamat;
            $data['nomor_tlp'] = $fields->nomor_tlp;
            $data['type'] = $fields->type;
            $data['nama_paket'] = $fields->nama_paket;
            $data['deskripsi'] = $fields->deskripsi;
            $data['harga_paket'] = $fields->harga_paket;
            $data['metode_kirim'] = $fields->metode_kirim;
            $data['metode_pembayaran'] = $fields->metode_pembayaran;
            $data['durasi_kerja'] = $fields->durasi_kerja;
            $data['tanggal_selesai'] = $fields->tanggal_selesai;
            $data['status'] = $fields->status;
            $data['status_garansi'] = $fields->status_garansi;
            $data['bukti_pembayaran'] = $fields->bukti_pembayaran;

            if (!empty($fields->total_tambahan)) {
                $data['total_tambahan'] = $fields->total_tambahan;
                $data['bukti_tambahan'] = $fields->bukti_tambahan;
                $data['bukti_kedua'] = $fields->bukti_kedua;
            } else {
                $data['total_tambahan'] = NULL;
            }
        }

        // filename dari pdf ketika didownload
        $file_pdf = 'bukti_service_urlepi';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('pesanan/pdf_pesanan', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
    public function pakaigaransi()
    {
        $id_pesanan = $this->uri->segment(3);

        $data = [
            'status_garansi' => "Sudah Di Pakai"
        ];
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Garansi Berhasil di gunakan</div>');
        $this->ModelBooking->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }
    public function cekgaransi()
    {
        $id_pesanan = $this->uri->segment(3);
        $pesanan = $this->ModelBooking->joinPesanan(['booking.id' => $id_pesanan])->result();
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
            $this->ModelBooking->updateOrder($data, ['id' => $id_pesanan]);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Garansi Masih bisa digunakan</div>');
        }

        redirect('pesanan/detail/' . $id_pesanan);
    }
}
