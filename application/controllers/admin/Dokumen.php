<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->model('Auth_model');
        $this->check_login();
        if (($this->session->userdata('level') != "8") AND ($this->session->userdata('level') != "1") AND ($this->session->userdata('level') != "9") AND ($this->session->userdata('level') != "10")) {
            redirect('', 'refresh');
        }
    }

    public function gambar(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Dokumen Gambar Kerja | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('gambar_kerja');
        $this->db->order_by('tanggal_gambar','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/dokumen/gambar_index', array_merge($data,$data2));
    }
    public function metode(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Dokumen Metode Kerja | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('metode');
        $this->db->order_by('tanggal_metode','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/dokumen/metode_index', array_merge($data,$data2));
    }
    public function data(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Dokumen Data Quality | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('data_quality');
        $this->db->order_by('tanggal_data_quality','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/dokumen/data_index', array_merge($data,$data2));
    }
    public function simpan_gambar(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $data = array(
            'no_gambar' => $this->input->post('no_gambar'),
            'judul_gambar' => $this->input->post('judul_gambar'),
            'jenis_gambar' => $this->input->post('jenis_gambar'),
            'jumlah_halaman_gambar' => $this->input->post('jumlah_gambar'),
            'klasifikasi_gambar' => $this->input->post('klasifikasi_gambar'),
            'keterangan_gambar' => $this->input->post('keterangan_gambar'),
            'link_gambar' => $this->input->post('link_gambar'),
            'tanggal_gambar' => $tanggal,
         );  
        $this->CRUD_model->Insert('gambar_kerja', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Dokumen Gambar Kerja telah ditambahkan.</div></div></p>
        ');
        redirect('admin/dokumen/gambar');       
    }
    public function simpan_metode(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $data = array(
            'no_metode' => $this->input->post('no_metode'),
            'judul_metode' => $this->input->post('judul_metode'),
            'jumlah_halaman_metode' => $this->input->post('jumlah_metode'),
            'klasifikasi_metode' => $this->input->post('klasifikasi_metode'),
            'keterangan_metode' => $this->input->post('keterangan_metode'),
            'link_metode' => $this->input->post('link_metode'),
            'tanggal_metode' => $tanggal,
             );  
        $this->CRUD_model->Insert('metode', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Dokumen Metode Kerja telah ditambahkan.</div></div></p>
        ');
        redirect('admin/dokumen/metode');       
    }
    public function simpan_data(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $nomor = date("YmdHis");
        ini_set('upload_max_filesize', '100M');
        $config = array();
        $config['upload_path']          = './assets/upload/dokumen/';
        $config['allowed_types'] = '*';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $nomor;  
        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('berkas')) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-danger">
            <div class="info-box-icon">
            <i class="fa fa-warning"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">GAGAL</b><br>Dokumen yang diupload melebihi 100MB.</div>
            </div>
            </p>
            ');
            redirect('admin/dokumen/data');   
        } else {
            $fileExt = $this->upload->data('file_ext'); 
        }  
        $data = array(
            'id_data' => $nomor,
            'no_data_quality' => $this->input->post('no_data_quality'),
            'judul_data_quality' => $this->input->post('judul_data_quality'),
            'klasifikasi_data_quality' => $this->input->post('klasifikasi_data_quality'),
            'keterangan_data_quality' => $this->input->post('keterangan_data_quality'),
            'tanggal_data_quality' => $tanggal,
            'berkas' => $nomor.$fileExt,
             );  
        $this->CRUD_model->Insert('data_quality', $data);

        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Dokumen data quality telah ditambahkan.</div></div></p>
        ');
        redirect('admin/dokumen/data');         
    }
    public function update_data(){ 
        $where = array('id_data_quality' => $this->input->post('id_data_quality'));  
        date_default_timezone_set("Asia/Jakarta");
        ini_set('upload_max_filesize', '100M');
        $config = array();
        $config['upload_path']          = './assets/upload/dokumen/';
        $config['allowed_types'] = '*';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $this->input->post('id_data');  
        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('berkas')) {
            $error = array('error' => $this->upload->display_errors());  
        } else {
            $fileExt = $this->upload->data('file_ext'); 
            $data = array('berkas' => $this->input->post('id_data').$fileExt);  
            $this->CRUD_model->Update('data_quality', $data, $where);   
        }
        $data = array(
            'no_data_quality' => $this->input->post('no_data_quality'),
            'judul_data_quality' => $this->input->post('judul_data_quality'),
            'klasifikasi_data_quality' => $this->input->post('klasifikasi_data_quality'),
            'keterangan_data_quality' => $this->input->post('keterangan_data_quality'),
             );  
        $this->CRUD_model->Update('data_quality', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Dokumen data quality telah diperbarui.</div>
        </div></p>');
        redirect('admin/dokumen/data'); 
    }
    public function edit_gambar($id_gambar_kerja){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Dokumen Gambar Kerja | '.$site['judul'],
            'id_gambar_kerja'       => $id_gambar_kerja
        );
        $where = array('id_gambar_kerja' => $id_gambar_kerja);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'gambar_kerja')->result();
        $this->template->load('layout/template', 'admin/dokumen/gambar_edit', array_merge($data, $data2));
    }
    public function edit_metode($id_metode){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Dokumen Gambar Kerja | '.$site['judul'],
            'id_metode'       => $id_metode
        );
        $where = array('id_metode' => $id_metode);
        $data3['data3'] = $this->CRUD_model->edit_data($where,'metode')->result();
        $this->template->load('layout/template', 'admin/dokumen/metode_edit', array_merge($data, $data3));
    }
    public function edit_data($id_data_quality){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Quality | '.$site['judul'],
            'id_data_quality'       => $id_data_quality
        );
        $where = array('id_data_quality' => $id_data_quality);
        $data4['data4'] = $this->CRUD_model->edit_data($where,'data_quality')->result();
        $this->template->load('layout/template', 'admin/dokumen/data_edit', array_merge($data, $data4));
    }
    public function update_gambar(){ 
        $where = array('id_gambar_kerja' => $this->input->post('id_gambar_kerja'));  
        $data = array(
            'no_gambar' => $this->input->post('no_gambar'),
            'judul_gambar' => $this->input->post('judul_gambar'),
            'jenis_gambar' => $this->input->post('jenis_gambar'),
            'jumlah_halaman_gambar' => $this->input->post('jumlah_gambar'),
            'klasifikasi_gambar' => $this->input->post('klasifikasi_gambar'),
            'keterangan_gambar' => $this->input->post('keterangan_gambar'),
            'link_gambar' => $this->input->post('link_gambar'),
         );  
        $this->CRUD_model->Update('gambar_kerja', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Dokumen Gambar kerja telah diperbarui.</div>
        </div></p>');
        redirect('admin/dokumen/gambar'); 
    }
    public function update_metode(){ 
        $where = array('id_metode' => $this->input->post('id_metode'));  
        $data = array(
            'no_metode' => $this->input->post('no_metode'),
            'judul_metode' => $this->input->post('judul_metode'),
            'jumlah_halaman_metode' => $this->input->post('jumlah_metode'),
            'klasifikasi_metode' => $this->input->post('klasifikasi_metode'),
            'keterangan_metode' => $this->input->post('keterangan_metode'),
            'link_metode' => $this->input->post('link_metode'),
             );  
        $this->CRUD_model->Update('metode', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Dokumen metode kerja telah diperbarui.</div>
        </div></p>');
        redirect('admin/dokumen/metode'); 
    }
    public function delete_gambar($id_gambar_kerja){   
        $id_gambar_kerja = array('id_gambar_kerja' => $id_gambar_kerja);
        $this->CRUD_model->Delete('gambar_kerja', $id_gambar_kerja);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Dokumen gambar kerja, telah dihapus.</div></div></p>');
        redirect('admin/dokumen/gambar');  
    }
    public function delete_metode($id_metode){   
        $id_metode = array('id_metode' => $id_metode);
        $this->CRUD_model->Delete('metode', $id_metode);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Dokumen metode kerja, telah dihapus.</div></div></p>');
        redirect('admin/dokumen/metode');  
    }
    public function delete_data($id_data_quality){   
        $id = array('id_data_quality' => $id_data_quality);
        $nama = $this->CRUD_model->get_berkas($id_data_quality);
        $filename=FCPATH.'/assets/upload/dokumen/'.$nama;
        if (file_exists($filename)){
            unlink("./assets/upload/dokumen/".$nama);
        }
        $this->CRUD_model->Delete('data_quality', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Data quality, telah dihapus.</div></div></p>');
        redirect('admin/dokumen/data');  
    }
}
