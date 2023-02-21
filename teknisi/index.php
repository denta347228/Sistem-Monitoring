<?php 
    require 'functionT.php';
    
   if(isset($_POST['tambah'])){
      

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
    $id_user= $_SESSION['id_user'];
    $sql1="SELECT * FROM data_sales JOIN data_survey JOIN teknisi  ON data_sales.id_sales = data_survey.id_sales AND data_survey.id_teknisi = teknisi.id_teknisi where teknisi.id_user = '$id_user' AND data_sales.status_survei=99";
   
    $result1=mysqli_query($koneksi,$sql1);
    

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Survey</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- New CSS -->
   <link href="../assets/css/new.css" rel="stylesheet" />

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
                        <a href="index.php" class="active-menu"><i class="fa fa-edit"></i> Input Data Survey</a>
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
                             <b>DATA SALES</b>
                        </h1>
                    </div>
                </div> 

                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Sales yang harus disurvei :
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
                                    
                                    <!-- Advanced Tables -->
                                    <div class="panel panel-default">
                                        <!-- <div class="panel-heading">
                                             Advanced Tables
                                        </div> -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Pelanggan</th>
                                                            <th>Sales</th>
                                                            <th>Keterangan</th>
                                                            <th>Assignment Date</th>
                                                            <th>Survey</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $i=1;
                                                            while ($data1=mysqli_fetch_array($result1)) {
                                                                 # code...
                                                         ?>
                                                                <tr class="odd gradeX">
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tr class="odd gradeX">
                                                                                <td><b>No KTP : </b><?php echo $data1['2']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeC">
                                                                                <td><b>Nama : </b><?php echo $data1['3']; ?></td>
                                                                            </tr>
                                                                            <tr class="odd gradeX">
                                                                                <td><b>Kontak : </b><?php echo $data1['4']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeC">
                                                                                <td><b>Koordinat : </b><?php echo $data1['5']; ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tr class="odd gradeX">
                                                                                <td><b>Tanggal : </b><?php echo $data1['order_date']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeC">
                                                                                <td><b>STO : </b>
                                                                                    <?php  
                                                                                        if ($data1['7'] == 1) {
                                                                                           echo "BKS";
                                                                                        } elseif ($data1['7'] == 2) {
                                                                                            echo "KTU";
                                                                                        } elseif ($data1['7'] == 3) {
                                                                                            echo "PGC";
                                                                                        } elseif ($data1['7'] == 4) {
                                                                                            echo "SBU";
                                                                                        } elseif ($data1['7'] == 5) {
                                                                                            echo "SGB";
                                                                                        } elseif ($data1['7'] == 6) {
                                                                                            echo "SRO";
                                                                                        } elseif ($data1['7'] == 7) {
                                                                                            echo "TLK";
                                                                                        } elseif ($data1['7'] == 8) {
                                                                                            echo "PLJ";
                                                                                        } else {
                                                                                            echo "-";
                                                                                        }
                                                                                    ?>  
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="odd gradeX">
                                                                                <td><b>Metode Input : </b>
                                                                                    <?php  
                                                                                        if ($data1['metode_input'] == '1') {
                                                                                           echo "MANUAL (STARCLICK)";
                                                                                        } elseif ($data1['metode_input'] == '2') {
                                                                                            echo "APLIKASI MY INDIHOME PARTNER";
                                                                                        } elseif ($data1['metode_input'] == '3') {
                                                                                            echo "PENGAJUAN PT2";
                                                                                        } elseif ($data1['metode_input'] == '4') {
                                                                                            echo "DIGITAL CHANNEL";
                                                                                        } else {
                                                                                            echo "-";
                                                                                        }
                                                                                    ?>  
                                                                                </td>                       
                                                                            </tr>
                                                                            
                                                                        </table>
                                                                    </td>
                                                                    <td><?php echo $data1['6']; ?></td>
                                                                    <td><?php echo $data1['assignment_update']; ?></td>
                                                                    <td> 
                                                                        <!-- Button trigger modal -->
                                                                        <center><a  href="input_data.php?id_sales=<?php echo $data1['id_sales']; ?>  " class="btn btn-primary" " role="button" id="full">Input</a>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                                $i++; 
                                                            }
                                                         ?>        
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--End Advanced Tables -->
                                </div>
                            </div>
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
    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    
</body>
</html>
