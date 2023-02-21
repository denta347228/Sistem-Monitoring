<?php 
    require 'functionA.php';
    if(isset($_POST['tambah'])){

        if(update2($_POST)>0 OR update2($_POST)==0){
            $success=true;
        }else if(update2($_POST)== -3){
            $eror3=true;
        }else if(update2($_POST)== -4){
            $eror4=true;
        }else{
            $eror7=true;
        }
    }
    $sql1="SELECT * FROM data_sales JOIN user ON id_salesforce=id_user AND status_verifikasi != 1";
    $result1=mysqli_query($koneksi,$sql1);
    
 ?>
    
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengolahan Data Sales</title>
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
                        <a href="index.php" ><i class="fa fa-dashboard"></i> Dashboard </a>
                    </li>

                     <li>
                        <a href="data_verifikasi.php" ><i class="fa fa-edit"></i>Verifikasi Data</a>
                    </li>
                    
                    <li>
                        <a href="" class="active-menu"><i class="fa fa-edit" ></i> Pengolahan Data <span class="fa arrow"></span></a>
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
                                <a href="hasil_verifikasi.php"><i class="fa fa-table"></i> Hasil Verifikasi</a>
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
                             <b>PENGOLAHAN DATA SALES</b>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Data Sales :
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if (isset($success)) { ?>
                                        <div class="alert alert-success alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon glyphicon glyphicon-ok"></i> Success !</h4>
                                            <b>Data anda berhasil diupdate.</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror3)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Data gagal diupdate !</h4>
                                            <b>Ekstensi gambar tidak sesuai.</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror4)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Data gagal diupdate !</h4>
                                            <b>Ukuran gambar terlalu besar.</b>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($eror7)){ ?>
                                        <div class="alert alert-warning alert-dismissible" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Data gagal diupdate !</h4>
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
                                                            <th>Eviden</th>
                                                            <th>Survei</th>
                                                            <th>Verifikasi</th>
                                                            <th>Update</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $i=1;
                                                            while ($data1=mysqli_fetch_array($result1)) {
                                                                 # code...

                                                        ?>

                                                                <tr class="odd gradeX">
                                                                    <td><center><?php echo $i; ?></center></td>
                                                                    <td>
                                                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tr class="odd gradeX">
                                                                                <td><b>No KTP : </b><?php echo $data1['ktp_pelanggan']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeC">
                                                                                <td><b>Nama : </b><?php echo $data1['nama_pelanggan']; ?></td>
                                                                            </tr>
                                                                            <tr class="odd gradeX">
                                                                                <td><b>Kontak : </b><?php echo $data1['kontak_pelanggan']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeC">
                                                                                <td><b>Koordinat : </b><?php echo $data1['koordinat_pelanggan']; ?></td>
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
                                                                                        if ($data1['sto'] == 1) {
                                                                                           echo "BKS";
                                                                                        } elseif ($data1['sto'] == 2) {
                                                                                            echo "KTU";
                                                                                        } elseif ($data1['sto'] == 3) {
                                                                                            echo "PGC";
                                                                                        } elseif ($data1['sto'] == 4) {
                                                                                            echo "SBU";
                                                                                        } elseif ($data1['sto'] == 5) {
                                                                                            echo "SGB";
                                                                                        } elseif ($data1['sto'] == 6) {
                                                                                            echo "SRO";
                                                                                        } elseif ($data1['sto'] == 7) {
                                                                                            echo "TLK";
                                                                                        } elseif ($data1['sto'] == 8) {
                                                                                            echo "PLJ";
                                                                                        } else{
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

                                                                            <tr class="even gradeC">
                                                                                <td><b>Sales Force : </b><?php echo $data1['username']; ?></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>

                                                                    <td><center><?php echo $data1['keterangan']; ?></center></td>
                                                                    <td> 
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $i; ?>" id="full">
                                                                          Show
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                          <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Eviden Sales</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                  <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                <img src="../assets/eviden_sales/<?php echo $data1['eviden_sales']; ?>" class="img-fluid" style="max-width: 100%;" alt="<?php echo $data1['eviden_sales']; ?>" >
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </div> 
                                                                    </td>

                                                                    <td class="center"> 
                                                                        <?php 
                                                                            if ($data1['status_survei'] == '0') {
                                                                               echo "Queued";
                                                                            } elseif ($data1['status_survei'] == '99') {
                                                                                echo "Assigned";
                                                                            } elseif ($data1['status_survei'] == '1') {
                                                                                echo "Done";
                                                                            } elseif ($data1['status_survei'] == '2') {
                                                                                echo "Kendala Pelanggan";
                                                                            } elseif ($data1['status_survei'] == '3') {
                                                                                echo "Kendala Teknis";
                                                                            } else {
                                                                                echo "-";
                                                                            }
                                                                        ?>                                            
                                                                    </td>
                                                                    <td class="center">
                                                                        <?php 
                                                                            if ($data1['status_verifikasi'] == '0') {
                                                                               echo "Queued";
                                                                            } elseif ($data1['status_verifikasi'] == '-1') {
                                                                                echo "Invalid";
                                                                            } elseif ($data1['status_verifikasi'] == '1') {
                                                                                echo "Valid";
                                                                            } else {
                                                                                echo "-";
                                                                            }
                                                                        ?> 
                                                                    </td>
                                                                    <td>
                                                                        
                                                                     <!-- Button trigger modal -->
                                                                        <center><a  href="edit_data_sales.php?id_sales=<?php echo $data1['id_sales']; ?>  " class="btn btn-primary" " role="button" id="full">Update</a>
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
