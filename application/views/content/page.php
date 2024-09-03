<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Content<small><?= $tipetext ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Content</a></li>
        <li><a href="#"><?= $tipetext ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header with-border'>
                    <?php
                    echo anchor(
                        'content/create/' . $tipe,
                        '<i class="fa fa-plus"></i> Tambah',
                        array('class' => 'btn btn-success')
                    );
                    ?>
                </div>
                <div class='box-body'>
                    <div id="data_content" class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Isi Content</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($content_data as $content) {
                                ?>
                                    <tr>
                                        <td><?= $content->IdContent ?></td>
                                        <td><?= $content->JudulContent ?></td>
                                        <td><?= $content->IsiContent ?></td>
                                        <td style="text-align:center" width="140px">
                                            <?php
                                            echo anchor(
                                                site_url('content/update/' . $content->IdContent),
                                                '<i class="fa fa-pencil"></i>',
                                                'title="Edit" class="btn btn-primary btn-xs"'
                                            );

                                            echo '  ';

                                            echo anchor(
                                                site_url('content/delete/' . $content->IdContent . '/' . $tipe . '/' . $content->FileUpload),
                                                '<i class="fa fa-trash-o"></i>',
                                                'title="Delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Anda yakin hapus data ini ?\')"'
                                            );
                                            ?>
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