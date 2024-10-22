<?php $level = $this->session->userdata('level'); ?>
<!--Project Manager  2 -->
<!--Chef Inspector 3 -->
<!--Strukur Engineer 4 -->
<!--Pavement Material Engineer 5 -->
<!--Quantity Engineer 6 -->
<!--Resident Engineer 7 -->
<!--Owner 10 -->
<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">NAVIGASI</li>
      <li class="<?php echo activate_menu('home'); ?>">
        <a href="<?php echo site_url('admin/home');?>">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
          </a>
      </li>
      <?php if(($level=='1') OR ($level=='9') OR ($level=='10')){ ?>
      <li class="<?php echo activate_menu('laporan'); ?>">
        <a href="<?php echo site_url('admin/laporan/cek');?>">
              <i class="fa fa-book"></i>
              <span>Cek Laporan Harian</span>
          </a>
      </li>
      <?php } ?>
      <?php if(($level=='2') OR ($level=='3') OR ($level=='4') OR ($level=='5') OR ($level=='6') OR ($level=='7') OR ($level=='10')){ ?>
      <li class="<?php echo activate_menu('cek'); ?>">
        <a href="<?php echo site_url('admin/cek');?>">
              <i class="fa fa-briefcase"></i>
              <span>Cek Request Pekerjaan</span>
          </a>
      </li>
      <?php } ?>
      <?php if($level=='8'){ ?>
      <li class="<?php echo activate_menu('master'); ?> treeview">
          <a href="#"><i class="fa fa-server"></i> 
          <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('admin/master/item');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Data Item</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/master/alat');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Data Alat</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/master/konfigurasi');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Konfigurasi</span>
                </a>
            </li>
          </ul>
      </li>
      <li class="<?php echo activate_menu('laporan'); ?>">
        <a href="<?php echo site_url('admin/laporan');?>">
              <i class="fa fa-book"></i>
              <span>Laporan Harian</span>
          </a>
      </li>
      <?php } ?>
      <?php if($level=='1'){ ?>
      <li class="<?php echo activate_menu('request'); ?>">
        <a href="<?php echo site_url('admin/request');?>">
              <i class="fa fa-briefcase"></i>
              <span>Request Pekerjaan</span>
          </a>
      </li>
      <li class="<?php echo activate_menu('jobmaster'); ?> treeview">
          <a href="#"><i class="fa fa-server"></i> 
          <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('admin/jobmaster/item');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Item Pekerjaan</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/jobmaster/tenaga');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Tenaga Kerja</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/jobmaster/peralatan');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Peralatan</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/jobmaster/material');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Material</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/jobmaster/konfigurasi');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Konfigurasi</span>
                </a>
            </li>
          </ul>
      </li>
      <li class="<?php echo activate_menu('dokumen'); ?> treeview">
          <a href="#"><i class="fa fa-file-text-o"></i> 
          <span>Dokumen</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('admin/dokumen/gambar');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Gambar Kerja</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/dokumen/metode');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Metode Kerja</span>
                </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/dokumen/data');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Data Quality</span>
                </a>
            </li>
          </ul>
      </li>
      <?php } ?>
      <li class="<?php echo activate_menu('pengaturan'); ?> treeview">
          <a href="#"><i class="fa fa-cog"></i> 
          <span>Pengaturan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <?php if($level=='Admin'){ ?>
            <li class="<?php echo activate_menu('pengaturan/level'); ?>">
              <a href="<?php echo site_url('admin/pengaturan/level');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Aktor</span>
                </a>
            </li>
            <li class="<?php echo activate_menu('pengaturan/pengguna'); ?>">
              <a href="<?php echo site_url('admin/pengaturan/pengguna');?>">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>
            <?php } ?>
            <li class="<?php echo activate_menu('pengaturan/akun'); ?>">
                <a href="<?php echo site_url('admin/pengaturan/akun');?>">
                      <i class="fa fa-circle-o text-aqua"></i>
                      <span>MyAkun</span>
                  </a>
            </li>
          </ul>
      </li>
      <li class="<?php echo activate_menu('logout'); ?>">
        <a href="<?php echo site_url('auth/logout');?>">
              <i class="fa fa-sign-out"></i>
              <span>Logout</span>
          </a>
      </li>
    </ul>
  </section>
</aside>
