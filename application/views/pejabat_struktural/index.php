<section class="content-header">
    <h1>
        Manajemen <?= $title ?>
        <small>Data <?= $title ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active"><?= $title ?></li>
    </ol>
</section>

<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <?php if ($level_sess === "admin") {
                        echo anchor('pejabatStruktural/create', 'Tambah', array('class' => 'btn btn-success btn-flat'));
                    } ?>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped  table-condensed" id="mytable">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Tempat dan Tanggal Lahir</th>
                                <th>Nomor Urut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($pejabat as $pejabat) {
                            ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td>
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/pejabat-struktural/') . $pejabat->foto_pejabat_struktural ?>" alt="User profile picture">
                                    </td>
                                    <td><?= $pejabat->nama_pejabat_struktural ?></td>
                                    <td><?= $pejabat->jabatan_pejabat_struktural ?></td>
                                    <td><?= $pejabat->ttl_pejabat_struktural ?></td>
                                    <td><?= $pejabat->no_urut ?></td>

                                    <td style="text-align:center" width="140px">
                                        <?php
                                        if ($level_sess === "admin") {
                                            echo '  ';
                                            echo anchor(site_url('pejabatStruktural/update/' . $pejabat->id_pejabat_struktural), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-success btn-xs'));
                                            echo '  ';
                                            echo anchor(site_url('pejabatStruktural/delete/' . $pejabat->id_pejabat_struktural), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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