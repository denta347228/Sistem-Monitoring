<?php 
    require 'functionS.php';
    
    // $sql="SELECT username FROM user WHERE username ='$username'";
    // $result=mysqli_query($koneksi,$sql);
    // $data=mysqli_fetch_array($result);
    // $nama=$data['username'];

    if(isset($_POST['tambah'])){
        // var_dump($_FILES);
        // die;

        if(tambah($_POST)>0){
            $success=true;
        }else if(tambah($_POST)== -3){
            $eror3=true;
        }else if(tambah($_POST)== -4){
            $eror4=true;
        }else if(tambah($_POST)== -5){
            $eror5=true;
        }else{
            $eror6=true;
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
                        <li><a href="../password/password.php"><i class="fa fa-gear fa-fw"></i> Ubah Password</a>
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
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php" class="active-menu"><i class="fa fa-edit"></i> Input Data Sales </a>
                    </li>
                    <li>
                        <a href="tampil.php"><i class="fa fa-table"></i> Data Sales</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                             <b>FORM INPUT </b><small>Data Sales</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Data Sales
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if (isset($success)) { ?>
                                        <div class="alert alert-success alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon glyphicon glyphicon-ok"></i> Success !</h4>
                                            <b>Data anda berhasil ditambahkan</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror3)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Data gagal ditambahkan !</h4>
                                            <b>Ekstensi gambar tidak sesuai.</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror4)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Data gagal ditambahkan !</h4>
                                            <b>Ukuran gambar terlalu besar.</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror5)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Data gagal ditambahkan !</h4>
                                            <b>KTP yang dimasukan sudah terdaftar.</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror6)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Data gagal ditambahkan !</h4>
                                        </div>
                                    <?php } ?>
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <!-- enctype = untuk method file -->
                                        <div class="form-group">
                                            <label>Metode Input : </label>
                                            <select name="metode" size="1" class="form-control" required> 
                                                <!-- size = banyak jenis yang dapat dilihat -->
                                                <option value="">--PILIH--</option>
                                                <option value="1">MANUAL (STARCLICK)</option>
                                                <option value="2">APLIKASI MY INDIHOME PARTNER</option>
                                                <option value="3">PENGAJUAN PT2</option>
                                                <option value="4">DIGITAL CHANNEL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>No KTP Pelanggan :</label>
                                            <input type="number" class="form-control" name="noktp" placeholder="357xxxxxxxxxxxxx" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan :</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>No Hp Pelanggan :</label>
                                            <input type="number" class="form-control" name="nohp" placeholder="08xxxxxxxxxx" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Koordinat Pelanggan (Tagging) :</label>
                                            <input type="text" class="form-control" name="koordinatpelanggan" placeholder="Koordinat Pelanggan" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>STO</label>
                                            <select name="sto" size="1" class="form-control" required autocomplete="off"> 
                                                <!-- size = banyak jenis yang dapat dilihat -->
                                                <option value="">--PILIH--</option>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="3">PGC</option>
                                                <option value="4">SBU</option>
                                                <option value="5">SGB</option>
                                                <option value="6">SRO</option>
                                                <option value="7">TLK</option>
                                                <option value="8">PLJ</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan :</label>
                                            <input type="text" class="form-control" name="keterangan" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Eviden</label>
                                            <input type="file" name="gambar" id="gambar" required>
                                            <small style="color: red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg </small>
                                            <small>(Max size : 2 mb)</small>
                                        </div>
                                        
                                        <button type="submit" name="tambah" class="btn btn-danger">Tambah</button>
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
