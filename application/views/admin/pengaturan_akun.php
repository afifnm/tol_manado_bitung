  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li class="active">Pengaturan</li>
    <li class="active">Akun</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="row">
	<div class="col-md-4">
		<!-- Profile Image -->
		<div class="box box-solid">
			<div class="box-body box-profile">
				<h3 class="profile-username text-center"><?php echo $this->session->userdata('nama'); ?></h3>
				<p class="text-muted text-center">
          <?php $filename=FCPATH.'/assets/upload/ttd/'.$this->session->userdata('username').'.png';
          if (file_exists($filename)){ ?>
            <img class="img-responsive profile-user-img" src="<?php echo base_url('assets/upload/ttd/'.$this->session->userdata('username').'.png'); ?>" alt="Tanda Tangan">
            <?php }  else {?>
            Tanda Tangan Belum Diupload
            <?php }?>
				</p>
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item" style="text-align:center">
						<b>Username</b><br><a><?php echo $this->session->userdata('username')?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#settings" data-toggle="tab">Ubah Identitas</a></li>
				<li><a href="#password" data-toggle="tab">Ubah Password</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="settings">
					<form class="form-horizontal" action="<?php echo base_url('auth/updateProfile') ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $this->session->userdata('username'); ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $this->session->userdata('nama'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama CV</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Nama CV" name="cv" value="<?php echo $this->session->userdata('cv'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $this->session->userdata('email'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">No. Hp</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="No. Hp" name="no_hp" value="<?php echo $this->session->userdata('no_hp'); ?>">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 control-label">Upload Tanda Tangan (PNG)</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" placeholder="Tanda Tangan" name="berkas">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="password">
					<form class="form-horizontal" action="<?php echo base_url('auth/updatePassword') ?>" method="POST">
						<div class="form-group">
							<label for="passLama" class="col-sm-2 control-label">Password Lama</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Password Lama" name="passLama">
							</div>
						</div>
						<div class="form-group">
							<label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
							</div>
						</div>
						<div class="form-group">
							<label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success  btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>