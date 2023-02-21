<?php 
    require 'functionA.php';
    $selected_idsurvey=$_GET['id_survey'];
    $sql1="SELECT * FROM data_survey JOIN data_sales ON data_survey.id_sales=data_sales.id_sales WHERE id_survey='$selected_idsurvey'";
    $result1=mysqli_query($koneksi,$sql1);
    $data=mysqli_fetch_array($result1);
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data Survey <?php echo "$selected_idsurvey"; ?></title>
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
                
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php" ><i class="fa fa-dashboard"></i> Dashboard </a>
                    </li>

                     <li>
                        <a href="data_verifikasi.php"><i class="fa fa-edit"></i>Verifikasi Data</a>
                    </li>
                    
                    <li>
                        <a href="" class="active-menu"><i class="fa fa-edit"></i> Pengolahan Data <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="pengolahan_data_sales.php"><i class="fa fa-edit"></i> Data Sales </a>
                            </li>
                            <li>
                                <a href="pengolahan_data_survey.php" class="active-menu"><i class="fa fa-edit"></i> Data Survey </a>
                            </li>
                            <li>
                                <a href="pengolahan_data_verifikasi.php"><i class="fa fa-edit"></i> Data Verifikasi </a>
                            </li>
                        </ul>
                    </li>
                    
                   <li>
                        <a href=""><i class="fa fa-table"></i> Tampil Data <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="data_sales.php"><i class="fa fa-table"></i> Data Sales </a>
                            </li>
                            <li>
                                <a href="data_survey.php"><i class="fa fa-table"></i> Data Survey </a>
                            </li>
                            <li>
                                <a href="hasil_verifikasi.php"><i class="fa fa-table"></i> Data Verifikasi</a>
                            </li>

                        </ul>
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
                             <b>Edit Data Survey </b><small><?php echo "$selected_idsurvey"; ?></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                   

                                    <form role="form" action="pengolahan_data_survey.php" method="post" enctype="multipart/form-data">
                                       
                                     <div class="form-group">
                                            <label>ID Survey : </label>
                                            <input type="text" class="form-control" name="id_survey" value="<?php echo $selected_idsurvey; ?>" required readonly>
                                        </div> 
                                        <div class="form-group">
                                            <label>No KTP Pelanggan :</label>
                                            <input type="number" class="form-control" name="noktp" value="<?php echo $data['2']; ?>" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan :</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $data['3']; ?>" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>No Hp Pelanggan :</label>
                                            <input type="number" class="form-control" name="kontak" value="<?php echo $data['4']; ?>" required autocomplete="off">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Koordinat Pelanggan (Tagging) :</label>
                                            <input type="text" class="form-control" name="koordinatpelanggan" value="<?php echo $data['5']; ?>" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan :</label>
                                            <input type="text" class="form-control" value="<?php echo $data['6']; ?>" name="keterangan"required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Survei</label>
                                            <select name="status" size="1" class="form-control" required> 
                                                <!-- size = banyak jenis yang dapat dilihat -->
                                                <?php if ($data['status_survei']==1) { ?>
                                                    <option value="1">OKE</option>
                                                    <option value="2">Kendala Pelanggan</option>
                                                    <option value="3">Kendala Teknis</option>  
                                                <?php } ?>
                                                <?php if ($data['status_survei']==2) { ?>
                                                    <option value="2">Kendala Pelanggan</option>
                                                    <option value="1">OKE</option>
                                                    <option value="3">Kendala Teknis</option>  
                                                <?php } ?>
                                                <?php if ($data['status_survei']==3) { ?>
                                                    <option value="3">Kendala Teknis</option> 
                                                    <option value="1">OKE</option>
                                                    <option value="2">Kendala Pelanggan</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Eviden</label>
                                            <input type="file" name="gambar" id="gambar">
                                            <small style="color: red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg </small>
                                            <small>(Max size : 2mb)</small>
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-danger" value="<?php echo $data['eviden_survey']; ?>">Simpan</button>
                                        <button type="reset" class="btn btn-success">Reset</button>
                                        <a class="btn btn-primary" href="pengolahan_data_survey.php" role="button">Kembali</a>
                                                                    
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
