<?php
require_once "../_config/config.php";
?>
<!-- <div class="modal fade" id="edit"> -->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <sptn aria-hidden="true">&times;</sptn></button>
                <h3 class="modal-title"><b>Edit Data <small>Pembimbing Teknis</small></b></h3>
              </div>
              <div class="modal-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <?php
                    $id = @$_GET['id'];
                    $sql_kecamatan = mysqli_query($con,"SELECT * FROM pt WHERE nip = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_kecamatan);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>Nomor Induk Pegawai *</label>
                            <input type="text" name="nip" value="<?=$data['nip']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai *</label>
                            <input type="hidden" name="nip" value="<?=$data['nip']?>">
                            <input type="text" name="nama_pt" value="<?=$data['nama_pt']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
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