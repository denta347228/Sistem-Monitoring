<?php 
    require '../koneksi/koneksi.php';
    session_start();
    $username=$_SESSION['username'];
    $id_user=$_SESSION['id_user'];
    if(!isset($_SESSION['login'])){
        header('Location: ../login/login.php');
        exit;
    }

    $sql1="SELECT * FROM data_sales JOIN data_survey JOIN teknisi JOIN user ON data_sales.id_sales = data_survey.id_sales AND data_survey.id_teknisi = teknisi.id_teknisi AND teknisi.id_user=user.id_user WHERE teknisi.id_user = '$id_user' AND (data_sales.status_survei=1 OR data_sales.status_survei=2 OR data_sales.status_survei=3)";
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
                        <a href="index.php"><i class="fa fa-edit"></i> Input Data Survey</a>
                    </li>

                    <li>
                        <a href="hasil_survey.php" class="active-menu"><i class="fa fa-table"></i> Data Survey </a>
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
                             <b>DATA SURVEY</b>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Sales yang sudah disurvei :
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
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
                                                            <th>Hasil Survei</th>
                                                            <th>Data Sales</th>
                                                            <th>Keterangan</th>
                                                            <th>Eviden</th>
                                                            <th>Survey</th>
                                                            <th>Verifikasi</th>
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
                                                                             <tr class="odd gradeX">
                                                                                <td><b>Survey Date: </b><?php echo $data1['survey_date']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeC">
                                                                                <td><b>Teknisi : </b><?php echo $data1['username']; ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tr class="odd gradeX">
                                                                                <td><b>Order Date : </b><?php echo $data1['order_date']; ?></td>
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
                                                                                        }  else {
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
                                                                            <tr class="odd gradeC">
                                                                                <td><b>Assign Date : </b><?php echo $data1['assignment_update']; ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td><?php echo $data1['keterangan']; ?></td>
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
                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Eviden Survey</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                  <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                <img src="../assets/eviden_survey/<?php echo $data1['eviden_survey']; ?>" class="img-fluid" style="max-width: 100%;" alt="<?php echo $data1['eviden_sales']; ?>" >
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
                                                                            if ($data1['status_survei'] == 0) {
                                                                               echo "Queued";
                                                                            } elseif ($data1['status_survei'] == 99) {
                                                                                echo "Assigned";
                                                                            } elseif ($data1['status_survei'] == 1) {
                                                                                echo "Done";
                                                                            }  elseif ($data1['status_survei'] ==2) {
                                                                                echo "Kendala Pelanggan"; 
                                                                            } elseif ($data1['status_survei'] == 3) {
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
