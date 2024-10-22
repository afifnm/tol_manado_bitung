  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/jobmaster/item');?>">Data Master Item</a></li>
    <li class="active">Perbarui Data Item</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-6">
  <div class="box box-solid">
<?php foreach ($kategori as $u) { ?>
    <div class="box-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('admin/jobmaster/updateitem');?>">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Item Pekerjaan</label>
            <div class="col-sm-8">
              <input type="hidden" name="id_item" value="<?php echo $u->id_item_pekerjaan; ?>" required>
              <input type="text" class="form-control" name="nama" value="<?php echo $u->nama; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Satuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="satuan" value="<?php echo $u->satuan; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Mata Pembayaran</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="mata_pembayaran" value="<?php echo $u->mata_pembayaran; ?>">
            </div>
          </div> 
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/jobmaster/item');?>" class="btn btn-default">Batal</a>
          <button type="submit" class="btn btn-danger pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
<?php } ?>
  </div>
</div>