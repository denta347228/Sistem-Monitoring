<?php 
    require 'functionA.php';
    $sql1="SELECT * FROM data_sales JOIN user JOIN data_verifikasi JOIN data_survey JOIN teknisi JOIN user AS `userteknisi` JOIN user AS `userverifikator` ON id_salesforce=user.id_user AND data_sales.id_sales=data_verifikasi.id_sales AND data_sales.id_sales=data_survey.id_sales AND data_survey.id_teknisi=teknisi.id_teknisi AND teknisi.id_user=userteknisi.id_user AND data_verifikasi.id_verifikator=userverifikator.id_user WHERE status_verifikasi !=1";
    $result1=mysqli_query($koneksi,$sql1);
    
    // EXPORT KE EXCEL
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment;  filename=data_verifikasi_Invalid.xls");
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
                <th colspan="7"><h2>Hasil Data Verifikasi Invalid</h2></th>
            </tr>
            <tr>
                <th rowspan="2" style="padding-bottom: 25px;">No.</th>
                <th rowspan="2" style="padding-bottom: 25px;">Sales</th>
                <th rowspan="2" style="padding-bottom: 25px;">Survey</th>
                <th rowspan="2" style="padding-bottom: 25px;">Verifikasi</th>
                <th rowspan="2" style="padding-bottom: 25px;">Eviden</th>
                <th colspan="2">Status</th>
            </tr>
            <tr>
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
                                        <td><b>No KTP : </b><?php echo $data1['2']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama : </b><?php echo $data1['3']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kontak : </b><?php echo $data1['4']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Koordinat : </b><?php echo $data1['5']; ?></td>
                                    </tr>
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
                                        <td><b>Sales Force : </b><?php echo $data1['15']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Assign Date : </b><?php echo $data1['assignment_update']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Keterangan : </b><?php echo $data1['6']; ?></td>
                                    </tr>
                                </table>
                            </td>

                            <td>
                                <table>
                                    <tr>
                                        <td><b>No KTP : </b><?php echo $data1['29']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama : </b><?php echo $data1['30']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kontak : </b><?php echo $data1['31']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Koordinat : </b><?php echo $data1['32']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Survey Date : </b><?php echo $data1['survey_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Teknisi : </b><?php echo $data1['45']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Keterangan : </b><?php echo $data1['33']; ?></td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td><b>Verif Date : </b><?php echo $data1['tanggal_verifikasi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Verifikator : </b><?php echo $data1['51']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Keterangan : </b><?php echo $data1['23']; ?></td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td><b>Eviden Sales : </b><?php echo $data1['eviden_sales']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Eviden Survey : </b><?php echo $data1['eviden_survey']; ?></td>
                                    </tr>
                                </table>
                            </td>
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