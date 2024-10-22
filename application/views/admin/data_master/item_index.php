  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Data Master Item</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <a data-toggle="modal" data-target="#ModalPlus" class="btn btn-danger btn-flat">Tambah Data Item  <i class="fa fa-plus-circle"></i></a>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Data Item</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>Nama Item</th>
          <th>Satuan</th>
          <th>Harga Satuan</th>
          <th>No. Item</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $u) {
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $u['nama']; ?></td>
        <td><?php echo $u['satuan']; ?></td>
        <td><?php echo 'Rp. '.number_format($u['harga'],2,",","."); ?></td>
        <td><?php echo $u['no_item']; ?></td>
        <td align="center">
          <a href="<?php echo site_url('admin/master/edit_item/'.$u['id_item']);?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"> EDIT</i></a>  
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/master/delete_item/'.$u['id_item'], '<i style="color: white;" class="fa fa-trash"> HAPUS</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
          </button>             
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>

<div class="modal fade" id="ModalPlus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">TAMBAH DATA ITEM
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>

        <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/master/simpan_item');?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">*Nama Item</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="item" placeholder="Nama Itemn" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">*Satuan</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="satuan" placeholder="Satuan Item" required>
              </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label">*Harga Satuan</label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="number" class="form-control" name="harga" min="0" step="any" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">No. Item</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="no_item" placeholder="No. Item">
            </div>
          </div>  
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="<?php echo site_url('admin/master/item');?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Simpan</button>
          </div>
          <!-- /.box-footer -->
        </form>
        </div>


      </div>
    </div>
  </div>


  <script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus item ini?')
  }
  </script>