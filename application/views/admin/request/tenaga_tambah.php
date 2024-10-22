<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/request');?>">Data Request Pekerjaan</a></li>
  <li><a href="<?php echo site_url('admin/request/item/'.$nomor);?>">Item Pekerjaan</a></li>
  <li><a href="<?php echo site_url('admin/request/dokumen/'.$nomor);?>"> Lampiran Dokumen Gambar, Metode, Data Quality</a></li>
  <li class="active"> Lampiran Tenaga Kerja,Peralatan dan Material</li>
</ol>
<div id="myalert">
  <?php $peralatanA =0; $tenagaA = 0; $materialA = 0; echo $this->session->flashdata('alert', true)?>
</div>
<?php foreach ($data2 as $data2) { ?>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/request/tambah_tenaga');?>">
<input type="hidden" name="nomor" value="<?php echo$nomor; ?>">
<div class="col-md-6">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-body">
        <div class="form-group">
          <h4 class="page-header" style="margin-left:20px;">Bagian 3 - Lampiran Tenaga Kerja, Material Dan Peralatan</h4>
        </div>
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Tenaga Kerja</strong></h3>
        </div>
        <div class="form-group">
          <?php foreach ($tenaga as $tenaga) { $tenagaA++; ?>
            <h5 class="col-sm-4 control-label"><?php echo$tenaga['tenaga']; ?></h5>
            <div class="col-sm-6">
              <input type="hidden" name="id_tenaga[<?php echo$tenagaA; ?>]" value="<?php echo$tenaga['id_tenaga']; ?>">
              <input type="number" class="form-control" name="jumlah_tenaga[<?php echo$tenagaA; ?>]" style="margin:3px;" value="0">
            </div>
          <?php } ?>
        </div>   
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-body">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Material</strong></h3>
        </div>
        <div class="form-group">
          <?php foreach ($material as $material) { $materialA++; ?>
            <h5 class="col-sm-4 control-label"><?php echo$material['material']; ?></h5>
            <div class="col-sm-6">
              <input type="hidden" name="id_material[<?php echo$materialA; ?>]" value="<?php echo$material['id_material']; ?>">
              <input type="number" class="form-control" name="jumlah_material[<?php echo$materialA; ?>]" style="margin:3px;" value="0">
            </div>
          <?php } ?>
        </div>   
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="box box-solid">
    <div class="box-body">
      <div class="box-header with-border">
        <h3 class="box-title"><strong>Peralatan</strong></h3>
      </div>
      <div class="form-group">
        <?php foreach ($peralatan as $alat) { $peralatanA++; ?>
          <h5 class="col-sm-4 control-label"><?php echo$alat['peralatan']; ?></h5>
          <div class="col-sm-6">
            <input type="hidden" name="id_peralatan[<?php echo$peralatanA; ?>]" value="<?php echo$alat['id_peralatan']; ?>">
            <input type="number" class="form-control" name="jumlah_peralatan[<?php echo$peralatanA; ?>]" style="margin:2px;" value="0">
          </div>
        <?php } ?>
      </div>   
    </div>
    <div class="box-footer">
      <input type="hidden" name="nomor_peralatan" value="<?php echo $peralatanA; ?>">
      <input type="hidden" name="nomor_tenaga" value="<?php echo $tenagaA; ?>">
      <input type="hidden" name="nomor_material" value="<?php echo $materialA; ?>">
      <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
      <a href="<?php echo site_url('admin/request/');?>"class="btn btn-success pull-right" style="margin:5px;"><i class="fa fa-check-circle"></i> Selesai</a>
      <a href="<?php echo site_url('admin/request/dokumen/'.$nomor);?>"class="btn btn-danger pull-right" style="margin:5px;"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
</div>
</form>
<?php } ?>