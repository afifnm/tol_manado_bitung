<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/request');?>">Data Request Pekerjaan</a></li>
  <li class="active"> Item Pekerjaan</li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<?php foreach ($data2 as $u) { ?>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/request/tambah_item');?>">
<div class="col-md-5">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Bagian 1 - Input Pekerjaan</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Nama Pekerjaan</label>
        <div class="col-sm-8">
          <select class="form-control select2" name="id_item_pekerjaan"placeholder="Pilih Item...">
            <?php foreach ($item_pekerjaan as $aa) { ?>
              <option style="text-align:right;" value="<?php echo$aa['id_item_pekerjaan']; ?>"> <?php echo$aa['nama']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Jumlah (Volume)</label>
        <div class="col-sm-8">
          <input type="number" min="1" step="1" class="form-control" name="volume" placeholder="Jumlah" required>
          <input type="hidden" name="nomor" value="<?php echo$nomor; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Lokasi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="lokasi" placeholder="Lokasi"  required>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('admin/request/dokumen/'.$nomor);?>"class="btn btn-danger pull-right" style="margin:5px;"><i class="fa fa-arrow-right"></i> Selanjutnya</a>
        <a href="<?php echo site_url('admin/request');?>" class="btn btn-danger pull-right" style="margin:5px;"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
  </div>
</div>
</form>
<?php } ?>
<div class="col-md-12">
  <div class="box box-solid">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th style="text-align: center;">Nama Pekerjaan</th>
          <th style="text-align: center;">Estimasi Volume</th>
          <th style="text-align: center;">Satuan</th>
          <th style="text-align: center;">Lokasi</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        $sum = 0;
        foreach ($data3 as $produksi) {
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td style="text-align: center;"><?php echo $produksi['nama']; ?></td>
        <td style="text-align: center;"><?php echo $produksi['volume']; ?></td>
        <td style="text-align: center;"><?php echo $produksi['satuan']; ?></td>
        <td style="text-align: center;"><?php echo $produksi['lokasi']; ?></td>
        <td align="center">
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/request/delete_item/'.$produksi['id_detail_request'].'/'.$nomor, '<i style="color: white;" class="fa fa-trash"> hapus</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
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
    return confirm('Apakah anda yakin akan menghapus item pekerjaan ini?')
  }
  </script>