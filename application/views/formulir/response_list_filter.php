<div id="data_formulir" class="table-responsive">
    <table class="table table-bordered table-striped" id="mytable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Permohonan</th>
                <th>Nama Pemohon</th>
                <th>Rincian Informasi</th>
                <th>Tanggal Permohonan</th>
                <th>Disposisi Bidang</th>
                <th>Disposisi Sie/SubBag</th>
                <th>Jawaban Sie/SubBag</th>
                <th>Status Permohonan</th>
                <th style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($formulir_data as $formulir) {
            ?>
                <tr>
                    <td><?= ++$start ?></td>
                    <td>
                        <?= $formulir->Nomor ?>

                        <?php if ($formulir->Status == 3) {
                            echo "<button class='btn btn-danger btn-xs'>SUDAH REVISI</button>";
                        } elseif ($formulir->Status == 2) {
                            echo "<button class='btn btn-info btn-xs'>PROSES REVISI</button>";
                        } ?>
                    </td>
                    <td><?= $formulir->Nama ?></td>
                    <td><?= $formulir->RincianInformasi ?></td>
                    <td><?= $formulir->CreatedDate ?></td>
                    <td><?= $formulir->Bidang ?></td>
                    <td><?= $formulir->Seksi ?></td>
                    <td>
                        <?php if (!empty($formulir->Response)) {
                            echo $formulir->Response . '<br><br> Oleh : <b>' . $formulir->nama . '</b> pada ' . $formulir->ResponseDate;
                        } else {
                            echo "<button class='btn btn-sm btn-danger'>Belum Dibuatkan Jawaban</button>";
                        } ?>
                    </td>
                    <td><?= status_permohonan($formulir->Status) ?></td>
                    <td style="text-align:center" width="140px">
                        <?php if (!empty($formulir->UploadPermohonan)) {
                            echo "<button onclick='showClick( $formulir->IdFormulir )' type='button' class='btn btn-xs btn-warning'><i class='fa fa-file'></i></button>";

                            echo ' | ';
                        }
                        if (!empty($formulir->UploadJawaban)) {
                            echo anchor(site_url('upload/formulir/' . $formulir->UploadJawaban), '<i class="fa fa-file"></i>', 'title="Surat Jawaban" target="_blank" class="btn btn-info btn-xs"');

                            echo ' | ';
                        }
                        echo anchor(site_url('formulir/permohonan_pdf/' . $formulir->IdFormulir), '<i class="fa fa-print"></i>', 'title="Print" target="_blank" class="btn btn-info btn-xs"');

                        echo ' | ';
                        ?>

                        <button onclick="editClick('<?= $formulir->IdFormulir ?>')" type="button" title="Submit Jawaban" class="btn btn-xs btn-success"><i class="fa fa-laptop"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#mytable").DataTable({
            "lengthMenu": [
                [25, 50, 100, 500, -1],
                [25, 50, 100, 500, "All"]
            ],
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": true,
            "searching": true,
        });
    });
</script>