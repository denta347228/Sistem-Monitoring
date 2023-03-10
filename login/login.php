<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: sales/index.php');
            exit;
    }
    require'../koneksi/koneksi.php';
    if(isset($_POST['login'])){
        $_SESSION['username']=$_POST['username'];
        $username= $_SESSION['username'];
        $password=$_POST['password'];

        $cek1="SELECT id_user,username,password,identity FROM user WHERE username ='$username'";
        $result= mysqli_query($koneksi,$cek1);
        //cek username
        if(mysqli_num_rows($result)==1){

          //cek password
          $data=mysqli_fetch_array($result);
          $pass2=$data['password'];
          if(password_verify($password,$data['password'])){
            //set session
            $_SESSION['login']=true;
            $id=$data['id_user'];
            $_SESSION['id_user']=$id;
            if ($data['identity'] == 0) {
                header("Location: ../admin/index.php");   
            } else if ($data['identity'] == 1) {
                header("Location: ../sales/index.php");   
            } else if ($data['identity'] == 2) {
                header("Location: ../teknisi/index.php");   
            } else if ($data['identity'] == 3) {
                header("Location: ../admin_teknisi/index.php");   
            }
            exit;

          }
          else{
            if($password==$data['password']){
            //set session
              $_SESSION['login']=true;
              $id=$data['id_user'];
              $_SESSION['id_user']=$id;
              if ($data['identity'] == 0) {
                  header("Location: ../admin/index.php");   
              } else if ($data['identity'] == 1) {
                  header("Location: ../sales/index.php");   
              } else if ($data['identity'] == 2) {
                  header("Location: ../teknisi/index.php");   
              } else if ($data['identity'] == 3) {
                  header("Location: ../admin_teknisi/index.php");   
              }
              exit;

            }
          }
        }
        $eror=true;
    }
        
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sales Monitoring System</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body >

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">


          <div class="col-md-5">
            <img src="../assets/images/TELKOM.jpg" alt="login" class="login-card-img">
          </div>

          <div class="col-md-7">
            <div class="card-body">
              
              <div class="brand-wrapper">
                <img src="../assets/images/logo_telkom.png" alt="logo" class="logo">
              </div>
              
              <b><p class="login-card-description"> SALES MONITORING SYSTEM</p></b>
              <?php if (isset($eror)) { ?>
                <div class="alert alert-warning alert-dismissible" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                    <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                    <b>Username/Password salah</b>
                </div>
              <?php } ?>
              <form method="post" action="">
                  <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="username" name="username" id="username" class="form-control" placeholder="Username" required>
                  </div>

                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
              </form>
                <nav class="login-card-footer-nav">
                  <p>&#169; TELKOM TALANG KELAPA 2020</p>
                </nav>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
