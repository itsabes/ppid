<div class="container">
    <section class="formulir content">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <form action="<?= $action; ?>" class="form-horizontal" method="post">
                        <div class='box-header with-border'>
                            <h3 class="box-title">Pengajuan Keberatan Informasi Publik</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>
                                        <font size="4">Pengajuan Keberatan</font>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Permohonan</label>
                                    <input type="text" class="form-control" id="Nomor" name="Nomor" placeholder="">
                                    <div><span id="alert_Nomor" style="font-size: 13px; color: red; display: none;"><i>Nomor Permohonan harus diisi!</i></span></div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="Email" name="Email" placeholder="">
                                    <div><span id="alert_Email" style="font-size: 13px; color: red; display: none;"><i>Email harus diisi!</i></span></div><br>
                                    <a href="javascript:void(0)" onclick="cekPermohonan()"><strong><u> Lihat Detail Permohonan</u></strong></a>
                                </div>
                                <div id="data_permohonan">

                                </div>
                                <div class="form-group">
                                    <label>Alasan Keberatan</label>
                                    <textarea class="form-control" id="AlasanKeberatan" name="AlasanKeberatan" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    <?= form_error('AlasanKeberatan') ?>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="IdFormulir" value="<?= $IdFormulir; ?>" />
                                    <button type="submit" class="btn btn-primary"> <?= $button ?></button>
                                </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <input type="hidden" name="IdFormulir" value="<?= $IdFormulir; ?>" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function(e) {
        // Function to preview image after validation
        $(function() {
            $("#file_foto").change(function() {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    $('#previewing').attr('src', 'noimage.png');
                    $("#message").html("<p id='error'>Hanya File Gambar yang bisa diupload (jpeg, jpg dan png) </p>");
                    return false;
                } else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $("#file_foto").css("color", "#FFFFFF");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            $('#previewing').attr('width', '250px');
            /*$('#previewing').attr('height', '140px');*/
        };
    });

    function cekPermohonan() {
        var nomor = $("#Nomor").val();
        var email = $("#Email").val();

        if ($("#Nomor").val() === '' || $("#Nomor").val() === '0') {
            $("#alert_Nomor").show();
            $("#Nomor").focus();
            res = res && false;
            exit;
        } else {
            $("#alert_Nomor").hide();
        }

        if ($("#Email").val() === '' || $("#Email").val() === '0') {
            $("#alert_Email").show();
            $("#Email").focus();
            res = res && false;
            exit;
        } else {
            $("#alert_Email").hide();
        }

        $.ajax({
            url: "<?= base_url(); ?>formulir/ambil_data_permohonan",
            data: "nomor=" + nomor + "&email=" + email,
            cache: false,
            success: function(msg) {
                $("#data_permohonan").html(msg);
            }
        })

    }

    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('IsiFormulir');

        //$(".textarea").wysihtml5();
    });
</script>