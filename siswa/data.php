<?php include_once('../_header.php');
if($_SESSION['level'] !== '1'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Siswa
        <small>Data Siswa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Siswa</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Siswa</h3>
                <div class="pull-right">
                    <a href="#" data-toggle="modal" data-target="#add" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Create</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="kecamatan">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>Nomor Induk Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM murid";
                $sql_pt = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_pt) > 0){
                    while($data = mysqli_fetch_array($sql_pt)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['nis']?></td>
                            <td><?=$data['nama']?></td>
                            <td class="text-center" width="160px">    
                                <a href="edit.php?id=<?=$data['nis']?>" data-toggle="modal" data-target="#edit" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update  
                                </a>
                                <a href="del.php?id=<?=$data['nis']?>" onclick="return confirm('Aptkah Anda Yakin ?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete  
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                }else{
                    echo "<tr><td colsptn=\"4\" align=\"center\">Data Tidak Di Temukan</td></tr>";
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
                            <label>No Induk Siswa *</label>
                            <input type="text" name="nis" value="" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa *</label>
                            <input type="text" name="nama" value="" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
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

<div class="modal fade" id="edit">
          <div class="modal-dialog">
            <div class="modal-content">

            </div>
          </div>
</div>

<?php include_once('../_footer.php');?>