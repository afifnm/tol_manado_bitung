<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/laporan');?>">Laporan Harian</a></li>
  <li><a href="<?php echo site_url('admin/laporan/tambah/'.$nomor);?>">#<?php echo $nomor; ?></a></li>
  <li class="active"> Perbarui laporan</li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<?php foreach ($data3 as $u) { ?>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-body">
      <h4 class="form-control"> Perbarui Laporan Harian</h4>
    </div>
  </div>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/laporan/update_laporan');?>">
<div class="col-md-5">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" name="tanggal" value="<?php echo$u['tanggal']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Nama Item</label>
        <div class="col-sm-8">
          <select class="form-control select2" name="id_item" id="id_item" placeholder="Pilih Item...">
            <?php foreach ($item as $item) { ?>
              <option style="text-align:right;" value="<?php echo$item['id_item']; ?>"
                <?php if ($u['id_item']==$item['id_item']){ echo "selected";} ?>
              > <?php echo$item['nama']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Jumlah (Volume)</label>
        <div class="col-sm-8">
          <input type="number" min="1" step="1" class="form-control" name="jumlah_item" value="<?php echo$u['jumlah']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Uraian</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="uraian" value="<?php echo$u['uraian']; ?>">
          <input type="hidden" class="form-control" name="id_laporan_harian" value="<?php echo $nomor; ?>">
          <input type="hidden" class="form-control" name="id_detail_laporan_harian" value="<?php echo $id; ?>">
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">Lokasi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="lokasi" value="<?php echo$u['lokasi']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Cuaca</label>
        <div class="col-sm-8">
          <select class="form-control select" name="cuaca" required>
            <option value="Cerah"> Cerah </option>
            <option value="Hujan"> Hujan</option>
            <option value="Basah"> Basah</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Link Dokumentasi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="dokumentasi" value="<?php echo$u['dokumentasi']; ?>">
        </div>
      </div>
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
            <input type="hidden" name="id_detail_alat_laporan[<?php echo$nomor_alat; ?>]" value="<?php echo$alat['id_detail_alat_laporan']; ?>">
            <input type="number" class="form-control" name="jumlah[<?php echo$nomor_alat; ?>]" style="margin:3px;" value="<?php echo$alat['jumlah']; ?>">
          </div>
        <?php } ?>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
          <input type="hidden" name="nomor_alat" value="<?php echo $nomor_alat; ?>">
          <button type="submit" class="form-control btn btn-danger"><i class="fa fa-save"></i> Simpan Pembaruan</button>
        </div>
      </div>    
    </div>
  </div>
</div>
</form>
<?php } ?>