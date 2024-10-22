<?php foreach ($data2 as $produksi) { ?> 
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/request');?>">Data Request Pekerjaan</a></li>
  <li class="active">Preview #<?php echo $nomor; ?></li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
        <h4 class="pull-left page-header">
        <i class="fa fa-briefcase"></i> Tanggal Pengajuan <?php echo date_indo($produksi['tanggal_pengajuan']); ?>
        </h4>
        <h4 class="pull-right page-header">
        Tanggal Pelaksanaan <?php echo date_indo($produksi['tanggal_pelaksanaan']); ?>
        </h4>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-sm-12 invoice-col">
        <small class="pull-right">
        <?php $status = $this->CRUD_model->get_status_request($nomor);
            if ($status<7) {
              echo"<a class='btn btn-warning btn-xs'> <i>PROSES PENGAJUAN</i></a>";
            } elseif ($status<14) {
              echo"<a class='btn btn-danger btn-xs'> <i>BELUM DISETUJUI</i></a>";
            } elseif ($status==14) {
              echo"<a class='btn btn-success btn-xs'> <i>DISETUJUI</i></a>";
            } 
        ?> 
        </small>
      <strong>PERMOHONAN IJIN PEKERJAAN</strong> <i>(Request For Work)</i>
      <address>
        <table border="0">
          <tr>
            <td> Nama Proyek </td>
            <td> : <?php echo $site['nama_proyek']; ?> </td>
          </tr>
          <tr>
            <td> Kontraktor Pelaksana </td>
            <td> : <?php echo $site['kontraktor_pelaksana']; ?> </td>
          </tr>
          <tr>
            <td> Nomor Kontrak </td>
            <td> : <?php echo $site['no_kontrak']; ?> </td>
          </tr>
          <tr>
            <td> Tanggal Kontrak </td>
            <td> : <?php echo date_indo($site['tanggal_kontrak']); ?> </td>
          </tr>
        </table>
      </address>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th style="text-align: center;">Mata Pembayaran</th>
          <th style="text-align: center;">Nama Pekerjaan</th>
          <th style="text-align: center;">Estimasi Volume</th>
          <th style="text-align: center;">Satuan</th>
        </tr>
        </thead>
        <tbody>
        <?php  $no = 1; foreach ($data3 as $u) { ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td style="text-align: center;"><?php echo $u['mata_pembayaran']; ?></td>
        <td style="text-align: center;"><?php echo $u['nama']; ?></td>
        <td style="text-align: center;"><?php echo $u['volume']; ?></td>
        <td style="text-align: center;"><?php echo $u['satuan']; ?></td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- LAMPIRAN -->
<section class="invoice">
  <div class="row">
    <div class="col-xs-6">
      <h4 class="page-header">
        <i class="fa fa-file-text-o"></i> Lampiran
        <small class="pull-right">-</small>
      </h4>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-sm-12 invoice-col">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Gambar Kerja</a></li>
          <li><a href="#tab_2" data-toggle="tab">Metode Pelaksanaan</a></li>
          <li><a href="#tab_3" data-toggle="tab">Data Hasil Uji Lab.</a></li>
          <li><a href="#tab_4" data-toggle="tab">Tenaga Kerja</a></li>
          <li><a href="#tab_5" data-toggle="tab">Material</a></li>
          <li><a href="#tab_6" data-toggle="tab">Peralatan</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <h4> <?php if ($produksi['id_gambar_kerja']=='-') { echo "Tidak ada lampiran."; } else { 
              $where = array('id_gambar_kerja' => $produksi['id_gambar_kerja']);
              $gambar = $this->CRUD_model->edit_data($where,'gambar_kerja')->result(); ?>
             </h4>
            <?php foreach ($gambar as $gambar) { ?> 
            <table>
              <tr> <td>No. Gambar Kerja </td> <td>&nbsp; : &nbsp; <?php echo$gambar->no_gambar; ?> </td> </tr>
              <tr> <td>Judul Gambar Kerja </td> <td>&nbsp; : &nbsp; <?php echo$gambar->judul_gambar; ?> </td> </tr>
              <tr> <td>Jenis Gambar Kerja </td> <td>&nbsp; : &nbsp; <?php echo$gambar->jenis_gambar; ?> </td> </tr>
              <tr> <td>Jumlah Halaman </td> <td>&nbsp; : &nbsp; <?php echo$gambar->jumlah_halaman_gambar; ?> </td> </tr>
              <tr> <td>Klasifikasi Gambar Kerja </td> <td>&nbsp; : &nbsp; <?php echo$gambar->klasifikasi_gambar; ?> </td> </tr>
              <tr> <td>Keterangan </td> <td>&nbsp; : &nbsp; <?php echo$gambar->keterangan_gambar; ?> </td> </tr>
              <tr> <td>Link Dokumen </td> <td>&nbsp; : &nbsp; <a href="<?php echo $gambar->link_gambar; ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-link"> Klik disini untuk membuka link</i></a>  </td> </tr>
            </table>
            <?php } }?> 
          </div>
          <div class="tab-pane" id="tab_2">
            <h4> <?php if ($produksi['id_metode']=='-') { echo "Tidak ada lampiran."; } else { 
              $where = array('id_metode' => $produksi['id_metode']);
              $metode = $this->CRUD_model->edit_data($where,'metode')->result(); ?>
             </h4>
            <?php foreach ($metode as $metode) { ?> 
            <table>
              <tr> <td>No. Metode Kerja </td> <td>&nbsp; : &nbsp; <?php echo$metode->no_metode; ?> </td> </tr>
              <tr> <td>Judul Metode Kerja </td> <td>&nbsp; : &nbsp; <?php echo$metode->judul_metode; ?> </td> </tr>
              <tr> <td>Jumlah Halaman </td> <td>&nbsp; : &nbsp; <?php echo$metode->jumlah_halaman_metode; ?> </td> </tr>
              <tr> <td>Klasifikasi Metode Kerja </td> <td>&nbsp; : &nbsp; <?php echo$metode->klasifikasi_metode; ?> </td> </tr>
              <tr> <td>Keterangan </td> <td>&nbsp; : &nbsp; <?php echo$metode->keterangan_metode; ?> </td> </tr>
              <tr> <td>Link Dokumen </td> <td>&nbsp; : &nbsp; <a href="<?php echo $metode->link_metode; ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-link"> Klik disini untuk membuka link</i></a>  </td> </tr>
            </table>
            <?php } }?> 
          </div>
          <div class="tab-pane" id="tab_3">
            <h4> <?php if ($produksi['id_data_quality']=='-') { echo "Tidak ada lampiran."; } else { 
              $where = array('id_data_quality' => $produksi['id_data_quality']);
              $data_quality = $this->CRUD_model->edit_data($where,'data_quality')->result(); ?>
             </h4>
            <?php foreach ($data_quality as $data_quality) { ?> 
            <table>
              <tr> <td>No. Metode Kerja </td> <td>&nbsp; : &nbsp; <?php echo$data_quality->no_data_quality; ?> </td> </tr>
              <tr> <td>Judul Metode Kerja </td> <td>&nbsp; : &nbsp; <?php echo$data_quality->judul_data_quality; ?> </td> </tr>
              <tr> <td>Klasifikasi Metode Kerja </td> <td>&nbsp; : &nbsp; <?php echo$data_quality->klasifikasi_data_quality; ?> </td> </tr>
              <tr> <td>Keterangan </td> <td>&nbsp; : &nbsp; <?php echo$data_quality->keterangan_data_quality; ?> </td> </tr>
              <tr> <td>Link Dokumen </td> <td>&nbsp; : &nbsp; <a href="<?php echo site_url('assets/upload/dokumen/'.$data_quality->berkas);?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-link"> Link dokumen</i></a>   </td> </tr>
            </table>
            <?php } }?> 
          </div>
          <div class="tab-pane" id="tab_4">
            <?php 
              $this->db->select('*')->from('detail_tenaga a');
              $this->db->join('tenaga b', 'b.id_tenaga = a.id_tenaga','left')->where('a.id_request', $nomor);
              $tenaga = $this->db->get()->result_array();
            ?>
            <table>
              <?php foreach ($tenaga as $tenaga) { ?> 
              <tr> <td><?php echo$tenaga['tenaga']; ?>  </td> <td>&nbsp; : &nbsp; <?php echo$tenaga['jumlah']; ?> Orang </td> </tr>
              <?php } ?> 
            </table> 
          </div>
          <div class="tab-pane" id="tab_5">
            <?php 
              $this->db->select('*')->from('detail_material a');
              $this->db->join('material b', 'b.id_material = a.id_material','left')->where('a.id_request', $nomor);
              $material = $this->db->get()->result_array();
            ?>
            <table>
              <?php foreach ($material as $material) { ?> 
              <tr> <td><?php echo$material['material']; ?>  </td> <td>&nbsp; : &nbsp; <?php echo$material['jumlah']; ?> </td> </tr>
              <?php } ?> 
            </table> 
          </div>
          <div class="tab-pane" id="tab_6">
            <?php 
              $this->db->select('*')->from('detail_peralatan a');
              $this->db->join('peralatan b', 'b.id_peralatan = a.id_peralatan','left')->where('a.id_request', $nomor);
              $peralatan = $this->db->get()->result_array();
            ?>
            <table>
              <?php foreach ($peralatan as $peralatan) { ?> 
              <tr> <td><?php echo$peralatan['peralatan']; ?>  </td> <td>&nbsp; : &nbsp; <?php echo$peralatan['jumlah']; ?> </td> </tr>
              <?php } ?> 
            </table> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FEEDBACK -->
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h4 class="page-header">
        <i class="fa fa-feed"></i> Feedback
      </h4>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-sm-12 invoice-col">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_11" data-toggle="tab">Project Manager</a></li> <!-- 2 -->
          <li><a href="#tab_12" data-toggle="tab">Chef Inspector</a></li> <!-- 3 -->
          <li><a href="#tab_13" data-toggle="tab">Strukur Engineer</a></li> <!-- 4 -->
          <li><a href="#tab_14" data-toggle="tab">Pavement Material Engineer</a></li> <!-- 5 -->
          <li><a href="#tab_15" data-toggle="tab">Quantity Engineer</a></li> <!-- 6 -->
          <li><a href="#tab_16" data-toggle="tab">Resident Engineer</a></li> <!-- 7 -->
          <li><a href="#tab_17" data-toggle="tab">Owner</a></li> <!-- 10 -->
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_11">
            <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_request'],2)==NULL) { echo "belum ada feedback."; } else { ?></h4>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Feedback</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($this->CRUD_model->get_feedback($produksi['id_request'],2) as $history) {
              ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
              <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
              <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
              </tr>
              <?php $no++; } ?> 
              </tbody>
            </table>
            <?php } ?> 
          </div>
          <div class="tab-pane" id="tab_12">
            <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_request'],3)==NULL) { echo "belum ada feedback."; } else { ?></h4>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Feedback</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($this->CRUD_model->get_feedback($produksi['id_request'],3) as $history) {
              ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
              <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
              <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
              </tr>
              <?php $no++; } ?> 
              </tbody>
            </table>
            <?php } ?> 
          </div>
          <div class="tab-pane" id="tab_13">
            <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_request'],4)==NULL) { echo "belum ada feedback."; } else { ?></h4>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Feedback</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($this->CRUD_model->get_feedback($produksi['id_request'],4) as $history) {
              ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
              <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
              <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
              </tr>
              <?php $no++; } ?> 
              </tbody>
            </table>
            <?php } ?> 
          </div>
          <div class="tab-pane" id="tab_14">
            <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_request'],5)==NULL) { echo "belum ada feedback."; } else { ?></h4>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Feedback</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($this->CRUD_model->get_feedback($produksi['id_request'],5) as $history) {
              ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
              <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
              <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
              </tr>
              <?php $no++; } ?> 
              </tbody>
            </table>
            <?php } ?> 
          </div>
          <div class="tab-pane" id="tab_15">
            <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_request'],6)==NULL) { echo "belum ada feedback."; } else { ?></h4>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Feedback</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($this->CRUD_model->get_feedback($produksi['id_request'],6) as $history) {
              ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
              <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
              <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
              </tr>
              <?php $no++; } ?> 
              </tbody>
            </table>
            <?php } ?> 
          </div>
          <div class="tab-pane" id="tab_16">
            <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_request'],7)==NULL) { echo "belum ada feedback."; } else { ?></h4>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Feedback</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($this->CRUD_model->get_feedback($produksi['id_request'],7) as $history) {
              ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
              <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
              <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
              </tr>
              <?php $no++; } ?> 
              </tbody>
            </table>
            <?php } ?> 
          </div>
          <div class="tab-pane" id="tab_17">
            <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_request'],10)==NULL) { echo "belum ada feedback."; } else { ?></h4>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Feedback</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($this->CRUD_model->get_feedback($produksi['id_request'],10) as $history) {
              ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
              <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
              <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
              </tr>
              <?php $no++; } ?> 
              </tbody>
            </table>
            <?php } ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?> 