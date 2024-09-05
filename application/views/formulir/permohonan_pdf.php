<style>
    table {
        width: 100%;
    }
</style>
<br><br>
<h2 style="text-align: center;font-family: Calibri;font-size: 40px">PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI<br>RSUD SAWAH BESAR</h2>
<h2 style="text-align: center;font-family: Calibri;font-size: 38px">FORMULIR PERMOHONAN INFORMASI (ONLINE)</h2>
<!--<p style="text-align: center;font-family: Calibri;font-size: 30px">No. Pendaftaran : <?= date("Y") . sprintf("%05d", $formulir->Nomor) ?></p>-->
<p style="text-align: center;font-family: Calibri;font-size: 30px">No. Pendaftaran : <?= $formulir->Nomor ?></p>
<br><br><br>
<table cellspacing="0" cellpadding="2" style="text-align: left;font-family: Calibri;font-size: 30px">
    <tr>
        <td>Tujuan Informasi</td>
        <td width="2%">:</td>
        <td width="60%"><?= $formulir->TujuanInformasi ?></td>
    </tr>
    <tr>
        <td>Tanggal dan Waktu Pendaftaran</td>
        <td width="2%">:</td>
        <td width="60%"><?= $formulir->CreatedDate ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $formulir->Nama ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?= $formulir->NIK ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td style="text-align: justify"><?= $formulir->Alamat ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td><?= $formulir->Email ?></td>
    </tr>
    <tr>
        <td>No Telepon</td>
        <td>:</td>
        <td><?= $formulir->NoTelp ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?= $formulir->Pekerjaan ?></td>
    </tr>
    <tr>
        <td>Rincian Informasi</td>
        <td>:</td>
        <td style="text-align: justify" ;><?= $formulir->RincianInformasi ?></td>
    </tr>
    <tr>
        <td>Cara Memperoleh</td>
        <td>:</td>
        <td><?= $formulir->CaraMemperoleh ?></td>
    </tr>
    <tr>
        <td>Apakah Mendapat Salinan?</td>
        <td>:</td>
        <td><?= $formulir->Salinan ?></td>
    </tr>
    <tr>
        <td>Cara Mendapat Salinan</td>
        <td>:</td>
        <td><?= $formulir->CaraDapatSalinan ?></td>
    </tr>
</table>