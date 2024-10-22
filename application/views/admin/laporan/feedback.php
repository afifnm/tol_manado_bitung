<?php foreach ($data2 as $produksi) { ?> 
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/laporan/cek');?>">Laporan Harian</a></li>
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
            <small class="pull-right" style="margin: 0px; padding-bottom: 10px;">
              <?php 
                if ($this->session->userdata('level') == "1") { $level = 'se_acc'; $feedback = 'se_feedback'; } 
                elseif ($this->session->userdata('level') == "9") { $level = 'ks_acc'; $feedback = 'ks_feedback'; } 
                elseif ($this->session->userdata('level') == "10") { $level = 'owner_acc'; $feedback = 'owner_feedback';} 
                $status = $this->CRUD_model->get_acc($produksi['id_laporan_harian'],$level);
                if ($status==0) {
                  echo"<a class='btn btn-warning btn-sm'> <i>BELUM DICEK</i></a>";
                } elseif ($status==1) {
                  echo"<a class='btn btn-danger btn-sm'> <i>BELUM DISETUJUI</i></a>";
                } elseif ($status==2) {
                  echo"<a class='btn btn-success btn-sm'> <i>DISETUJUI</i></a>";
                } 
              ?>
            </small>
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
  <div class="row">
    <div class="col-xs-6 ">
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title" align="center"><i class="fa fa-feed"></i> Feedback</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/laporan/simpan_feedback');?>">
            <input type="hidden" name="level" value="<?php echo $level; ?>"> 
            <input type="hidden" name="id_laporan_harian" value="<?php echo $produksi['id_laporan_harian']; ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Persetujuan</label>
                <div class="col-sm-4">
                  <select class="form-control select" name="acc" required>
                    <option value="1"> Belum Setujui </option>
                    <option value="2"> Setujui </option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Feedback</label>
                <div class="col-sm-9">
                  <div class="form-group">
                    <textarea style="margin-left:13px;" class="form-control" rows="3" name="keterangan" placeholder="Feedback ..."></textarea>
                  </div>
                  <hr>
                  <button type="submit" class="form-control btn btn-danger pull-right"><i class="fa fa-send"></i> Berikan Feedback</button>
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
  </div>
    <div class="col-xs-6 ">
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title" align="center"><i class="fa fa-history"></i> History Feedback</h3>
        </div>
        <div class="box-body">
        <div class="col-xs-12 table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th style="width: 20px;">No</th>
              <th style="text-align: center;">Tanggal</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;">Feedback</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $sum = 0;
            foreach ($history as $history) {
            ?>
            <tr>
            <td><?php echo $no; ?></td>
            <td style="text-align: center;"><?php echo date_indo($history['tanggal']); ?></td>
            <td style="text-align: center;"><?php if ($history['status']==1) { echo"<a class='btn btn-danger btn-xs'>Belum Disetujui</a>";} else { echo"<a class='btn btn-success btn-xs'>Disetujui</a>";} ?></td>
            <td style="text-align: center;"><?php echo $history['keterangan']; ?></td>
            <td align="center">
            <button class="btn btn-danger btn-xs">  
            <?php echo anchor('admin/laporan/hapus_feedback/'.$history['id_feedback'].'/'.$history['id_laporan_harian'], '<i style="color: white;" class="fa fa-trash"> HAPUS</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
            </button> 
            </td>
            </tr>
            <?php } ?> 
            </tbody>
          </table>
           <h4> <?php if ($history==NULL) { echo "Anda belum memberikan feedback."; } ?></h4>
        </div>
        </div>
    </div>
  </div>
</div>
</section>
    <?php } ?> 
  <script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus feedback ini?')
  }
  </script>