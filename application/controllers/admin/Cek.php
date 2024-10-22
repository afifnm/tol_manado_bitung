<?php
// <!--Project Manager  2 -->
// <!--Chef Inspector 3 -->
// <!--Strukur Engineer 4 -->
// <!--Pavement Material Engineer 5 -->
// <!--Quantity Engineer 6 -->
// <!--Resident Engineer 7 -->
// <!--Owner 10 -->
defined('BASEPATH') or exit('No direct script access allowed');
 
class Cek extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->library('Pdf');
        $this->check_login();
        $hak_akses = $this->session->userdata('level');
        if (($hak_akses != "2") AND ($hak_akses != "3") AND ($hak_akses != "4") AND ($hak_akses != "5") AND ($hak_akses != "6") AND ($hak_akses != "7") AND ($hak_akses != "10")) {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $level = $this->session->userdata('level');
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Periksa request pekerjaan| '.$site['judul'],
            'site'                  => $site,
            'level'                 => $level
        );
        $this->db->select('*');
        $this->db->from('request');
        // if ($level<>2) { $this->db->where('pm_acc',2); }
        // if ($level==10) {
        //     $this->db->where('ci_acc',2);
        //     $this->db->where('struk_acc',2);
        //     $this->db->where('pme_acc',2);
        //     $this->db->where('qe_acc',2);
        //     $this->db->where('re_acc',2);
        // }
        $this->db->order_by('tanggal_submit','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/request/cek', array_merge($data,$data2));
    }
    public function hapus_feedback($id_feedback,$id_request){
        $id = array('id_feedback' => $id_feedback);
        $this->CRUD_model->Delete('feedback', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus feedback.</div>
        </div>
        </p>
        ');
        redirect('admin/cek/feedback/'.$id_request); 
    }

    public function feedback($nomor){
        $level = $this->session->userdata('level');
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Periksa request pekerjaan | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor,
            'level'                 => $level
        );
        $this->db->select('*');
        $this->db->from('detail_request a');
        $this->db->join('item_pekerjaan b', 'b.id_item_pekerjaan = a.id_item_pekerjaan','left');
        $this->db->where('a.id_request', $nomor);
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);  

        $this->db->select('*');
        $this->db->where('id_request', $nomor);
        $this->db->from('request');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);  

        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('id_laporan_harian', $nomor);
        $this->db->where('username', $this->session->userdata('username')); 
        $history = $this->db->get()->result_array();
        $history = array('history' => $history);   
        $this->template->load('layout/template', 'admin/request/feedback', array_merge($data, $data2, $data3, $history));
    }
    public function simpan_feedback(){  
        $nama_kolom = $this->input->post('nama_kolom');
        $data = array(
            $nama_kolom => $this->input->post('acc'),
         );  
        $where = array(
            'id_request' => $this->input->post('nomor'),
        );
        $data = $this->CRUD_model->Update('request', $data, $where);
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $data = array(
            'id_laporan_harian' => $this->input->post('nomor'),
            'tanggal' => $tanggal,
            'username' => $this->session->userdata('username'),
            'status' => $this->input->post('acc'),
            'keterangan' => $this->input->post('keterangan'),
         );  
        $this->CRUD_model->Insert('feedback', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-info-circle"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Request Pekerjaan, anda telah selesai memberikan feedback.</div>
        </div>
        </p>
        ');
        redirect('admin/cek/feedback/'.$this->input->post('nomor'));
    }
}
 