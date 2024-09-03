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
                    <div class='box-header with-border'>
                        <h3 class="box-title">
                            <div class="uppercase"><?= $Tipe ?></div>
                        </h3>
                    </div>
                    <div class='box-body'>
                        <h4 class="box-title">
                            <div class="uppercase"><b>Sosialisasi</b></div>
                        </h4>
                        <div id="data_content" class="table-responsive">
                            <table class="table" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul SKDR</th>
                                        <th>File SKDR</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($content_data as $content_data) { ?>
                                        <tr>
                                            <td><?= $content_data->NoContent ?></td>
                                            <td><?= $content_data->JudulContent ?></td>
                                            <td> <button onclick="countDownload('<?= $content_data->IdContent ?>')" class="btn btn-info btn-sm" title="Unduh"><i class="fa fa-download"></i> Unduh</button></td>
                                            <td style="text-align:center" width="140px"><?= $content_data->Download ?> Views</td>
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
    });

    function countView(id) {
        $.ajax({
            url: "<?= base_url('skdr/countview') ?>/" + id,
            success: function(msg) {
                window.open(msg, '_blank');
            }
        })
    }

    function countDownload(id) {
        $.ajax({
            url: "<?= base_url('skdr/countdownload') ?>/" + id,
            success: function(msg) {
                window.open(msg, '_blank');
            }
        })
    }
</script>