<?php 
    require '../koneksi/koneksi.php';
    session_start();
    $username=$_SESSION['username'];
    if(!isset($_SESSION['login'])){
        header('Location: ../login/login.php');
        exit;
    }
    $cek1="SELECT id_user,username,password,identity FROM user WHERE username ='$username'";
    $result= mysqli_query($koneksi,$cek1);
    $data=mysqli_fetch_array($result);

    if ($data['identity'] == 0) {
        $identity=0;
        $location="../admin/index.php";   
    } else if ($data['identity'] == 1) {
        $identity=1;
        $location="../sales/index.php";   
    } else if ($data['identity'] == 2) {
        $identity=2;  
        $location="../teknisi/index.php"; 
    } else if ($data['identity'] == 3) {
        $identity=3;  
        $location="../admin_teknisi/index.php"; 
    }

    if(isset($_POST['edit_p'])){
        require'functionP.php';
        if(registrasi($_POST)>0){
            $success=true;
            // header('Location: login.php');
            // exit;
        }else if(registrasi($_POST)==false){
            $eror=true;
        }else{
          echo mysqli_error($koneksi);
        }
    }
 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Input Data Sales</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style type="text/css">
       .container{
            
            font-size: 20px; 
           
            font-weight: 800; 
            margin-top: 8px;
            padding-left: 0px;
            position: absolute;
            float: right;

        }
   </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="container"> <img style="padding-top: 0px; padding-bottom: 8px; padding-left: 25px;height: 50px;" src="../assets/images/logo_telkom.png" width="75"> 
                <a href="index.php" style="text-decoration: none; padding-left: 20px;  color: white">SALES MONITORING SYSTEM</a>
                </div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li style="color:white; font-weight:bold; padding-left: 50px;"><?php echo "$username"; ?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="password.php"><i class="fa fa-gear fa-fw"></i> Ubah Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <?php if ($identity==0) { ?>
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                     <ul class="nav" id="main-menu">
                    <li>
                        <a href="../admin/index.php" ><i class="fa fa-dashboard"></i> Dashboard </a>
                    </li>

                     <li>
                        <a href="../admin/data_verifikasi.php" ><i class="fa fa-edit"></i>Verifikasi Data</a>
                    </li>
                    
                    <li>
                        <a href="" ><i class="fa fa-edit" ></i> Pengolahan Data <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../admin/pengolahan_data_sales.php" ><i class="fa fa-edit"></i> Data Sales </a>
                            </li>
                            <li>
                                <a href="../admin/pengolahan_data_survey.php" ><i class="fa fa-edit"></i> Data Survey </a>
                            </li>
                            <li>
                                <a href="../admin/pengolahan_data_verifikasi.php" ><i class="fa fa-edit"></i> Data Verifikasi </a>
                            </li>
                        </ul>
                    </li>
                    
                   <li>
                        <a href="" ><i class="fa fa-table"></i> Tampil Data <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../admin/data_sales.php" ><i class="fa fa-table"></i> Data Sales </a>
                            </li>
                            <li>
                                <a href="../admin/data_survey.php"><i class="fa fa-table"></i> Data Survey </a>
                            </li>
                            <li>
                                <a href="../admin/hasil_verifikasi.php"><i class="fa fa-table"></i> Data Verifikasi</a>
                            </li>

                        </ul>
                    </li>
                   
                </ul>
                </div>
            </nav>
        <?php } ?>
        <?php if ($identity==1) { ?>
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a href="../sales/index.php"><i class="fa fa-edit"></i> Input Data Sales </a>
                        </li>
                        <li>
                            <a href="../sales/tampil.php"><i class="fa fa-table"></i> Data Sales</a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
        <?php if ($identity==2) { ?>
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a href="../teknisi/index.php"><i class="fa fa-edit"></i> Input Data Survey</a>
                        </li>
                        <li>
                            <a href="../teknisi/hasil_survey.php"><i class="fa fa-table"></i> Data Survey </a>
                        </li>
                    </ul>   
                </div>
            </nav>
        <?php } ?>
        <?php if ($identity==3) { ?>
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a href="../admin_teknisi/index.php"><i class="fa fa-edit"></i> Assign Data Sales</a>
                        </li>
                        <li>
                            <a href="../admin_teknisi/data_assign.php"><i class="fa fa-table"></i>Hasil Assign Data Sales</a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                             <b>EDIT PASSWORD </b><small><?php echo "$username"; ?></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if (isset($success)) { ?>
                                        <div class="alert alert-success alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon glyphicon glyphicon-ok"></i> Success !</h4>
                                            <b>Password anda telah tersimpan</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                                            <b>Konfirmasi password tidak sesuai</b>
                                        </div>
                                    <?php } ?>
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Username :</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $username; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru :</label>
                                            <input type="password" class="form-control" name="pass1" placeholder="Masukan Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password :</label>
                                            <input type="password" class="form-control" name="pass2" placeholder="Masukan Password" required>
                                        </div>
                                        <button type="submit" name="edit_p" class="btn btn-danger">Edit</button>
                                        <button type="reset" class="btn btn-success">Reset</button>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <footer><p>&#169; TELKOM TALANG KELAPA 2020</p></footer>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
