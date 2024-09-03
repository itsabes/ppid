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
                            <label for="namaweb">Nama Website</label>
                            <input type="text" id="namaweb" name="namaweb" class="form-control" placeholder="Nama Website ..." value="<?= $konfig->namaweb; ?>" <?= $disable; ?>>
                            <div><?= form_error('namaweb') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="singkatan">Singkatan</label>
                            <input type="text" id="singkatan" name="singkatan" class="form-control" placeholder="Singkatan ..." value="<?= $konfig->singkatan; ?>" <?= $disable; ?>>
                            <div><?= form_error('singkatan') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tagline">Tagline</label>
                            <input type="text" id="tagline" name="tagline" class="form-control" placeholder="Tagline ..." value="<?= $konfig->tagline; ?>" <?= $disable; ?>>
                            <div><?= form_error('tagline') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tentang">Tentang</label>
                            <input type="text" id="tentang" name="tentang" class="form-control" placeholder="Tentang ..." value="<?= $konfig->tentang; ?>" <?= $disable; ?>>
                            <div><?= form_error('tentang') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi ..." value="<?= $konfig->deskripsi; ?>" <?= $disable; ?>>
                            <div><?= form_error('deskripsi') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email ..." value="<?= $konfig->email; ?>" <?= $disable; ?>>
                            <div><?= form_error('email') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telepon">Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="form-control" placeholder="Telepon ..." value="<?= $konfig->telepon; ?>" <?= $disable; ?>>
                            <div><?= form_error('telepon') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hp">HP</label>
                            <input type="text" id="hp" name="hp" class="form-control" placeholder="Nomor HP ..." value="<?= $konfig->hp; ?>" <?= $disable; ?>>
                            <div><?= form_error('hp') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jam_operasional">Jam Operasional</label>
                            <input type="text" id="jam_operasional" name="jam_operasional" class="form-control" placeholder="Jam Operasional ..." value="<?= $konfig->jam_operasional; ?>" <?= $disable; ?>>
                            <div><?= form_error('jam_operasional') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keywords">Keywords</label>
                            <input type="text" id="keywords" name="keywords" class="form-control" placeholder="Keywords ..." value="<?= $konfig->keywords; ?>" <?= $disable; ?>>
                            <div><?= form_error('keywords') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="metatext">Metatext</label>
                            <input type="text" id="metatext" name="metatext" class="form-control" placeholder="Metatext ..." value="<?= $konfig->metatext; ?>" <?= $disable; ?>>
                            <div><?= form_error('metatext') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="responsivevoice">Kode Responsive Voice</label>
                            <input type="text" id="responsivevoice" name="responsivevoice" class="form-control" placeholder="Kode Responsive Voice ..." value="<?= $konfig->responsivevoice; ?>" <?= $disable; ?>>
                            <div><?= form_error('responsivevoice') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat ..." <?= $disable; ?>><?= $konfig->alamat; ?></textarea>
                            <div><?= form_error('alamat') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="google_map">Google Maps</label>
                            <textarea name="google_map" id="google_map" class="form-control" rows="5" placeholder="Google Map ..." <?= $disable; ?>><?= $konfig->google_map; ?></textarea>
                            <div><?= form_error('google_map') ?></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>