<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
  <li><a href="<?php echo site_url('admin/dokumen');?>">Data Dokumen Gambar & Metode</a></li>
  <li class="active"> #<?php echo $nomor; ?></li>
</ol>
<div id="myalert">
  <?php $nomor_alat = 0; echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-body">
      <h4 class="form-control"> Input data dokumen gambar dan metode #<?php echo $nomor; ?> </h4>
    </div>
  </div>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/dokumen/simpan');?>" enctype="multipart/form-data">
<div class="col-md-4">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Dokumen Gambar</h4>
      </div>
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
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Metode Kerja</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">No. Metode Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="no_metode" placeholder="No. Metode Kerja"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul Metode Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="judul_metode" placeholder="Judul Metode Kerja"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Klasifikasi Metode Kerja</label>
        <div class="col-sm-8">
          <select class="form-control select" name="klasifikasi_metode" required>
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
          <input type="number" class="form-control" name="jumlah_metode" placeholder="Jumlah Halaman"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="keterangan_metode" placeholder="Keterangan"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Link Metode Kerja</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="link_metode" placeholder="Masukan link " required>
        </div>
      </div>
      <br><br><br><br>
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <h4 class="page-header" style="margin-left:20px;">Data Quality</h4>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">No. Dokumen</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="no_data_quality" placeholder="No. Dokumen"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul Dokumen</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="judul_data_quality" placeholder="Judul Dokumen"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Klasifikasi Data Quality</label>
        <div class="col-sm-8">
          <select class="form-control select" name="klasifikasi_data_quality" required>
            <option value="Drainase"> Drainase </option>
            <option value="Highway"> Highway</option>
            <option value="Struktur"> Struktur </option>
            <option value="Office & Fastol"> Office & Fastol</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="keterangan_data_quality" placeholder="Keterangan"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Upload Dokumen</label>
        <div class="col-sm-8">
          <input type="file" class="form-control" placeholder="Dokumen" name="berkas" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
          <input type="hidden" name="nomor" value="<?php echo $nomor; ?>">
          <button type="submit" class="form-control btn btn-danger"><i class="fa fa-plus"></i> Tambah data dokumen gambar & metode</button>
        </div>
      </div> 
    </div>
  </div>
</div>
</form>