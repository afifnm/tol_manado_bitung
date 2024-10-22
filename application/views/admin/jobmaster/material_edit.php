  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/jobmaster/material');?>">Data material Kerja</a></li>
    <li class="active">Perbarui material Kerja</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-6">
  <div class="box box-solid">
<?php foreach ($kategori as $u) { ?>
    <div class="box-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('admin/jobmaster/updatematerial');?>">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Alat</label>
            <div class="col-sm-8">
              <input type="hidden" name="id_material" value="<?php echo $u->id_material; ?>" required>
              <input type="text" class="form-control" name="material" value="<?php echo $u->material; ?>" required>
            </div>
          </div> 
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<a href="<?php echo site_url('admin/jobmaster/material');?> class="btn btn-default">Batal</a>
          <button type="submit" class="btn btn-danger pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
<?php } ?>
  </div>
</div>