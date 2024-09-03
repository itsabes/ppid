<style>
    div.uppercase {
        text-transform: uppercase;
    }

    div.lowercase {
        text-transform: lowercase;
    }

    div.capitalize {
        text-transform: capitalize;
    }

    .box-header {
        text-align: center;
    }
</style>

<div class="container">
    <section class='content'>
        <div class='row'>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class='box-header with-border'>
                        <h3 class="box-title">
                            <div class="row">
                                <h2><strong>Daftar Unit Kerja Perangkat Daerah (UKPD) dan Unit Pelaksana Teknis (UPT) <br>
                                        Dinas Kesehatan Provinsi DKI Jakarta</strong>
                                </h2>
                                <img src="<?= base_url('upload/image/logo-dki-kecil.png'); ?>" alt="">
                                <h3><strong>DINAS KESEHATAN PROVINSI DKI JAKARTA</strong></h3>
                                <h4>Jalan Kesehatan Nomor 10 Jakarta Pusat<br>
                                    Tlp: 021-3451338 Fax: 021-3451341 Email: dinkes@jakarta.go.id
                                </h4>
                            </div>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class='box-body'>
                        <h3 class="text-center"><b>Suku Dinas Kesehatan</b></h3>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <p>Download</p> <a href="<?= base_url('unitkerja/exportexcelsudin') ?>" class="btn btn-success btn-sm btn-flat" id="export-excel"><i class="fa fa-file-excel"></i> Excel</a>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>Kedudukan</p> <button onclick="addClick('sudin')" type="button" class="btn btn-info btn-sm btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                            </div>
                        </div>
                        <br>
                        <div id="data_content" class="table-responsive">
                            <table class="table " id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unit Kerja</th>
                                        <th>Telepon</th>
                                        <th>Faximile</th>
                                        <th>Alamat</th>
                                        <th>Website Unit Kerja</th>
                                        <th>Website PPID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($sudin_data as $sudin) {
                                    ?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $sudin->NamaUk; ?></td>
                                            <td><?= $sudin->Telepon; ?></td>
                                            <td><?= $sudin->Faximile; ?></td>
                                            <td><?= $sudin->Alamat; ?></td>
                                            <td><a href="<?= $sudin->WebUnitKerja; ?>" target="_blank"><?= $sudin->WebUnitKerja; ?></a></td>
                                            <td><a href="<?= $sudin->WebPpid; ?>" target="_blank"><?= $sudin->WebPpid; ?></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class='box-body'>
                        <h3 class="text-center"><b>Unit Pelaksana Teknis (UPT)</b></h3>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <p>Download</p> <a href="<?= base_url('unitkerja/exportexcelupt') ?>" class="btn btn-success btn-sm btn-flat" id="export-excel"><i class="fa fa-file-excel"></i> Excel</a>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>Kedudukan</p> <button onclick="addClick('upt')" type="button" class="btn btn-info btn-sm btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                            </div>
                        </div>
                        <br>
                        <div id="data_content" class="table-responsive">
                            <table class="table " id="table2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unit Kerja</th>
                                        <th>Telepon</th>
                                        <th>Faximile</th>
                                        <th>Alamat</th>
                                        <th>Website Unit Kerja</th>
                                        <th>Website PPID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($upt_data as $sudin) {
                                    ?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $sudin->NamaUk; ?></td>
                                            <td><?= $sudin->Telepon; ?></td>
                                            <td><?= $sudin->Faximile; ?></td>
                                            <td><?= $sudin->Alamat; ?></td>
                                            <td><a href="<?= $sudin->WebUnitKerja; ?>" target="_blank"><?= $sudin->WebUnitKerja; ?></a></td>
                                            <td><a href="<?= $sudin->WebPpid; ?>" target="_blank"><?= $sudin->WebPpid; ?></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class='box-body'>
                        <h3 class="text-center"><b>Rumah Sehat Jakarta</b></h3>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <p>Download</p> <a href="<?= base_url('unitkerja/exportexcelrsud') ?>" class="btn btn-success btn-sm btn-flat" id="export-excel"><i class="fa fa-file-excel"></i> Excel</a>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>Kedudukan</p> <button onclick="addClick('rsud')" type="button" class="btn btn-info btn-sm btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                            </div>
                        </div>
                        <br>
                        <div id="data_content" class="table-responsive">
                            <table class="table " id="table3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unit Kerja</th>
                                        <th>Telepon</th>
                                        <th>Faximile</th>
                                        <th>Alamat</th>
                                        <th>Website Unit Kerja</th>
                                        <th>Website PPID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($rsud_data as $sudin) {
                                    ?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $sudin->NamaUk; ?></td>
                                            <td><?= $sudin->Telepon; ?></td>
                                            <td><?= $sudin->Faximile; ?></td>
                                            <td><?= $sudin->Alamat; ?></td>
                                            <td><a href="<?= $sudin->WebUnitKerja; ?>" target="_blank"><?= $sudin->WebUnitKerja; ?></a></td>
                                            <td><a href="<?= $sudin->WebPpid; ?>" target="_blank"><?= $sudin->WebPpid; ?></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class='box-body'>
                        <h3 class="text-center"><b>Puskesmas</b></h3>

                        <div class="row">
                            <div class="col-md-6 text-right">
                                <p>Download</p> <a href="<?= base_url('unitkerja/exportexcelpkc') ?>" class="btn btn-success btn-sm btn-flat" id="export-excel"><i class="fa fa-file-excel"></i> Excel</a>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>Kedudukan</p> <button onclick="addClick('puskes')" type="button" class="btn btn-info btn-sm btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                            </div>
                        </div>
                        <br>
                        <div id="data_content" class="table-responsive">
                            <table class="table " id="table4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unit Kerja</th>
                                        <th>Telepon</th>
                                        <th>Faximile</th>
                                        <th>Alamat</th>
                                        <th>Website Unit Kerja</th>
                                        <th>Website PPID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($pkc_data as $sudin) {
                                    ?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $sudin->NamaUk; ?></td>
                                            <td><?= $sudin->Telepon; ?></td>
                                            <td><?= $sudin->Faximile; ?></td>
                                            <td><?= $sudin->Alamat; ?></td>
                                            <td><a href="<?= $sudin->WebUnitKerja; ?>" target="_blank"><?= $sudin->WebUnitKerja; ?></a></td>
                                            <td><a href="<?= $sudin->WebPpid; ?>" target="_blank"><?= $sudin->WebPpid; ?></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL START -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Kedudukan</h3>
            </div>
            <div class="modal-body">
                <h4 id="text-kedudukan"></h4>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;KEMBALI</a>
            </div>
        </div>
    </div>
</div>
<!-- MODAL END -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#table1").DataTable({
            "lengthMenu": [
                [10, 30, 40, 50, -1],
                [10, 30, 40, 50, "All"]
            ],
            "bPaginate": true,
            // "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": false,
            "ordering": false,
            "searching": true,
            "responsive": true
        });

        $("#table2").DataTable({
            "lengthMenu": [
                [10, 30, 40, 50, -1],
                [10, 30, 40, 50, "All"]
            ],
            "bPaginate": true,
            // "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": false,
            "ordering": false,
            "searching": true,
            "responsive": true
        });

        $("#table3").DataTable({
            "lengthMenu": [
                [10, 30, 40, 50, -1],
                [10, 30, 40, 50, "All"]
            ],
            "bPaginate": true,
            // "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": false,
            "ordering": false,
            "searching": true,
            "responsive": true
        });

        $("#table4").DataTable({
            "lengthMenu": [
                [10, 30, 40, 50, -1],
                [10, 30, 40, 50, "All"]
            ],
            "bPaginate": true,
            // "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": false,
            "ordering": false,
            "searching": true,
            "responsive": true
        });
    });

    function addClick(id) {
        switch (id) {
            case 'sudin':
                $("#text-kedudukan").html(`
                <b>1.	SUKU DINAS KESEHATAN KOTA ADMINISTRASI</b>
                <br>
                Suku Dinas Kota Administrasi dipimpin oleh Kepala Suku Dinas Kota Administrasi. Kepala Suku Dinas Kota Administrasi berkedudukan di bawah dan bertanggungjawab kepada Kepala Dinas Kesehatan. Dalam melaksanakan tugas, Suku Dinas Kota Administrasi berkoordinasi dengan Walikota.
                <br><br>
              
                <b>2.	SUKU DINAS KESEHATAN KABUPATEN ADMINISTRASI</b>
                <br>
                Suku Dinas Kabupaten Administrasi dipimpin oleh Kepala Suku Dinas Kabupaten Administrasi. Kepala Suku Dinas Kabupaten Administrasi berkedudukan di bawah dan bertanggungjawab kepada Kepala Dinas Kesehatan. Dalam melaksanakan tugas, Suku Dinas Kabupaten Administrasi berkoordinasi dengan Bupati.
                `);
                break;
            case 'upt':
                $("#text-kedudukan").html(`
                <b>1. LABORATORIUM KESEHATAN DAERAH</b>
                <br>
                Laboratorium Kesehatan Daerah dipimpin oleh Kepala Pusat Laboratorium Kesehatan Daerah. Kepala Pusat Laboratorium Kesehatan Daerah berkedudukan di bawah dan bertanggungjawab kepada Kepala Dinas Kesehatan.
                <br><br>

                <b>2. PUSAT PELAYANAN KESEHATAN PEGAWAI</b>
                <br>
                Pusat Pelayanan Kesehatan Pegawai dipimpin oleh Kepala Pusat Pelayanan Kesehatan Pegawai. Kepala Pusat Pelayanan Kesehatan Pegawai berkedudukan di bawah dan bertanggungjawab kepada Kepala Dinas Kesehatan.
                <br><br>

                <b>3. UNIT PENGELOLA JAMINAN KESEHATAN JAKARTA</b>
                <br>
                Unit Pengelola Jaminan Kesehatan Jakarta dipimpin oleh Kepala Unit Pengelola Jaminan Kesehatan Jakarta. Kepala Unit Pengelola Jaminan Kesehatan Jakarta berkedudukan di bawah dan bertanggungjawab kepada Kepala Dinas Kesehatan.
                <br><br>

                <b>4. PUSAT KRISIS DAN KEGAWATDARURATAN KESEHATAN DAERAH</b>
                <br>
                Pusat Pelatihan Kesehatan Daerah dipiPusat Krisis dan Kegawatdaruratan Kesehatan Daerah dipimpin oleh Kepala Pusat Krisis dan Kegawatdaruratan Kesehatan Daerah. Kepala Pusat Krisis dan Kegawatdaruratan Kesehatan Daerah berkedudukan di bawah dan bertanggungjawab kepada Kepala Dinas Kesehatan.
                <br><br>

                <b>5. PUSAT PELATIHAN KESEHATAN DAERAH</b>
                <br>
                Pusat Pelatihan Kesehatan Daerah dipimpin oleh Kepala Pusat Pelatihan Kesehatan Daerah. Kepala Pusat Pelatihan Kesehatan Daerah berkedudukan di bawah dan bertanggungjawab kepada Kepala Dinas Kesehatan.
                <br><br>
                `);
                break;
            case 'rsud':
                $("#text-kedudukan").text('RSUD  merupakan unit organisasi bersifat khusus yang memberikan layanan secara profesional dalam penyelenggaraan pelayanan kesehatan perorangan. RSUD berkedudukan dibawah dan bertanggung jawab kepada Kepala Dinas. RSUD dipimpin oleh seorang Direktur.');
                break;
            case 'puskes':
                $("#text-kedudukan").text('Puskesmas berkedudukan sebagai Unit Pelaksana Teknis Dinas dalam pelaksanaan pelayanan kesehatan yang menyelenggarakan UKM dan UKP tingkat pertama dengan lebih mengutamakan upaya promotif dan preventif di wilayah kerjanya. Puskesmas dipimpin oleh seorang Kepala Puskesmas. Kepala Puskesmas merupakan pejabat fungsional tenaga kesehatan kategori keahlian yang diberikan tugas tambahan sebagai Kepala Puskesmas. Kepala Puskesmas berkedudukan di bawah dan bertanggung jawab kepada Kepala Dinas melalui Kepala Suku Dinas.');
                break;
        }

        $("#mymodal").modal('show');
    }
</script>