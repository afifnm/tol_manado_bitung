<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/dokumen');?>">Data Dokumen Gambar & Metode</a></li>
  <li class="active">Perbarui Data #<?php echo $nomor; ?></li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-body">
      <h4 class="form-control"> Perbarui dokumen gambar, metode dan data quality #<?php echo $nomor; ?> </h4>
    </div>
  </div>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/dokumen/update');?>" enctype="multipart/form-data">
<?php foreach ($data2 as $data2) { ?>
<div class="col-md-4">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Dokumen Gambar</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">No. Gambar Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="no_gambar" value="<?php echo$data2->no_gambar;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul Gambar Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="judul_gambar" value="<?php echo$data2->judul_gambar;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Jenis Gambar Kerja</label>
        <div class="col-sm-8">
          <select class="form-control select" name="jenis_gambar" required>
            <option value="Shop Drawing" <?php if ($data2->judul_gambar=='Shop Drawing') { echo"selected"; } ?> > Shop Drawing </option>
            <option value="As Built Drawing" <?php if ($data2->judul_gambar=='As Built Drawing') { echo"selected"; } ?>> As Built Drawing</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Klasifikasi Gambar Kerja</label>
        <div class="col-sm-8">
          <select class="form-control select" name="klasifikasi_gambar" required>
            <option value="Drainase" <?php if ($data2->klasifikasi_gambar=='Drainase') { echo"selected"; } ?>> Drainase </option>
            <option value="Highway" <?php if ($data2->klasifikasi_gambar=='Highway') { echo"selected"; } ?>> Highway</option>
            <option value="Struktur" <?php if ($data2->klasifikasi_gambar=='Struktur') { echo"selected"; } ?>> Struktur </option>
            <option value="Office & Fastol" <?php if ($data2->klasifikasi_gambar=='Office & Fastol') { echo"selected"; } ?>> Office & Fastol</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Jumlah Halaman</label>
        <div class="col-sm-3">
          <input type="number" class="form-control" name="jumlah_gambar" value="<?php echo$data2->jumlah_halaman_gambar;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Keterangan Gambar Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="keterangan_gambar" value="<?php echo$data2->keterangan_gambar;?>">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label">Link Gambar Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="link_gambar" value="<?php echo$data2->link_gambar;?>">
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php foreach ($data3 as $data3) { ?>
<div class="col-md-4">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Metode Kerja</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">No. Metode Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="no_metode" value="<?php echo$data3->no_metode;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul Metode Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="judul_metode" value="<?php echo$data3->judul_metode;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Klasifikasi Metode Kerja</label>
        <div class="col-sm-8">
          <select class="form-control select" name="klasifikasi_metode" required>
            <option value="Drainase" <?php if ($data3->klasifikasi_metode=='Drainase') { echo"selected"; } ?>> Drainase </option>
            <option value="Highway" <?php if ($data3->klasifikasi_metode=='Highway') { echo"selected"; } ?>> Highway</option>
            <option value="Struktur" <?php if ($data3->klasifikasi_metode=='Struktur') { echo"selected"; } ?>> Struktur </option>
            <option value="Office & Fastol" <?php if ($data3->klasifikasi_metode=='Office & Fastol') { echo"selected"; } ?>> Office & Fastol</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Jumlah Halaman</label>
        <div class="col-sm-3">
          <input type="number" class="form-control" name="jumlah_metode" value="<?php echo$data3->jumlah_halaman_metode;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="keterangan_metode" value="<?php echo$data3->keterangan_metode;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Link Metode Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="link_metode" value="<?php echo$data3->link_metode;?>">
        </div>
      </div>
      <br><br><br><br>
    </div>
  </div>
</div>
<?php } ?>
<?php foreach ($data4 as $data4) { ?>
<div class="col-md-4">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Data Quality</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">No. Dokumen</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="no_data_quality" value="<?php echo$data4->no_data_quality;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul Dokumen</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="judul_data_quality" value="<?php echo$data4->judul_data_quality;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Klasifikasi Data Quality</label>
        <div class="col-sm-8">
          <select class="form-control select" name="klasifikasi_data_quality" required>
            <option value="Drainase" <?php if ($data4->klasifikasi_data_quality=='Drainase') { echo"selected"; } ?>> Drainase </option>
            <option value="Highway" <?php if ($data4->klasifikasi_data_quality=='Highway') { echo"selected"; } ?>> Highway</option>
            <option value="Struktur" <?php if ($data4->klasifikasi_data_quality=='Struktur') { echo"selected"; } ?>> Struktur </option>
            <option value="Office & Fastol" <?php if ($data4->klasifikasi_data_quality=='Office & Fastol') { echo"selected"; } ?>> Office & Fastol</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="keterangan_data_quality" value="<?php echo$data4->keterangan_data_quality;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Upload Dokumen</label>
        <div class="col-sm-8">
          <input type="file" class="form-control" placeholder="Dokumen" name="berkas">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
          <input type="hidden" name="nomor" value="<?php echo $nomor; ?>">
          <button type="submit" class="form-control btn btn-danger"><i class="fa fa-save"></i> Perbarui Data</button>
        </div>
      </div> <br><br><br><br><br><br>
    </div>
  </div>
</div>
<?php } ?>
</form>