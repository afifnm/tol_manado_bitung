  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Dokumen</li>
    <li class="active">Gambar Kerja</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <a data-toggle="modal" data-target="#ModalPlus" class="btn btn-danger btn-flat">Tambah Data Dokumen Gambar Kerja  <i class="fa fa-plus-circle"></i></a>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center">Data Dokumen Gambar Kerja</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th>Tanggal Upload</th>
          <th style="text-align: center;">No. Gambar</th>
          <th style="text-align: center;">Judul Gambar</th>
          <th style="text-align: center;">Jenis Gambar</th>
          <th style="text-align: center;">Jml. Halaman</th>
          <th style="text-align: center;">Klasifikasi</th>
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
        <td><?php echo $u['no_gambar']; ?></td>
        <td><?php echo $u['judul_gambar']; ?></td>
        <td><?php echo $u['jenis_gambar']; ?></td>
        <td><?php echo $u['jumlah_halaman_gambar']; ?></td>
        <td><?php echo $u['klasifikasi_gambar']; ?></td>
        <td align="center">
          <a href="<?php echo $u['link_gambar']; ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-link"> LINK GAMBAR KERJA</i></a> 
          <a href="<?php echo site_url('admin/dokumen/edit_gambar/'.$u['id_gambar_kerja']);?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"> EDIT</i></a>  
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/dokumen/delete_gambar/'.$u['id_gambar_kerja'], '<i style="color: white;" class="fa fa-trash"> HAPUS</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">Tambah Data Dokumen Gambar Kerja
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/dokumen/simpan_gambar');?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">No. Gambar Kerja</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="no_gambar" placeholder="No. Gambar Kerja"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Judul Gambar Kerja</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="judul_gambar" placeholder="Judul Gambar Kerja"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jenis Gambar Kerja</label>
                <div class="col-sm-8">
                  <select class="form-control select" name="jenis_gambar" required>
                    <option value="Shop Drawing"> Shop Drawing </option>
                    <option value="As Built Drawing"> As Built Drawing</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Klasifikasi Gambar Kerja</label>
                <div class="col-sm-8">
                  <select class="form-control select" name="klasifikasi_gambar" required>
                    <option value="Drainase"> Drainase </option>
                    <option value="Highway"> Highway</option>
                    <option value="Struktur"> Struktur </option>
                    <option value="Office & Fastol"> Office & Fastol</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jumlah Halaman</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" name="jumlah_gambar" placeholder="Jumlah Halaman"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Keterangan Gambar Kerja</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="keterangan_gambar" placeholder="Keterangan Gambar Kerja"  required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Link Gambar Kerja</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="link_gambar" placeholder="Masukan link" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-8">
                  <button type="submit" class="form-control btn btn-danger"><i class="fa fa-save"></i> Simpan Dokumen</button>
                </div>
              </div>
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
  <script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus data ini?')
  }
  </script>