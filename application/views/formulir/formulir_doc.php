<!doctype html>
<html>

<head>
    <title>Form Permohonan Informasi Publik</title>
    <!--<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>-->
    <style>
        .word-table {
            border: 1px solid black !important;
            border-collapse: collapse !important;
            width: 100%;
        }

        .word-table tr th,
        .word-table tr td {
            border: 1px solid black !important;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h3>Permohonan Informasi Publik</h3>
    <table class="word-table">
        <tr>
            <th>No</th>
            <th>Nomor Permohonan</th>
            <th>Kategori</th>
            <th>Nama Pemohon</th>
            <th>Email</th>
            <th>Rincian Informasi</th>
            <th>Tujuan Penggunaan Informasi</th>
            <th>Tanggal Permohonan</th>
            <th>Jawaban</th>
        </tr><?php
                foreach ($formulir_data as $formulir) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $formulir->Nomor ?></td>
                <td><?php echo $formulir->Kategori ?></td>
                <td><?php echo $formulir->Nama ?></td>
                <td><?php echo $formulir->Email ?></td>
                <td><?php echo $formulir->RincianInformasi ?></td>
                <td><?php echo $formulir->TujuanInformasi ?></td>
                <td><?php echo $formulir->CreatedDate ?></td>
                <td><?php echo $formulir->Response ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>