<?php
require_once "../_config/config.php";
require "../_assets/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;
if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nis = trim(mysqli_real_escape_string($con, @$_POST['nis']));
        $ceknis = mysqli_query($con,"SELECT * FROM user WHERE nis = '$nis'") or die (mysqli_error($con)); 
    $nig = trim(mysqli_real_escape_string($con, @$_POST['nig']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $username = trim(mysqli_real_escape_string($con, @$_POST['username']));
    $password = trim(mysqli_real_escape_string($con, sha1(@$_POST['password'])));
    $level = trim(mysqli_real_escape_string($con, @$_POST['level']));
    if(mysqli_num_rows($ceknis) > 0){
        echo "<script>alert('NIS $nis Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO user (user_id, nis, nig, nip, username, password, level) 
        VALUES ('$uuid', '$nis', '$nig', '$nip', '$nis', '$password', '$level')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nis = trim(mysqli_real_escape_string($con, @$_POST['nis']));
    $nig = trim(mysqli_real_escape_string($con, @$_POST['nig']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $username = trim(mysqli_real_escape_string($con, @$_POST['username']));
    $level = trim(mysqli_real_escape_string($con, @$_POST['level']));
    $password = trim(mysqli_real_escape_string($con, sha1(@$_POST['password'])));
    
    $input = "UPDATE user SET  nis = '$nis',  nig = '$nig',  nip = '$nip',  username = '$username', 
            password = '$password', level = '$level' WHERE user_id = '$id'";
    $input2 = "UPDATE user SET  nis = '$nis',  nig = '$nig',  nip = '$nip',  username = '$username', 
            level = '$level' WHERE user_id = '$id'";
    if(!empty($_POST['password'])){
        mysqli_query($con, $input ) or die(mysqli_error($con));
    } else {
        mysqli_query($con, $input2 ) or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>";
}
?>