<?php 
    require 'functionA.php';
    $sales=qsales();
    $queue=qsurvey(0);
    $assign=qsurvey(99);
    $done=qsurvey(1);
    $kpelanggan=qsurvey(2);
    $kteknis=qsurvey(3);
    $vqueue=qverif_queued();
    $voke=qverif(1);
    $vnotoke=qverif(-1);
 ?>
 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- New CSS -->
    <link href="../assets/css/new.css" rel="stylesheet" />
    <style>
        td:first-child{
            font-weight: bold;
        }
        td{
            text-align: center;
        }
        tr:nth-child(2),tr:nth-child(4),tr:nth-child(6),tr:nth-child(8){
            background-color: #ffffff;
        }
        thead, thead tr:nth-child(2){
            background-color: #B22222;
            /* #C23A2E*/
            color: #ffffff;
        }
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
            
            <div class="navbar-header ">

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
                        <a href="index.php" class="active-menu"><i class="fa fa-dashboard"></i> Dashboard </a>
                    </li>

                     <li>
                        <a href="data_verifikasi.php"><i class="fa fa-edit"></i>Verifikasi Data</a>
                    </li>
                    
                    <li>
                        <a href=""><i class="fa fa-edit"></i> Pengolahan Data <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="pengolahan_data_sales.php"><i class="fa fa-edit"></i> Data Sales </a>
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
                            <b>DASHBOARD </b><small> Admin </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading" style="font-size: 20px; color: white; background-color: #B22222" >
                                <center>DASHBOARD INPUT ON SITE</center>
                            </div> 
                            <div class="panel-body" style="background-color: #f7a5a0;">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        
                                        <thead >

                                            <tr >
                                                <th rowspan="2" style="padding-bottom: 25px"><center>STO</center></th>
                                                <th rowspan="2" style="padding-bottom: 25px"><center>Sales</center></th>
                                                <th colspan="2" style="vertical-align: center ,padding-bottom: 25px;"><center>Sebelum Survey</center></th>
                                                <th colspan="3" style="vertical-align: center ,padding-bottom: 25px;"><center>Setelah Survey</center></th>
                                                <th colspan="3" style="vertical-align: center ,padding-bottom: 25px;"><center>Verifikasi</center></th>
                                                
                                            </tr>

                                            <tr >
                                                <th><center>Queued</center></th>
                                                <th><center>Assigned</center></th>
                                                <th><center>Oke</center></th>
                                                <th><center>Kendala Pelanggan</center></th>
                                                <th><center>Kendala Teknis</center></th>
                                                <th><center>Queued</center></th>
                                                <th><center>Oke</center></th>
                                                <th><center>Tidak Oke</center></th>
                                                
                                            </tr>
                                            
                                        </thead>
                                            <?php for ($i=0; $i <8 ; $i++) {?>
                                                <tbody >
                                                    <tr>
                                                        <td>
                                                            <?php 
                                                                if($i==0){
                                                                    echo "BKS";
                                                                }else if($i==1){
                                                                    echo "KTU";
                                                                }else if($i==2){
                                                                    echo "PGC";
                                                                }else if($i==3){
                                                                    echo "SBU";
                                                                }else if($i==4){
                                                                    echo "SGB";
                                                                }else if($i==5){
                                                                    echo "SRO";
                                                                }else if($i==6){
                                                                    echo "TLK";
                                                                }else if($i==7){
                                                                    echo "PLJ";
                                                                }
                                                             ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(isset($sales[$i])){
                                                                    echo $sales[$i];
                                                                }else{
                                                                    $sales[$i]=0;
                                                                    echo $sales[$i];
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(isset($queue[$i])){
                                                                    echo $queue[$i];
                                                                }else{
                                                                    $queue[$i]=0;
                                                                    echo $queue[$i];
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(isset($assign[$i])){
                                                                    echo $assign[$i];
                                                                }else{
                                                                    $assign[$i]=0;
                                                                    echo $assign[$i];
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(isset($done[$i])){
                                                                    echo $done[$i];
                                                                }else{
                                                                    $done[$i]=0;
                                                                    echo $done[$i];
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(isset($kpelanggan[$i])){
                                                                    echo $kpelanggan[$i];
                                                                }else{
                                                                    $kpelanggan[$i]=0;
                                                                    echo $kpelanggan[$i];
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(isset($kteknis[$i])){
                                                                    echo $kteknis[$i];
                                                                }else{
                                                                    $kteknis[$i]=0;
                                                                    echo $kteknis[$i];
                                                                }
                                                            ?>    
                                                        </td> 
                                                        <td>
                                                            <?php 
                                                                if(isset($vqueue[$i])){
                                                                    echo $vqueue[$i];
                                                                }else{
                                                                    $vqueue[$i]=0;
                                                                    echo $vqueue[$i];
                                                                }
                                                            ?>    
                                                        </td> 
                                                        <td>
                                                            <?php 
                                                                if(isset($voke[$i])){
                                                                    echo $voke[$i];
                                                                }else{
                                                                    $voke[$i]=0;
                                                                    echo $voke[$i];
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(isset($vnotoke[$i])){
                                                                    echo $vnotoke[$i];
                                                                }else{
                                                                    $vnotoke[$i]=0;
                                                                    echo $vnotoke[$i];
                                                                }
                                                            ?>    
                                                        </td>
                                                    </tr>
                                                     
                                                </tbody>
                                            <?php } ?>
                                        <thead>
                                            <?php 
                                                $Tsales=$sales[0]+$sales[1]+$sales[2]+$sales[3]+$sales[4]+$sales[5]+$sales[6]+$sales[7];
                                                $Tqueue=$queue[0]+$queue[1]+$queue[2]+$queue[3]+$queue[4]+$queue[5]+$queue[6]+$queue[7];
                                                $Tassign=$assign[0]+$assign[1]+$assign[2]+$assign[3]+$assign[4]+$assign[5]+$assign[6]+$assign[7];
                                                $Tdone=$done[0]+$done[1]+$done[2]+$done[3]+$done[4]+$done[5]+$done[6]+$done[7];
                                                $Tkpelanggan=$kpelanggan[0]+$kpelanggan[1]+$kpelanggan[2]+$kpelanggan[3]+$kpelanggan[4]+$kpelanggan[5]+$kpelanggan[6]+$kpelanggan[7];
                                                $Tkteknis=$kteknis[0]+$kteknis[1]+$kteknis[2]+$kteknis[3]+$kteknis[4]+$kteknis[5]+$kteknis[6]+$kteknis[7];
                                                $Tvqueue=$vqueue[0]+$vqueue[1]+$vqueue[2]+$vqueue[3]+$vqueue[4]+$vqueue[5]+$vqueue[6]+$vqueue[7];
                                                $Tvoke=$voke[0]+$voke[1]+$voke[2]+$voke[3]+$voke[4]+$voke[5]+$voke[6]+$voke[7];
                                                $Tvnotoke=$vnotoke[0]+$vnotoke[1]+$vnotoke[2]+$vnotoke[3]+$vnotoke[4]+$vnotoke[5]+$vnotoke[6]+$vnotoke[7];
                                             ?>
                                            <th><center>TOTAL</center></th>
                                            <th><center><?php echo $Tsales; ?></center></th>
                                            <th><center><?php echo $Tqueue; ?></center></th>
                                            <th><center><?php echo $Tassign; ?></center></th>
                                            <th><center><?php echo $Tdone; ?></center></th>
                                            <th><center><?php echo $Tkpelanggan; ?></center></th>
                                            <th><center><?php echo $Tkteknis; ?></center></th>
                                            <th><center><?php echo $Tvqueue; ?></center></th>
                                            <th><center><?php echo $Tvoke; ?></center></th>
                                            <th><center><?php echo $Tvnotoke; ?></center></th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /. ROW  -->
                <footer><p>&copy; TELKOM TALANG KELAPA</p></footer>
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
    <!-- Morris Chart Js -->
    <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>


</body>

</html>