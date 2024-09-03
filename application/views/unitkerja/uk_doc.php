<!doctype html>
<html>

<head>
    <title>Daftar Unit Kerja Perangkat Daerah (UKPD) dan Unit Pelaksana Teknis (UPT) Dinas Kesehatan Provinsi DKI Jakarta</title>
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
    <h3>Daftar Unit Kerja Perangkat Daerah (UKPD) dan Unit Pelaksana Teknis (UPT) Dinas Kesehatan Provinsi DKI Jakarta</h3>
    <table class="word-table">
        <tr>
            <th>No</th>
            <th>Unit Kerja</th>
            <th>Telepon</th>
            <th>Faximile</th>
            <th>Alamat</th>
            <th>Website Unit Kerja</th>
            <th>Website PPID</th>
        </tr><?php
                foreach ($excel_data as $sudin) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <th><?= $sudin->NamaUk; ?></th>
                <th><?= $sudin->Telepon; ?></th>
                <th><?= $sudin->Faximile; ?></th>
                <th><?= $sudin->Alamat; ?></th>
                <th><?= $sudin->WebUnitKerja; ?></th>
                <th><?= $sudin->WebPpid; ?></th>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>