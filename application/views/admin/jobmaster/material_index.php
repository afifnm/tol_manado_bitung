  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Data Master</li>
    <li class="active">Material</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-12" align="left">
  <div class="box-header">
    <a data-toggle="modal" data-target="#ModalPlus" class="btn btn-danger btn-flat">Tambah Data Material  <i class="fa fa-plus-circle"></i></a>
  </div>
</div>
<div class="col-md-6">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Data Material</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>Material</th>
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
        <td><?php echo $u['material']; ?></td>
        <td align="center">
          <a href="<?php echo site_url('admin/jobmaster/edit_material/'.$u['id_material']);?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"> EDIT</i></a>  
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/jobmaster/delete_material/'.$u['id_material'], '<i style="color: white;" class="fa fa-trash"> HAPUS</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
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
          <h4 class="modal-title" id="myModalLabel" align="center">TAMBAH DATA MATERIAL
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>

        <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/jobmaster/simpan_material');?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">*Material</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="material" placeholder="Material" required>
              </div>
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="<?php echo site_url('admin/jobmaster/material');?>" class="btn btn-default">Cancel</a>
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
    return confirm('Apakah anda yakin akan menghapus material ini?')
  }
  </script>