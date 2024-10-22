<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->model('Auth_model');
        $this->check_login();
        if (($this->session->userdata('level') != "Admin") AND ($this->session->userdata('level') < 0)) {
            redirect('', 'refresh');
        }
    }

    public function akun(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Akun Pengguna | '.$site['judul'],
            'site'                  => $site,
        );
        $this->template->load('layout/template', 'admin/pengaturan_akun', array_merge($data));
    }
    public function level(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Aktor Level | '.$site['judul'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->from('level');
        $this->db->order_by('level','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/level_index', array_merge($data,$data2));
    }
    public function edit_level($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Aktor | '.$site['judul'],
        );
        $where = array('id_level' => $id);
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'level')->result();
        $this->template->load('layout/template', 'admin/level_edit', array_merge($data, $data2));
    }
    public function updateaktor(){   
        $data = array(
            'level' => $this->input->post('level')
         ); 
        $where = array(
            'id_level' => $this->input->post('id_level'),
        );
        $data = $this->CRUD_model->Update('level', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Aktor, '.$this->input->post('level').' telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/pengaturan/level');
    }
    public function pengguna(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Pengguna | '.$site['judul'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('user');
         $this->db->where('level!=','Admin');
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->db->select('*');
        $this->db->from('level');
        $this->db->order_by('level','ASC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/pengguna/index', array_merge($data, $data2, $data3));
    }
    public function simpan_pengguna(){
        $username = $this->input->post('username');
        $cekusername = $this->db->where('username', $username)->count_all_results('user');
        if ($cekusername > 0) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
                    <div class="info-box alert-info">
                    <div class="info-box-icon">
                    <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="info-box-content" style="font-size:14">
                    <b style="font-size: 20px">INFO</b><br>Username '.$username.' sudah digunakan.</div>
                    </div>
                    </p>
            ');
             redirect('admin/pengaturan/pengguna'); 
        } else{
            $this->session->set_flashdata('alert', '<p class="box-msg">
                    <div class="info-box alert-success">
                    <div class="info-box-icon">
                    <i class="fa fa-check"></i>
                    </div>
                    <div class="info-box-content" style="font-size:14">
                    <b style="font-size: 20px">SUCCESS</b><br>Pengguna '.$username.' telah ditambahkan.</div>
                    </div>
                    </p>
            ');
            $this->Auth_model->register(); 
            redirect('admin/pengaturan/pengguna');
        } 
    }
}
