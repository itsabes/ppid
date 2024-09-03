<!doctype html>
<html>

<head>
    <title>Jawaban Permohonan Informasi Publik</title>
    <!--<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>-->
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
    <h3>Jawaban Permohonan Informasi Publik</h3>
    <table class="word-table">
        <tr>
            <th>No</th>
            <th>Nomor Permohonan</th>
            <th>Kategori</th>
            <th>Nama Pemohon</th>
            <th>Rincian Informasi</th>
            <th>Tanggal Permohonan</th>
            <th>Disposisi Bidang</th>
            <th>Disposisi Sie/SubBag</th>
            <th>Jawaban</th>
            <th>Status Permohonan</th>
        </tr><?php
                foreach ($formulir_data as $formulir) {
                ?>
            <tr>
                <td><?= ++$start ?></td>
                <td><?= $formulir->Nomor ?></td>
                <td><?= $formulir->Kategori ?></td>
                <td><?= $formulir->Nama ?></td>
                <td><?= $formulir->RincianInformasi ?></td>
                <td><?= $formulir->CreatedDate ?></td>
                <td><?= $formulir->Bidang ?></td>
                <td><?= $formulir->Seksi ?></td>
                <td><?= $formulir->Response ?></td>
                <td><?= status_permohonan($formulir->Status) ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>