  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Data Master</a></li>
    <li class="active">Konfigurasi</a></li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-6">
  <div class="box box-solid">
<?php foreach ($kategori as $u) { ?>
    <div class="box-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('admin/master/updatekonfigurasi');?>">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Proyek</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_proyek" value="<?php echo $u->nama_proyek; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">Kontraktor Pelaksana</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="kontraktor_pelaksana" value="<?php echo $u->kontraktor_pelaksana; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">No. Kontrak</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="no_kontrak" value="<?php echo $u->no_kontrak; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Kontrak</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tanggal_kontrak" value="<?php echo $u->tanggal_kontrak; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">Waktu Desain</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="waktu_desain" value="<?php echo $u->waktu_desain; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">Waktu Pelaksanaan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="waktu_pelaksanaan" value="<?php echo $u->waktu_pelaksanaan; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">Pengguna Jasa</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="pengguna_jasa" value="<?php echo $u->pengguna_jasa; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">Penyedia Jasa</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="penyedia_jasa" value="<?php echo $u->penyedia_jasa; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">No. Form </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="form" value="<?php echo $u->form; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label">Konsultasi Pengawas</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="konsultasi_pengawas" value="<?php echo $u->konsultasi_pengawas; ?>">
            </div>
          </div> 
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-danger pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
<?php } ?>
  </div>
</div>