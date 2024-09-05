<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<br><br>
<h2 style="text-align: center;font-family: Calibri;font-size: 35px">PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI<br>RSUD SAWAH BESAR</h2>
<h2 style="text-align: center;font-family: Calibri;font-size: 30px">REKAP FORMULIR PERMOHONAN INFORMASI (ONLINE)</h2>
<br><br>
<table cellspacing="0" cellpadding="2" >
    <tr style="text-align: center;font-family: Calibri;font-size: 28px">
        <td>Nomor</td>
        <td>Kategori</td>
        <th>Nama</th>
        <td>Alamat</td>
        <td>Email</td>
        <td>No Telepon</td>
        <td>Pekerjaan</td>
        <td>Tanggal dan Waktu Permohonan</td>
    </tr>
    <?php
    $start = 0;
    foreach ($formulir_data as $formulir)
    {
    ?>
    <tr style="text-align: left;font-family: Calibri;font-size: 28px">
        <!--<td><?= date("Y").sprintf("%05d", $formulir->Nomor) ?></td>-->
        <td><?= $formulir->Nomor ?></td>
        <td><?= $formulir->Kategori ?></td>
        <td><?= $formulir->Nama ?></td>
        <td><?= $formulir->Alamat ?></td>
        <td><?= $formulir->Email ?></td>
        <td><?= $formulir->NoTelp ?></td>
        <td><?= $formulir->Pekerjaan ?></td>
        <td><?= $formulir->CreatedDate ?></td>
    </tr>
    <?php
    }
    ?>
</table>