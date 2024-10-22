<?php

defined('BASEPATH') or exit('No direct script access allowed');
 
class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->library('Pdf');
        $this->check_login();
        if (($this->session->userdata('level') != "8") AND ($this->session->userdata('level') != "1") AND ($this->session->userdata('level') != "9") AND ($this->session->userdata('level') != "10")) {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $nomor = $this->CRUD_model->nomor_laporan();
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Laporan Harian | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );
        $this->db->select('*');
        $this->db->from('laporan_harian');
        $this->db->where('username',$this->session->userdata('username'));
        $this->db->order_by('tanggal_submit','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/laporan/index', array_merge($data,$data2));
    }
    public function buatlaporan(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("y-m-d");
        $data = array(
            'id_laporan_harian' => $this->input->post('id_laporan_harian'),
            'username' => $this->session->userdata('username'),
            'tanggal_submit' => $tanggal,
            'tanggal_start' => $this->input->post('start'),
            'tanggal_end' => $this->input->post('end'),
         );  
        $this->CRUD_model->Insert('laporan_harian', $data);
        redirect('admin/laporan/tambah/'.$this->input->post('id_laporan_harian'));       
    }
    public function tambah($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Buat Laporan Harian | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );

        $this->db->select('*');
        $this->db->from('detail_laporan_harian a');
        $this->db->join('item b', 'b.id_item = a.id_item','left');
        $this->db->where('a.id_laporan_harian', $nomor);
        $this->db->order_by('a.tanggal','DESC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);  

        $this->db->select('*');
        $this->db->where('id_laporan_harian', $nomor);
        $this->db->from('laporan_harian');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);  

        $this->db->select('*')->from('item')->where('active',1);
        $this->db->order_by('nama','ASC');
        $item = $this->db->get()->result_array();
        $item = array('item' => $item); 

        $this->db->select('*')->from('alat')->where('active',1);
        $this->db->order_by('alat','ASC');
        $alat = $this->db->get()->result_array();
        $alat = array('alat' => $alat); 

        $this->template->load('layout/template', 'admin/laporan/revisi', array_merge($data, $data2, $data3, $alat, $item));
    }
    public function edit($id_detail_laporan_harian,$nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Laporan Harian | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor,
            'id'                    => $id_detail_laporan_harian
        );

        $this->db->select('*');
        $this->db->from('detail_laporan_harian a');
        $this->db->join('item b', 'b.id_item = a.id_item','left');
        $this->db->where('a.id_detail_laporan_harian', $id_detail_laporan_harian);
        $this->db->order_by('a.tanggal','DESC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);   

        $this->db->select('*')->from('item')->where('active',1);
        $this->db->order_by('nama','ASC');
        $item = $this->db->get()->result_array();
        $item = array('item' => $item); 

        $this->db->select('*')->from('detail_alat_laporan a');
        $this->db->join('alat b', 'b.id_alat = a.id_alat','left');
        $this->db->where('a.id_detail_laporan_harian', $id_detail_laporan_harian);
        $alat = $this->db->get()->result_array();
        $alat = array('alat' => $alat); 
    
        $this->template->load('layout/template', 'admin/laporan/edit', array_merge($data, $data3, $alat, $item));
    }
    public function alat($id_detail_laporan_harian){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Alat-alat yang digunakan | '.$site['judul'],
            'site'                  => $site,
            'id_detail_laporan_harian'                    => $id_detail_laporan_harian
        );
        $this->db->select('*')->from('detail_alat_laporan a');
        $this->db->join('alat b', 'b.id_alat = a.id_alat','left');
        $this->db->where('a.id_detail_laporan_harian', $id_detail_laporan_harian);
        $alat = $this->db->get()->result_array();
        $alat = array('alat' => $alat); 
        $this->template->load('layout/template', 'admin/laporan/alat', array_merge($data, $alat));
    }
    public function preview($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Buat Laporan Harian | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );

        $this->db->select('*');
        $this->db->from('detail_laporan_harian a');
        $this->db->join('item b', 'b.id_item = a.id_item','left');
        $this->db->where('a.id_laporan_harian', $nomor);
        $this->db->order_by('a.tanggal','DESC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);  

        $this->db->select('*');
        $this->db->where('id_laporan_harian', $nomor);
        $this->db->from('laporan_harian');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);   

        $this->template->load('layout/template', 'admin/laporan/preview', array_merge($data, $data2, $data3));
    }
    public function cek(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Laporan Harian | '.$site['judul'],
            'site'                  => $site
        );
        $this->db->select('*');
        $this->db->from('laporan_harian');
        $this->db->order_by('tanggal_submit','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/laporan/cek', array_merge($data,$data2));
    }
    public function tambah_laporan(){
        date_default_timezone_set("Asia/Jakarta");
        $no = $this->input->post('nomor_alat'); 
        $date = date("YmdHis");
        $data = array(
            'id_detail_laporan_harian' => $date,
            'id_laporan_harian' => $this->input->post('id_laporan_harian'),
            'tanggal' => $this->input->post('tanggal'),
            'id_item' => $this->input->post('id_item'),
            'jumlah' => $this->input->post('jumlah_item'),
            'uraian' => $this->input->post('uraian'),
            'lokasi' => $this->input->post('lokasi'),
            'cuaca' => $this->input->post('cuaca'),
            'dokumentasi' => $this->input->post('dokumentasi'),
         );  
        $this->CRUD_model->Insert('detail_laporan_harian', $data);
        for ($i=1; $i <= $no; $i++) { 
            $data = array(
            'id_detail_laporan_harian' => $date,
            'id_alat' => $this->input->post('id_alat['.$i.']'),
            'jumlah' => $this->input->post('jumlah['.$i.']'),
         );  
        $this->CRUD_model->Insert('detail_alat_laporan', $data);
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('uraian').' telah ditambahkan pada laporan harian.</div>
        </div>
        </p>
        ');
        redirect('admin/laporan/tambah/'.$this->input->post('id_laporan_harian'));       
    }
    public function update_laporan(){
        $no = $this->input->post('nomor_alat'); 
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'id_item' => $this->input->post('id_item'),
            'jumlah' => $this->input->post('jumlah_item'),
            'uraian' => $this->input->post('uraian'),
            'lokasi' => $this->input->post('lokasi'),
            'cuaca' => $this->input->post('cuaca'),
            'dokumentasi' => $this->input->post('dokumentasi'),
         );  
        $where = array(
            'id_detail_laporan_harian' => $this->input->post('id_detail_laporan_harian'),
        );
        $this->CRUD_model->Update('detail_laporan_harian', $data, $where);

        for ($i=1; $i <= $no; $i++) { 
            $data = array(
                'jumlah' => $this->input->post('jumlah['.$i.']'),
         );  
            $where = array(
            'id_detail_alat_laporan' => $this->input->post('id_detail_alat_laporan['.$i.']'),
            );
            $this->CRUD_model->Update('detail_alat_laporan', $data, $where);
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('uraian').' telah ditambahkan pada laporan harian.</div>
        </div>
        </p>
        ');
        redirect('admin/laporan/tambah/'.$this->input->post('id_laporan_harian'));       
    }
    public function delete_item($id_detail_laporan_harian,$id_laporan_harian){
        $id = array('id_detail_laporan_harian' => $id_detail_laporan_harian);
        $this->CRUD_model->Delete('detail_laporan_harian', $id);
        $this->CRUD_model->Delete('detail_alat_laporan', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus daftar order.</div>
        </div>
        </p>
        ');
        redirect('admin/laporan/tambah/'.$id_laporan_harian); 
    }

    public function cancel_laporan($id_laporan_harian){
        $id = array('id_laporan_harian' => $id_laporan_harian);
        $this->CRUD_model->Delete('laporan_harian', $id);
        $this->CRUD_model->Delete('detail_laporan_harian', $id);
        $this->CRUD_model->Delete('feedback', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus laporan harian.</div>
        </div>
        </p>
        ');
        redirect('admin/laporan/'); 
    }
    public function hapus_feedback($id_feedback,$id_laporan_harian){
        $id = array('id_feedback' => $id_feedback);
        $this->CRUD_model->Delete('feedback', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus laporan harian.</div>
        </div>
        </p>
        ');
        redirect('admin/laporan/feedback/'.$id_laporan_harian); 
    }

    public function feedback($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Preview Laporan Harian | '.$site['judul'],
            'site'                  => $site,

        );
        $this->db->select('*');
        $this->db->from('detail_laporan_harian a');
        $this->db->join('item b', 'b.id_item = a.id_item','left');
        $this->db->where('a.id_laporan_harian', $nomor);
        $this->db->order_by('a.tanggal','DESC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);  

        $this->db->select('*');
        $this->db->where('id_laporan_harian', $nomor);
        $this->db->from('laporan_harian');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);  

        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('id_laporan_harian', $nomor);
        $this->db->where('username', $this->session->userdata('username')); 
        $history = $this->db->get()->result_array();
        $history = array('history' => $history);   
        $this->template->load('layout/template', 'admin/laporan/feedback', array_merge($data, $data2, $data3, $history));
    }
    public function simpan_feedback(){  
        $level = $this->input->post('level');
        $data = array(
            $level => $this->input->post('acc'),
         );  
        $where = array(
            'id_laporan_harian' => $this->input->post('id_laporan_harian'),
        );
        $data = $this->CRUD_model->Update('laporan_harian', $data, $where);
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $data = array(
            'id_laporan_harian' => $this->input->post('id_laporan_harian'),
            'tanggal' => $tanggal,
            'username' => $this->session->userdata('username'),
            'status' => $this->input->post('acc'),
            'keterangan' => $this->input->post('keterangan'),
         );  
        $this->CRUD_model->Insert('feedback', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Laporan harian, anda telah selesai memberikan feedback.</div>
        </div>
        </p>
        ');
        redirect('admin/laporan/cek/'.$this->input->post('id_laporan_harian'));
    }
    public function print_laporan($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Buat Laporan Harian | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );

        $this->db->select('*');
        $this->db->from('detail_laporan_harian a');
        $this->db->join('item b', 'b.id_item = a.id_item','left');
        $this->db->where('a.id_laporan_harian', $nomor);
        $this->db->order_by('a.tanggal','DESC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);  
 

        $this->db->select('*');
        $this->db->where('id_laporan_harian', $nomor);
        $this->db->from('laporan_harian');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);  

        $this->db->select('*')->from('item')->where('active',1);
        $this->db->order_by('nama','ASC');
        $item = $this->db->get()->result_array();
        $item = array('item' => $item); 

        $this->db->select('*')->from('alat')->where('active',1);
        $this->db->order_by('alat','ASC');
        $alat = $this->db->get()->result_array();
        $alat = array('alat' => $alat); 
        $this->load->view('admin/laporan/print', array_merge($data, $data2, $data3, $alat, $item));
    }
}
 