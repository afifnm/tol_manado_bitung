<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->library('Pdf');
        $this->check_login();
        if (($this->session->userdata('level') != "Admin") AND ($this->session->userdata('level') < 0)) {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Dashboard | '.$site['judul'],
            'site'                  => $site,
        );
        $this->template->load('layout/template', 'admin/dashboard', array_merge($data));
    }
    public function laporan(){
        $tanggal1 = $this->input->get('tanggal1');
        $tanggal2 = $this->input->get('tanggal2');
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Laporan Pemasukan | '.$site['judul'],
            'site'                  => $site,
            'saldo_bank'            => $site['saldo'],
            'bunga'                 => $site['bunga'],
            'tanggal1'              => $tanggal1,
            'tanggal2'              => $tanggal2
        );
        $this->db->select('*');
        $this->db->from('transaksi a');
        $this->db->join('kategori b', 'b.kode = a.kode','left');
        $this->db->where('a.tanggal >=',$tanggal1);
        $this->db->where('a.tanggal <=',$tanggal2);
        $this->db->order_by('a.tanggal','ASC');
        $data4 = $this->db->get()->result_array();
        $data4 = array('data4' => $data4); 
        $this->load->view('admin/laporan', array_merge($data, $data4));
    }
}
 