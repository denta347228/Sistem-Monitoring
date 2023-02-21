<?php 
    require '../koneksi/koneksi.php';

    session_start();
    $username=$_SESSION['username'];
    $id_user=$_SESSION['id_user'];
    if(!isset($_SESSION['login'])){
        header('Location: ../login/login.php');
        exit;
    }

    function update($data){
      global $koneksi;
      
        $id_survey=$data['id_survey'];
        $noktp = $data['noktp'];
        $nama = htmlspecialchars($data['nama']);
        $kontak = $data['kontak'];
        $koordinat = htmlspecialchars($data['koordinatpelanggan']);
        $keterangan = htmlspecialchars($data['keterangan']);
        $status = $data['status'];
        $gmbr= $data['tambah'];

        // upload
        $gambar=upload();
        if($gambar== -3){
            return -3;
        }else if($gambar== -4){
            return -4;
        }

        if ($gambar== -2) {
            $masuk="UPDATE  data_survey set ktp_pelanggan = '$noktp', nama_pelanggan = '$nama', kontak_pelanggan = '$kontak', koordinat_pelanggan = '$koordinat', keterangan='$keterangan' WHERE id_survey='$id_survey'";
        }else{
            $masuk="UPDATE  data_survey set ktp_pelanggan = '$noktp', nama_pelanggan = '$nama', kontak_pelanggan = '$kontak', koordinat_pelanggan = '$koordinat', keterangan='$keterangan', eviden_survey='$gambar' WHERE id_survey='$id_survey'";
            unlink("../assets/eviden_survey/".$gmbr);

        }
            
        $result=mysqli_query($koneksi,$masuk);
        $row = mysqli_affected_rows($koneksi);

        $sql2="SELECT * FROM data_survey WHERE id_survey='$id_survey'";
        $result2=mysqli_query($koneksi,$sql2);
        $data2=mysqli_fetch_array($result2);
        $id_sales=$data2['id_sales'];

        $update="UPDATE data_sales SET status_survei='$status' WHERE id_sales='$id_sales'";
        $result1=mysqli_query($koneksi,$update);
        
        return $row;
    }

  // fungsi untuk upload gambar
  function upload(){

    $namaFile= $_FILES['gambar']['name'];
    $ukuranFile= $_FILES['gambar']['size'];
    $eror= $_FILES['gambar']['error'];
    // tempat simpan sementara gamabr
    $tmpName= $_FILES['gambar']['tmp_name'];

    if($eror === 4 ){
        return -2;
    }

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
        //      alert('Yang anda upload bukan gambar!');
        //    </script>";
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
    move_uploaded_file($tmpName, '../assets/eviden_survey/'.$namaFileBaru);
    return $namaFileBaru;
  }

    function validasi($data1){
        global $koneksi;
        global $id_user;

        $valid = $data1['valid'];
        $keterangan= htmlspecialchars($data1['keterangan']);
        $id_sales=$data1['validasi'];

        $sql="SELECT id_survey FROM data_survey WHERE id_sales='$id_sales'";
        $hasil=mysqli_query($koneksi,$sql);
        $data2=mysqli_fetch_array($hasil);

        $id_survey=$data2['id_survey'];

        $sql2="SELECT id_sales, id_survey FROM data_verifikasi WHERE id_sales='$id_sales' AND id_survey='$id_survey'";
        $hasil2=mysqli_query($koneksi,$sql2);
        $cek=mysqli_num_rows($hasil2);
        //cek
        if($cek>0){
            return -2;
        }    
            
        $masuk="INSERT INTO data_verifikasi (id_sales, id_survey, keterangan, id_verifikator, tanggal_verifikasi) VALUES ('$id_sales','$id_survey','$keterangan','$id_user', NOW())";
        $result=mysqli_query($koneksi,$masuk);
        $row = mysqli_affected_rows($koneksi);

        if ($row>0) {
           $status="UPDATE data_sales SET status_verifikasi='$valid' WHERE id_sales='$id_sales'";
           $hasil3=mysqli_query($koneksi,$status);

        }
        
        return $row;
    }

    function update1($data){
      global $koneksi;
      global $id_user;
        
        $id_verifikasi=$data['validasi'];
        $keterangan = htmlspecialchars($data['keterangan']);
        $status = $data['valid'];

        $masuk="UPDATE  data_verifikasi set keterangan = '$keterangan', tanggal_verifikasi=NOW(), id_verifikator='$id_user' WHERE id_verifikasi='$id_verifikasi'"; 
        $result=mysqli_query($koneksi,$masuk);

        $sql2="SELECT id_sales FROM data_verifikasi WHERE id_verifikasi='$id_verifikasi'";
        $result2=mysqli_query($koneksi,$sql2);
        $data2=mysqli_fetch_array($result2);
        $id_sales=$data2['id_sales'];

        $masuk1="UPDATE  data_sales set status_verifikasi = '$status' WHERE id_sales='$id_sales'"; 
        $result3=mysqli_query($koneksi,$masuk1);

        $row = mysqli_affected_rows($koneksi);
        
        return $row;
    }

    function update2($data){
      global $koneksi;
        
        $id_sales=$data['id_sales'];
        $noktp = $data['noktp'];
        $nama = htmlspecialchars($data['nama']);
        $nohp = $data ['nohp'];
        $koordinat = htmlspecialchars($data['koordinatpelanggan']);
        $keterangan = htmlspecialchars($data['keterangan']);
        $gmbr= $data['tambah'];
        $input=$data['metode'];
        $STO=$data['sto'];


        // upload
        $gambar=upload2();
        if($gambar== -3){
            return -3;
        }else if($gambar== -4){
            return -4;
        }

        if ($gambar== -2) {
            $masuk="UPDATE  data_sales set ktp_pelanggan = '$noktp', nama_pelanggan = '$nama',  kontak_pelanggan = '$nohp', koordinat_pelanggan = '$koordinat', keterangan='$keterangan', metode_input='$input', sto='$STO ' WHERE id_sales='$id_sales'";
        }else{
            $masuk="UPDATE  data_sales set ktp_pelanggan = '$noktp', nama_pelanggan = '$nama', kontak_pelanggan = '$nohp', koordinat_pelanggan = '$koordinat', keterangan='$keterangan',metode_input='$input', sto='$STO', eviden_sales='$gambar' WHERE id_sales='$id_sales'";
            unlink("../assets/eviden_sales/".$gmbr);

        }
            
        $result=mysqli_query($koneksi,$masuk);
        $row = mysqli_affected_rows($koneksi);

        $sql2="SELECT * FROM data_sales WHERE id_sales='$id_sales'";
        $result2=mysqli_query($koneksi,$sql2);
        $data2=mysqli_fetch_array($result2);
        $id_sales=$data2['id_sales'];

        return $row;

        }

    function upload2(){

        $namaFile= $_FILES['gambar']['name'];
        $ukuranFile= $_FILES['gambar']['size'];
        $eror= $_FILES['gambar']['error'];
        // tempat simpan sementara gamabr
        $tmpName= $_FILES['gambar']['tmp_name'];

        if($eror === 4 ){
            return -2;
        }

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
            //      alert('Yang anda upload bukan gambar!');
            //    </script>";
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

    function qsales(){
        global $koneksi;

        $sql="SELECT sto ,COUNT(id_sales) AS `jumlah` FROM data_sales GROUP BY sto";
        $result=mysqli_query($koneksi,$sql);

        $hasil=[];
        while ($data=mysqli_fetch_array($result)) {
            if($data['sto']==1){
                $hasil[0]=$data['jumlah'];
            }else if($data['sto']==2){
                $hasil[1]=$data['jumlah'];
            }else if($data['sto']==3){
                $hasil[2]=$data['jumlah'];
            }else if($data['sto']==4){
                $hasil[3]=$data['jumlah'];
            }else if($data['sto']==5){
                $hasil[4]=$data['jumlah'];
            }else if($data['sto']==6){
                $hasil[5]=$data['jumlah'];
            }else if($data['sto']==7){
                $hasil[6]=$data['jumlah'];
            }else if($data['sto']==8){
                $hasil[7]=$data['jumlah'];
            }
        }


        return $hasil;
    }

    function qsurvey($data){
        global $koneksi;

        $sql="SELECT sto,COUNT(id_sales) AS `jumlah` FROM data_sales WHERE status_survei='$data' GROUP BY sto";
        $result=mysqli_query($koneksi,$sql);

        $hasil=[];
        while ($data=mysqli_fetch_array($result)) {
            if($data['sto']==1){
                $hasil[0]=$data['jumlah'];
            }else if($data['sto']==2){
                $hasil[1]=$data['jumlah'];
            }else if($data['sto']==3){
                $hasil[2]=$data['jumlah'];
            }else if($data['sto']==4){
                $hasil[3]=$data['jumlah'];
            }else if($data['sto']==5){
                $hasil[4]=$data['jumlah'];
            }else if($data['sto']==6){
                $hasil[5]=$data['jumlah'];
            }else if($data['sto']==7){
                $hasil[6]=$data['jumlah'];
            }else if($data['sto']==8){
                $hasil[7]=$data['jumlah'];
            }
        }
        return $hasil;
    }

    function qverif($data){
        global $koneksi;

        $sql="SELECT sto,COUNT(id_sales) AS `jumlah` FROM data_sales WHERE status_verifikasi='$data' GROUP BY sto";
        $result=mysqli_query($koneksi,$sql);

        $hasil=[];
        while ($data=mysqli_fetch_array($result)) {
            if($data['sto']==1){
                $hasil[0]=$data['jumlah'];
            }else if($data['sto']==2){
                $hasil[1]=$data['jumlah'];
            }else if($data['sto']==3){
                $hasil[2]=$data['jumlah'];
            }else if($data['sto']==4){
                $hasil[3]=$data['jumlah'];
            }else if($data['sto']==5){
                $hasil[4]=$data['jumlah'];
            }else if($data['sto']==6){
                $hasil[5]=$data['jumlah'];
            }else if($data['sto']==7){
                $hasil[6]=$data['jumlah'];
            }else if($data['sto']==8){
                $hasil[7]=$data['jumlah'];
            }
        }
        return $hasil;
    }
    
    function qverif_queued(){
        global $koneksi;

        $sql="SELECT sto,COUNT(id_sales) AS `jumlah` FROM data_sales WHERE status_verifikasi=0 AND status_survei=1 GROUP BY sto";
        $result=mysqli_query($koneksi,$sql);

        $hasil=[];
        while ($data=mysqli_fetch_array($result)) {
            if($data['sto']==1){
                $hasil[0]=$data['jumlah'];
            }else if($data['sto']==2){
                $hasil[1]=$data['jumlah'];
            }else if($data['sto']==3){
                $hasil[2]=$data['jumlah'];
            }else if($data['sto']==4){
                $hasil[3]=$data['jumlah'];
            }else if($data['sto']==5){
                $hasil[4]=$data['jumlah'];
            }else if($data['sto']==6){
                $hasil[5]=$data['jumlah'];
            }else if($data['sto']==7){
                $hasil[6]=$data['jumlah'];
            }else if($data['sto']==8){
                $hasil[7]=$data['jumlah'];
            }
        }
        return $hasil;
    }

 ?>