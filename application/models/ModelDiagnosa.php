<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDiagnosa extends CI_Model
{
    //manajemen buku
    public function getOrder()
    {
        $this->db->from('diagnosa');
        return $this->db->get();
    }

    public function oderWhere($where)
    {
        return $this->db->get_where('diagnosa', $where);
    }

    public function simpanData($data = null)
    {
        $this->db->insert('diagnosa', $data);
    }

    public function updateOrder($data = null, $where = null)
    {
        $this->db->update('diagnosa', $data, $where);
    }
    public function updateOrderTambahan($data = null, $where = null)
    {
        $this->db->update('tambahan', $data, $where);
    }

    public function hapusOrder($where = null)
    {
        $this->db->delete('diagnosa', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('diagnosa');
        return $this->db->get()->row($field);
    }
    public function joinDiagnosa($where)
    {
        $this->db->from('diagnosa');
        $this->db->join('user', 'user.id = diagnosa.id_user');
        $this->db->where($where);
        return $this->db->get();
        print_r($this->db->last_query());
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

    // //join
    // public function joinKategoriBuku($where)
    // {
    //     $this->db->from('buku');
    //     $this->db->join('kategori', 'kategori.id = buku.id_kategori');
    //     $this->db->where($where);
    //     return $this->db->get();
    // }

    // public function getLimitBuku()
    // {
    //     $this->db->limit(5);
    //     return $this->db->get('buku');
    // }
}
