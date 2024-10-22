  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/master/alat');?>">Data Master Alat</a></li>
    <li class="active">Perbarui Data Alat</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-6">
  <div class="box box-solid">
<?php foreach ($kategori as $u) { ?>
    <div class="box-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('admin/master/updatealat');?>">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Alat</label>
            <div class="col-sm-8">
              <input type="hidden" name="id_alat" value="<?php echo $u->id_alat; ?>" required>
              <input type="text" class="form-control" name="alat" value="<?php echo $u->alat; ?>" required>
            </div>
          </div> 
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<a href="<?php echo site_url('admin/master/alat');?> class="btn btn-default">Batal</a>
          <button type="submit" class="btn btn-danger pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
<?php } ?>
  </div>
</div>