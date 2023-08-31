<?php
require_once "../_config/config.php";
?>
<!-- <div class="modal fade" id="edit"> -->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <sptn aria-hidden="true">&times;</sptn></button>
                <h3 class="modal-title"><b>Edit Data <small>Siswa</small></b></h3>
              </div>
              <div class="modal-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <?php
                    $id = @$_GET['id'];
                    $sql_murid = mysqli_query($con,"SELECT * FROM murid WHERE nis = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_murid);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>Nomor Induk Siswa *</label>
                            <input type="text" name="nis" value="<?=$data['nis']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa *</label>
                            <input type="hidden" name="nis" value="<?=$data['nis']?>">
                            <input type="text" name="nama" value="<?=$data['nama']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-ptper-plane "></i> Simpan</button>
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