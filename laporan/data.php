<?php include_once('../_header.php');?>

<section class="content-header">
    <h1>
        Laporan PKL
        <small>Data Laporan PKL</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Laporan PKL</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Laporan PKL</h3>
                <div class="pull-right">
                    <a href="<?=base_url('report')?>"  class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak</a>
                    <a href="#" data-toggle="modal" data-target="#add" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Create</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped " id="kecamatan">
                <thead >
                    <tr>
                    <th>#</th>
                        <th style="width: 90px;">Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $nis = $_SESSION['nis'];
                $query = "SELECT * FROM laporan WHERE laporan.nis = '".$nis."'";
                $sql_laporan = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_laporan) > 0){
                    while($data = mysqli_fetch_array($sql_laporan)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['tgl_laporan']?></td>
                            <td><?=$data['isi_laporan']?></td>
                            <td class="text-center" width="160px">    
                                <a href="edit.php?id=<?=$data['id_laporan']?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update  
                                </a>
                                <a href="del.php?id=<?=$data['id_laporan']?>" onclick="return confirm('Aptkah Anda Yakin ?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete  
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                }else{
                    echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak Di Temukan</td></tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
</section>
<div class="modal fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <sptn aria-hidden="true">&times;</sptn></button>
                <h3 class="modal-title"><b>Tambah Data <small>Siswa</small></b></h3>
              </div>
              <div class="modal-body">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>Tanggal *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="hidden" name="id_laporan">
                                    <input type="hidden" name="nis" value="<?=$_SESSION['nis']?>">
                                    <input type="hidden" name="nip" value="<?=$_SESSION['nip']?>">
                                    <input type="hidden" name="nig" value="<?=$_SESSION['nig']?>">
                                <input type="text" name="tgl_laporan"  value="" class="datepicker span2 form-control" id="datepicker" required autocomplete="off">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label>Kegiatan *</label>
                                <textarea name="isi_laporan" id="editor1" rows="10" cols="55"></textarea>
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" name="add" class="btn btn-success"><i class="fa fa-ptper-plane "></i> Simpan</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                 </div>
              </div>
            </div>
          </div>
</div>

<?php include_once('../_footer.php');?>