<?php include_once('../_header.php');
if($_SESSION['level'] !== '1'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pengguna
        <small>Tambah Data Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Pengguna / Tambah Pengguna  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Pengguna</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>Nama *</label> <small>(NIS Adalah Username)</small>
                            <input type="hidden" name="username">
                            <select name="nis" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_siswa = mysqli_query($con, "SELECT * FROM murid ") OR DIE (mysqli_error($con));
                                    while($data_siswa = mysqli_fetch_array($sql_siswa)){
                                        echo '<option value="'.$data_siswa['nis'].'">'.$data_siswa['nis'].' - '.$data_siswa['nama'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Akademik *</label>
                            <select name="nig" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_akademik = mysqli_query($con, "SELECT * FROM pa ") OR DIE (mysqli_error($con));
                                    while($data_akademik = mysqli_fetch_array($sql_akademik)){
                                        echo '<option value="'.$data_akademik['nig'].'">'.$data_akademik['nig'].' - '.$data_akademik['nama_pa'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Teknis*</label>
                            <select name="nip" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_pegawai = mysqli_query($con, "SELECT * FROM pt ") OR DIE (mysqli_error($con));
                                    while($data_pegawai = mysqli_fetch_array($sql_pegawai)){
                                        echo '<option value="'.$data_pegawai['nip'].'">'.$data_pegawai['nip'].' - '.$data_pegawai['nama_pt'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="Password" name="password" id="password1" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password *</label>
                            <input type="Password" name="password" id="password2" value="" class="form-control" required>
                        </div>
                        <div class="form-group ">
                                <label>Hak Akses *</label>
                                <select name="level" class="form-control" required>
                                    <option value="">- PILIH -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-success"><i class="fa fa-paper-plane "></i> Save</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>

<script type="text/javascript">
window.onload = function () {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
document.getElementById("password2").setCustomValidity("Password Tidak Sesuai");
else
document.getElementById("password2").setCustomValidity('');}
</script>

<?php include_once('../_footer.php');?>