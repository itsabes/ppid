<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/star-rating.css' ?>">
<div class="container">
    <!-- Formulir Header (Page header) -->
    <br>

    <!-- Main formulir -->
    <section class="formulir">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class="box-title">Cek Status Permohonan Informasi Publik</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-sm-12">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>
                                        <font size="4">Identitas Permohonan</font>
                                    </strong>
                                </div>
                                <form id="cekStatus">
                                    <div class="form-group">
                                        <label for="field-nik_no_ktp">NIK/No.Identitas</label>
                                        <input type="text" class="form-control" id="field-nik_no_ktp" name="nik_no_ktp" placeholder="Masukan NIK/No.Identitas">
                                        <div><span id="alert_nik_no_ktp" style="font-size: 13px; color: red; display: none;"><i>NIK/No.Identitas harus diisi!</i></span></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="field-kode_permohonan">Kode Permohonan</label>
                                        <input type="text" class="form-control" id="field-kode_permohonan" name="kode_permohonan" placeholder="Masukan Kode Permohonan">
                                        <div><span id="alert_kode_permohonan" style="font-size: 13px; color: red; display: none;"><i>Kode Permohonan harus diisi!</i></span></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="btnSubmit" class="btn btn-primary btn-block"> Cek Status Permohonan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6" id="resultCek">
                                <div class="form-group text-center">
                                    <strong>
                                        <font size="4">Status Data Permohonan</font>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p id="label_kode_permohonan"></p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p id="">:</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p id="kode_permohonan"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p id="label_kategori"></p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p id="">:</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p id="kategori_perorangan"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p id="label_name_lengkap"></p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p id="">:</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p id="name_lengkap"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p id="label_nik_no_ktp"></p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p id="">:</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p id="nik_no_ktp"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p id="label_status_permohonan"></p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p id="">:</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p id="status_permohonan"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p id="label_estimate_jwb_permohonan"></p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p id="">:</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p id="estimate_jwb_permohonan"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-12" id="historyCek">
                            <div class="form-group">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal Permohonan</th>
                                            <th scope="col">Histori</th>
                                            <th scope="col">Tanggal Verifikasi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="history">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $('#resultCek').hide();
    $('#historyCek').hide();

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

        $('#history').children().remove();
    });

    $(document).on('submit', function() {
        event.preventDefault();
        $('#history').children().remove();

        $.ajax({
            url: "<?php echo $action; ?>",
            method: 'POST',
            data: $('form#cekStatus').serialize(),
            beforeSend: function() {},
            success: function(data) {
                let json = JSON.parse(data);

                if (json.code == 0) {
                    $('#resultCek').show();
                    $('#historyCek').show();

                    $('#label_status_permohonan').text('Status Permohonan');
                    $('#label_estimate_jwb_permohonan').text('Estimasi Jawab Permohonan');
                    $('#label_kode_permohonan').text('Permohonan Nomor');
                    $.each(json.data, function(key, value) {
                        $('#' + key).text(value);
                    })

                    $.each(json.data.row_history, function(key, value) {
                        $('#history').append(
                            `
                            <tr>
                             <th scope="row">${value.date_permohonan}</td>
                             <td>${value.label_history}</td>
                             <td>${value.verify_date}</td>
                             </tr>
                             `
                        );
                    })
                } else {
                    alert(json.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {},
        });
    });
</script>