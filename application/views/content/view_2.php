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

    .table>thead:first-child>tr:first-child>th {
        vertical-align: middle;
    }
</style>

<!-- <div class="container"> -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <div class="col-xs-10">
                        <h3 class="box-title">
                            <div class="uppercase"><?= $Tipe ?></div>
                        </h3>
                    </div>
                    <div class="col-xs-2">
                        <a href="<?= base_url(); ?>upload/content/SK-DIP-Dinkes-No-5-Tahun-2024.pdf" target="_blank" rel="noopener noreferrer">
                            <h3 class="box-title">
                                <div>Download SK DIP</div>
                            </h3>
                        </a>
                    </div>
                </div>
                <div class='box-body'>
                    <div id="data_content" class="table-responsive">
                        <table class="table " id="mytable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Informasi</th>
                                    <th>Ringkasan Isi Informasi</th>
                                    <th>Pejabat/Unit/Satker yang menguasai informasi</th>
                                    <th>Penanggungjawab pembuatan atau penerbitan informasi</th>
                                    <th>Waktu dan tempat pembuatan informasi</th>
                                    <th>Bentuk informasi yang tersedia</th>
                                    <th>Jangka waktu penyimpanan atau retensi arsip</th>
                                    <th>Jenis media yang memuat informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th colspan="3">INFORMASI WAJIB DIUMUMKAN SECARA BERKALA</th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                </tr>
                                <?php foreach ($content_data1 as $content) { ?>
                                    <tr>
                                        <td <?php if ($content->NoContent <> '') {
                                                echo "style:'background-color: #34495E;color: #fff;'";
                                            } ?>>
                                            <?= $content->NoContent ?>
                                        </td>
                                        <?php if ($content->IsiContent == '' && $content->PejabatInformasi == '' && $content->PenanggungJawab == '') { ?>
                                            <td colspan="3"><?= $content->JudulContent ?></td>
                                        <?php } else { ?>
                                            <td><?= $content->JudulContent ?></td>
                                        <?php } ?>
                                        <td><?= $content->IsiContent ?></td>
                                        <td><?= $content->PejabatInformasi ?></td>
                                        <td><?= $content->PenanggungJawab ?></td>
                                        <td><?= $content->WaktuInformasi ?></td>
                                        <td><?= $content->BentukInformasi ?></td>
                                        <td><?= $content->JangkaWaktu ?></td>
                                        <td>
                                            <?php if ($content->JenisMedia != 'Tersedia di masing-masing Bidang') { ?>
                                                <a href="<?= $content->JenisMedia ?>" target="_blank"><?= $content->JenisMedia ?></a>
                                            <?php } else { ?>
                                                Tersedia di masing-masing Bidang
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <th>2</th>
                                    <th colspan="3">Informasi Wajib Diumumkan Secara Serta Merta</th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                </tr>
                                <?php foreach ($content_data2 as $content) { ?>
                                    <tr>
                                        <td <?php if ($content->NoContent <> '') {
                                                echo "style:'background-color: #34495E;color: #fff;'";
                                            } ?>>
                                            <?= $content->NoContent ?>
                                        </td>
                                        <?php if ($content->IsiContent == '' && $content->PejabatInformasi == '' && $content->PenanggungJawab == '') { ?>
                                            <td colspan="3"><?= $content->JudulContent ?></td>
                                        <?php } else { ?>
                                            <td><?= $content->JudulContent ?></td>
                                        <?php } ?>
                                        <td><?= $content->IsiContent ?></td>
                                        <td><?= $content->PejabatInformasi ?></td>
                                        <td><?= $content->PenanggungJawab ?></td>
                                        <td><?= $content->WaktuInformasi ?></td>
                                        <td><?= $content->BentukInformasi ?></td>
                                        <td><?= $content->JangkaWaktu ?></td>
                                        <td>
                                            <?php if ($content->JenisMedia != 'Tersedia di masing-masing Bidang') { ?>
                                                <a href="<?= $content->JenisMedia ?>" target="_blank"><?= $content->JenisMedia ?></a>
                                            <?php } else { ?>
                                                Tersedia di masing-masing Bidang
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <th>3</th>
                                    <th colspan="3">Informasi Wajib Tersedia Setiap Saat</th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                </tr>
                                <?php foreach ($content_data3 as $content) { ?>
                                    <tr>
                                        <td <?php if ($content->NoContent <> '') {
                                                echo "style:'background-color: #34495E;color: #fff;'";
                                            } ?>>
                                            <?= $content->NoContent ?>
                                        </td>
                                        <?php if ($content->IsiContent == '' && $content->PejabatInformasi == '' && $content->PenanggungJawab == '') { ?>
                                            <td colspan="3"><?= $content->JudulContent ?></td>
                                        <?php } else { ?>
                                            <td><?= $content->JudulContent ?></td>
                                        <?php } ?>
                                        <td><?= $content->IsiContent ?></td>
                                        <td><?= $content->PejabatInformasi ?></td>
                                        <td><?= $content->PenanggungJawab ?></td>
                                        <td><?= $content->WaktuInformasi ?></td>
                                        <td><?= $content->BentukInformasi ?></td>
                                        <td><?= $content->JangkaWaktu ?></td>
                                        <td><?php if ($content->JenisMedia != 'Tersedia di masing-masing Bidang') { ?>
                                                <a href="<?= $content->JenisMedia ?>" target="_blank"><?= $content->JenisMedia ?></a>
                                            <?php } else { ?>
                                                Tersedia di masing-masing Bidang
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- </div> -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#mytable").DataTable({
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
            "responsive": false,
            "scrollX": true
        });
    });
</script>