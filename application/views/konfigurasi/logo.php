<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Konfigurasi
        <small><?= $title ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Konfigurasi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class='box box-solid'>
            <form action="<?= $action; ?>" method="post" enctype="multipart/form-data">
                <div class="box-header with-border">
                    <?php
                    if (empty($disable)) { ?>
                        <input type="hidden" name="id_konfigurasi" value="<?= $konfig->id_konfigurasi; ?>" />
                        <button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                    <?php } ?>
                    <a href="<?= site_url('konfigurasi/logo') ?>" class="btn btn-default btn-flat">Cancel</a>
                </div>
                <div class="box-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="logo">Logo Website (Persegi panjang)</label>
                            <input type="file" id="logo" name="logo" class="form-control" <?= $disable; ?>>
                            <div><?= form_error('logo') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="icon">Icon Website (Kotak)</label>
                            <input type="file" id="icon" name="icon" class="form-control" <?= $disable; ?>>
                            <div><?= form_error('icon') ?></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>