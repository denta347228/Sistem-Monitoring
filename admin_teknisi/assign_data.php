<?php 
    require 'functionAT.php';

    $selected_idsales=$_GET['id_sales'];
    $sql1="SELECT * FROM teknisi JOIN user ON teknisi.id_user=user.id_user";
    $result1=mysqli_query($koneksi,$sql1);
 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assign Data Sales <?php echo "$selected_idsales"; ?></title>
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
                <a class="navbar-brand" href="index.php" style="font-size: 11pt;">Sales Monitoring System</a>
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
                        <a href="index.php" class="active-menu"><i class="fa fa-edit"></i> Assign Data Sales</a>
                    </li>
                    <li>
                        <a href="data_assign.php"><i class="fa fa-table"></i>Hasil Assign Data Sales</a>
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
                              <b>Assign Data Sales </b><small><?php echo "$selected_idsales"; ?></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Teknisi
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
                                                            <th>Teknisi</th>
                                                            <th>Pilih Teknisi</th>
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
                                                                        	<form role="form" action="index.php" method="post" enctype="multipart/form-data">
                                                                            <tr class="odd gradeX">
                                                                                <td><b>Id_Teknisi : </b>
                                                                                	<input type="number" class="form-control" name="id_teknisi" value="<?php echo $data1['id_teknisi']; ?>" required readonly>
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="even gradeC">
                                                                                <td><b>NIK : </b><?php echo $data1['username']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeX">
                                                                                <td><b>Nama : </b><?php echo $data1['nama_user']; ?></td>
                                                                            </tr>
                                                                            <tr class="odd gradeC">
                                                                                <td><b>Mitra : </b><?php echo $data1['mitra']; ?></td>
                                                                            </tr>
                                                                            <tr class="even gradeX">
                                                                                <td><b>STO : </b><?php echo $data1['sto']; ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td><center>
                                                                            <div class="form-group">
                                                                                <button type="submit" name="assign" value="<?php echo $selected_idsales; ?>" class="btn btn-primary" >Assign</button>
                                                                            </div>
                                                                        </form>
                                                                    </center></td>
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
