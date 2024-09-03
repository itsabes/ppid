<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Seksi
        <small>Data Seksi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Seksi</li>
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
                            <input type="hidden" name="IdSeksi" value="<?= $IdSeksi; ?>" />
                            <button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                        <?php } ?>
                        <a href="<?= site_url('seksi') ?>" class="btn btn-default btn-flat">Cancel</a>
                    </div>
                    <div class="box-body" style="padding:20px;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bidang </label>
                            <div class="col-sm-5">
                                <select data-placeholder="Pilih Bidang..." class="select2" style="width: 100%;" tabindex="2" name="IdBidang" id="IdBidang">
                                    <option value=""></option>
                                    <?php
                                    foreach ($data_bidang->result_array() as $dp) {
                                        $pilih = '';
                                        if ($dp['IdBidang'] == $IdBidang) {
                                            $pilih = 'selected="selected"';
                                    ?>
                                            <option value="<?= $dp['IdBidang']; ?>" <?= $pilih; ?>><?= $dp['Bidang']; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $dp['IdBidang']; ?>"><?= $dp['Bidang']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3"><?= form_error('IdBidang') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Seksi </label>
                            <div class="col-sm-5">
                                <input type="text" id="Seksi" name="Seksi" class="form-control" placeholder="Nama seksi" value="<?= $Seksi; ?>" <?= $disable; ?>>
                            </div>
                            <div class="col-sm-3"><?= form_error('Seksi') ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>