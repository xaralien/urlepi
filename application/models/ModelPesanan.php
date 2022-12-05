<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPesanan extends CI_Model
{
    //manajemen buku
    public function getOrder()
    {
        return $this->db->get('booking');
    }

    public function oderWhere($where)
    {
        return $this->db->get_where('booking', $where);
    }

    public function simpanOrder($data = null)
    {
        $this->db->insert('booking', $data);
    }

    public function updateOrder($data = null, $where = null)
    {
        $this->db->update('booking', $data, $where);
    }
    public function updateOrderTambahan($data = null, $where = null)
    {
        $this->db->update('tambahan', $data, $where);
    }
    public function hapusOrder($where = null)
    {
        $this->db->delete('booking', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('booking');
        return $this->db->get()->row($field);
    }

    //join
    public function joinPesanan($where)
    {
        $this->db->from('booking');
        $this->db->join('user', 'user.id = booking.id_user');
        $this->db->join('paket', 'paket.id = booking.id_paket');
        $this->db->where($where);
        return $this->db->get();
    }

    //manajemen kategori
    // public function getKategori()
    // {
    //     return $this->db->get('kategori');
    // }

    // public function kategoriWhere($where)
    // {
    //     return $this->db->get_where('kategori', $where);
    // }

    // public function simpanKategori($data = null)
    // {
    //     $this->db->insert('kategori', $data);
    // }

    // public function hapusKategori($where = null)
    // {
    //     $this->db->delete('kategori', $where);
    // }

    // public function updateKategori($where = null, $data = null)
    // {
    //     $this->db->update('kategori', $data, $where);
    // }



    // public function getLimitBuku()
    // {
    //     $this->db->limit(5);
    //     return $this->db->get('buku');
    // }
}
