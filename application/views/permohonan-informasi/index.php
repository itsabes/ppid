<div class="container">
    <br>
    <section class="formulir">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class="box-title">Permohonan Informasi Publik</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" id="form-permohonan" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <strong>
                                            <font size="4">Identitas Pemohon</font>
                                        </strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori Permohonan<span class="text-danger">*</span></label>
                                        <select class="form-control" id="id_kategori" name="id_kategori">
                                            <option value="">-- Pilih Kategori Permohonan --</option>
                                            <option value="1">Perorangan</option>
                                            <option value="2">Lembaga / Organisasi</option>
                                            <option value="3">Kelompok Orang</option>
                                        </select>
                                        <div id="invalid-id_kategori" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nik_no_ktp">NIK/No.Identitas Pribadi<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nik_no_ktp" name="nik_no_ktp" placeholder="Masukan NIK/No.Identitas Pribadi" required>
                                        <div id="invalid-nik_no_ktp" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap Anda">
                                        <div id="invalid-nama_lengkap" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan Nama Alamat Anda" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        <div id="invalid-alamat" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email Anda">
                                        <div id="invalid-email" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telepon<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telepon Anda">
                                        <div id="invalid-no_telp" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukan Pekerjaan Anda">
                                        <div id="invalid-pekerjaan" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group" id="groupAktaNotaris">
                                        <label for="upload_akta_notaris" id="labelAktaNotaris">Upload Akta Notaris Lembaga / Organisasi<span class="text-danger">*</span></label>
                                        <input type="file" name="upload_akta_notaris" class="form-control" id="upload_akta_notaris">
                                        <small class="text-danger">Hanya file jpg, jpeg dan png</small>
                                        <div id="invalid-upload_akta_notaris" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group" id="groupSuratKuasa">
                                        <label for="upload_surat_kuasa" id="labelSuratKuasa">Upload Surat Kuasa<span class="text-danger">*</span></label>
                                        <input type="file" name="upload_surat_kuasa" class="form-control" id="upload_surat_kuasa">
                                        <small class="text-danger">Hanya file jpg, jpeg dan png</small>
                                        <div id="invalid-upload_surat_kuasa" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <strong>
                                            <font size="4">Data Permohonan</font>
                                        </strong>
                                    </div>
                                    <div class="form-group" id="groupKtp">
                                        <label for="upload_ktp" id="labelKtp"></label>
                                        <input type="file" name="upload_ktp" id="upload_ktp" class="form-control">
                                        <small class="text-danger">Hanya file jpg, jpeg dan png</small>
                                        <div id="invalid-upload_ktp" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rincian_informasi">Rincian Informasi<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="rincian_informasi" name="rincian_informasi" placeholder="Masukan Rincian Informasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        <div id="invalid-rincian_informasi" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan_penggunaan_informasi">Tujuan Penggunaan Informasi<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="tujuan_penggunaan_informasi" name="tujuan_penggunaan_informasi" placeholder="Masukan Tujuan Penggunaan Informasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        <div id="invalid-tujuan_penggunaan_informasi" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cara Memperoleh Informasi<span class="text-danger">*</span></label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="memperoleh_informasi" id="memperoleh_informasi1" value="melihat">
                                                Melihat
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="memperoleh_informasi" id="memperoleh_informasi2" value="membaca">
                                                Membaca
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="memperoleh_informasi" id="memperoleh_informasi3" value="mendengarkan">
                                                Mendengarkan
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="memperoleh_informasi" id="memperoleh_informasi4" value="mencatat">
                                                Mencatat
                                            </label>
                                        </div>
                                        <div id="invalid-memperoleh_informasi" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mendapatkan Salinan Informasi<span class="text-danger">*</span></label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="mendapatkan_salinan" id="mendapatkan_salinan1" value="softcopy">
                                                Softcopy
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="mendapatkan_salinan" id="mendapatkan_salinan2" value="hardcopy">
                                                Hardcopy
                                            </label>
                                        </div>
                                        <div id="invalid-mendapatkan_salinan" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cara Mendapatkan Salinan Informasi<span class="text-danger">*</span></label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="cara_mendapatkan" id="cara_mendapatkan1" value="mengambil_langsung">
                                                Mengambil Langsung
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="cara_mendapatkan" id="cara_mendapatkan2" value="faksimili">
                                                Faksimili
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="cara_mendapatkan" id="cara_mendapatkan3" value="email">
                                                Email
                                            </label>
                                        </div>
                                        <div id="invalid-mendapatkan_salinan" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" id="btnSimpan"> <?php echo $button ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        window.addEventListener("keydown", function(e) {
            // Hanya jalankan kode jika tombol enter ditekan
            if (e.key === "Enter") {
                // Cek apakah elemen input atau textarea yang memiliki fokus saat ini
                var target = e.target;
                if (target.tagName === "INPUT") {
                    // Jangan teruskan aksi default submit form
                    e.preventDefault();

                    // Anda juga dapat menambahkan logika lain di sini jika diperlukan
                    // Misalnya, validasi input sebelum mengizinkan submit
                }
            }
        });

        $('#groupAktaNotaris').hide();
        $('#groupSuratKuasa').hide();
        $('#labelKtp').html("Upload KTP Pribadi<span class='text-danger'>*</span>");
    })

    $('#id_kategori').on('change', function() {
        let val = $('#id_kategori').val();
        if (val == 2) {
            $('#groupAktaNotaris').show();
            $('#groupSuratKuasa').hide();
            $('#labelKtp').html("Upload KTP Pimpinan<span class='text-danger'>*</span>");
        } else if (val == 3) {
            $('#groupAktaNotaris').hide();
            $('#groupSuratKuasa').show();
            $('#labelKtp').html("Upload KTP Pemberi Kuasa<span class='text-danger'>*</span>");
        } else {
            $('#groupAktaNotaris').hide();
            $('#groupSuratKuasa').hide();
            $('#labelKtp').html("Upload KTP Pribadi<span class='text-danger'>*</span>");
        }
    })

    $('#btnSimpan').on('click', function(e) {
        event.preventDefault();

        let formData = new FormData($('form#form-permohonan')[0]);

        $.ajax({
            url: "<?php echo $action; ?>",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {},
            success: function(data) {
                let json = JSON.parse(data);

                if (json.code == 0) {
                    alert(json.message);
                    let form = document.querySelector('form');
                    form.reset();
                } else {
                    alert(json.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {},
        })
        return false;
    });
</script>