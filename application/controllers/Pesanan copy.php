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
            redirect('login');
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
            redirect('login');
        }
    }
    public function detailtambahan()
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
                if (!empty($fields->id_tambahan)) {
                    $data['id_tambahan'] = $fields->id_tambahan;
                    $data['bukti_tambahan'] = $fields->bukti_tambahan;
                    $data['bukti_kedua'] = $fields->bukti_kedua;
                    $data['total'] = $fields->total;
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
                redirect('login');
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

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('pesanan/detail' . $id_pesanan . '/' . $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data = [
                'bukti_pembayaran' => $file_encode,
                'status' => 'Proses Konfirmasi'
            ];
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
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
    }

    public function buktitolak()
    {
        $id_pesanan = $this->uri->segment(3);

        $data = [
            'status' => "Bukti Pembayaran Di Tolak!"
        ];
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
        $id_pesanan = $this->uri->segment(3);
        $metode = $this->input->post('metode_kirim');
        if ($metode == "Antar Jemput") {
            $status = "Laptop Sedang di Antar";
        } elseif ($metode == "Di Tempat") {
            $status = "SELESAI!";
        } elseif ($metode == "Di Toko") {
            $status = "SELESAI!";
        }
        $data = [
            'status' => $status
        ];
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

        $data = [
            'status' => "SELESAI!"
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

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_tambahan')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('pesanan/detail/' . $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['total'] = $this->input->post('total');
            $data['id_booking'] = $id_booking;
            $data['bukti_pembayaran_tambahan'] =  $this->input->post('deskripsi');
            $data['bukti_tambahan'] = $file_encode;

            $this->db->insert('tambahan', $data);
            unlink($image_data['full_path']);
        }

        $data2 = [
            'status' => "Proses Pembayaran Akhir"
        ];
        $this->ModelPesanan->updateOrder($data2, ['id' => $id_booking]);
        redirect('pesanan/detail/' . $id_booking);
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

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('pembayaran_tambahan')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('pesanan/detail' . $id_pesanan . '/' . $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data = [
                'bukti_kedua' => $file_encode
            ];
            $this->ModelPesanan->updateOrderTambahan($data, ['id_booking' => $id_pesanan]);
            redirect('pesanan/update_tambahan/' . $id_pesanan);
        }
    }
    public function update_tambahan()
    {
        $id_pesanan = $this->uri->segment(3);
        $data = [
            'status' => 'Proses Konfirmasi Tambahan'
        ];
        $this->ModelPesanan->updateOrder($data, ['id' => $id_pesanan]);
        redirect('pesanan/detail/' . $id_pesanan);
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
}
