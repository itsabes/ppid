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
                        <div id="data_content" class="table-responsive">
                            <table class="table " id="">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Ringkasan Isi Informasi</th>
                                        <th style="text-align:center"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($content_data as $content) {
                                    ?>
                                        <tr>
                                            <?php if (
                                                $content->UrlLink == "" || $content->NoContent == 'J' || $content->NoContent == 'K' ||
                                                $content->NoContent == 'A.' || $content->NoContent == 'A' || $content->NoContent == 'B' ||
                                                $content->NoContent == 'C'
                                            ) { ?>
                                                <td <?php if ($content->NoContent <> '') {
                                                        echo "style:'background-color: #34495E;color: #fff;'";
                                                    } ?>>
                                                    <strong><?= $content->NoContent ?></strong>
                                                </td>
                                                <td>
                                                    <strong><?= $content->JudulContent ?></strong>
                                                </td>
                                            <?php } else { ?>
                                                <td <?php if ($content->NoContent <> '') {
                                                        echo "style:'background-color: #34495E;color: #fff;'";
                                                    } ?>>
                                                    <?= $content->NoContent ?>
                                                </td>
                                                <td>
                                                    <?= $content->JudulContent ?>
                                                </td>
                                            <?php } ?>
                                            <td style="text-align:center" width="140px">
                                                <?php if ($content->FileUpload <> "") { ?>
                                                    <button onclick="countDownload('<?= $content->IdContent ?>')" class="btn btn-info btn-sm" title="Unduh"><i class="fa fa-download"></i> Unduh</button>
                                                <?php } else if ($content->UrlLink <> "") { ?>
                                                    <button onclick="countView('<?= $content->IdContent ?>')" class="btn btn-primary btn-sm" title="Lihat"><i class="fa fa-globe"></i> Lihat</button>
                                                <?php } else if ($content->UrlLink == "Tersedia di masing-masing Bidang") {
                                                    echo 'Tersedia di masing-masing Bidang';
                                                } ?>
                                            </td>
                                            <?php if ($content->FileUpload <> "") : ?>
                                                <td style="text-align:center" width="140px"> <?= $content->Download ?> Downloads</td>
                                            <?php elseif ($content->UrlLink <> "") : ?>
                                                <td style="text-align:center" width="140px"><?= $content->View ?> Views</td>
                                            <?php endif; ?>
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