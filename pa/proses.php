<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['nig']));
        $cekid = mysqli_query($con,"SELECT * FROM pa WHERE nig = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_pa']));
        $ceknama = mysqli_query($con,"SELECT * FROM pa WHERE nama_pa = '$nama'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('NOMOR INDUK GURU $id Sudah Terdaftar!');window.location='data.php';</script>";
    } else if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('NAMA GURU $nama Sudah Terdaftar!');window.location='data.php';</script>";
    } else {
    mysqli_query($con, "INSERT INTO pa (nig, nama_pa) VALUES ('$id', '$nama')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['nig'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_pa']));
        $ceknama = mysqli_query($con,"SELECT * FROM pa WHERE nama_pa = '$nama'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('NAMA GURU $nama Sudah Terdaftar!');window.location='data.php';</script>";
    } else {
    mysqli_query($con, "UPDATE pa SET nig = '$id', nama_pa = '$nama' WHERE nig = '$id'") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
}

?>