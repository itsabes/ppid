<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Content<small><?= $tipetext ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Content</a></li>
        <li><a href="#"><?= $tipetext ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class='box box-solid'>
                <form action="<?= $action; ?>" class="form-horizontal" method="post">
                    <div class='box-header with-border'>
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    <?php if (empty($disable)) { ?>
                                        <input type="hidden" name="IdContent" value="<?= $IdContent; ?>" />
                                        <input type="hidden" name="Tipe" value="<?= $tipe; ?>" />
                                        <input type="hidden" name="IsActive" value="1" />
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?= $button ?></button>
                                    <?php } ?>
                                    <a href="<?= site_url('content/page/' . $tipe) ?>" class="btn btn-default"><i class="fa fa-refresh"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed" style="border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;">
                            <tbody>
                                <tr>
                                    <td width="25%" style="padding-left:30px;padding-top:15px">Title</td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="JudulContent" name="JudulContent" value="<?= $JudulContent; ?>" placeholder="Judul Content">
                                            <?= form_error('JudulContent') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="25%" style="padding-left:30px;padding-top:15px">Isi Content</td>
                                    <td>
                                        <div class="col-sm-12">
                                            <textarea class="textarea" id="IsiContent" name="IsiContent" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $IsiContent; ?></textarea>
                                            <!--<textarea id="editor1" name="editor1" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                                            </textarea>-->
                                            <?= form_error('IsiContent') ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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
        CKEDITOR.replace('IsiContent');

        //$(".textarea").wysihtml5();
    });
</script>