<?php 
    require 'functionA.php';
    $sql1="SELECT * FROM data_sales JOIN data_survey JOIN teknisi JOIN user ON data_sales.id_sales = data_survey.id_sales AND data_survey.id_teknisi = teknisi.id_teknisi AND teknisi.id_user=user.id_user";
    $result1=mysqli_query($koneksi,$sql1);
    
    // EXPORT KE EXCEL
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment;  filename=data_survey.xls");
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
                <th colspan="7"><h2>Data Survey</h2></th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Hasil Survei</th>
                <th>Data Sales</th>
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
                                    <tr>
                                          <td><b>Survey Date : </b><?php echo $data1['survey_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Teknisi : </b><?php echo $data1['username']; ?></td>
                                    </tr>
                                </table>
                            </td>

                            <td>
                                <table>
                                    <tr>
                                        <td><b>Order Date : </b><?php echo $data1['order_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>STO : </b>
                                            <?php  
                                                if ($data1['7'] == 1) {
                                                   echo "BKS";
                                                } elseif ($data1['7'] == 2) {
                                                    echo "KTU";
                                                } elseif ($data1['7'] == 3) {
                                                    echo "PGC";
                                                } elseif ($data1['7'] == 4) {
                                                    echo "SBU";
                                                } elseif ($data1['7'] == 5) {
                                                    echo "SGB";
                                                } elseif ($data1['7'] == 6) {
                                                    echo "SRO";
                                                } elseif ($data1['7'] == 7) {
                                                    echo "TLK";
                                                } elseif ($data1['7'] == 8) {
                                                    echo "PLJ";
                                                } else {
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
                                        <td><b>Assign Date : </b><?php echo $data1['assignment_update']; ?></td>
                                    </tr>
                                </table>
                            </td>

                            <td><center><?php echo $data1['keterangan']; ?></center></td>
                            <td><center><?php echo $data1['eviden_survey']; ?></center></td>
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