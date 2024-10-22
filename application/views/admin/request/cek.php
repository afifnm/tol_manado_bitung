<!--Project Manager  2 -->
<!--Chef Inspector 3 -->
<!--Strukur Engineer 4 -->
<!--Pavement Material Engineer 5 -->
<!--Quantity Engineer 6 -->
<!--Resident Engineer 7 -->
<!--Owner 10 -->
<?php
  if ($level == "2") { $acc = 'pm_acc'; } 
  elseif ($level == "3") { $acc = 'ci_acc'; } 
  elseif ($level == "4") { $acc = 'struk_acc'; } 
  elseif ($level == "5") { $acc = 'pme_acc'; } 
  elseif ($level == "6") { $acc = 'qe_acc'; } 
  elseif ($level == "7") { $acc = 're_acc'; } 
  elseif ($level == "10") { $acc = 'owner_acc'; } 
?>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Request Pekerjaan</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Periksa Request Pekerjaan</h3>
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
        <?php 
        $no = 1;
        foreach ($data2 as $u) {
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo date_indo($u['tanggal_pengajuan']); ?></td>
        <td><?php echo date_indo($u['tanggal_pelaksanaan']); ?></td>
        <td>
        <?php $status = $this->CRUD_model->get_acc_request($u['id_request'],$acc);
            if ($status==0) {
              echo"<a class='btn btn-warning btn-xs'> <i>BELUM DIPERIKSA</i></a>";
            } elseif ($status==1) {
              echo"<a class='btn btn-danger btn-xs'> <i>BELUM DISETUJUI</i></a>";
            } elseif ($status==2) {
              echo"<a class='btn btn-success btn-xs'> <i>DISETUJUI</i></a>";
            } 
        ?> 
        </td>
        <td align="center">
          <a href="<?php echo site_url('admin/cek/feedback/'.$u['id_request']);?>" class="btn btn-info btn-sm"><i class="fa fa-search-plus"> PERIKSA</i></a>               
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>