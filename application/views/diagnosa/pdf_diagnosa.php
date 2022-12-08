<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
        }
    </style>
    <h3>
        <center>Bukti Transaksi Service</center>
    </h3>
    <?php
    $invoice = '500000' + $id;
    ?>
    <h4><b>Invoice :</b> <?= $invoice ?></h4>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th style="width: 30%;">List</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><b>Nama</b></td>
                <td><?= $nama ?></td>
            </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td><?= $alamat ?></td>
            </tr>
            <tr>
                <td><b>Nomor Telpon</b></td>
                <td><?= $nomor_tlp ?></td>
            </tr>
            <tr>
                <td><b>Tipe</b></td>
                <td><?= $type ?></td>
            </tr>
            <tr>
                <td s><b>Judul</b></td>
                <td><?= $judul ?></td>
            </tr>
            <tr>
                <td s><b>Keluhan</b></td>
                <td><?= $deskripsi ?></td>
            </tr>
            <tr>
                <td s><b>Solusi</b></td>
                <td><?= $solusi ?></td>
            </tr>
            <tr>
                <td><b>Total</b></td>
                <td>Rp.<?= $total_harga ?>,00</td>
            </tr>
            <tr>
                <td s><b>Metode Kirim</b></td>
                <td><?= $metode_kirim ?></td>
            </tr>
            <tr>
                <td><b>Metode Pembayaran</b></td>
                <td><?= $metode_pembayaran ?></td>
            </tr>
            <tr>
                <td><b>Durasi Pengerjaan</b></td>
                <td><?= $durasi_kerja ?></td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td><?= $status ?></td>
            </tr>
            <tr>
                <?php
                $garansi = date('Y-m-d', strtotime($tanggal_selesai . ' + 3 months'));

                ?>
                <td><b>Kadaluarsa Garansi</b></td>
                <td><?= $garansi ?></td>
            </tr>
            <tr>
                <td><b>Status Garansi</b></td>
                <td><?= $status_garansi ?></td>
            </tr>
            <!-- <tr>
                <td style="height: 500px;"><b>Bukti Pembayaran</b></td>
                <td>
                    <img src="base64,<?php echo $bukti_pembayaran; ?>" alt="...">
                </td>
            </tr> -->
            <!-- <?php
                    if ($total_tambahan == !null) { ?> -->
            <!-- <tr>
                                    <td ><b>Total Tambahan</b></td>
                                    <td><?= $total_tambahan ?></td>
                                </tr> -->
            <!-- <tr>
                <td><b>Bukti Part/Nota</b></td>
                <td><img src="data:image;base64,<?= $bukti_tambahan; ?>" alt="..."></td>
            </tr>
            <tr>
                <td><b>Bukti Pembayaran Kedua</b></td>
                <td><img src="data:;base64,<?php echo $bukti_kedua; ?>" alt="..."></td>
            </tr> -->

            <!-- <?php
                    }

                    ?> -->
        </tbody>
    </table>
</body>

</html>