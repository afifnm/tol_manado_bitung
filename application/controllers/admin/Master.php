<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends MY_Controller
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

    public function item(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Master Item | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('active',1);
        $this->db->order_by('nama','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/data_master/item_index', array_merge($data,$data2));
    }
    public function simpan_item(){
        $data = array(
            'nama' => $this->input->post('item'),
            'satuan' => $this->input->post('satuan'),
            'no_item' => $this->input->post('no_item'),
            'harga' => $this->input->post('harga'),
            'active' => 1
         );  
        $this->CRUD_model->Insert('item', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('item').' telah ditambahkan.</div>
        </div>
        </p>
        ');
        redirect('admin/master/item/');       
    }
    public function edit_item($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Item | '.$site['judul'],
        );
        $where = array('id_item' => $id);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'item')->result();
        $this->template->load('layout/template', 'admin/data_master/item_edit', array_merge($data, $data2));
    }
    public function delete_item($id){   
        $data = array(
            'active' => 0
         ); 
        $where = array(
            'id_item' => $id,
        );
        $data = $this->CRUD_model->Update('item', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Item, telah dihapus.</div></div></p>');
        redirect('admin/master/item/');  
    }
    public function updateitem(){   
        $data = array(
            'nama' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'no_item' => $this->input->post('no_item'),
            'harga' => $this->input->post('harga'),
         ); 
        $where = array(
            'id_item' => $this->input->post('id_item'),
        );
        $data = $this->CRUD_model->Update('item', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('nama').' telah diperbarui.</div>
        </div></p>');
        redirect('admin/master/item/');  
    }
//PEMBATAS PEMBELA KEADILAN PEMBATAS PEMBELA KEADILANPEMBATAS PEMBELA KEADILANPEMBATAS PEMBELA KEADILANPEMBATAS PEMBELA KEADILAN
    public function alat(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Master Alat | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('alat');
        $this->db->where('active',1);
        $this->db->order_by('alat','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/data_master/alat_index', array_merge($data,$data2));
    }
    public function simpan_alat(){
        $data = array(
            'alat' => $this->input->post('alat'),
            'active' => 1
         );  
        $this->CRUD_model->Insert('alat', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('alat').' telah ditambahkan.</div>
        </div>
        </p>
        ');
        redirect('admin/master/alat/');       
    }
    public function edit_alat($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Alat | '.$site['judul'],
        );
        $where = array('id_alat' => $id);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'alat')->result();
        $this->template->load('layout/template', 'admin/data_master/alat_edit', array_merge($data, $data2));
    }
    public function delete_alat($id){   
        $id = array('id_alat' => $id);
        $this->CRUD_model->Delete('alat', $id);
        $this->CRUD_model->Delete('detail_alat_laporan', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Alat, telah dihapus.</div></div></p>');
        redirect('admin/master/alat/');  
    }
    public function updatealat(){   
        $data = array(
            'alat' => $this->input->post('alat'),
         ); 
        $where = array(
            'id_alat' => $this->input->post('id_alat'),
        );
        $data = $this->CRUD_model->Update('alat', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('alat').' telah diperbarui.</div>
        </div></p>');
        redirect('admin/master/alat/');  
    }
//PEMBATAS PEMBELA KEADILAN PEMBATAS PEMBELA KEADILANPEMBATAS PEMBELA KEADILANPEMBATAS PEMBELA KEADILANPEMBATAS PEMBELA KEADILAN
        public function konfigurasi(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Konfigurasi | '.$site['judul'],
        );
        $where = array('id' => 1);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'konfigurasi')->result();
        $this->template->load('layout/template', 'admin/data_master/konfigurasi', array_merge($data, $data2));
    }
    public function updatekonfigurasi(){   
        $data = array(
            'no_kontrak' => $this->input->post('no_kontrak'),
            'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
            'waktu_desain' => $this->input->post('waktu_desain'),
            'waktu_pelaksanaan' => $this->input->post('waktu_pelaksanaan'),
            'pengguna_jasa' => $this->input->post('pengguna_jasa'),
            'penyedia_jasa' => $this->input->post('penyedia_jasa'),
            'konsultasi_pengawas' => $this->input->post('konsultasi_pengawas'),
            'nama_proyek' => $this->input->post('nama_proyek'),
            'form' => $this->input->post('form'),
            'kontraktor_pelaksana' => $this->input->post('kontraktor_pelaksana'),
         ); 
        $where = array(
            'id' => 1,
        );
        $data = $this->CRUD_model->Update('konfigurasi', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Konfigurasi kontrak telah diperbarui.</div>
        </div></p>');
        redirect('admin/master/konfigurasi/');  
    }
}
