<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Bidang
        <small>Data Bidang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Bidang</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class='box box-solid'>
                <form action="<?= $action; ?>" method="post" class="form-horizontal">
                    <div class="box-header with-border">
                        <?php
                        if (empty($disable)) { ?>
                            <input type="hidden" name="IdBidang" value="<?= $IdBidang; ?>" />
                            <button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                        <?php } ?>
                        <a href="<?= site_url('bidang') ?>" class="btn btn-default btn-flat">Cancel</a>
                    </div>
                    <div class="box-body" style="padding:20px;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Bidang </label>
                            <div class="col-sm-7">
                                <input type="text" id="Bidang" name="Bidang" class="form-control" placeholder="Nama bidang" value="<?= $Bidang; ?>" <?= $disable; ?>>
                            </div>
                            <div class="col-sm-3"><?= form_error('Bidang') ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>