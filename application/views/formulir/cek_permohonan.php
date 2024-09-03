<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/star-rating.css' ?>">

<div class="container">
    <section class="content formulir">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class="box-title">Cek Status Permohonan Penelitian</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong>
                                    <font size="4">Identitas Permohonan Penelitian</font>
                                </strong>
                            </div>
                            <div class="form-group">
                                <label>Nomor Permohonan Penelitian</label>
                                <input type="text" class="form-control" id="Nomor" name="Nomor" placeholder="">
                                <div><span id="alert_Nomor" style="font-size: 13px; color: red; display: none;"><i>Nomor Permohonan harus diisi!</i></span></div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="Email" name="Email" placeholder="">
                                <div><span id="alert_Email" style="font-size: 13px; color: red; display: none;"><i>Email harus diisi!</i></span></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" onclick="cekClick()" class="btn btn-primary btn-block"> Cek Status Permohonan Penelitian</button>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>
                                    <font size="4">Status Data Permohonan Penelitian</font>
                                </strong>
                            </div>
                            <div id="data_permohonan">

                            </div>
                            Berikan rating dengan klik : <a href="javascript:void(0)" onclick="openRate()"><strong><u>Di Sini</u></strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- RATING MODAL START -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <input id="rating-input" type="text" title="" />
                <div><span id="alert_rating" style="font-size: 13px; color: red; display: none;"><i>Bintang harus dipilih!</i></span></div>
                Komentar : <br>
                <textarea id="komentar" class="form-control" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <div><span id="alert_komentar" style="font-size: 13px; color: red; display: none;"><i>Komentar harus diisi!</i></span></div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" onclick="submitRate()" class="btn btn-md btn-primary float-right"><i class="fa fa-check"></i> &nbsp;&nbsp;Submit</a>
            </div>
        </div>
    </div>
</div>
<!-- RATING MODAL END -->

<script type="text/javascript" src="<?php echo base_url() . 'assets/js/star-rating.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var $inp = $('#rating-input');

        $inp.rating({
            min: 0,
            max: 5,
            step: 1,
            size: 'xs',
            showClear: false
        });
    });

    function cekClick() {
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
            url: "<?php echo base_url(); ?>formulir/ambil_data_permohonan",
            data: "nomor=" + nomor + "&email=" + email,
            cache: false,
            success: function(msg) {
                $("#data_permohonan").html(msg);
            }
        })

    }

    function openRate() {
        $("#mymodal").modal('show')
    }

    function submitRate() {
        var rating = $('#rating-input').val();
        var komentar = $('#komentar').val();

        if (rating === '' || rating === 0) {
            $("#alert_rating").show();
            $("#rating-input").focus();
            res = res && false;
            exit;
        } else {
            $("#alert_rating").hide();
        }

        if (komentar === '') {
            $("#alert_komentar").show();
            $("#komentar").focus();
            res = res && false;
            exit;
        } else {
            $("#alert_komentar").hide();
        }

        $("#mymodal").modal('hide')

        $.ajax({
            url: "<?php echo base_url(); ?>home/submit_rating",
            data: "rating=" + rating + "&komentar=" + komentar,
            cache: false,
            success: function(msg) {
                alert("Terima kasih atas penilaian anda.");
            }
        })
    }
</script>