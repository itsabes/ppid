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
<section class="content">
    <div class="container-fluid">
        <div class='box box-solid'>
            <form action="<?= $action; ?>" method="post">
                <div class="box-header with-border">
                    <?php
                    if (empty($disable)) { ?>
                        <input type="hidden" name="IdTipe" value="<?= $IdTipe; ?>" />
                        <button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                    <?php } ?>
                    <a href="<?= site_url('tipe') ?>" class="btn btn-default btn-flat">Cancel</a>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-6">
                        <label for="Tipe">Kode Tipe</label>
                        <input type="text" id="Tipe" name="Tipe" class="form-control" placeholder="Kode Tipe ..." value="<?= $Tipe; ?>" <?= $disable; ?>>
                        <div><?= form_error('Tipe') ?></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Keterangan">Keterangan Tipe</label>
                        <input type="text" id="Keterangan" name="Keterangan" class="form-control" placeholder="Keterangan Tipe ..." value="<?= $Keterangan; ?>" <?= $disable; ?>>
                        <div><?= form_error('Keterangan') ?></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>