<?php 
    require 'functionT.php';
    $selected_idsales=$_GET['id_sales'];
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Input Data Survey </title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                 <img src="../assets/images/logo_telkom.png" width="50" class="rounded-circle">
                <a class="navbar-brand" href="index.php"style="font-size: 11pt">SALES MONITORING SYSTEM </a>
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
                
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                     <li>
                        <a href="index.php"><i class="fa fa-edit"></i> Input Data Survey</a>
                    </li>
                    <li>
                        <a href="hasil_survey.php"><i class="fa fa-table"></i> Data Survey </a>
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
                             <b>FORM INPUT </b><small>Data Survey</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                   

                                    <form role="form" action="index.php" method="post" enctype="multipart/form-data">
                                       
                                     <div class="form-group">
                                            <label>ID Sales : </label>
                                            <input type="text" class="form-control" name="id_sales" value="<?php echo $selected_idsales; ?>" required readonly>
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
                                            <input type="number" class="form-control" name="kontak" placeholder="08xxxxxxxxxx" required autocomplete="off">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Koordinat Pelanggan (Tagging) :</label>
                                            <input type="text" class="form-control" name="koordinatpelanggan" placeholder="Koordinat Pelanggan" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan :</label>
                                            <input type="text" class="form-control" name="keterangan"required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Survei</label>
                                            <select name="status" size="1" class="form-control" required> 
                                                <!-- size = banyak jenis yang dapat dilihat -->
                                                <option value="">--PILIH--</option>
                                                <option value="1">OKE</option>
                                                <option value="2">Kendala Pelanggan</option>
                                                <option value="3">Kendala Teknis</option>
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Eviden</label>
                                            <input type="file" name="gambar" id="gambar" required>
                                            <small style="color: red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg </small>
                                            <small>(Max size : 2mb)</small>
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-danger">Tambah</button>
                                        <button type="reset" class="btn btn-success">Reset</button>
                                        <a class="btn btn-primary" href="index.php" role="button">Kembali</a>
                                                                    
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                           <footer><p>&#169; TELKOM TALANG KELAPA 2020</p></footer>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

            </div>

    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
 
</body>
</html>
