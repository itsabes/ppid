<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/star-rating.css' ?>">

<!-- HEADER SECTION START -->
<section class="content-header">
  <h1>Permohonan Penelitian</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-book"></i> Permohonan Penelitian</a></li>
  </ol>
</section>
<!-- HEADER SECTION END -->

<!-- MAIN SECTION START -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-primary'>
        <div class="box-header">
          <a href="<?= base_url(); ?>form_permohonan_penelitian" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Permohonan Data Penelitian</a>
        </div>
        <div class='box-body'>
          <div id="data_formulir" class="table-responsive">
            <table class="table table-bordered table-striped" id="mytable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Permohonan</th>
                  <th>Nama Pemohon</th>
                  <th>Email</th>
                  <th>Jawaban dari PPID</th>
                  <th>Tanggal Permohonan</th>
                  <th style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $start = 0;
                foreach ($formulir_data as $formulir) {
                ?>
                  <tr>
                    <td><?= ++$start ?></td>
                    <td><?= $formulir->Nomor ?></td>
                    <td><?= $formulir->Nama ?></td>
                    <td><?= $formulir->Email ?></td>
                    <td><?= $formulir->Response ? $formulir->Response : "<p class='text-danger'>Masih Dalam Proses Tindak Lanjut</p>"; ?></td>
                    <td><?= $formulir->CreatedDate ?></td>
                    <td style="text-align:center" width="140px">
                      <?php
                      if ($formulir->Status == 2) {
                        echo "<button onclick='showClick( $formulir->IdFormulir )' type='button' class='btn btn-xs btn-warning btn-block'><i class='fa fa-file'> Upload Revisi</i></button>";
                        echo "<button onclick='editClick($formulir->IdFormulir)' type='button' class='btn btn-xs btn-success btn-block'><i class='fa fa-pencil'> Update Status Revisi</i></button>";
                      }

                      echo anchor(site_url('formulir/permohonan_pdf/' . $formulir->IdFormulir), '<i class="fa fa-print"></i> Form Permohonan', 'title="Print" target="_blank" class="btn btn-info btn-xs btn-block"');

                      if (!empty($formulir->UploadJawaban)) {
                        echo anchor(site_url('upload/formulir/' . $formulir->UploadJawaban), '<i class="fa fa-file"></i> Jawaban Permohonan', 'title="Surat Jawaban" target="_blank" class="btn btn-primary btn-xs btn-block"');
                      }
                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MAIN SECTION END -->

<!-- SECTION BUTTON RATING START -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-primary'>
        Berikan rating dengan klik : <a href="javascript:void(0)" onclick="openRate()"><strong><u>Di Sini</u></strong></a>
      </div>
    </div>
  </div>
</section>
<!-- SECTION BUTTON RATING END -->

<!-- MODAL UPDATE PROFILE START -->
<div class="modal fade" id="editprofilemodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit Profile</h3>
      </div>
      <div class="modal-body">
        <form id="frm-edit">
          <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('uid'); ?>">
          <span id="form-pesan" class="text-danger mb-0">
          </span>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap ..">
            <div id="invalid-nama" class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="telp">Nomor Telepon</label>
            <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor Telepon ..">
            <div id="invalid-telp" class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email ..">
            <div id="invalid-email" class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="username">Username Login</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username Login ..">
            <div id="invalid-username" class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="password">Password Login</label>
            <input type="text" name="password" id="password" class="form-control" placeholder="Password Login ..">
            <div id="invalid-password" class="invalid-feedback"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-md btn-danger pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
        <a href="javascript:void(0)" onclick="updateProfile()" class="btn btn-md btn-primary float-right"><i class="fa fa-check"></i> &nbsp;&nbsp;SIMPAN</a>
      </div>
    </div>
  </div>
</div>
<!-- MODAL UPDATE PROFILE END -->

<!-- MODAL UPDATE STATUS REVISI START -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Update Status Revisi</h3>
      </div>
      <div class="modal-body">
        <form id="frm">
          <input type="hidden" name="row_id" id="id">
          <table class="table">
            <tr>
              <td class="col-md-3" colspan="2">Nomor Pengajuan
                <input class="form-control" name="Nomor" id="Nomor" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Kategori
                <input class="form-control" name="Kategori" id="Kategori" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Sudah selesai di revisi ?
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="Status" id="status-3" value=3>
                  <label class="form-check-label" for="status-3">
                    Ya
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">NIK
                <input class="form-control" name="NIK" id="NIK" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Nama
                <input class="form-control" name="Nama" id="Nama" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Alamat
                <textarea class="form-control" name="Alamat" id="Alamat" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Email
                <input class="form-control" name="Email" id="Email" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">No Telepon
                <input class="form-control" name="NoTelp" id="NoTelp" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Pekerjaan
                <input class="form-control" name="Pekerjaan" id="Pekerjaan" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Rincian Informasi
                <textarea class="form-control" name="RincianInformasi" id="RincianInformasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Tujuan Mendapatkan Informasi
                <textarea class="form-control" name="TujuanInformasi" id="TujuanInformasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Cara Memperoleh Informasi
                <input class="form-control" name="CaraMemperoleh" id="CaraMemperoleh" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Mendapatkan Salinan Informasi
                <input class="form-control" name="Salinan" id="Salinan" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-3" colspan="2">Cara Mendapatkan Salinan Informasi
                <input class="form-control" name="CaraDapatSalinan" id="CaraDapatSalinan" placeholder="">
              </td>
            </tr>
            <tr>
              <td class="col-md-5">
                <input type="hidden" class="form-control" name="IdFormulir" id="IdFormulir">
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
        <a href="javascript:void(0)" onclick="submitDocClick()" class="btn btn-md btn-primary float-right"><i class="fa fa-check"></i> &nbsp;&nbsp;SIMPAN</a>
      </div>
    </div>
  </div>
</div>
<!-- MODAL UPDATE STATUS REVISI END -->

<!-- MODAL UPLOAD REVISI START -->
<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('formulir/store_edit_formulir_file') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h3 class="modal-title">File Upload</h3>
        </div>
        <div class="modal-body">
          <input type="hidden" name="row_id" id="id">
          <table class="table">
            <tr id="surat-permohonan">
              <td class="col-md-6" colspan="2">Surat Permohonan<span class="text-danger"> *PDF</span>
              </td>
              <td class="col-md-4" colspan="2">
                <input type="file" class="form-control" name="UploadPermohonan" id="UploadPermohonan" placeholder="">
              </td>
              <td class="col-md-2" colspan="2">
                <p class="LinkUploadPermohonan"></p>
              </td>
            </tr>
            <?php if ($formulir->TujuanInformasi != 'Lain-Lain') { ?>
              <tr id="proposal-penelitian">
                <td class="col-md-6" colspan="2">KAK/Proposal Penelitian<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadKak" id="UploadKak" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadKak"></p>
                </td>
              </tr>
              <tr id="ktp-kitas-peneliti">
                <td class="col-md-6" colspan="2">FC KTP/KITAS Peneliti Utama<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadKartuIdentitas" id="UploadKartuIdentitas" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadKartuIdentitas"></p>
                </td>
              </tr>
              <tr id="suket-kaji-etik">
                <td class="col-md-6" colspan="2">Upload Surat keterangan Kaji Etik<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadKeteranganKajiEtik" id="UploadKeteranganKajiEtik" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadKeteranganKajiEtik"></p>
                </td>
              </tr>
              <tr id="kuisioner-wawancara">
                <td class="col-md-6" colspan="2">Kuesioner Wawancara<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadKuisioner" id="UploadKuisioner" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadKuisioner"></p>
                </td>
              </tr>
              <tr id="rekomendasi-ptsp">
                <td class="col-md-6" colspan="2">Surat Rekomendasi Penelitian dari PTSP<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadRekomPtsp" id="UploadRekomPtsp" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadRekomPtsp"></p>
                </td>
              </tr>
              <tr id="izin-riset">
                <td class="col-md-6" colspan="2">Izin Riset/Klirens Etik Riset<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadIzinRiset" id="UploadIzinRiset" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadIzinRiset"></p>
                </td>
              </tr>
              <tr id="suket-penelitian">
                <td class="col-md-6" colspan="2">Surat Keterangan Penelitian yang dikeluarkan oleh Direktorat Jenderal Politik dan Pemerintahan Umum Kementerian Dalam Negeri RI<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadKeteranganDirjen" id="UploadKeteranganDirjen" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadKeteranganDirjen"></p>
                </td>
              </tr>
              <tr id="surat-pernyataan">
                <td class="col-md-6" colspan="2">Surat Pernyataan yang sudah ditandatangani (materai 10 ribu) akan menyerahkan laporan hasil penelitian beserta rekomendasi kebijakan dari hasil penelitian<span class="text-danger"> *PDF</span>
                </td>
                <td class="col-md-4" colspan="2">
                  <input type="file" class="form-control" name="UploadPernyataanHasil" id="UploadPernyataanHasil" placeholder="">
                </td>
                <td class="col-md-2" colspan="2">
                  <p class="LinkUploadPernyataanHasil"></p>
                </td>
              </tr>
            <?php } ?>
            <tr>
              <td class="col-md-5">
                <input type="hidden" name="IdFormulir" class="form-control" id="IdFormulir1">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
          <button type="submit" class="btn btn-md btn-primary float-right"><i class="fa fa-check"></i> &nbsp;&nbsp;SIMPAN</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- MODAL UPLOAD REVISI END -->

<!-- MODAL RETING START -->
<div class="modal fade" id="ratingmodal" tabindex="-1" role="dialog" aria-hidden="true">
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
<!-- MODAL RETING END -->

<script type="text/javascript" src="<?= base_url() . 'assets/js/star-rating.js' ?>"></script>

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

    // DATATABLE START
    $("#mytable").DataTable({
      "lengthMenu": [
        [25, 50, 100, 500, -1],
        [25, 50, 100, 500, "All"]
      ],
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": false,
      "bInfo": true,
      "bAutoWidth": true
    });
    // DATATABLE END

    let email = "<?= $email ?>";
    if (email == '') {
      alert("Mohon lengkapi biodata anda terlebih dahulu");
    }
  });

  // BUTTON EDIT PROFILE START
  $('#edit-profile').on('click', function() {
    let id_user = $('#id_user').val();

    $.ajax({
      type: "GET",
      url: `<?= base_url('user/editPemohon') ?>/${id_user}`,
      success: function(val) {
        let data = JSON.parse(val);

        $('#form-pesan').html('');
        let form = document.querySelector('form#frm-edit');
        form.reset();

        $('#nama').val(data.nama);
        $('#telp').val(data.telp);
        $('#email').val(data.email);
        $('#username').val(data.username).prop('readonly', true);

        $("#editprofilemodal").modal('show');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Data Tidak di temukan !');
      }
    });
  })
  // BUTTON EDIT PROFILE END

  // ACTION EDIT PROFILE START
  function updateProfile() {
    let id_user = $('#id_user').val();
    var form = $("form#frm-edit").serialize();
    $.ajax({
      type: "POST",
      url: `<?= base_url('user/updatePemohon') ?>/${id_user}`,
      data: form,
      success: function(respon) {
        var obj = $.parseJSON(respon);
        if (obj.code == 200) {
          $('#editprofilemodal').modal('hide');

          alert('Profile berhasil diperbarui');
        } else {
          $('#form-pesan').html(obj.message);
        }
      },
    });
  }
  // ACTION EDIT PROFILE START

  // BUTTON OPEN RATE START
  function openRate() {
    $("#ratingmodal").modal('show')
  }
  // BUTTON OPEN RATE END

  // ACTION SUBMIT RATING START
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

    $("#ratingmodal").modal('hide')

    $.ajax({
      url: "<?= base_url(); ?>home/submit_rating",
      data: "rating=" + rating + "&komentar=" + komentar,
      cache: false,
      success: function(msg) {
        alert("Terima kasih atas penilaian anda.");
      }
    })
  }
  // ACTION SUBMIT RATING START

  // BUTTON EDIT PERMOHONAN START
  function editClick(id) {
    $.ajax({
      url: "<?= base_url('formulir/edit') ?>/" + id,
      success: function(e) {
        var r = eval("(" + e + ")");
        $("#IdFormulir").val(r.IdFormulir)
        $("#Nomor").val(r.Nomor).attr('readonly', 'readonly')
        $("#Kategori").val(r.Kategori).attr('readonly', 'readonly')
        $("#NIK").val(r.NIK)
        $("#Nama").val(r.Nama)
        $("#Alamat").val(r.Alamat)
        $("#Email").val(r.Email)
        $("#NoTelp").val(r.NoTelp)
        $("#Pekerjaan").val(r.Pekerjaan)
        $("#RincianInformasi").val(r.RincianInformasi)
        $("#TujuanInformasi").val(r.TujuanInformasi).attr('readonly', 'readonly')
        $("#CaraMemperoleh").val(r.CaraMemperoleh).attr('readonly', 'readonly')
        $("#Salinan").val(r.Salinan).attr('readonly', 'readonly')
        $("#CaraDapatSalinan").val(r.CaraDapatSalinan).attr('readonly', 'readonly')
        $("#status-" + r.Status).val(r.Status).prop('checked', true)

        $("#mymodal").modal('show')
      }
    })
  }
  // BUTTON EDIT PERMOHONAN END

  // SHOW FILE UPLOAD START
  function showClick(id) {
    var baselink = "<?= base_url('upload/permohonan/') ?>";
    urlUpdate = "<?= base_url('formulir/edit') ?>/" + id;

    $.ajax({
      url: "<?= base_url('formulir/edit') ?>/" + id,
      success: function(e) {
        var r = eval("(" + e + ")");
        $("#IdFormulir1").val(r.IdFormulir)

        var fpermohonan = r.UploadPermohonan;
        if (fpermohonan == null || fpermohonan == "") {
          $(".LinkUploadPermohonan").hide();
        } else {
          linkpermohonan = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fpermohonan + "' title='Surat Permohonan' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadPermohonan").html(linkpermohonan);
          $(".LinkUploadPermohonan").show();
        }

        var fkak = r.UploadKak;
        if (fkak == null || fkak == "") {
          $(".LinkUploadKak").hide();
        } else {
          linkkak = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkak + "' title='KAK' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKak").html(linkkak);
          $(".LinkUploadKak").show();
        }

        var fkartuidentitas = r.UploadKartuIdentitas;
        if (fkartuidentitas == null || fkartuidentitas == "") {
          $(".LinkUploadKartuIdentitas").hide();
        } else {
          linkkartuidentitas = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkartuidentitas + "' title='Kartu Identitas' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKartuIdentitas").html(linkkartuidentitas);
          $(".LinkUploadKartuIdentitas").show();
        }

        var fketerangankajietik = r.UploadKeteranganKajiEtik;
        if (fketerangankajietik == null || fketerangankajietik == "") {
          $(".LinkUploadKeteranganKajiEtik").hide();
        } else {
          linkketerangankajietik = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fketerangankajietik + "' title='Keterangan Kaji Etik' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKeteranganKajiEtik").html(linkketerangankajietik);
          $(".LinkUploadKeteranganKajiEtik").show();
        }

        var fkuisioner = r.UploadKuisioner;
        if (fkuisioner == null || fkuisioner == "") {
          $(".LinkUploadKuisioner").hide();
        } else {
          linkkuisioner = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkuisioner + "' title='Kuisioner' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKuisioner").html(linkkuisioner);
          $(".LinkUploadKuisioner").show();
        }

        var frekomptsp = r.UploadRekomPtsp;
        if (frekomptsp == null || frekomptsp == "") {
          $(".LinkUploadRekomPtsp").hide();
        } else {
          linkrekomptsp = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + frekomptsp + "' title='Rekomendasi PTSP' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadRekomPtsp").html(linkrekomptsp);
          $(".LinkUploadRekomPtsp").show();
        }

        var fizinriset = r.UploadIzinRiset;
        if (fizinriset == null || fizinriset == "") {
          $(".LinkUploadIzinRiset").hide();
        } else {
          linkizinriset = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fizinriset + "' title='Izin Riset' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadIzinRiset").html(linkizinriset);
          $(".LinkUploadIzinRiset").show();
        }

        var fketerangandirjen = r.UploadKeteranganDirjen;
        if (fketerangandirjen == null || fketerangandirjen == "") {
          $(".LinkUploadKeteranganDirjen").hide();
        } else {
          linkketerangandirjen = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fketerangandirjen + "' title='Keterangan Dirjen' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKeteranganDirjen").html(linkketerangandirjen);
          $(".LinkUploadKeteranganDirjen").show();
        }

        var fpernyataanhasil = r.UploadPernyataanHasil;
        if (fpernyataanhasil == null || fpernyataanhasil == "") {
          $(".LinkUploadPernyataanHasil").hide();
        } else {
          linkpernyataanhasil = "<button type='button' class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fpernyataanhasil + "' title='Pernyataan Hasil' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadPernyataanHasil").html(linkpernyataanhasil);
          $(".LinkUploadPernyataanHasil").show();
        }

        $("#detailmodal").modal('show')
      }
    })
  }
  // SHOW FILE UPLOAD END

  // ACTION UPDATE STATUS REVISI START
  function submitDocClick() {
    var form = $("form#frm").serialize();
    $.ajax({
      type: "POST",
      url: "<?= base_url('formulir/store_edit_formulir') ?>",
      data: form,
      success: function(data) {
        $('#mymodal').modal('hide');
        location.reload()
      },
      error: function(e) {
        console.log(e);
      }
    });
  }
  // ACTION UPDATE STATUS REVISI END
</script>