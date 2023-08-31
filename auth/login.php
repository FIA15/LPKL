
<?php
require_once "../_config/config.php";
if(isset($_SESSION['user'])){
    echo "<script>window.location='".base_url()."'</script>";
}else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/auth/style.css">
	  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/_assets/bower_components/font-awesome/css/font-awesome.min.css">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>LOGIN PKL</title>
  </head>
  <body>
  <div class="container">
  <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="post" class="sign-in-form">
            <img src="img/smkn2.png" width="200px" />
            <h3>PKL SMKN 2 KARAWANG</h3>
            <h2 class="title">Masuk</h2>
  <?php
  
  if(isset($_POST['login'])){
      $user = trim(mysqli_real_escape_string($con, $_POST['user']));
      $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
      $sql_login = mysqli_query($con, "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ") or die (mysqli_error($con));
      if(mysqli_num_rows($sql_login) > 0){
        $data = mysqli_fetch_array($sql_login);  
        $_SESSION['user'] = $user;
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['nis'] = $data['nis'];
        $_SESSION['nig'] = $data['nig'];
        $_SESSION['nip'] = $data['nip'];
        $_SESSION['level'] = $data['level'];
         
          echo "<script>window.location='".base_url()."'</script>";
      } else { ?>
          <div class="row">
              <div class="col-lg-12">
                  <div class="alert alert-danger alert-dismisable" role="alert" >
                      <strong>Login Gagal</strong> Username / Password Salah
                      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  </div>
              </div>
          </div>
      <?php
      }
    } ?>
            <div class="input-field">
              <i class="fa fa-user"></i>
              <input type="text" name="user" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fa fa-lock"></i>
              <input type="password" name="pass" placeholder="Password" />
            </div>
            <input type="submit" name="login" value="Masuk" class="btn solid" />
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <img src="img/work2.svg" class="image">
        </div>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>
<?php
}
?>