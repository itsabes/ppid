<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen User
        <small>Data User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manajemen User</a></li>
        <li class="active">Data User</li>
    </ol>
</section>

<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <?php
                    if (empty($sales_sess)) {
                        echo anchor('user/create/', 'Tambah', array('class' => 'btn btn-success btn-flat'));
                    }
                    ?>

                    <div class="pull-right">
                        <?= anchor(site_url('user/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-flat"'); ?>
                        <?= anchor(site_url('user/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-flat"'); ?>
                    </div>
                </div>
                <div class='box-body table-responsive'>
                    <table class="table table-bordered table-striped  table-condensed" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Seksi</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($user_data as $user) {
                            ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->nama ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->seksi ?></td>
                                    <td><?= $user->level ?></td>
                                    <td style="text-align:center" width="140px">
                                        <?php
                                        echo anchor(site_url('user/read/' . $user->id), '<i class="fa fa-eye"></i>', array('title' => 'detail', 'class' => 'btn btn-primary btn-xs'));
                                        echo '  ';
                                        echo anchor(site_url('user/update/' . $user->id), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-warning btn-xs'));
                                        echo '  ';
                                        echo anchor(site_url('user/delete/' . $user->id), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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