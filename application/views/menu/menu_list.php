<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Menu
        <small><?= $title ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active"><?= $title ?></li>
    </ol>
</section>

<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header'>
                    <?= anchor('menu/create/' . $pos, 'Create', array('class' => 'btn btn-success btn-flat')); ?>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Menu</th>
                                <th>Link</th>
                                <th width="30">Icon</th>
                                <th>Aplikasi</th>
                                <th>Aktif</th>
                                <th>Parent</th>
                                <th>Level</th>
                                <th>Order</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($menu_data as $menu) {
                                $active     = $menu->is_active == 1 ? 'AKTIF' : 'TIDAK AKTIF';
                                $parent     = $menu->is_parent > 1 ? 'MAINMENU' : 'SUBMENU'
                            ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $menu->name ?></td>
                                    <td><?= $menu->link ?></td>
                                    <td><i class='<?= $menu->icon ?>'></i></td>
                                    <td><?= $menu->aplikasi ?></td>
                                    <td><?= $active ?></td>
                                    <td><?= $parent ?></td>
                                    <td><?= $menu->level ?></td>
                                    <td><?= $menu->urut ?></td>
                                    <td style="text-align:center" width="140px">
                                        <?php
                                        echo anchor(site_url('menu/read/' . $menu->id), '<i class="fa fa-eye"></i>', array('title' => 'detail', 'class' => 'btn btn-primary btn-xs'));
                                        echo '  ';
                                        echo anchor(site_url('menu/update/' . $menu->id . '/' . $pos), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-success btn-xs'));
                                        echo '  ';
                                        echo anchor(site_url('menu/delete/' . $menu->id), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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