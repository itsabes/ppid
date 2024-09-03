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
                                        <th width="1%"></th>
                                        <th width="98%">Tahun</th>
                                        <th style="text-align:center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2023</td>
                                        <td><a href="<?= base_url('skdr/show/2023') ?>" class="btn btn-success">Lihat</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2024</td>
                                        <td><a href="<?= base_url('skdr/show/2024') ?>" class="btn btn-success">Lihat</a></td>
                                    </tr>
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