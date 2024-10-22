<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/dokumen/gambar');?>">Data Dokumen Gambar Kerja</a></li>
  <li class="active">Perbarui Data</li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/dokumen/update_gambar');?>" enctype="multipart/form-data">
<?php foreach ($data2 as $data2) { ?>
<div class="col-md-6">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Perbarui Data Dokumen Gambar Kerja</h4>
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
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
          <input type="hidden" name="id_gambar_kerja" value="<?php echo $id_gambar_kerja; ?>">
          <button type="submit" class="form-control btn btn-danger"><i class="fa fa-save"></i> Perbarui Data</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</form>