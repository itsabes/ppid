<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Tipe
        <small>Data Tipe</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Tipe</li>
    </ol>
</section>

<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <?php
                    if ($level_sess === "admin") {
                        echo anchor('tipe/create', 'Tambah', array('class' => 'btn btn-success btn-flat'));
                    }
                    ?>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped  table-condensed" id="mytable">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Kode Tipe</th>
                                <th>ID Tipe</th>
                                <th>Keterangan Tipe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($tipe_data as $tipe) {
                            ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $tipe->Tipe ?></td>
                                    <td><?= $tipe->IdTipe ?></td>
                                    <td><?= $tipe->Keterangan ?></td>
                                    <td style="text-align:center" width="140px">
                                        <?php
                                        if ($level_sess === "admin") {
                                            echo '  ';
                                            echo anchor(site_url('tipe/update/' . $tipe->IdTipe), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-success btn-xs'));
                                            // echo '  ';
                                            // echo anchor(site_url('tipe/delete/' . $tipe->IdTipe), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        }
                                        ?>
                                    </td>
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
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $("#mytable").DataTable({
            "lengthMenu": [
                [25, 50, 100, 500, -1],
                [25, 50, 100, 500, "All"]
            ],
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true
        });
    });
</script>