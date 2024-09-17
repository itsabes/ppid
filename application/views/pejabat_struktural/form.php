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

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class='box box-solid'>
                <form action="<?= $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="box-header with-border">
                        <?php
                        if (empty($disable)) { ?>
                            <input type="hidden" name="id_pejabat_struktural" value="<?= $id_pejabat_struktural; ?>" />
                            <button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                        <?php } ?>
                        <a href="<?= site_url('pejabatStruktural') ?>" class="btn btn-default btn-flat">Cancel</a>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-6">
                            <label for="nama_pejabat_struktural">Nama Pejabat<span class="text-danger"> *</span></label>
                            <input type="text" id="nama_pejabat_struktural" name="nama_pejabat_struktural" class="form-control" placeholder="Nama Pejabat Struktural ..." value="<?= $nama_pejabat_struktural; ?>" <?= $disable; ?>>
                            <div><?= form_error('nama_pejabat_struktural') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jabatan_pejabat_struktural">Jabatan Pejabat Struktural<span> *</span></label>
                            <input type="text" id="jabatan_pejabat_struktural" name="jabatan_pejabat_struktural" class="form-control" placeholder="Jabatan Pejabat Struktural ..." value="<?= $jabatan_pejabat_struktural; ?>" <?= $disable; ?>>
                            <div><?= form_error('jabatan_pejabat_struktural') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ttl_pejabat_struktural">Tempat Tanggal Lahir<span> *</span></label>
                            <input type="text" id="ttl_pejabat_struktural" name="ttl_pejabat_struktural" class="form-control" placeholder="Tempat TanggalLahir ..." value="<?= $ttl_pejabat_struktural; ?>" <?= $disable; ?>>
                            <div><?= form_error('ttl_pejabat_struktural') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_urut">Nomor Urut<span> *</span></label>
                            <input type="text" id="no_urut" name="no_urut" class="form-control" placeholder="Nomor Urut ..." value="<?= $no_urut; ?>" <?= $disable; ?>>
                            <div><?= form_error('no_urut') ?></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="foto_pejabat_struktural">Foto Pejabat Struktural<span> *</span></label>
                            <input type="file" id="foto_pejabat_struktural" name="foto_pejabat_struktural" class="form-control" <?= $disable; ?>>
                            <span class="text-danger">Hanya file jpg / jpeg / png</span>
                            <div><?= form_error('foto_pejabat_struktural') ?></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lampiran_pejabat_struktural">Lampiran Pejabat Struktural<span> *</span></label>
                            <input type="file" id="lampiran_pejabat_struktural" name="lampiran_pejabat_struktural" class="form-control" <?= $disable; ?>>
                            <span class="text-danger">Hanya file pdf</span>
                            <div><?= form_error('lampiran_pejabat_struktural') ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>