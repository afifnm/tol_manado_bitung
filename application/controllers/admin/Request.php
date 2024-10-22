<?php

defined('BASEPATH') or exit('No direct script access allowed');
 
class Request extends MY_Controller
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
        $nomor = $this->CRUD_model->nomor_request();
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Request Pekerjaan | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('username',$this->session->userdata('username'));
        $this->db->order_by('tanggal_submit','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);

        $this->db->select('*')->from('gambar_kerja')->order_by('judul_gambar','ASC');
        $gambar = $this->db->get()->result_array();
        $gambar = array('gambar' => $gambar);
        $this->db->select('*')->from('metode')->order_by('judul_metode','ASC');
        $metode = $this->db->get()->result_array();
        $metode = array('metode' => $metode);
        $this->db->select('*')->from('data_quality')->order_by('judul_data_quality','ASC');
        $data_quality = $this->db->get()->result_array();
        $data_quality = array('data_quality' => $data_quality);
        $this->template->load('layout/template', 'admin/request/index', array_merge($data,$data2,$gambar,$metode,$data_quality));
    }
    public function buatrequest(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("y-m-d");
        $data = array(
            'id_gambar_kerja' => '-',
            'id_metode' => '-',
            'id_data_quality' => '-',
            'username' => $this->session->userdata('username'),
            'id_request' => $this->input->post('id_request'),
            'tanggal_submit' => $tanggal,
            'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
            'tanggal_pelaksanaan' => $this->input->post('tanggal_pelaksanaan'),
         );  
        $this->CRUD_model->Insert('request', $data);
        redirect('admin/request/item/'.$this->input->post('id_request'));       
    }
    public function item($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Bagian 1 Input Pekerjaan | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
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

        $this->db->select('*')->from('item_pekerjaan')->where('active',1);
        $this->db->order_by('nama','ASC');
        $item_pekerjaan = $this->db->get()->result_array();
        $item_pekerjaan = array('item_pekerjaan' => $item_pekerjaan); 

        $this->template->load('layout/template', 'admin/request/item', array_merge($data, $data2, $data3, $item_pekerjaan));
    }
    public function tambah_item(){
        $data = array(
            'id_request' => $this->input->post('nomor'),
            'id_item_pekerjaan' => $this->input->post('id_item_pekerjaan'),
            'volume' => $this->input->post('volume'),
            'lokasi' => $this->input->post('lokasi'),
         );  
        $this->CRUD_model->Insert('detail_request', $data);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Pekerjaan telah ditambahkan pada request pekerjaan.</div></div></p>
        ');
        redirect('admin/request/item/'.$this->input->post('nomor'));       
    }
    public function dokumen($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Bagian 2 Pilih Lampiran Dokumen | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_request',$nomor);
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);

        $this->db->select('*')->from('gambar_kerja')->order_by('judul_gambar','ASC');
        $gambar = $this->db->get()->result_array();
        $gambar = array('gambar' => $gambar);
        $this->db->select('*')->from('metode')->order_by('judul_metode','ASC');
        $metode = $this->db->get()->result_array();
        $metode = array('metode' => $metode);
        $this->db->select('*')->from('data_quality')->order_by('judul_data_quality','ASC');
        $data_quality = $this->db->get()->result_array();
        $data_quality = array('data_quality' => $data_quality);
        $this->template->load('layout/template', 'admin/request/dokumen', array_merge($data,$data2,$gambar,$metode,$data_quality));
    }
    public function simpan_dokumen(){  
        $data = array(
            'id_gambar_kerja' => $this->input->post('id_gambar_kerja'),
            'id_metode' => $this->input->post('id_metode'),
            'id_data_quality' => $this->input->post('id_data_quality'),
         );  
        $where = array(
            'id_request' => $this->input->post('nomor'),
        );
        $data = $this->CRUD_model->Update('request', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-save"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Anda telah selesai menyimpan lampiran.</div></div></p>');
        redirect('admin/request/dokumen/'.$this->input->post('nomor'));
    }
    public function tenaga($nomor){
        if ($this->CRUD_model->cek_tenaga($nomor)>0) {
            redirect('admin/request/tenaga_edit/'.$nomor);
        }
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Bagian 3 Lampiran | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_request',$nomor);
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);

        $this->db->select('*')->from('tenaga')->order_by('tenaga','ASC');
        $tenaga = $this->db->get()->result_array();
        $tenaga = array('tenaga' => $tenaga);
        $this->db->select('*')->from('peralatan')->order_by('peralatan','ASC');
        $peralatan = $this->db->get()->result_array();
        $peralatan = array('peralatan' => $peralatan);
        $this->db->select('*')->from('material')->order_by('material','ASC');
        $material = $this->db->get()->result_array();
        $material = array('material' => $material);
        $this->template->load('layout/template', 'admin/request/tenaga_tambah', array_merge($data,$data2,$tenaga,$peralatan,$material));
    }
    public function tambah_tenaga(){
        for ($i=1; $i <= $this->input->post('nomor_peralatan'); $i++) { 
            $data = array(
            'id_request' => $this->input->post('nomor'),
            'id_peralatan' => $this->input->post('id_peralatan['.$i.']'),
            'jumlah' => $this->input->post('jumlah_peralatan['.$i.']'),
         );  
        $this->CRUD_model->Insert('detail_peralatan', $data);
        }

        for ($i=1; $i <= $this->input->post('nomor_material'); $i++) { 
            $data = array(
            'id_request' => $this->input->post('nomor'),
            'id_material' => $this->input->post('id_material['.$i.']'),
            'jumlah' => $this->input->post('jumlah_material['.$i.']'),
         );  
        $this->CRUD_model->Insert('detail_material', $data);
        }

        for ($i=1; $i <= $this->input->post('nomor_tenaga'); $i++) { 
            $data = array(
            'id_request' => $this->input->post('nomor'),
            'id_tenaga' => $this->input->post('id_tenaga['.$i.']'),
            'jumlah' => $this->input->post('jumlah_tenaga['.$i.']'),
         );  
        $this->CRUD_model->Insert('detail_tenaga', $data);
        }

        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Lampiran peralatan, tenaga kerja dan material telah ditambahkan pada request pekerjaan.</div></div></p>');
        redirect('admin/request/tenaga/'.$this->input->post('nomor'));       
    }
    public function tenaga_edit($nomor){
        if ($this->CRUD_model->cek_tenaga($nomor)==0) {
            redirect('admin/request/tenaga/'.$nomor);
        }
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Bagian 3 Lampiran | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
        );
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_request',$nomor);
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);

        $this->db->select('*')->from('detail_tenaga a');
        $this->db->join('tenaga b', 'b.id_tenaga = a.id_tenaga','left');
        $this->db->where('a.id_request', $nomor);
        $tenaga = $this->db->get()->result_array();
        $tenaga = array('tenaga' => $tenaga); 

        $this->db->select('*')->from('detail_peralatan a');
        $this->db->join('peralatan b', 'b.id_peralatan = a.id_peralatan','left');
        $this->db->where('a.id_request', $nomor);
        $peralatan = $this->db->get()->result_array();
        $peralatan = array('peralatan' => $peralatan); 

        $this->db->select('*')->from('detail_material a');
        $this->db->join('material b', 'b.id_material = a.id_material','left');
        $material = $this->db->get()->result_array();
        $material = array('material' => $material);
        $this->template->load('layout/template', 'admin/request/tenaga_edit', array_merge($data,$data2,$tenaga,$peralatan,$material));
    }
    public function simpan_tenaga(){
        for ($i=1; $i <= $this->input->post('nomor_peralatan'); $i++) { 
            $data = array('jumlah' => $this->input->post('jumlah_peralatan['.$i.']'));  
            $where = array('id_detail_peralatan' => $this->input->post('id_detail_peralatan['.$i.']'));
            $this->CRUD_model->Update('detail_peralatan', $data, $where);
        }

        for ($i=1; $i <= $this->input->post('nomor_material'); $i++) { 
            $data = array('jumlah' => $this->input->post('jumlah_material['.$i.']'));  
            $where = array('id_detail_material' => $this->input->post('id_detail_material['.$i.']'));
            $this->CRUD_model->Update('detail_material', $data, $where);
        }

        for ($i=1; $i <= $this->input->post('nomor_tenaga'); $i++) { 
            $data = array('jumlah' => $this->input->post('jumlah_tenaga['.$i.']'));  
            $where = array('id_detail_tenaga' => $this->input->post('id_detail_tenaga['.$i.']'));
            $this->CRUD_model->Update('detail_tenaga', $data, $where);
        }

        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-save"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Lampiran peralatan, tenaga kerja dan material telah ditambahkan pada request pekerjaan.</div></div></p>');
        redirect('admin/request/tenaga_edit/'.$this->input->post('nomor'));       
    }

    public function preview($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Preview Request Pekerjaan | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor
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

        $this->template->load('layout/template', 'admin/request/preview', array_merge($data, $data2, $data3));
    }
    public function cek(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'request Harian | '.$site['judul'],
            'site'                  => $site
        );
        $this->db->select('*');
        $this->db->from('request');
        $this->db->order_by('tanggal_submit','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/request/cek', array_merge($data,$data2));
    }
    public function delete_item_pekerjaan($id_detail_request,$id_request){
        $id = array('id_detail_request' => $id_detail_request);
        $this->CRUD_model->Delete('detail_request', $id);
        $this->CRUD_model->Delete('detail_alat_request', $id);
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
        redirect('admin/request/tambah/'.$id_request); 
    }

    public function cancel_request($id_request){
        $id = array('id_request' => $id_request);
        $this->CRUD_model->Delete('request', $id);
        $this->CRUD_model->Delete('detail_request', $id);
        $this->CRUD_model->Delete('detail_peralatan', $id);
        $this->CRUD_model->Delete('detail_material', $id);
        $this->CRUD_model->Delete('detail_tenaga', $id);
        $id = array('id_laporan_harian' => $id_request);
        $this->CRUD_model->Delete('feedback', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus request pekerjaan.</div>
        </div>
        </p>
        ');
        redirect('admin/request/'); 
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
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus request harian.</div>
        </div>
        </p>
        ');
        redirect('admin/request/feedback/'.$id_request); 
    }

    public function feedback($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Preview request Harian | '.$site['judul'],
            'site'                  => $site,

        );
        $this->db->select('*');
        $this->db->from('detail_request a');
        $this->db->join('item_pekerjaan b', 'b.id_item_pekerjaan = a.id_item_pekerjaan','left');
        $this->db->where('a.id_request', $nomor);
        $this->db->order_by('a.tanggal','DESC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);  

        $this->db->select('*');
        $this->db->where('id_request', $nomor);
        $this->db->from('request');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);  

        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('id_request', $nomor);
        $this->db->where('username', $this->session->userdata('username')); 
        $history = $this->db->get()->result_array();
        $history = array('history' => $history);   
        $this->template->load('layout/template', 'admin/request/feedback', array_merge($data, $data2, $data3, $history));
    }
    public function simpan_feedback(){  
        $level = $this->input->post('level');
        $data = array(
            $level => $this->input->post('acc'),
         );  
        $where = array(
            'id_request' => $this->input->post('id_request'),
        );
        $data = $this->CRUD_model->Update('request', $data, $where);
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $data = array(
            'id_request' => $this->input->post('id_request'),
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
        <b style="font-size: 20px">SUCCESS</b><br> request harian, anda telah selesai memberikan feedback.</div>
        </div>
        </p>
        ');
        redirect('admin/request/cek/'.$this->input->post('id_request'));
    }
    public function print_request($nomor){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Preview Request Pekerjaan | '.$site['judul'],
            'site'                  => $site,
            'nomor'                 => $nomor,
            'form'                  => $site['form']
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

        $this->db->select('*')->from('detail_tenaga a');
        $this->db->join('tenaga b', 'b.id_tenaga = a.id_tenaga','left');
        $this->db->where('a.id_request', $nomor);
        $tenaga = $this->db->get()->result_array();
        $tenaga = array('tenaga' => $tenaga); 

        $this->db->select('*')->from('detail_peralatan a');
        $this->db->join('peralatan b', 'b.id_peralatan = a.id_peralatan','left');
        $this->db->where('a.id_request', $nomor);
        $peralatan = $this->db->get()->result_array();
        $peralatan = array('peralatan' => $peralatan); 

        $this->db->select('*')->from('detail_material a');
        $this->db->join('material b', 'b.id_material = a.id_material','left');
        $material = $this->db->get()->result_array();
        $material = array('material' => $material);

        $this->load->view('admin/request/print', array_merge($data, $data2, $data3, $tenaga, $peralatan, $material));
    }
}
 