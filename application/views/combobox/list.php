<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Manajemen Combobox
        <small>Data Combobox</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Combobox</li>
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
                        echo anchor('combobox/create', 'Tambah', array('class' => 'btn btn-success btn-flat'));
                    }
                    ?>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped  table-condensed" id="mytable">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Nama Tipe</th>
                                <th>Kode Combobox</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Slug</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($combobox as $combobox) {
                            ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $combobox->Keterangan ?></td>
                                    <td><?= $combobox->kode ?></td>
                                    <td><?= $combobox->nama ?></td>
                                    <td><?= $combobox->keterangan ?></td>
                                    <td><?= $combobox->slug ?></td>
                                    <td><?= $combobox->is_active == 1 ? 'Aktif' : 'Non Aktif' ?></td>
                                    <td style="text-align:center" width="140px">
                                        <?php
                                        if ($level_sess === "admin") {
                                            echo '  ';
                                            echo anchor(site_url('combobox/update/' . $combobox->id_combobox), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-success btn-xs', 'id' => $combobox->id_combobox));
                                        }
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