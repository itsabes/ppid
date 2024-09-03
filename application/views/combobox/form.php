<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Manajemen Combobox
        <small>Data Combobox</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Combobox</li>
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
                        <input type="hidden" name="id_combobox" value="<?= $id_combobox; ?>" />
                        <button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
                    <?php } ?>
                    <a href="<?= site_url('combobox') ?>" class="btn btn-default btn-flat">Cancel</a>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-6">
                        <label for="id_tipe">Nama Tipe</label>
                        <select name="id_tipe" id="id_tipe" class="form-control select2">
                            <option value="">-- Silahkan Pilih Salah Satu --</option>
                            <?php foreach ($tipe as $tipe) { ?>
                                <option value="<?= $tipe->IdTipe ?>" <?= $id_tipe == $tipe->IdTipe ? 'selected="true"' : ''  ?>><?= $tipe->Keterangan ?></option>
                            <?php } ?>
                        </select>
                        <div><?= form_error('id_tipe') ?></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kode">Kode Combobox</label>
                        <input type="text" id="kode" name="kode" class="form-control" placeholder="Kode Combobox ..." value="<?= $kode; ?>" <?= $disable; ?>>
                        <div><?= form_error('kode') ?></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Nama Combobox</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Combobox ..." value="<?= $nama; ?>" <?= $disable; ?>>
                        <div><?= form_error('nama') ?></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="keterangan">Keterangan Combobox</label>
                        <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan Combobox ..." value="<?= $keterangan; ?>" <?= $disable; ?>>
                        <div><?= form_error('keterangan') ?></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="is_active">Is Active</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="">-- Silahkan Pilih Salah Satu --</option>
                            <option value="1" <?= $is_active == '1' ? 'selected="true"' : ''  ?>>Ya</option>
                            <option value="0" <?= $is_active == '0' ? 'selected="true"' : ''  ?>>Tidak</option>
                        </select>
                        <div><?= form_error('is_active') ?></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>