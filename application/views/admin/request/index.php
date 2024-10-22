  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Request Pekerjaan</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <a data-toggle="modal" data-target="#ModalPlus" class="btn btn-danger btn-flat">Buat Request Pekerjaan  <i class="fa fa-plus-circle"></i></a>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Data Request Pekerjaan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>Tanggal Pengajuan</th>
          <th>Tanggal Pelaksanaan</th>
          <th>Status</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php  $no = 1; foreach ($data2 as $u) { 
          $status = $this->CRUD_model->get_status_request($u['id_request']);
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo date_indo($u['tanggal_pengajuan']); ?></td>
        <td><?php echo date_indo($u['tanggal_pelaksanaan']); ?></td>
        <td>
        <?php 
            if ($status<2) {
              echo"<a class='btn btn-warning btn-xs'> <i>PROSES PENGAJUAN</i></a>";
            } elseif ($status<4) {
              echo"<a class='btn btn-danger btn-xs'> <i>BELUM DISETUJUI</i></a>";
            } elseif ($status==4) {
              echo"<a class='btn btn-success btn-xs'> <i>DISETUJUI</i></a>";
            } 
        ?> 
        </td>
        <td align="center">
          <a href="<?php echo site_url('admin/request/item/'.$u['id_request']);?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"> PERBARUI</i></a>
          <a href="<?php echo site_url('admin/request/preview/'.$u['id_request']);?>" class="btn btn-info btn-xs"><i class="fa fa-search-plus"> PREVIEW</i></a>    
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/request/cancel_request/'.$u['id_request'], '<i style="color: white;" class="fa fa-trash"> HAPUS</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
          </button>     

           <a href="<?php echo site_url('admin/request/print_request/'.$u['id_request']);?>" class="btn btn-default btn-xs" target="_blank"><i class="fa fa-print"> PRINT</i></a>   
    
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">BUAT REQUEST PEKERJAAN
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>

        <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/request/buatrequest');?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">*Tanggal Pengajuan</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tanggal_pengajuan"  required>
                <input type="hidden" class="form-control" name="id_request" value="<?php echo$nomor; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">*Tanggal Pelaksanaan</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tanggal_pelaksanaan" required>
              </div>
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="<?php echo site_url('admin/request');?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">SELANJUTNYA <i class="fa fa-chevron-right"></i></button>
          </div>
          <!-- /.box-footer -->
        </form>
        </div>


      </div>
    </div>
  </div>
  <script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus request pekerjaan ini?')
  }
  </script>