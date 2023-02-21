<?php 
	$hostname="localhost";
	$db_user="root";
	$db_password="";
	$select_db= "db_sms";
    $koneksi=mysqli_connect($hostname, $db_user, $db_password, $select_db) or die("Connection failed".mysqli_connect_error());
 ?>