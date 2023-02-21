<?php 
	require '../koneksi/koneksi.php';

    // session_start();
    $username=$_SESSION['username'];
    if(!isset($_SESSION['login'])){
        header('Location: ../login/login.php');
        exit;
    }
  function registrasi($data){
  	global $koneksi;

    $username=$data['name'];
    $password=mysqli_real_escape_string($koneksi,$data['pass1']);
    $password2=mysqli_real_escape_string($koneksi,$data['pass2']);

    //cek konfirmasi password
    if($password!==$password2){
      
        return false;
    }

    //enskripsi password
    $password=password_hash($password, PASSWORD_DEFAULT);
    // $password=md5($password);
    
    //tambahakn userbaru ke databas
    $masuk="UPDATE user SET password='$password' where  username='$username'";
    $result=mysqli_query($koneksi,$masuk);

    return mysqli_affected_rows($koneksi);
  }


 ?>