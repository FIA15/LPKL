<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id_laporan']));
    $nis = trim(mysqli_real_escape_string($con, @$_POST['nis']));
    $nig = trim(mysqli_real_escape_string($con, @$_POST['nig']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgl_laporan']));
    $isi = trim(mysqli_real_escape_string($con, @$_POST['isi_laporan']));
    mysqli_query($con, "INSERT INTO laporan (id_laporan, nis, nig, nip, tgl_laporan, isi_laporan) 
    VALUES  ('$id','$nis','$nig','$nip','$tanggal','$isi')") 
    or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 

} else if(isset($_POST['edit'])) {
    $id = $_POST['id_laporan'];
    $nis = trim(mysqli_real_escape_string($con, @$_POST['nis']));
    $nig = trim(mysqli_real_escape_string($con, @$_POST['nig']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $tgl_laporan = trim(mysqli_real_escape_string($con, @$_POST['tgl_laporan']));
    $isi_laporan = trim(mysqli_real_escape_string($con, @$_POST['isi_laporan']));
    mysqli_query($con, "UPDATE laporan SET id_laporan = '$id', nis = '$nis', nig = '$nig', nip = '$nip', tgl_laporan= '$tgl_laporan', isi_laporan = '$isi_laporan' WHERE id_laporan = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

