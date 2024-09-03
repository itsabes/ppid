<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Manajemen User <small>Data User</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manajemen User</a></li>
        <li class="active">Data User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class='box box-solid'>
                <form action="<?= $action; ?>" method="post" class="form-horizontal" accept-charset="utf-8">
                    <div class="box-header with-border">
                        <input type="hidden" name="id" value="<?= $id; ?>" />

                        <button type="submit" class="btn btn-primary btn-flat">
                            <?= $button ?>
                        </button>

                        <a href="<?= site_url('user') ?>" class="btn btn-default btn-flat">
                            Cancel
                        </a>
                    </div>
                    <div class="box-body" style="padding:20px;">
                        <div class="form-group">
                            <label class="col-sm-2">Nama User</label>
                            <div class="col-sm-5">
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama User" value="<?= $nama; ?>">
                            </div>
                            <div class="col-sm-3"><?= form_error('nama') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Nomor HP</label>
                            <div class="col-sm-5">
                                <input type="text" id="telp" name="telp" class="form-control" placeholder="Nomor Telepon" value="<?= $telp; ?>">
                            </div>
                            <div class="col-sm-3"><?= form_error('telp') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Email</label>
                            <div class="col-sm-5">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= $email; ?>">
                            </div>
                            <div class="col-sm-3"><?= form_error('email') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Level</label>
                            <div class="col-sm-5">
                                <select data-placeholder="Pilih Level..." class="select2" style="width: 100%;" tabindex="2" name="level" id="level">
                                    <option value=""></option>
                                    <option value="admin" <?= $level == 'admin' ? 'selected="selected"' : ''; ?>>Admin</option>
                                    <option value="ctu_bid" <?= $level == 'ctu_bid' ? 'selected="selected"' : ''; ?>>CTU Bidang</option>
                                    <option value="operator" <?= $level == 'operator' ? 'selected="selected"' : ''; ?>>Operator</option>
                                    <option value="pemohon" <?= $level == 'pemohon' ? 'selected="selected"' : ''; ?>>Pemohon</option>
                                    <option value="sekpim" <?= $level == 'sekpim' ? 'selected="selected"' : ''; ?>>Sekpim</option>
                                </select>
                            </div>
                            <div class="col-sm-3"><?= form_error('level') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Aplikasi</label>
                            <div class="col-sm-5">
                                <input type="text" id="aplikasi" name="aplikasi" class="form-control" placeholder="Aplikasi" value="<?= $aplikasi; ?>">
                            </div>
                            <div class="col-sm-3"><?= form_error('aplikasi') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Seksi</label>
                            <div class="col-sm-5">
                                <select data-placeholder="Pilih Seksi..." class="select2" style="width: 100%;" tabindex="2" name="IdSeksi" id="IdSeksi">
                                    <option value=""></option>
                                    <?php
                                    foreach ($data_seksi->result_array() as $dp) {
                                        $pilih = '';

                                        if ($dp['IdSeksi'] == $this->session->userdata("IdSeksi") or $dp['IdSeksi'] == $IdSeksi) {
                                            $pilih = 'selected="selected"';
                                    ?>

                                            <option value="<?= $dp['IdSeksi']; ?>" <?= $pilih; ?>><?= $dp['Seksi']; ?></option>

                                        <?php } else { ?>

                                            <option value="<?= $dp['IdSeksi']; ?>"><?= $dp['Seksi']; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                                <div class="col-sm-3"><?= form_error('IdSeksi') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Username </label>
                            <div class="col-sm-5">
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= $username; ?>" <?php if (!empty($pegawai)) {
                                                                                                                                                            echo "readonly";
                                                                                                                                                        } ?>>
                            </div>
                            <div class="col-sm-3"><?= form_error('username') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Password </label>
                            <div class="col-sm-5">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?= $password; ?>">
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                            <div class="col-sm-3"><?= form_error('password') ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(e) {
        // Function to preview image after validation
        $(function() {
            $("#Foto").change(function() {
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
            $("#Foto").css("color", "#FFFFFF");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            $('#previewing').attr('width', '100px');
            /*$('#previewing').attr('height', '140px');*/
        };
    });

    function myFunction() {
        var x = document.getElementById("password");

        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>