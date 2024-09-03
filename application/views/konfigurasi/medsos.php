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
            <form action="<?= $action; ?>" method="post">
                <div class="box-header with-border">
                    <?php
                    if (empty($disable)) { ?>
                        <input type="hidden" name="id_konfigurasi" value="<?= $konfig->id_konfigurasi; ?>" />
                        <button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                    <?php } ?>
                    <a href="<?= site_url('konfigurasi') ?>" class="btn btn-default btn-flat">Cancel</a>
                </div>
                <div class="box-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_website">Nama Website</label>
                            <input type="text" id="nama_website" name="nama_website" class="form-control" placeholder="Nama Website ..." value="<?= $konfig->nama_website; ?>" <?= $disable; ?>>
                            <div><?= form_error('nama_website') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="website">Link Website</label>
                            <input type="text" id="website" name="website" class="form-control" placeholder="Link Website ..." value="<?= $konfig->website; ?>" <?= $disable; ?>>
                            <div><?= form_error('website') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_facebook">Nama Facebook</label>
                            <input type="text" id="nama_facebook" name="nama_facebook" class="form-control" placeholder="Nama Facebook ..." value="<?= $konfig->nama_facebook; ?>" <?= $disable; ?>>
                            <div><?= form_error('nama_facebook') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="facebook">Link Facebook</label>
                            <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Link Facebook ..." value="<?= $konfig->facebook; ?>" <?= $disable; ?>>
                            <div><?= form_error('facebook') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_twitter">Nama Twitter</label>
                            <input type="text" id="nama_twitter" name="nama_twitter" class="form-control" placeholder="Nama Twitter ..." value="<?= $konfig->nama_twitter; ?>" <?= $disable; ?>>
                            <div><?= form_error('nama_twitter') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="twitter">Link Twitter</label>
                            <input type="text" id="twitter" name="twitter" class="form-control" placeholder="Link Twitter ..." value="<?= $konfig->twitter; ?>" <?= $disable; ?>>
                            <div><?= form_error('twitter') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_instagram">Nama Instagram</label>
                            <input type="text" id="nama_instagram" name="nama_instagram" class="form-control" placeholder="Nama Instagram ..." value="<?= $konfig->nama_instagram; ?>" <?= $disable; ?>>
                            <div><?= form_error('nama_instagram') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instagram">Link Instagram</label>
                            <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Link Instagram ..." value="<?= $konfig->instagram; ?>" <?= $disable; ?>>
                            <div><?= form_error('instagram') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_youtube">Nama Youtube</label>
                            <input type="text" id="nama_youtube" name="nama_youtube" class="form-control" placeholder="Nama Youtube ..." value="<?= $konfig->nama_youtube; ?>" <?= $disable; ?>>
                            <div><?= form_error('nama_youtube') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="youtube">Link Youtube</label>
                            <input type="text" id="youtube" name="youtube" class="form-control" placeholder="Link Youtube ..." value="<?= $konfig->youtube; ?>" <?= $disable; ?>>
                            <div><?= form_error('youtube') ?></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama_tiktok">Nama Tiktok</label>
                            <input type="text" id="nama_tiktok" name="nama_tiktok" class="form-control" placeholder="Nama Tiktok ..." value="<?= $konfig->nama_tiktok; ?>" <?= $disable; ?>>
                            <div><?= form_error('nama_tiktok') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tiktok">Link Tiktok</label>
                            <input type="text" id="tiktok" name="tiktok" class="form-control" placeholder="Link Tiktok ..." value="<?= $konfig->tiktok; ?>" <?= $disable; ?>>
                            <div><?= form_error('tiktok') ?></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>