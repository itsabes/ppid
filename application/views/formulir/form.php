<div class="container">
    <section class="content formulir">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <form action="<?= $action; ?>" class="form-horizontal" method="post" id="form-permohonan" enctype="multipart/form-data">
                        <div class='box-header with-border'>
                            <h3 class="box-title">Permohonan Penelitian</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>
                                        <font size="4">Tujuan Informasi<span class="text-danger"> *</span></font>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="TujuanInformasi" name="TujuanInformasi" onchange="showFieldUpload()" autofocus>
                                        <option value=""></option>
                                        <option <?php if ($TujuanInformasi == 'Bertujuan untuk Penelitian') echo 'selected'; ?> value="Bertujuan untuk Penelitian">Bertujuan untuk Penelitian</option>
                                        <option <?php if ($TujuanInformasi == 'Bertujuan untuk Data Awal Penelitian') echo 'selected'; ?> value="Bertujuan untuk Data Awal Penelitian">Bertujuan untuk Data Awal Penelitian</option>
                                        <!-- <option 
                                        <?php
                                        // if ($TujuanInformasi == 'Lain-Lain') echo 'selected';
                                        ?>
                                        value="Lain-Lain">Lain-Lain</option> -->
                                    </select>
                                    <?= form_error('TujuanInformasi') ?>
                                </div>
                                <div class="form-group">
                                    <strong>
                                        <font size="4">Identitas Pemohon</font>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Permohonan<span class="text-danger"> *</span></label>
                                    <select class="form-control" id="Kategori" name="Kategori">
                                        <option value=""></option>
                                        <option <?php if ($Kategori == 'Perorangan') echo 'selected'; ?> value="Perorangan">Perorangan</option>
                                        <option <?php if ($Kategori == 'Lembaga / Organisasi') echo 'selected'; ?> value="Lembaga / Organisasi">Lembaga / Organisasi</option>
                                    </select>
                                    <?= form_error('Kategori') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIK<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="NIK" name="NIK" placeholder="" value="<?= $NIK; ?>">
                                    <?= form_error('NIK') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="" value="<?= $Nama; ?>" readonly>
                                    <?= form_error('Nama') ?>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" id="Alamat" name="Alamat" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $Alamat; ?></textarea>
                                    <?= form_error('Alamat') ?>
                                </div>
                                <div class="form-group">
                                    <label>Email<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="Email" name="Email" placeholder="" value="<?= $Email; ?>" readonly>
                                    <?= form_error('Email') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Telpon<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="NoTelp" name="NoTelp" placeholder="" value="<?= $NoTelp; ?>" readonly>
                                    <?= form_error('NoTelp') ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" id="Pekerjaan" name="Pekerjaan" placeholder="" value="<?= $Pekerjaan; ?>">
                                    <?= form_error('Pekerjaan') ?>
                                </div>
                                <div id="PartJudulPenelitian" <?php if ($TujuanInformasi != 'Bertujuan untuk Penelitian' || $TujuanInformasi != 'Bertujuan untuk Data Awal Penelitian') echo 'style="display: none;"'; ?>>
                                    <div class="form-group">
                                        <label>Judul Penelitian</label>
                                        <input type="text" class="form-control" id="JudulPenelitian" name="JudulPenelitian" placeholder="" value="<?= $JudulPenelitian; ?>">
                                        <?= form_error('JudulPenelitian') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <strong>
                                        <font size="4">Data Permohonan</font>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <label>Upload Surat Permohonan (file PDF)<span class="text-danger"> *</span></label>
                                    <br>
                                    <span class="text-danger">*Surat Permohonan KOP Instansi/Organisasi/Perguruan Tinggi/Sekolah</span>
                                    <br>
                                    <span class="text-danger">*Dipastikan Surat Permohonan ditujukan ke PPID Dinas Kesehatan<br>Provinsi DKI Jakarta</span>
                                    <br>
                                    <input type="file" name="UploadPermohonan" class="form-control" id="UploadPermohonan" <?php if ($TujuanInformasi == 'Bertujuan untuk Penelitian') echo 'required'; ?>>

                                    <?= form_error('UploadPermohonan') ?>
                                </div>
                                <div class="form-group">
                                    <label>Rincian Informasi<span class="text-danger"> *</span></label>
                                    <textarea class="form-control" id="RincianInformasi" name="RincianInformasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $RincianInformasi; ?></textarea>
                                    <?= form_error('RincianInformasi') ?>
                                </div>
                                <div class="form-group">
                                    <label>Cara Memperoleh Informasi</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="CaraMemperoleh" id="CaraMemperoleh1" value="Melihat">
                                            Melihat
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="CaraMemperoleh" id="CaraMemperoleh2" value="Membaca">
                                            Membaca
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="CaraMemperoleh" id="CaraMemperoleh3" value="Mendengarkan">
                                            Mendengarkan
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="CaraMemperoleh" id="CaraMemperoleh3" value="Mencatat">
                                            Mencatat
                                        </label>
                                    </div>
                                    <?= form_error('CaraMemperoleh') ?>
                                </div>
                                <div class="form-group">
                                    <label>Mendapatkan Salinan Informasi</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="Salinan" id="Salinan1" value="Softcopy">
                                            Softcopy
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="Salinan" id="Salinan2" value="Hardcopy">
                                            Hardcopy
                                        </label>
                                    </div>
                                    <?= form_error('Salinan') ?>
                                </div>
                                <div class="form-group">
                                    <label>Cara Mendapatkan Salinan Informasi</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="CaraDapatSalinan" id="CaraDapatSalinan1" value="Mengambil Langsung">
                                            Mengambil Langsung
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="CaraDapatSalinan" id="CaraDapatSalinan2" value="Faksimili">
                                            Faksimili
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="CaraDapatSalinan" id="CaraDapatSalinan3" value="Email">
                                            Email
                                        </label>
                                    </div>
                                    <?= form_error('CaraDapatSalinan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4" id="UploadTambahan" <?php if ($TujuanInformasi != 'Bertujuan untuk Penelitian') echo 'style="display: none;"'; ?>>
                                <div class="form-group">
                                    <strong>
                                        <font size="4">Upload File</font>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <label>Upload KAK/Proposal Penelitian (file PDF)<span class="text-danger"> *</span></label><br>
                                    <input type="file" name="UploadKak" class="form-control" id="UploadKak" <?php if ($TujuanInformasi == 'Bertujuan untuk Penelitian') echo 'required'; ?>>
                                    <?= form_error('UploadKak') ?>
                                </div>
                                <div class="form-group">
                                    <label>Upload FC KTP/KITAS Peneliti Utama (file PDF)<span class="text-danger"> *</span></label><br>
                                    <input type="file" name="UploadKartuIdentitas" class="form-control" id="UploadKartuIdentitas" <?php if ($TujuanInformasi == 'Bertujuan untuk Penelitian') echo 'required'; ?>>
                                    <?= form_error('UploadKartuIdentitas') ?>
                                </div>
                                <div class="form-group">
                                    <label>Upload Surat keterangan Kaji Etik (file PDF)</label>
                                    <br>
                                    <span>*Penelitian dengan subjek manusia baik dari bidang kesehatan, epidemiologi atau klinik, maupun dari bidang pendidikan (termasuk pendidikan dini), serta bidang psikologi dan marketing</span>
                                    <br>
                                    <input type="file" name="UploadKeteranganKajiEtik" class="form-control" id="UploadKeteranganKajiEtik">
                                </div>
                                <div class="form-group">
                                    <label>Upload Kuesioner Wawancara (file PDF)</label><br>
                                    <input type="file" name="UploadKuisioner" class="form-control" id="UploadKuisioner">
                                </div>
                                <div class="form-group">
                                    <label>Upload Surat Rekomendasi Penelitian dari PTSP (file PDF)</label>
                                    <br>
                                    <span>*Penelitian bukan dalam rangka tugas akhir dan bukan bersumber dari anggaran APBN dan APBD</span>
                                    <br>
                                    <input type="file" name="UploadRekomPtsp" class="form-control" id="UploadRekomPtsp">
                                </div>
                                <div class="form-group">
                                    <label>Upload Izin Riset/Klirens Etik Riset (file PDF)</label>
                                    <br>
                                    <span>*Untuk Peneliti Pihak Asing yang akan melakukan kegiatan Riset di Indonesia</span>
                                    <br>
                                    <input type="file" name="UploadIzinRiset" class="form-control" id="UploadIzinRiset">
                                </div>
                                <div class="form-group">
                                    <label>Upload Surat Keterangan Penelitian yang dikeluarkan oleh Direktorat Jenderal Politik dan Pemerintahan Umum Kementerian Dalam Negeri RI (file PDF)</label>
                                    <br>
                                    <span>*Penelitian dengan lingkup Nasional/melibatkan lebih dari 1 provinsi</span>
                                    <br>
                                    <input type="file" name="UploadKeteranganDirjen" class="form-control" id="UploadKeteranganDirjen">
                                </div>
                                <div class="form-group">
                                    <label>Menyerahkan Surat Pernyataan yang sudah ditandatangani (materai 10 ribu) akan menyerahkan laporan hasil penelitian beserta rekomendasi kebijakan dari hasil penelitian (file PDF)<span class="text-danger"> *</span></label>
                                    <a href="<?= base_url() . 'upload/dokumen/Surat-Pernyataan-Penelitian.doc'; ?>">
                                        <i class="fa fa-download"> (Download format)</i></a><br>
                                    <input type="file" name="UploadPernyataanHasil" class="form-control" id="UploadPernyataanHasil" <?php if ($TujuanInformasi == 'Bertujuan untuk Penelitian') echo 'required'; ?>>
                                    <?= form_error('UploadPernyataanHasil') ?>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="IdFormulir" value="<?= $IdFormulir; ?>" />
                                    <button type="submit" class="btn btn-primary"> <?= $button ?></button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="IdFormulir" value="<?= $IdFormulir; ?>" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function showFieldUpload() {
        var x = document.getElementById("TujuanInformasi").value;

        if (x == 'Bertujuan untuk Penelitian') {
            $('#UploadTambahan').show();
            $('#UploadPermohonan').attr('required', true);
            $('#UploadKak').attr('required', true);
            $('#UploadKartuIdentitas').attr('required', true);
            $('#UploadPernyataanHasil').attr('required', true);
            $('#PartJudulPenelitian').show().find(':input').attr('required', true);
        } else if (x == 'Bertujuan untuk Data Awal Penelitian') {
            $('#UploadTambahan').hide().find(':input').attr('required', false);
            $('#UploadPermohonan').attr('required', true);
            $('#PartJudulPenelitian').show().find(':input').attr('required', true);
        } else {
            $('#UploadTambahan').hide().find(':input').attr('required', false);
            $('#UploadPermohonan').attr('required', false);
            $('#PartJudulPenelitian').hide().find(':input').attr('required', false);
        }
    }
</script>