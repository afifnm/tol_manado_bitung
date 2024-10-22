<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/dokumen/gambar');?>">Data Dokumen Gambar Kerja</a></li>
  <li class="active">Perbarui Data</li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/dokumen/update_metode');?>" enctype="multipart/form-data">
<?php foreach ($data3 as $data3) { ?>
<div class="col-md-6">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Perbarui Data Dokumen Gambar Kerja</h4>
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
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
          <input type="hidden" name="id_metode" value="<?php echo $id_metode; ?>">
          <button type="submit" class="form-control btn btn-danger"><i class="fa fa-save"></i> Perbarui Data</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</form>