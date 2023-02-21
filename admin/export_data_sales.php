<?php 
    require 'functionA.php';
      $sql1="SELECT * FROM data_sales JOIN user ON id_salesforce=id_user";
    $result1=mysqli_query($koneksi,$sql1);
    
    // EXPORT KE EXCEL
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment;  filename=data_sales.xls");
    // pragma = no-cache agar saat export excel browser tidak terus menyimpan cache setiap kita melakukan export ke excel
    header("Pragma: no-cache");
    // untuk memberi nilai nol pada cache
    header("Expires: 0");
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Export Data</title>
</head>
<body>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th colspan="7"><h2>Data Sales</h2></th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Pelanggan</th>
                <th>Sales</th>
                <th>Keterangan</th>
                <th>Eviden</th>
                <th>Survey</th>
                <th>Verifikasi</th>
            </tr>
        </thead>
        <tbody>
            <tbody>
                <?php 
                    $i=1;
                    while ($data1=mysqli_fetch_array($result1)) {
                         # code...
                ?>
                        <tr>
                            <td style="vertical-align: center;"><center><?php echo $i; ?></center></td>
                            <td>
                                <table >
                                    <tr>
                                        <td><b>No KTP : </b><?php echo $data1['ktp_pelanggan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama : </b><?php echo $data1['nama_pelanggan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kontak : </b><?php echo $data1['kontak_pelanggan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Koordinat : </b><?php echo $data1['koordinat_pelanggan']; ?></td>
                                    </tr>
                                </table>
                            </td>

                            <td>
                                <table>

                                    <tr>
                                        <td><b>Tanggal : </b><?php echo $data1['order_date']; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>STO : </b>
                                            <?php  
                                                if ($data1['sto'] == 1) {
                                                   echo "BKS";
                                                } elseif ($data1['sto'] == 2) {
                                                    echo "KTU";
                                                } elseif ($data1['sto'] == 3) {
                                                    echo "PGC";
                                                } elseif ($data1['sto'] == 4) {
                                                    echo "SBU";
                                                } elseif ($data1['sto'] == 5) {
                                                    echo "SGB";
                                                } elseif ($data1['sto'] == 6) {
                                                    echo "SRO";
                                                } elseif ($data1['sto'] == 7) {
                                                    echo "TLK";
                                                } elseif ($data1['sto'] == 8) {
                                                    echo "PLJ";
                                                }  else {
                                                    echo "-";
                                                }
                                            ?>  
                                        </td>
                                    </tr>

                                    <tr>
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

                                    <tr>
                                        <td><b>Sales Force : </b><?php echo $data1['username']; ?></td>
                                    </tr>

                                </table>
                            </td>

                            <td><center><?php echo $data1['keterangan']; ?></center></td>
                            <td><center><?php echo $data1['eviden_sales']; ?></center></td>
                            <td> 
                                <?php 
                                    if ($data1['status_survei'] == '0') {
                                       echo "Queued";
                                    } elseif ($data1['status_survei'] == '99') {
                                        echo "Assigned";
                                    } elseif ($data1['status_survei'] == '1') {
                                        echo "Done";
                                    } elseif ($data1['status_survei'] == '2') {
                                        echo "Kendala Pelanggan";
                                    } elseif ($data1['status_survei'] == '3') {
                                        echo "Kendala Teknis";
                                    } else {
                                        echo "-";
                                    }
                                ?>                                            
                            </td>
                            <td>
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
</body>
</html>