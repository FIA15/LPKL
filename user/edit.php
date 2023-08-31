<?php include_once('../_header.php');
if($_SESSION['level'] !== '1'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pengguna
        <small>Edit Data Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Pengguna / Edit Pengguna  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Pengguna</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                <?php
                    $id = @$_GET['id'];
                    $sql_user = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_user);
                ?>
                    <form action="proses.php" method="POST">
                    <div class="form-group">
                            <label>Nama *</label>
                            <select name="nis" class="form-control" id="" readonly>
                                <?php
                                    $sql_siswa = mysqli_query($con, "SELECT * FROM murid ") OR DIE (mysqli_error($con));
                                    while($data_siswa = mysqli_fetch_array($sql_siswa)){
                                    if($data_siswa['nis'] == $data['nis']){
                                    ?>
                                    <option value="<?=$data_siswa['nis']?>" selected="selected" ><?=$data_siswa['nis']?> - <?=$data_siswa['nama']?> </option> 
                                    <?php
                                        }else{																	
                                    ?>
                                    <option disabled value="<?=$data_siswa['nis']?>"><?=$data_siswa['nis']?> - <?=$data_siswa['nama']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Akademik *</label>
                            <select name="nig" class="form-control" id="" readonly>
                                <?php
                                    $sql_akademik = mysqli_query($con, "SELECT * FROM pa ") OR DIE (mysqli_error($con));
                                    while($data_akademik = mysqli_fetch_array($sql_akademik)){
                                    if($data_akademik['nig'] == $data['nig']){
                                    ?>
                                    <option value="<?=$data_akademik['nig']?>" selected="selected"><?=$data_akademik['nig']?> - <?=$data_akademik['nama_pa']?></option> 
                                    <?php
                                            }else{																	
                                    ?>
                                    <option disabled value="<?=$data_akademik['nig']?>"><?=$data_akademik['nig']?> - <?=$data_akademik['nama_pa']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Teknis *</label>
                            <select name="nip" class="form-control" id="" readonly>
                                <?php
                                    $sql_teknis = mysqli_query($con, "SELECT * FROM pt ") OR DIE (mysqli_error($con));
                                    while($data_teknis = mysqli_fetch_array($sql_teknis)){
                                    if($data_teknis['nip'] == $data['nip']){
                                    ?>
                                    <option value="<?=$data_teknis['nip']?>" selected="selected"><?=$data_teknis['nip']?> - <?=$data_teknis['nama_pt']?></option> 
                                    <?php
                                            }else{																	
                                    ?>
                                    <option disabled value="<?=$data_teknis['nip']?>"><?=$data_teknis['nip']?> - <?=$data_teknis['nama_pt']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username *</label>
                            <input type="hidden" name="id" id="id" value="<?=$data['user_id']?>" >
                            <input type="text" name="username" value="<?=$data['username']?>" class="form-control" readonly required>
                        </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="Password" name="password" id="password1" value="" class="form-control" placeholder="Kosongkan Jika Tidak Diganti">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password *</label>
                            <input type="Password" name="password" id="password2" value="" class="form-control" >
                        </div>
                        <div class="form-group ">
                                <label>Hak Akses *</label>
                                <select name="level" class="form-control" required>
                                    <option value="">- PILIH -</option>
                                        <option value="1" <?= $data['level'] == '1' ? "selected" : null?>>Admin</option>
                                        <option value="2" <?= $data['level'] == '2' ? "selected" : null?>>User</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-paper-plane "></i> Save</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>

<?php include_once('../_footer.php');?>