<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['nis']));
        $cekid = mysqli_query($con,"SELECT * FROM murid WHERE nis = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama']));
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('NIS $id Sudah Terdaftar!');window.location='data.php';</script>";
    } else  {
    mysqli_query($con, "INSERT INTO murid (nis, nama) VALUES ('$id', '$nama')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['nis'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama']));
    mysqli_query($con, "UPDATE murid SET nis = '$id', nama = '$nama' WHERE nis = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

?>