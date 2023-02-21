<?php 
	require '../koneksi/koneksi.php';

	session_start();
    $username=$_SESSION['username'];
    $id_admin_teknisi = $_SESSION['id_user'];
    if(!isset($_SESSION['login'])){
        header('Location: ../login/login.php');
        exit;
    }

	function tambah($data){
	  global $koneksi;
	  global $id_admin_teknisi;

	  $id_teknisi = $data['id_teknisi'];
	  $id_sales = $data['assign'];

	  //cek id_sales
      $sql="SELECT * FROM data_survey WHERE id_sales=$id_sales";
      $result1=mysqli_query($koneksi,$sql);
      $validasi=mysqli_num_rows($result1);
		
		// cek validasi
	    if($validasi>0){
	    	return -2;
	    }
	    
	    $masuk="INSERT INTO data_survey (id_sales,id_teknisi,id_admin_teknisi,assignment_update) VALUES ('$id_sales','$id_teknisi','$id_admin_teknisi',NOW())";
	    $result=mysqli_query($koneksi,$masuk);
	    $row = mysqli_affected_rows($koneksi);

	    if ($row>0) {
	    	$update="UPDATE data_sales SET status_survei=99 WHERE id_sales='$id_sales'";
	    	$result1=mysqli_query($koneksi,$update);
	    }
    
	    return $row;
	}

 ?>