<?php 
  date_default_timezone_set("Asia/Jakarta");
  $jam = date("H:i");
  $tanggal = date("y-m-d");
  $hari = date('l'); if($hari=='Monday'){$indo='Senin';}
  if($hari=='Tuesday'){$indo='Selasa';}if($hari=='Wednesday'){$indo='Rabu';}
  if($hari=='Thursday'){$indo='Kamis';}if($hari=='Friday'){$indo='Jumat';}
  if($hari=='Saturday'){$indo='Sabtu';}if($hari=='Sunday'){$indo='Minggu';}
?> 
<ol class="breadcrumb" style="margin-bottom: 0px; padding-bottom: 0px;">
  <li><a href="<?php date_default_timezone_set("Asia/Jakarta"); echo site_url();?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Dashboard</li>
</ol> 
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-md-12">
  <h3 align="left"> 
  <small>Anda login sebagai <?php echo $this->CRUD_model->get_level($this->session->userdata('level')) ?> (<?php echo $this->session->userdata('nama') ?>)</small></h3>  
</div>
<div class="col-md-12">
  <h3 align="center"> 
  <img src="<?php echo base_url('assets/upload/login2.png'); ?>" width="500px"></h3>  
</div>
