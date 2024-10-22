<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD_model extends CI_Model{

 	public function GetWhere($table){
        $res=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
    public function edit_data($where,$table){      
        return $this->db->get_where($table,$where);
    }

    public function Insert($table,$data){
        $res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
 
    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
    public function get_level($id_level){
        if ($id_level>0) {
            $this->db->select('level');
            $this->db->from('level');
            $this->db->where('id_level', $id_level); 
            $res = $this->db->get()->row()->level;
        } else {
            $res = 'Admin'; 
        } 
        return $res;
    }
    public function get_acc($id_laporan_harian,$level){
        $this->db->select($level)->from('laporan_harian');
        $this->db->where('id_laporan_harian', $id_laporan_harian); 
        return $this->db->get()->row()->$level;
    }
    public function get_acc_request($id_laporan_harian,$level){
        $this->db->select($level)->from('request');
        $this->db->where('id_request', $id_laporan_harian); 
        return $this->db->get()->row()->$level;
    }
    public function nomor_laporan(){
        $tanggal = date("YmdHis");
        return $tanggal;
    }
    public function nomor_request(){
        $tanggal = date("YmdHis");
        return $tanggal;
    }
    public function get_feedback($id_laporan_harian,$aaaa){
        $this->db->select('*')->from('feedback a');
        $this->db->join('user b', 'b.username = a.username','left');
        $this->db->where('a.id_laporan_harian', $id_laporan_harian);
        $this->db->where('b.level', $aaaa); 
        $this->db->order_by('a.tanggal', 'DESC'); 
        return $this->db->get()->result_array();
    }
    public function get_feedback_request($id_laporan_harian,$aaaa){
        $this->db->select('*')->from('feedback a');
        $this->db->join('user b', 'b.username = a.username','left');
        $this->db->where('a.id_request', $id_laporan_harian);
        $this->db->where('b.level', $aaaa); 
        $this->db->order_by('a.tanggal', 'DESC'); 
        return $this->db->get()->result_array();
    }
    public function get_estimasi($id_laporan_harian){
        $this->db->select('sum(b.harga*a.jumlah) as total');
        $this->db->from('detail_laporan_harian a');
        $this->db->join('item b', 'b.id_item = a.id_item','left');
        $this->db->where('a.id_laporan_harian', $id_laporan_harian); 
        return $this->db->get()->row()->total;
    }
    public function get_cv($level){
        $this->db->select('cv')->from('user')->where('level', $level); 
        return $this->db->get()->row()->cv;
    }
    public function get_nama($level){
        $this->db->select('nama')->from('user')->where('level', $level); 
        return $this->db->get()->row()->nama;
    }
    public function get_berkas($id_data_quality){
        $this->db->select('berkas')->from('data_quality')->where('id_data_quality', $id_data_quality); 
        return $this->db->get()->row()->berkas;
    }
    public function get_alat($id_detail_laporan_harian){
        $this->db->select('*')->from('detail_alat_laporan a');
        $this->db->join('alat b', 'b.id_alat = a.id_alat','left');
        $this->db->where('a.id_detail_laporan_harian', $id_detail_laporan_harian);
        return  $this->db->get()->result_array();
    }
    public function cek_tenaga($nomor){
        $hasil = $this->db->where('id_request', $nomor)->count_all_results('detail_tenaga');
        return $hasil;
    }
    public function get_status_request($id_laporan_harian){
        $this->db->select('sum(pm_acc+ci_acc+struk_acc+pme_acc+qe_acc+re_acc+owner_acc) as total');
        $this->db->from('request');
        $this->db->where('id_request', $id_laporan_harian); 
        return $this->db->get()->row()->total;
    }
    public function jumlah($tabel,$id_laporan_harian){
        $this->db->select('sum(jumlah) as total')->from($tabel);
        $this->db->where('id_request', $id_laporan_harian); 
        return $this->db->get()->row()->total;
    }
}
