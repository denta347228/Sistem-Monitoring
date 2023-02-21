<?php 
	require '../koneksi/koneksi.php';

	session_start();
    $username=$_SESSION['username'];
    $id_sales = $_SESSION['id_user'];
    if(!isset($_SESSION['login'])){
        header('Location: ../login/login.php');
        exit;
    }

	function tambah($data){
	  global $koneksi;
	  global $id_sales;

	  $metode = $data['metode'];
		$noktp = $data['noktp'];
		$nama = htmlspecialchars($data['nama']);
		$kontak = $data["nohp"];
		$koordinat = htmlspecialchars($data['koordinatpelanggan']);
		$keterangan = htmlspecialchars($data['keterangan']);
		$sto = $data['sto'];
		$salesforce = $id_sales;

    //cek no ktp
    $sql="SELECT * FROM data_sales WHERE ktp_pelanggan=$noktp";
    $result1=mysqli_query($koneksi,$sql);
    $validasi=mysqli_num_rows($result1);

		// upload
	    $gambar=upload();
	    if($gambar== -3){
	    	return -3;
	    }else if($gambar== -4){
	    	return -4;
      }else if($validasi > 0){
        return -5;
      }
	    
    $masuk="INSERT INTO data_sales (metode_input, ktp_pelanggan, nama_pelanggan, kontak_pelanggan, koordinat_pelanggan, keterangan, sto, eviden_sales, order_date, id_salesforce) VALUES ('$metode','$noktp','$nama','$kontak','$koordinat','$keterangan','$sto','$gambar',NOW(),'$id_sales')";
    $result=mysqli_query($koneksi,$masuk);
    $row = mysqli_affected_rows($koneksi);
	    return $row;
	}

  // fungsi untuk upload gambar
  function upload(){

  	$namaFile= $_FILES['gambar']['name'];
  	$ukuranFile= $_FILES['gambar']['size'];
  	$eror= $_FILES['gambar']['error'];
  	// tempat simpan sementara gamabr
  	$tmpName= $_FILES['gambar']['tmp_name'];

  	//cek yang diupload gamabr atau bukan
  	$ekstensiGambarValid = ['jpg','jpeg','png'];
  	$ekstensiGambar = explode('.', $namaFile);
  	// explode = fungsi php untuk memecah string menjadi array
  	// delimiter = pemisah
  	$ekstensiGambar = strtolower(end($ekstensiGambar)); 
  	//end= index terakhir
  	// strtolower = agar extensinya jadi huruf kecil
  	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
  		// echo "<script>
  		// 		alert('Yang anda upload bukan gambar!');
  		// 	  </script>";
  		return -3;
  	}

  	// cek jika ukurannya terlalu besar (ukuran dalam byte)
  	// yang lebih dari 2 mb bakal jadi 0
  	if($ukuranFile == 0){
  		
  		return -4;
  	}

  	//lolos pengecekan, gambar siap upload
  	//buat nama gamabr baru agar tidak sama dengan yang lain
  	$namaFileBaru= uniqid();
  	$namaFileBaru .= '.';
  	$namaFileBaru .=$ekstensiGambar;
  	move_uploaded_file($tmpName, '../assets/eviden_sales/'.$namaFileBaru);
  	return $namaFileBaru;
  }

 ?>