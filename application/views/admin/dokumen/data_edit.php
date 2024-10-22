<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/dokumen/gambar');?>">Data Quality</a></li>
  <li class="active">Perbarui Data</li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/dokumen/update_data');?>" enctype="multipart/form-data">
<?php foreach ($data4 as $data4) { ?>
<div class="col-md-6">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Perbarui Data Quality</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">No. Dokumen</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="no_data_quality" value="<?php echo$data4->no_data_quality;?>">
          <input type="hidden" name="id_data" value="<?php echo$data4->id_data;?>">
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
          <input type="hidden" name="id_data_quality" value="<?php echo $id_data_quality; ?>">
          <button type="submit" class="form-control btn btn-danger"><i class="fa fa-save"></i> Perbarui Data</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</form>