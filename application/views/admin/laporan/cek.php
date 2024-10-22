  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Laporan Harian</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
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
          if ($this->session->userdata('level') == "1") { $level = 'se_acc'; } 
          elseif ($this->session->userdata('level') == "9") { $level = 'ks_acc'; } 
          elseif ($this->session->userdata('level') == "10") { $level = 'owner_acc'; } 
          $status = $this->CRUD_model->get_acc($u['id_laporan_harian'],$level);
          if ($status==0) {
            echo"<a class='btn btn-warning btn-sm'> <i>BELUM DICEK</i></a>";
          } elseif ($status==1) {
            echo"<a class='btn btn-danger btn-sm'> <i>BELUM DISETUJUI</i></a>";
          } elseif ($status==2) {
            echo"<a class='btn btn-success btn-sm'> <i>DISETUJUI</i></a>";
          } 
        ?>
        </td>
        <td align="center">
          <a href="<?php echo site_url('admin/laporan/feedback/'.$u['id_laporan_harian']);?>" class="btn btn-info btn-sm"><i class="fa fa-search-plus"> PERIKSA</i></a>               
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>