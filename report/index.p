<?php
require_once "../_config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="../auth/img/logokrw.png" style="float: left; position: relative; left: 25px; width: 50px;">
<div style="margin-left: 20px; text-align: center;" >
<div style="text-align: center;">
<div style="font-size: 18px;">Laporan Praktek Kerja Lapangan</div>
<div style="font-size: 20px;">SMKN 2 KARAWANG</div>
<div style="font-size: 12px;">Jl. Husni Hamid No.3, Nagasari, Kec.Karawang Barat, Kabupaten Karawang, Jawa Barat 41312</div>
</div>
<br>
<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">
<br>
<table border="2">
        <tr>
            <th style="width: 100px;">Tanggal</th>
            <th>Kegiatan</th>
        </tr>
        <?php
            $no = 1;
            $query = "SELECT * FROM laporan";
            $sql_laporan = mysqli_query($con, $query) or die (mysqli_error($con));
            if(mysqli_num_rows($sql_laporan) > 0){
            while($data = mysqli_fetch_array($sql_laporan)){?>
        <tr>
            <td style="width: 100;"><?=$data['tgl_laporan']?></td>
            <td><?=$data['isi_laporan']?></td>
        </tr>
        <?php
        }
        }else{
            echo "<tr><td colsptn=\"4\" align=\"center\">Data Tidak Di Temukan</td></tr>";
        }
        ?>
</table>

<div style="position: relative; left: 450px; text-align: left;">
    <div style="position: relative; left:300px; top: 50px; ">
        <?php
            $sql_guru = mysqli_query($con,"SELECT * FROM pa ") or die(mysqli_error($con));
            $data_guru = mysqli_fetch_array($sql_guru);
        ?>
        <table border="2">
            <tr>
                <th>Pembimbing Akademik,</th>
            </tr>
        </table>
        <table border="2" style="position: relative; top:80px;">
            <tr>
                <th><?=$data_guru['nama_pa']?></th>
            </tr>
            <tr>
                <th><?=$data_guru['nig']?></th>
            </tr>
        </table>
    </div>

    <div style="position: relative; ; bottom: 33px;">
        <?php
            $sql_pegawai = mysqli_query($con,"SELECT * FROM pt ") or die(mysqli_error($con));
            $data_pegawai = mysqli_fetch_array($sql_pegawai);
        ?>
        <table border="2">
            <tr>
                <th>Pembimbing Teknis</th>
            </tr>
        </table>
        <table border="2" style="position: relative; top:80px; ">
            <tr>
                <th><?=$data_pegawai['nama_pt']?></th>
            </tr>
            <tr>
                <th><?=$data_pegawai['nip']?></th>
            </tr>
        </table>
    </div>
</div>



</body>
</html>