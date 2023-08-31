<?php
require_once "_config/config.php";
require "_assets/vendor/autoload.php";
if(!isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('auth/login.php')."'</script>";
}
$nis = $_SESSION['nis'];
$nig = $_SESSION['nig'];
$nip = $_SESSION['nip'];
$query_siswa = mysqli_query($con, "SELECT * FROM murid WHERE nis = '$nis' ") or die(mysqli_error($con));
$query_guru = mysqli_query($con, "SELECT * FROM pa WHERE nig = '$nig' ") or die(mysqli_error($con));
$query_pegawai = mysqli_query($con, "SELECT * FROM pt WHERE nip = '$nip' ") or die(mysqli_error($con));
$data_pegawai = mysqli_fetch_array($query_pegawai);
$data_siswa = mysqli_fetch_array($query_siswa);
$data_guru = mysqli_fetch_array($query_guru);




?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?=base_url('uploads/img/logokrw.png')?>">
  <title>PKL | SMKN 2</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url('_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/plugins/iCheck/all.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/dist/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/dist/css/skins/_all-skins.min.css')?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" >

    <!-- Logo -->
    <a href="<?=base_url('_assets/index2.html')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PKL</b></span>
      <span class="logo-lg"><b>PKL</b>SMKN 2</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top "  >
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li >
            <a href="<?=base_url('auth/logout.php')?>" class="btn btn-danger btn-flat">
              <span class="hidden-xs">
                KELUAR
              </span>
              <i class="fa fa-sign-out"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>/auth/img/smkn2.png" class="img-square" alt="User Image"><br>
        </div>
        <div class="pull-left info">
          <p>
          <?php
            ?>
            <small><?=$data_siswa['nama']?></small><br>
            <small><?=$_SESSION['nis']?></small><br>
            <small><?php
            $level='';
            if($_SESSION['level'] == 1){
                echo $level = "Admin";
            } else {
                echo $level = "User";
            }
            
            ?></small>
          </p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree"  >
        <li class="header" >M E N U</li>
        <li>
          <a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i><span> Dashboard</span></a>
        </li>
        <?php if($_SESSION['level'] ==  1 ) { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=base_url('pa')?>"><i class="fa fa-circle-o"></i> Pembimbing Akademik</a></li>
              <li><a href="<?=base_url('Pt')?>"><i class="fa fa-circle-o"></i> Pembimbing Teknis</a></li>
              <li><a href="<?=base_url('siswa')?>"><i class="fa fa-circle-o"></i> Siswa</a></li>
              <li><a href="<?=base_url('user')?>"><i class="fa fa-circle-o"></i> Pengguna</a></li>
            </ul>
          </li>
        <?php } ?>
        <li>
          <a href="<?=base_url('laporan')?>"><i class="fa fa-book"></i><span> Laporan PKL</span></a>
        </li>
        <li>
              <a href="#"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-info"></i><span> About Us</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><b>About Us</b></h3>
              </div>
              <div class="modal-body">
                <h4><b>Tentang Aplikasi</b></h4>
                <p style="text-align: justify;"> &nbsp;&nbsp;&nbsp;&nbsp;
                    Sistem Informasi Pengajuan Alat Disabilitas atau <b>PADI</b> di bangun untuk mempermudah masyarakat
                    dalam proses pengajuan serta memberikan pelayanan dan perlindungan sosial bagi penyandang disabilitas
                    yang membutuhkan alat bantu yag berguna dalam membantu mobilitasnya.
                </p>
                <h4><b>Author</b></h4>
                    <table style="text-align: center;" align="center">
                        <tr>
                          <td>Atem Susilawati</td>
                          <td>|</td>
                          <td>Fikry Ikhsan Anshori</td>
                        <tr>
                          <td>43E57027175005</td>
                          <td>|</td>
                          <td>43E57027185010</td>
                        </tr>
                        <tr>
                          <td>atemsusilawati9@gmail.com</td>
                          <td>&nbsp;&nbsp;|&nbsp;&nbsp;</td>
                          <td>fikryikhsan@gmail.com</td>
                        </tr>
                    </table>
                <h4><b>Pembimbing</b></h4>
                    <table style="text-align: center;" align="center">
                        <tr>
                          <td><b>Pembimbing Akademik</b></td>
                          <td></td>
                          <td><b>Pembimbing Teknis</b></td>
                        <tr>
                          <td >H.Wahyudi.S.Kom.,MM</td>
                          <td>|</td>
                          <td>Hj.Aida Fitrisari,MKM</td>
                        </tr>
                        <tr>
                          <td>NIDN.0428046904</td>
                          <td>&nbsp;&nbsp;|&nbsp;&nbsp;</td>
                          <td>NIP.19720308 200604 2 010</td>
                        </tr>
                    </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <b style="position: relative; top: 3px;"><a href="#" class="text-danger">STMIK HORIZON KARAWANG</a></b>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <div class="content-wrapper">
   
