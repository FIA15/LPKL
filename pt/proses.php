<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['nip']));
        $cekid = mysqli_query($con,"SELECT * FROM pt WHERE nip = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_pt']));
        $ceknama = mysqli_query($con,"SELECT * FROM pt WHERE nama_pt = '$nama'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('NOMOR INDUK GURU $id Sudah Terdaftar!');window.location='data.php';</script>";
    } else if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('NAMA GURU $nama Sudah Terdaftar!');window.location='data.php';</script>";
    } else {
    mysqli_query($con, "INSERT INTO pt (nip, nama_pt) VALUES ('$id', '$nama')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['nip'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_pt']));
        $ceknama = mysqli_query($con,"SELECT * FROM pt WHERE nama_pt = '$nama'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('NAMA GURU $nama Sudah Terdaftar!');window.location='data.php';</script>";
    } else {
    mysqli_query($con, "UPDATE pt SET nip = '$id', nama_pt = '$nama' WHERE nip = '$id'") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
}

?>