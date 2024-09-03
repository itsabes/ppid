<div class="container">
    <section class="formulir content">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class="box-title">Pengajuan Keberatan Informasi Publik</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-12" style="text-align=center;">
                            Terima kasih sudah melakukan pengajuan keberatan informasi publik, berikut nomor pengajuan keberatan anda <br><br>
                            <font size="4"><strong>Nomor Pengajuan Keberatan : <?= $nomor; ?></strong></font><br><br>
                            <!--<i><a href="<?= base_url() . 'formulir/permohonan_pdf/' . $id ?>" class="btn btn-sm btn-success" target="_blank">Download Permohonan</a></i>&nbsp;--><a href="<?= base_url() . 'formulir/keberatan_create' ?>" class="btn btn-sm btn-info">Kembali</a>
                        </div>

                    </div>
                    <input type="hidden" name="nomor" value="<?= $nomor; ?>" />
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Permohonan Informasi Publik</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="files">
                <embed id="fileup" src="" type="application/pdf" width="100%" height="400px" /></embed>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
            </div>
        </div>
    </div>
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

    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('IsiFormulir');

        //$(".textarea").wysihtml5();
    });
</script>