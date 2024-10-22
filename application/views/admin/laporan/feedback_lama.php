<?php foreach ($data2 as $produksi) { ?> 
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/laporan/cek');?>">Laporan Harian</a></li>
  <li class="active">Feedback #<?php echo $produksi['id_laporan_harian']; ?></li>

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
            <i class="fa fa-book"></i> <?php echo $produksi['id_laporan_harian']; ?>
            <small class="pull-right"><?php echo $produksi['tanggal_submit']; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <table border="0">
            <tr>
              <td>Uraian</td>
              <td>&nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $produksi['uraian']; ?></td>
            </tr>
            <tr>
              <td>Lokasi</td>
              <td>&nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $produksi['lokasi']; ?></td>
            </tr>
            <tr>
              <td>Estimasi Biaya</td>
              <td>&nbsp; &nbsp; : &nbsp; &nbsp; <?php echo 'Rp. '.number_format($produksi['estimasi'],0,",","."); ?></td>
            </tr>
            <tr>
              <td>Alat-alat</td>
              <td>&nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $produksi['alat']; ?></td>
            </tr>
            <tr>
              <td>Cuaca</td>
              <td>&nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $produksi['cuaca']; ?></td>
            </tr>
            <tr>
              <td>Dokumentasi</td>
              <td>&nbsp; &nbsp; : &nbsp; &nbsp; <a target="_blank" href="<?php echo $produksi['dokumentasi']; ?>"> Klik disini untuk membuka link </a></td>
            </tr>
            
          </table>
        </div>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table id="example2" class="table table-striped">
            <thead>
            <tr>
              <th style="width: 20px;">No</th>
              <th style="text-align: center;">Nama Item</th>
              <th style="text-align: center;">Volume (Jumlah)</th>
              <th style="text-align: center;">Satuan</th>
              <th style="text-align: center;">Harga</th>
              <th style="text-align: center;">Total</th>
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
            <td><?php echo $u['item']; ?></td>
            <td style="text-align: center;"><?php echo $u['volume']; ?></td>
            <td style="text-align: center;"><?php echo $u['satuan']; ?></td>
            <td style="text-align: right;"><?php echo 'Rp. '.number_format($u['harga'],0,",","."); ?></td>
            <td style="text-align: right;">
              <?php 
              $total = $u['harga']*$u['volume'];
              $sum = $sum+$total;
              echo 'Rp. '.number_format($total,0,",","."); ?>
            </td>
            </tr>
            <?php $no++; } ?>
                    <tr>
              <td colspan="5" style="text-align: right;">
                <strong> Jumlah Total </strong>
              </td>
              <td colspan="1"  style="text-align: right;"><?php echo 'Rp. '.number_format($sum,0,",","."); ?></td>
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
            <small class="pull-right">
              <?php 
                if ($this->session->userdata('level') == "1") { $level = 'se_acc'; $feedback = 'se_feedback'; } 
                elseif ($this->session->userdata('level') == "9") { $level = 'ks_acc'; $feedback = 'ks_feedback'; } 
                elseif ($this->session->userdata('level') == "10") { $level = 'owner_acc'; $feedback = 'owner_feedback';} 
                $status = $this->CRUD_model->get_acc($u['id_laporan_harian'],$level);
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
      <div class="row">
        <div class="col-xs-12">   
          <div class="box-body">
            <form class="form-horizontal" method="post" action="<?php echo site_url('admin/laporan/simpan_feedback');?>">
              <input type="hidden" name="level" value="<?php echo $level; ?>">
              <input type="hidden" name="feedback" value="<?php echo $feedback; ?>">
              <input type="hidden" name="id_laporan_harian" value="<?php echo $produksi['id_laporan_harian']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Persetujuan</label>
                  <div class="col-sm-4">
                    <select class="form-control select" name="acc" required>
                      <option value="1" <?php if ($produksi[$level]==1) { echo"selected"; } ?> > Belum Setujui </option>
                      <option value="2" <?php if ($produksi[$level]==2) { echo"selected"; } ?>> Setujui </option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Feedback</label>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <textarea style="margin-left:13px;" class="form-control" rows="3" name="keterangan" placeholder="Feedback ..."><?php echo $produksi[$feedback]; ?></textarea>
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
    </section>
    <?php } ?> 