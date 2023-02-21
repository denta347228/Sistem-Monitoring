<?php 
    require 'functionA.php';
    $sales=qsales();
    $queue=qsurvey(0);
    $assign=qsurvey(99);
    $done=qsurvey(1);
    $kpelanggan=qsurvey(2);
    $kteknis=qsurvey(3);
    $vqueue=qverif(0);
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
        thead, tr:nth-child(2),tr:nth-child(4),tr:nth-child(6),tr:nth-child(8){
            background-color: #ffffff;
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
                <img src="../assets/images/logo_telkom.png" width="50" class="rounded-circle">
                <a style="font-size: 11pt;" class="navbar-brand" href="index.php">SALES MONITORING SYSTEM</a>
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
                        <a href="pengolahan_data_sales.php"><i class="fa fa-edit"></i> Pengolahan Data Sales </a>
                    </li>
                     <li>
                        <a href="data_sales.php"><i class="fa fa-table"></i> Data Sales </a>
                    </li>
                    <li>
                        <a href="pengolahan_data_survey.php"><i class="fa fa-edit"></i> Pengolahan Data Survey </a>
                    </li>
                    <li>
                        <a href="data_survey.php"><i class="fa fa-table"></i> Data Survey </a>
                    </li>
                    <li>
                        <a href="data_verifikasi.php"><i class="fa fa-edit"></i>Verifikasi Data</a>
                    </li>
                    <li>
                        <a href="pengolahan_data_verifikasi.php"><i class="fa fa-edit"></i> Pengolahan Data Verifikasi </a>
                    </li>
                    <li>
                        <a href="hasil_verifikasi.php"><i class="fa fa-table"></i> Hasil Verifikasi Data</a>
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
                            <div class="panel-body" style="background-color: #FDE4E1;">
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
                                                <th><center>Done</center></th>
                                                <th><center>Kendala Pelanggan</center></th>
                                                <th><center>Kendala Teknis</center></th>
                                                <th><center>Queued</center></th>
                                                <th><center>Oke</center></th>
                                                <th><center>Tidak Oke</center></th>
                                                
                                            </tr>
                                            
                                        </thead>

                                        <tbody >
                                            <tr>
                                                <td>BKS</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[0])){
                                                            echo $sales[0];
                                                        }else{
                                                            $sales[0]=0;
                                                            echo $sales[0];
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[0])){
                                                            echo $queue[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[0])){
                                                            echo $assign[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[0])){
                                                            echo $done[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[0])){
                                                            echo $kpelanggan[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[0])){
                                                            echo $kteknis[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td> 
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[0])){
                                                            echo $vqueue[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td> 
                                                <td>
                                                    <?php 
                                                        if(isset($voke[0])){
                                                            echo $voke[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[0])){
                                                            echo $vnotoke[0];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>KTU</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[1])){
                                                            echo $sales[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[1])){
                                                            echo $queue[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[1])){
                                                            echo $assign[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[1])){
                                                            echo $done[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[1])){
                                                            echo $kpelanggan[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[1])){
                                                            echo $kteknis[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[1])){
                                                            echo $vqueue[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>  
                                                <td>
                                                    <?php 
                                                        if(isset($voke[1])){
                                                            echo $voke[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[1])){
                                                            echo $vnotoke[1];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>PGC</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[2])){
                                                            echo $sales[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[2])){
                                                            echo $queue[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[2])){
                                                            echo $assign[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[2])){
                                                            echo $done[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[2])){
                                                            echo $kpelanggan[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[2])){
                                                            echo $kteknis[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[2])){
                                                            echo $vqueue[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($voke[2])){
                                                            echo $voke[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>  
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[2])){
                                                            echo $vnotoke[2];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>SBU</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[3])){
                                                            echo $sales[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[3])){
                                                            echo $queue[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[3])){
                                                            echo $assign[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[3])){
                                                            echo $done[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[3])){
                                                            echo $kpelanggan[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[3])){
                                                            echo $kteknis[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[3])){
                                                            echo $vqueue[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($voke[3])){
                                                            echo $voke[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>  
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[3])){
                                                            echo $vnotoke[3];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>SGB</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[4])){
                                                            echo $sales[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[4])){
                                                            echo $queue[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[4])){
                                                            echo $assign[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[4])){
                                                            echo $done[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[4])){
                                                            echo $kpelanggan[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[4])){
                                                            echo $kteknis[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[4])){
                                                            echo $vqueue[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($voke[4])){
                                                            echo $voke[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>  
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[4])){
                                                            echo $vnotoke[4];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>SRO</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[5])){
                                                            echo $sales[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[5])){
                                                            echo $queue[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[5])){
                                                            echo $assign[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[5])){
                                                            echo $done[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[5])){
                                                            echo $kpelanggan[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[5])){
                                                            echo $kteknis[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[5])){
                                                            echo $vqueue[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($voke[5])){
                                                            echo $voke[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[5])){
                                                            echo $vnotoke[5];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>TLK</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[6])){
                                                            echo $sales[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[6])){
                                                            echo $queue[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[6])){
                                                            echo $assign[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[6])){
                                                            echo $done[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[6])){
                                                            echo $kpelanggan[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[6])){
                                                            echo $kteknis[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[6])){
                                                            echo $vqueue[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($voke[6])){
                                                            echo $voke[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>  
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[6])){
                                                            echo $vnotoke[6];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>PLJ</td>
                                                <td>
                                                    <?php 
                                                        if(isset($sales[7])){
                                                            echo $sales[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($queue[7])){
                                                            echo $queue[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($assign[7])){
                                                            echo $assign[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($done[7])){
                                                            echo $done[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kpelanggan[7])){
                                                            echo $kpelanggan[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($kteknis[7])){
                                                            echo $kteknis[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($vqueue[7])){
                                                            echo $vqueue[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(isset($voke[7])){
                                                            echo $voke[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td> 
                                                <td>
                                                    <?php 
                                                        if(isset($vnotoke[7])){
                                                            echo $vnotoke[7];
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>    
                                                </td>
                                            </tr>
                                        </tbody>
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