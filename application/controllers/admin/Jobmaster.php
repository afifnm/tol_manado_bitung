<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jobmaster extends MY_Controller
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
        $this->db->from('item_pekerjaan');
        $this->db->where('active',1);
        $this->db->order_by('nama','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/jobmaster/item_index', array_merge($data,$data2));
    }
    public function simpan_item(){
        $data = array(
            'nama' => $this->input->post('item'),
            'satuan' => $this->input->post('satuan'),
            'mata_pembayaran' => $this->input->post('mata_pembayaran'),
            'active' => 1
         );  
        $this->CRUD_model->Insert('item_pekerjaan', $data);
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
        redirect('admin/jobmaster/item/');       
    }
    public function edit_item($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Item | '.$site['judul'],
        );
        $where = array('id_item_pekerjaan' => $id);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'item_pekerjaan')->result();
        $this->template->load('layout/template', 'admin/jobmaster/item_edit', array_merge($data, $data2));
    }
    public function delete_item($id){   
        $data = array(
            'active' => 0
         ); 
        $where = array(
            'id_item_pekerjaan' => $id,
        );
        $data = $this->CRUD_model->Update('item_pekerjaan', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Item, telah dihapus.</div></div></p>');
        redirect('admin/jobmaster/item/');  
    }
    public function updateitem(){   
        $data = array(
            'nama' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'mata_pembayaran' => $this->input->post('mata_pembayaran'),
         ); 
        $where = array(
            'id_item_pekerjaan' => $this->input->post('id_item'),
        );
        $data = $this->CRUD_model->Update('item_pekerjaan', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('nama').' telah diperbarui.</div>
        </div></p>');
        redirect('admin/jobmaster/item/');  
    }
//PERALATAN
    public function peralatan(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Master Peralatan | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('peralatan');
        $this->db->order_by('peralatan','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/jobmaster/peralatan_index', array_merge($data,$data2));
    }
    public function simpan_peralatan(){
        $data = array(
            'peralatan' => $this->input->post('peralatan')
         );  
        $this->CRUD_model->Insert('peralatan', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('peralatan').' telah ditambahkan.</div></div></p>');
        redirect('admin/jobmaster/peralatan/');       
    }
    public function edit_peralatan($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui peralatan | '.$site['judul'],
        );
        $where = array('id_peralatan' => $id);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'peralatan')->result();
        $this->template->load('layout/template', 'admin/jobmaster/peralatan_edit', array_merge($data, $data2));
    }
    public function delete_peralatan($id){   
        $id = array('id_peralatan' => $id);
        $this->CRUD_model->Delete('peralatan', $id);
        $this->CRUD_model->Delete('detail_peralatan', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Peralatan, telah dihapus.</div></div></p>');
        redirect('admin/jobmaster/peralatan/');  
    }
    public function updateperalatan(){   
        $data = array(
            'peralatan' => $this->input->post('peralatan'),
         ); 
        $where = array(
            'id_peralatan' => $this->input->post('id_peralatan'),
        );
        $data = $this->CRUD_model->Update('peralatan', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('peralatan').' telah diperbarui.</div>
        </div></p>');
        redirect('admin/jobmaster/peralatan/');  
    }

//TENAGA KERJA
    public function tenaga(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Master tenaga | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('tenaga');
        $this->db->order_by('tenaga','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/jobmaster/tenaga_index', array_merge($data,$data2));
    }
    public function simpan_tenaga(){
        $data = array(
            'tenaga' => $this->input->post('tenaga')
         );  
        $this->CRUD_model->Insert('tenaga', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('tenaga').' telah ditambahkan.</div></div></p>');
        redirect('admin/jobmaster/tenaga/');       
    }
    public function edit_tenaga($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui tenaga | '.$site['judul'],
        );
        $where = array('id_tenaga' => $id);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'tenaga')->result();
        $this->template->load('layout/template', 'admin/jobmaster/tenaga_edit', array_merge($data, $data2));
    }
    public function delete_tenaga($id){   
        $id = array('id_tenaga' => $id);
        $this->CRUD_model->Delete('tenaga', $id);
        $this->CRUD_model->Delete('detail_tenaga', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> tenaga, telah dihapus.</div></div></p>');
        redirect('admin/jobmaster/tenaga/');  
    }
    public function updatetenaga(){   
        $data = array(
            'tenaga' => $this->input->post('tenaga'),
         ); 
        $where = array(
            'id_tenaga' => $this->input->post('id_tenaga'),
        );
        $data = $this->CRUD_model->Update('tenaga', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('tenaga').' telah diperbarui.</div>
        </div></p>');
        redirect('admin/jobmaster/tenaga/');  
    }

//MATERIAL
    public function material(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Master material | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('material');
        $this->db->order_by('material','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/jobmaster/material_index', array_merge($data,$data2));
    }
    public function simpan_material(){
        $data = array(
            'material' => $this->input->post('material')
         );  
        $this->CRUD_model->Insert('material', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('material').' telah ditambahkan.</div></div></p>');
        redirect('admin/jobmaster/material/');       
    }
    public function edit_material($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui material | '.$site['judul'],
        );
        $where = array('id_material' => $id);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'material')->result();
        $this->template->load('layout/template', 'admin/jobmaster/material_edit', array_merge($data, $data2));
    }
    public function delete_material($id){   
        $id = array('id_material' => $id);
        $this->CRUD_model->Delete('material', $id);
        $this->CRUD_model->Delete('detail_material', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> material, telah dihapus.</div></div></p>');
        redirect('admin/jobmaster/material/');  
    }
    public function updatematerial(){   
        $data = array(
            'material' => $this->input->post('material'),
         ); 
        $where = array(
            'id_material' => $this->input->post('id_material'),
        );
        $data = $this->CRUD_model->Update('material', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon">
        <i class="fa fa-check"></i></div><div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('material').' telah diperbarui.</div>
        </div></p>');
        redirect('admin/jobmaster/material/');  
    }
//KONFIGURASI
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
