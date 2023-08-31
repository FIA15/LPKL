<?php include_once('../_header.php');?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Dashboard</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
        <div class="box">
            <div class="box-header with-border">
                    <?php
                    $level='';
                        if($_SESSION['level'] == 1){
                             $level = "Admin";
                        } else {
                             $level = "User";
                        }
                    
                    ?>
                <h3 class="box-title">DASHBOARD</h3>
                <br><br>
                <center><h1>SELAMAT DATANG <strong><?=$data_siswa['nama']?></strong></h1></center> <br>
                <table>
                     <tr>
                        <td>Nama</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$data_siswa['nama']?> </td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$_SESSION['nis']?></td>
                    </tr>
                    <tr>
                        <td>Pembimbing Akademik</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$data_guru['nama_pa']?> </td>
                    </tr>
                    <tr>
                        <td>Pembimbing Teknis</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$data_pegawai['nama_pt']?> </td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$level?> </td>
                    </tr>
                </table>
                
            </div>
        </div>
</section>   

<?php include_once('../_footer.php');?>