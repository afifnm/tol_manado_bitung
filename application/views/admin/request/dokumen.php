<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/request');?>">Data Request Pekerjaan</a></li>
  <li><a href="<?php echo site_url('admin/request/item/'.$nomor);?>">Item Pekerjaan</a></li>
  <li class="active"> Lampiran Dokumen Gambar, Metode, Data Quality</li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<?php foreach ($data2 as $data2) { ?>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/request/simpan_dokumen');?>">
<div class="col-md-5">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Bagian 2 - Pilih Lampiran Dokumen</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"> Gambar Kerja</label>
        <input type="hidden" name="nomor" value="<?php echo$data2['id_request']; ?>">
        <div class="col-sm-8">
          <select class="form-control select" name="id_gambar_kerja" required>
              <option value="-" <?php if ($data2['id_gambar_kerja']=='-'){ echo "selected";} ?>>Tanpa Lampiran</option>
            <?php foreach ($gambar as $a) { ?>
              <option value="<?php echo$a['id_gambar_kerja']; ?>"
              <?php if ($a['id_gambar_kerja']==$data2['id_gambar_kerja']){ echo "selected";} ?>
              > <?php echo$a['judul_gambar']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"> Metode Kerja</label>
        <div class="col-sm-8">
          <select class="form-control select" name="id_metode" required>
              <option value="-" <?php if ($data2['id_metode']=='-'){ echo "selected";} ?>>Tanpa Lampiran</option>
            <?php foreach ($metode as $aa) { ?>
              <option value="<?php echo$aa['id_metode']; ?>"
              <?php if ($aa['id_metode']==$data2['id_metode']){ echo "selected";} ?>
              > <?php echo$aa['judul_metode']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"> Data Quality</label>
        <div class="col-sm-8">
          <select class="form-control select" name="id_data_quality" required>
              <option value="-" <?php if ($data2['id_data_quality']=='-'){ echo "selected";} ?>>Tanpa Lampiran</option>
            <?php foreach ($data_quality as $aaa) { ?>
              <option value="<?php echo$aaa['id_data_quality']; ?>"
              <?php if ($aaa['id_data_quality']==$data2['id_data_quality']){ echo "selected";} ?>
              > <?php echo$aaa['judul_data_quality']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('admin/request/tenaga/'.$nomor);?>"class="btn btn-danger pull-right" style="margin:5px;"><i class="fa fa-arrow-right"></i> Selanjutnya</a>
        <a href="<?php echo site_url('admin/request/item/'.$nomor);?>"class="btn btn-danger pull-right" style="margin:5px;"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
  </div>
</div>
</form>
<?php } ?>