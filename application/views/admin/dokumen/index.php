  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Dokumen Gambar dan Metode</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <a href="<?php echo site_url('admin/dokumen/tambah/');?>" class="btn btn-danger btn-flat">Tambah Data  <i class="fa fa-plus-circle"></i></a>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Data Dokumen Gambar dan Metode</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>Tanggal Upload</th>
          <th style="text-align: center;">Judul Dokumen Gambar</th>
          <th style="text-align: center;">Judul Metode Kerja</th>
          <th style="text-align: center;">Judul Data Quality</th>
          <th style="text-align: center;">Lampiran Link/Dokumen</th>
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
        <td><?php echo date_indo($u['tanggal_gambar']); ?></td>
        <td><?php echo $u['judul_gambar']; ?></td>
        <td><?php echo $u['judul_metode']; ?></td>
        <td><?php echo $u['judul_data_quality']; ?></td>
        <td style="text-align: center;">
          <a href="<?php echo $u['link_gambar']; ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-link"> GAMBAR KERJA</i></a> 
          <a href="<?php echo $u['link_metode']; ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-link"> METODE KERJA</i></a> 
          <a href="<?php echo site_url('assets/upload/dokumen/'.$u['berkas']);?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-link"> DATA QUALITY</i></a> 
        </td>
        <td align="center">
          
          <a href="<?php echo site_url('admin/dokumen/edit/'.$u['id_dokumen']);?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"> EDIT</i></a>  
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/dokumen/delete/'.$u['id_dokumen'], '<i style="color: white;" class="fa fa-trash"> HAPUS</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
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

  <script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus data ini?')
  }
  </script>