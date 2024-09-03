<div class="container">
    <section class="content formulir">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class="box-title">Permohonan Informasi Publik</h3>
                    </div>
                    <div class="box-body text-center">
                        <div class="col-md-12">
                            <div class="text-center">
                                <img src="<?= site_url('upload/image/cehck.png') ?>" alt="">
                                <h3>Selamat permohonan anda telah berhasil</h3>
                                <h3 style="font-weight: bold;">Nomor Permohonan</h3>
                                <h1 style="font-size: 48px;margin-bottom:30px"><?= $nomor; ?></h1>
                            </div>

                            <div class="row text-center">
                                <h4>Download formulir permohonan <strong><a href="<?= base_url() . 'formulir/permohonan_pdf/' . $id ?>" target="_blank">Disini</a></strong></h4>
                                <h4>Silahkan pantau terus status permohonan melalui menu cek status permohonan <strong><a href="<?= base_url() . 'cek_status_penelitian' ?>" target="_blank">Disini</a></strong></h4>
                                <h4>atau</h4>
                                <h4>atau Login ke dalam akun <strong><a href="<?= base_url() . 'login' ?>" target="_blank">Login</a></strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>