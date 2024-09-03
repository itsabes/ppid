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
</style>

<div class="container">
    <section class='content'>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box box-solid'>
                    <div class='box-body'>
                        <h3 class="box-title">
                            <div class="uppercase text-center"><b>Sosialisasi</b></div>
                        </h3>
                        <div id="data_content" class="table-responsive">
                            <table class="table" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Siaran Pers</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Link Berita</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sosialisasi as $sosialisasi) { ?>
                                        <tr>
                                            <td><?= $sosialisasi->NoContent ?></td>
                                            <td><?= $sosialisasi->JudulContent ?></td>
                                            <td><?= $sosialisasi->WaktuInformasi ?></td>
                                            <td> <button onclick="countView('<?= $sosialisasi->IdContent ?>')" class="btn btn-primary btn-sm" title="Lihat"><i class="fa fa-globe"></i> Lihat</button></td>
                                            <td style="text-align:center" width="140px"><?= $sosialisasi->View ?> Views</td>
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

    <section class='content'>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box box-solid'>
                    <div class='box-body'>
                        <h3 class="box-title">
                            <div class="uppercase text-center"><b>Konten</b></div>
                        </h3>
                        <div id="data_content" class="table-responsive">
                            <table class="table" id="kontentable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Siaran Pers</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Link Berita</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($konten as $konten) { ?>
                                        <tr>
                                            <td><?= $konten->NoContent ?></td>
                                            <td><?= $konten->JudulContent ?></td>
                                            <td><?= $konten->WaktuInformasi ?></td>
                                            <td> <button onclick="countView('<?= $konten->IdContent ?>')" class="btn btn-primary btn-sm" title="Lihat"><i class="fa fa-globe"></i> Lihat</button></td>
                                            <td style="text-align:center" width="140px"><?= $konten->View ?> Views</td>
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

    <section class='content'>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box box-solid'>
                    <div class='box-body'>
                        <h3 class="box-title">
                            <div class="uppercase text-center"><b>Siaran Pers</b></div>
                        </h3>
                        <div id="data_content" class="table-responsive">
                            <table class="table" id="siaranperstable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Siaran Pers</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Link Berita</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($content_data as $content) { ?>
                                        <tr>
                                            <td><?= $content->NoContent ?></td>
                                            <td><?= $content->JudulContent ?></td>
                                            <td><?= $content->WaktuInformasi ?></td>
                                            <td> <button onclick="countView('<?= $content->IdContent ?>')" class="btn btn-primary btn-sm" title="Lihat"><i class="fa fa-globe"></i> Lihat</button></td>
                                            <td style="text-align:center" width="140px"><?= $content->View ?> Views</td>
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
            "bAutoWidth": true
        });

        $("#kontentable").DataTable({
            "lengthMenu": [
                [25, 50, 100, 500, -1],
                [25, 50, 100, 500, "All"]
            ],
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": true
        });

        $("#siaranperstable").DataTable({
            "lengthMenu": [
                [25, 50, 100, 500, -1],
                [25, 50, 100, 500, "All"]
            ],
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": true
        });
    });

    function countView(id) {
        $.ajax({
            url: "<?= base_url('content/countview') ?>/" + id,
            success: function(msg) {
                window.open(msg, '_blank');
            }
        })
    }

    function countDownload(id) {
        $.ajax({
            url: "<?= base_url('content/countdownload') ?>/" + id,
            success: function(msg) {
                window.open(msg, '_blank');
            }
        })
    }
</script>