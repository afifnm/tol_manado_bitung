<?php foreach ($data2 as $produksi) { ?> 
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/laporan');?>">Laporan Harian</a></li>
  <li class="active">Preview #<?php echo $produksi['id_laporan_harian']; ?></li>

</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-book"></i> Tanggal <?php echo date_indo($produksi['tanggal_start']); ?> - <?php echo date_indo($produksi['tanggal_end']); ?>
            <small class="pull-right"><?php echo $produksi['id_laporan_harian']; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th style="width: 20px;">No</th>
              <th style="text-align: center;">Tanggal</th>
              <th style="text-align: center;">Nama Item</th>
              <th style="text-align: center;">Satuan</th>
              <th style="text-align: center;">Jumlah</th>
              <th style="text-align: center;">Harga</th>
              <th style="text-align: center;">Total</th>
              <th style="text-align: center;">Uraian</th>
              <th style="text-align: center;">Lokasi</th>
              <th style="text-align: center;">Cuaca</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $sum = 0;
            foreach ($data3 as $u) {
            ?>
            <tr>
            <td><?php echo $no; ?></td>
            <td style="text-align: center;"><?php echo date_indo($u['tanggal']); ?></td>
            <td style="text-align: center;"><?php echo $u['nama']; ?></td>
            <td style="text-align: center;"><?php echo $u['satuan']; ?></td>
            <td style="text-align: center;"><?php echo $u['jumlah']; ?></td>
            <td style="text-align: right;"><?php echo 'Rp. '.number_format($u['harga'],0,",","."); ?></td>
            <td style="text-align: right;">
              <?php 
              $total = $u['harga']*$u['jumlah'];
              $sum = $sum+$total;
              echo 'Rp. '.number_format($total,0,",","."); ?>
            </td>
            <td style="text-align: center;"><?php echo $u['uraian']; ?></td>
            <td style="text-align: center;"><?php echo $u['lokasi']; ?></td>
            <td style="text-align: center;"><?php echo $u['cuaca']; ?></td>
            <td align="center">
            <a target="_blank" href="<?php echo $u['dokumentasi']; ?>" class="btn btn-info btn-xs"> <i class="fa fa-link"> link dokumentasi</i> </a> 
            <a target="_blank" href="<?php echo site_url('admin/laporan/alat/'.$u['id_detail_laporan_harian']);?>" class="btn btn-info btn-xs"> <i class="fa fa-search-plus"> alat-alat</i> </a>  
            </td>
            </tr>
            <?php $no++; } ?>
            <tr>
              <td colspan="6" style="text-align: right;">
                <strong> Jumlah Total </strong>
              </td>
              <td colspan="1"  style="text-align: right;"><strong><?php echo 'Rp. '.number_format($sum,0,",","."); ?></strong></td>
              <td colspan="4"> - </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-feed"></i> Feedback
            <small class="pull-right">-</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Site Engineer</a></li>
              <li><a href="#tab_2" data-toggle="tab">Konsultasi Supervisi</a></li>
              <li><a href="#tab_3" data-toggle="tab">Owner</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_laporan_harian'],1)==NULL) { echo "belum ada feedback."; } else { ?></h4>
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
                  foreach ($this->CRUD_model->get_feedback($produksi['id_laporan_harian'],1) as $history) {
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
              <div class="tab-pane" id="tab_2">
                <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_laporan_harian'],9)==NULL) { echo "belum ada feedback."; } else { ?></h4>
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
                  foreach ($this->CRUD_model->get_feedback($produksi['id_laporan_harian'],9) as $history) {
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
              <div class="tab-pane" id="tab_3">
                <h4> <?php if ($this->CRUD_model->get_feedback($produksi['id_laporan_harian'],10)==NULL) { echo "belum ada feedback."; } else { ?></h4>
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
                  foreach ($this->CRUD_model->get_feedback($produksi['id_laporan_harian'],10) as $history) {
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
            <!-- /.tab-content -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <?php } ?> 