  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Laporan Harian</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <a data-toggle="modal" data-target="#ModalPlus" class="btn btn-danger btn-flat">Buat Laporan Harian  <i class="fa fa-plus-circle"></i></a>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Laporan Harian</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Berakhir</th>
          <th>Estimasi</th>
          <th>Status</th>
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
        <td><?php echo date_indo($u['tanggal_start']); ?></td>
        <td><?php echo date_indo($u['tanggal_end']); ?></td>
        <td>Rp. <?php echo number_format($this->CRUD_model->get_estimasi($u['id_laporan_harian']),0,",","."); ?></td>
        <td>
        <?php 
            $status = $this->CRUD_model->get_acc($u['id_laporan_harian'],'se_acc')+$this->CRUD_model->get_acc($u['id_laporan_harian'],'owner_acc')+$this->CRUD_model->get_acc($u['id_laporan_harian'],'ks_acc');
            if ($status==0) {
              echo"<a class='btn btn-warning btn-xs'> <i>PROSES PENGAJUAN</i></a>";
            } elseif ($status<6) {
              echo"<a class='btn btn-danger btn-xs'> <i>BELUM DISETUJUI</i></a>";
            } elseif ($status==6) {
              echo"<a class='btn btn-success btn-xs'> <i>DISETUJUI</i></a>";
            } 
        ?>      
        </td>
        <td align="center">
          <a href="<?php echo site_url('admin/laporan/tambah/'.$u['id_laporan_harian']);?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"> PERBARUI</i></a>
          <a href="<?php echo site_url('admin/laporan/preview/'.$u['id_laporan_harian']);?>" class="btn btn-info btn-xs"><i class="fa fa-search-plus"> PREVIEW</i></a>    
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/laporan/cancel_laporan/'.$u['id_laporan_harian'].'/'.$nomor, '<i style="color: white;" class="fa fa-trash"> HAPUS</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
          </button>     
          <?php if ($status==6) { ?>
           <a href="<?php echo site_url('admin/laporan/print_laporan/'.$u['id_laporan_harian']);?>" class="btn btn-default btn-xs" target="_blank"><i class="fa fa-print"> PRINT</i></a>   
          <?php } ?>       
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
          <h4 class="modal-title" id="myModalLabel" align="center">BUAT LAPORAN HARIAN
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>

        <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/laporan/buatlaporan');?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">*Tanggal Mulai</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="start"  required>
                <input type="hidden" class="form-control" name="id_laporan_harian" value="<?php echo$nomor; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">*Tanggal Berakhir</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="end" required>
              </div>
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="<?php echo site_url('admin/laporan');?>" class="btn btn-default">Cancel</a>
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
    return confirm('Apakah anda yakin akan menghapus laporan harian ini?')
  }
  </script>