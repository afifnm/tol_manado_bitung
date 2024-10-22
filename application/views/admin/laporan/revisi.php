<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/laporan');?>">Laporan Harian</a></li>
  <li class="active"> #<?php echo $nomor; ?></li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<?php foreach ($data2 as $u) { ?>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-body">
      <h4 class="form-control"> Laporan harian dari tanggal <?php echo date_indo($u['tanggal_start']); ?> sampai <?php echo date_indo($u['tanggal_end']); ?></h4>
    </div>
  </div>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/laporan/tambah_laporan');?>">
<div class="col-md-5">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" name="tanggal" placeholder="Lokasi"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Nama Item</label>
        <div class="col-sm-8">
          <select class="form-control select2" name="id_item" id="id_item" placeholder="Pilih Item...">
            <?php foreach ($item as $item) { ?>
              <option style="text-align:right;" value="<?php echo$item['id_item']; ?>"> <?php echo$item['nama']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Jumlah (Volume)</label>
        <div class="col-sm-8">
          <input type="number" min="1" step="1" class="form-control" name="jumlah_item" placeholder="Jumlah" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Uraian</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="uraian" placeholder="Uraian" required>
          <input type="hidden" class="form-control" name="id_laporan_harian" value="<?php echo $nomor; ?>">
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">Lokasi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="lokasi" placeholder="Lokasi"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Cuaca</label>
        <div class="col-sm-8">
          <select class="form-control select" name="cuaca" required>
            <option value="Cerah"> Cerah </option>
            <option value="Hujan"> Hujan</option>
            <option value="Basah"> Basah</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Link Dokumentasi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="dokumentasi" placeholder="Masukan link Dokumentasi" required>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-7">
  <div class="box box-solid">
    <div class="box-body">
      <div class="box-header with-border">
        <h3 class="box-title"><strong>Alat-alat yang digunakan</strong></h3>
      </div>
      <div class="form-group">
        <?php foreach ($alat as $alat) { $nomor_alat++; ?>
          <h5 class="col-sm-3 control-label"><?php echo$alat['alat']; ?></h5>
          <div class="col-sm-2">
            <input type="hidden" name="id_alat[<?php echo$nomor_alat; ?>]" value="<?php echo$alat['id_alat']; ?>">
            <input type="number" class="form-control" name="jumlah[<?php echo$nomor_alat; ?>]" style="margin:3px;" value="0">
          </div>
        <?php } ?>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
          <input type="hidden" name="nomor_alat" value="<?php echo $nomor_alat; ?>">
          <button type="submit" class="form-control btn btn-danger"><i class="fa fa-plus"></i> Tambah daftar item laporan harian</button>
        </div>
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
          <th style="text-align: center;">Tanggal</th>
          <th style="text-align: center;">Nama Item</th>
          <th style="text-align: center;">Satuan</th>
          <th style="text-align: center;">Jumlah</th>
          <th style="text-align: center;">Harga</th>
          <th style="text-align: center;">Total</th>
          <th style="text-align: center;">Uraian</th>
          <th style="text-align: center;">Lokasi</th>
          <th style="text-align: center;">Cuaca</th>
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
        <td style="text-align: center;"><?php echo date_indo($produksi['tanggal']); ?></td>
        <td style="text-align: center;"><?php echo $produksi['nama']; ?></td>
        <td style="text-align: center;"><?php echo $produksi['satuan']; ?></td>
        <td style="text-align: center;"><?php echo $produksi['jumlah']; ?></td>
        <td style="text-align: right;"><?php echo 'Rp. '.number_format($produksi['harga'],0,",","."); ?></td>
        <td style="text-align: right;">
          <?php 
          $total = $produksi['harga']*$produksi['jumlah'];
          $sum = $sum+$total;
          echo 'Rp. '.number_format($total,0,",","."); ?>
        </td>
        <td style="text-align: center;"><?php echo $produksi['uraian']; ?></td>
        <td style="text-align: center;"><?php echo $produksi['lokasi']; ?></td>
        <td style="text-align: center;"><?php echo $produksi['cuaca']; ?></td>
        <td align="center">
          <button class="btn btn-danger btn-xs">  
          <?php echo anchor('admin/laporan/delete_item/'.$produksi['id_detail_laporan_harian'].'/'.$nomor, '<i style="color: white;" class="fa fa-trash"> hapus</i>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>   
          </button>   
        <a href="<?php echo site_url('admin/laporan/edit/'.$produksi['id_detail_laporan_harian'].'/'.$nomor);?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"> edit</i></a>   
        <a target="_blank" href="<?php echo $produksi['dokumentasi']; ?>" class="btn btn-info btn-xs"> <i class="fa fa-link"> link</i> </a>  
        </td>
        </tr>
        <?php $no++; } ?>
        <tr>
          <td colspan="6" style="text-align: right;">
            <strong> Jumlah Total </strong>
          </td>
          <td colspan="1"  style="text-align: right;"><strong><?php echo 'Rp. '.number_format($sum,0,",","."); ?></strong></td>
          <td colspan="4"> - </td>
        </tr>
        </tbody>
      </table>
    </div> 
    <!-- /.box-body -->
  </div>
</div>
<script>
  function confirmDialog() {
    return confirm('Apakah anda yakin akan menghapus item ini?')
  }
  </script>