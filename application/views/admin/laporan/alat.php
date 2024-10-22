<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/laporan');?>">Laporan Harian</a></li>
  <li class="active"> Alat-alat #<?php echo $id_detail_laporan_harian; ?></li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-body">
      <h4 class="form-control"> Alat-alat yang digunakan</h4>
    </div>
  </div>
</div>
<div class="col-md-7">
  <div class="box box-solid">
    <div class="box-body">
      <div class="box-header with-border">
        <h3 class="box-title"><strong>Alat-alat yang digunakan</strong></h3>
      </div>
      <div class="form-group">
        <?php foreach ($alat as $alat) { $nomor_alat++; ?>
          <h5 class="col-sm-3 control-label"><?php echo$alat['alat']; ?></h5>
          <div class="col-sm-2">
            <input type="number" class="form-control" style="margin:3px;" value="<?php echo$alat['jumlah']; ?>" readonly>
          </div>
        <?php } ?>
      </div>   
    </div>
  </div>
</div>