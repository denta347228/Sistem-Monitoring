<?php 
    require 'functionA.php';
    $selected_idsales=$_GET['id_sales'];
    $sql1="SELECT * FROM data_sales WHERE id_sales='$selected_idsales' ";
    $result1=mysqli_query($koneksi,$sql1);
    $data=mysqli_fetch_array($result1);
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data Sales <?php echo "$selected_idsales"; ?></title>
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
                                <a href="pengolahan_data_sales.php" class="active-menu"><i class="fa fa-edit"></i> Data Sales </a>
                            </li>
                            <li>
                                <a href="pengolahan_data_survey.php"><i class="fa fa-edit"></i> Data Survey </a>
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
                             <b>Edit Data Sales </b><small><?php echo $selected_idsales ?></small>
                        </h1>
                    </div>
                </div>

                 <!-- /. ROW  -->
               <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                   

                                    <form role="form" action="pengolahan_data_sales.php" method="post" enctype="multipart/form-data">
                                       
                                        <div class="form-group">
                                            <label>ID Sales : </label>
                                            <input type="text" class="form-control" name="id_sales" value="<?php echo $selected_idsales; ?>" required readonly>
                                        </div> 

                                        <div class="form-group">
                                            <label>Metode Input : </label>
                                            <select name="metode" size="1" class="form-control"required> 
                                                <!-- size = banyak jenis yang dapat dilihat -->
                                            <?php if ($data['metode_input']==1) { ?>
                                                <option value="1">MANUAL (STARCLICK)</option>
                                                <option value="2">APLIKASI MY INDIHOME PARTNER</option>
                                                <option value="3">PENGAJUAN PT2</option>
                                                <option value="4">DIGITAL CHANNEL</option>
                                            <?php } ?>

                                            <?php if ($data['metode_input']==2) { ?>
                                                <option value="2">APLIKASI MY INDIHOME PARTNER</option>
                                                <option value="1">MANUAL (STARCLICK)</option>
                                                <option value="3">PENGAJUAN PT2</option>
                                                <option value="4">DIGITAL CHANNEL</option>
                                            <?php } ?>

                                             <?php if ($data['metode_input']==3) { ?>
                                                <option value="3">PENGAJUAN PT2</option>
                                                <option value="1">MANUAL (STARCLICK)</option>
                                                <option value="2">APLIKASI MY INDIHOME PARTNER</option>
                                                <option value="4">DIGITAL CHANNEL</option>
                                            <?php } ?>

                                             <?php if ($data['metode_input']==4) { ?>
                                                <option value="4">DIGITAL CHANNEL</option>
                                                <option value="1">MANUAL (STARCLICK)</option>
                                                <option value="2">APLIKASI MY INDIHOME PARTNER</option>
                                                <option value="3">PENGAJUAN PT2</option>
                                                
                                            <?php } ?>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>No KTP Pelanggan :</label>
                                            <input type="number" class="form-control" name="noktp" value="<?php echo $data['ktp_pelanggan']; ?>" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan :</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_pelanggan']; ?>"" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>No Hp Pelanggan :</label>
                                            <input type="number" class="form-control" name="nohp" value="<?php echo $data['kontak_pelanggan']; ?>" required autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>Koordinat Pelanggan (Tagging) :</label>
                                            <input type="text" class="form-control" name="koordinatpelanggan" value="<?php echo $data['koordinat_pelanggan']; ?>" required autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>STO : </label>
                                            <select name="sto" size="1" class="form-control"required> 
                                                <!-- size = banyak jenis yang dapat dilihat -->
                                            <?php if ($data['sto']==1) { ?>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="3">PGC</option>
                                                <option value="4">SBU</option>
                                                <option value="5">SGB</option>
                                                <option value="6">SRO</option>
                                                <option value="7">TLK</option>
                                                <option value="8">PLJ</option>
                                            <?php } ?>

                                            <?php if ($data['sto']==2) { ?>
                                                <option value="2">KTU</option>
                                                <option value="1">BKS</option>
                                                <option value="3">PGC</option>
                                                <option value="4">SBU</option>
                                                <option value="5">SGB</option>
                                                <option value="6">SRO</option>
                                                <option value="7">TLK</option>
                                                <option value="8">PLJ</option>
                                            <?php } ?>
                                            
                                            <?php if ($data['sto']==3) { ?>
                                                <option value="3">PGC</option>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="4">SBU</option>
                                                <option value="5">SGB</option>
                                                <option value="6">SRO</option>
                                                <option value="7">TLK</option>
                                                <option value="8">PLJ</option>
                                            <?php } ?>

                                            <?php if ($data['sto']==4) { ?>
                                                <option value="4">SBU</option>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="3">PGC</option>
                                                <option value="5">SGB</option>
                                                <option value="6">SRO</option>
                                                <option value="7">TLK</option>
                                                <option value="8">PLJ</option>
                                            <?php } ?>

                                            <?php if ($data['sto']==5) { ?>
                                                <option value="5">SGB</option>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="3">PGC</option>
                                                <option value="4">SBU</option>
                                                <option value="6">SRO</option>
                                                <option value="7">TLK</option>
                                                <option value="8">PLJ</option>
                                            <?php } ?>
                                            <?php if ($data['sto']==6) { ?>
                                                <option value="6">SRO</option>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="3">PGC</option>
                                                <option value="4">SBU</option>
                                                <option value="5">SGB</option>
                                                <option value="7">TLK</option>
                                                <option value="8">PLJ</option>
                                            <?php } ?>
                                            <?php if ($data['sto']==7) { ?>
                                                <option value="7">TLK</option>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="3">PGC</option>
                                                <option value="4">SBU</option>
                                                <option value="5">SGB</option>
                                                <option value="6">SRO</option>
                                                <option value="8">PLJ</option>
                                                
                                            <?php } ?>
                                            <?php if ($data['sto']==8) { ?>
                                                <option value="8">PLJ</option>
                                                <option value="1">BKS</option>
                                                <option value="2">KTU</option>
                                                <option value="3">PGC</option>
                                                <option value="4">SBU</option>
                                                <option value="5">SGB</option>
                                                <option value="6">SRO</option>
                                                <option value="7">TLK</option>
                                                
                                            <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan :</label>
                                            <input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan']; ?>" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>Eviden</label>
                                            <input type="file" name="gambar" id="gambar">
                                            <small style="color: red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg </small>
                                            <small>(Max size : 2 mb)</small>
                                        </div>

                                        <button type="submit" name="tambah" class="btn btn-danger" value="<?php echo $data['eviden_sales']; ?>">Simpan</button>
                                        <button type="reset" class="btn btn-success">Reset</button>
                                        <a class="btn btn-primary" href="pengolahan_data_sales.php" role="button">Kembali</a>
                                                                    
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
