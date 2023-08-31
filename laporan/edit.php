<?php include_once('../_header.php');?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Laporan PKL
        <small>Edit Data Laporan PKL</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active"> Laporan / Edit Data Laporan PKL  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Laporan</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php
                    $id = @$_GET['id'];
                    $sql_laporan = mysqli_query($con,"SELECT * FROM laporan WHERE id_laporan = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_laporan);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>Tanggal *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="hidden" name="id_laporan" value="<?=$data['id_laporan']?>">
                                <input type="hidden" name="nis" value="<?=$data['nis']?>">
                                <input type="hidden" name="nig" value="<?=$data['nig']?>">
                                <input type="hidden" name="nip" value="<?=$data['nip']?>">
                                <input type="text" name="tgl_laporan"  value="<?=$data['tgl_laporan']?>" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kegiatan *</label>
                            <textarea  id="editor1" name="isi_laporan" class="form-control" rows="10" cols="55" required ><?=$data['isi_laporan']?></textarea>
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