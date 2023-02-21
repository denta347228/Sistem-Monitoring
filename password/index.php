<?php 
	require '../koneksi/koneksi.php';
    session_start();
    $username=$_SESSION['username'];
    if(!isset($_SESSION['login'])){
        header('Location: ../login/login.php');
        exit;
    }else{
    	$sql="SELECT identity FROM user WHERE username ='$username'";
	    $result=mysqli_query($koneksi,$sql);
	    $data=mysqli_fetch_array($result);
	    if ($data['identity'] == 0) {
            header("Location: password.php");   
        } else if ($data['identity'] == 1) {
            header("Location: password.php");   
        } else if ($data['identity'] == 2) {
            header("Location: password.php");   
        } else if ($data['identity'] == 3) {
            header("Location: password.php");   
        }
    }
 ?>