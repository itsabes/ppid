<!-- Formulir Header (Page header) -->
<section class="content-header">
  <h1>
    Permohonan Informasi Publik
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-book"></i> Permohonan Informasi Publik</a></li>
  </ol>
</section>

<!-- Main formulir -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-primary'>
        <div class='box-header with-border'>
          <form class="form-horizontal">
            <div class="row">
              <div class="col-sm-7">
                <select data-placeholder="Pilih Tujuan Informasi..." class="form-control select2" style="width: 50%;" tabindex="2" name="Tujuan" id="Tujuan">
                  <option value=""></option>
                  <option value="Bertujuan untuk Penelitian">Bertujuan untuk Penelitian</option>
                  <option value="Bertujuan untuk Data Awal Penelitian">Bertujuan untuk Data Awal Penelitian</option>
                  <option value="Lain-Lain">Lain-Lain</option>
                  <option value="semua">Semua Data</option>
                </select>
              </div>
              <div class="col-sm-5" id="export">
                <div class="pull-right">
                  <a href="<?= base_url('formulir/exportexcel') ?>" class="btn btn-success btn-sm btn-flat" id="export-excel"><i class="fa fa-file-excel-o"></i> Excel</a>
                  <a href="<?= base_url('formulir/rekap_permohonan_pdf') ?>" class="btn btn-danger btn-sm" id="export-pdf"><i class="fa fa-file-pdf-o"></i> Cetak Rekap</a>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class='box-body'>
          <div id="data_formulir" class="table-responsive">
            <table class="table table-bordered table-striped" id="mytable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Permohonan</th>
                  <th>Kategori Permohonan</th>
                  <th>Nama Pemohon</th>
                  <th>Email</th>
                  <th>Rincian Informasi</th>
                  <th>Tujuan Penggunaan Informasi</th>
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
                    <td><?= $formulir->Kategori ?></td>
                    <td><?= $formulir->Nama ?></td>
                    <td><?= $formulir->Email ?></td>
                    <td><?= $formulir->RincianInformasi ?></td>
                    <td><?= $formulir->TujuanInformasi ?></td>
                    <td><?= $formulir->CreatedDate ?></td>
                    <td width="100px" class="btn-group">
                      <button onclick="editClick('<?= $formulir->IdFormulir ?>')" type="button" class="btn btn-xs btn-success"><i class="fa fa-laptop"></i></button>

                      <?php
                      // echo '  ';

                      echo anchor(
                        site_url('formulir/permohonan_pdf/' . $formulir->IdFormulir),
                        '<i class="fa fa-print"></i>',
                        'title="Print" target="_blank" class="btn btn-info btn-xs" style="margin-left: 2px;"'
                      );

                      // echo '  ';

                      echo anchor(
                        site_url('formulir/delete/' . $formulir->IdFormulir),
                        '<i class="fa fa-trash-o"></i>',
                        'title="Delete" class="btn btn-danger btn-xs" style="margin-left: 2px;" onclick="javasciprt: return confirm(\'Anda Yakin Hapus Formulir ini ?\')"'
                      );

                      if (!empty($formulir->UploadPermohonan)) {

                        // echo ' | ';

                        echo "<button onclick='showClick( $formulir->IdFormulir )' type='button' class='btn btn-xs btn-warning' style='margin-left: 2px;'><i class='fa fa-file'></i></button>";
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

<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">File Upload</h3>
      </div>
      <div class="modal-body">
        <img id="fileup" src="" width="100%" />
        <input type="hidden" name="row_id" id="id">
        <table class="table">
          <tr>
            <td class="col-md-8" colspan="2">Surat Permohonan
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadPermohonan"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">KAK/Proposal Penelitian
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadKak"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">FC KTP/KITAS Peneliti Utama
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadKartuIdentitas"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">Upload Surat keterangan Kaji Etik
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadKeteranganKajiEtik"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">Kuesioner Wawancara
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadKuisioner"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">Surat Rekomendasi Penelitian dari PTSP
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadRekomPtsp"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">Izin Riset/Klirens Etik Riset
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadIzinRiset"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">Surat Keterangan Penelitian yang dikeluarkan oleh Direktorat Jenderal Politik dan Pemerintahan Umum Kementerian Dalam Negeri RI
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadKeteranganDirjen"></p>
            </td>
          </tr>
          <tr>
            <td class="col-md-8" colspan="2">Surat Pernyataan yang sudah ditandatangani (materai 10 ribu) akan menyerahkan laporan hasil penelitian beserta rekomendasi kebijakan dari hasil penelitian
            </td>
            <td class="col-md-4" colspan="2">
              <p class="LinkUploadPernyataanHasil"></p>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-md btn-default"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Form </h3>
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
                <input type="hidden" name="IdFormulir" class="form-control" id="IdFormulir">
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;KEMBALI</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#mytable").DataTable({
      "lengthMenu": [
        [25, 50, 100, 500, -1],
        [25, 50, 100, 500, "All"]
      ],
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": true,
      "bAutoWidth": true
    });
  });

  $("#Tujuan").change(function() {
    let Tujuan = $("#Tujuan").val();

    $("#data_formulir").append('');

    if (Tujuan == "Bertujuan untuk Penelitian") {
      $("#export-excel").attr("href", "<?= base_url(); ?>formulir/exportexcelpenelitian/");
      $("#export-pdf").attr("href", "<?= base_url(); ?>formulir/penelitian_permohonan_pdf/");
    } else if (Tujuan == "Bertujuan untuk Data Awal Penelitian") {
      $("#export-excel").attr("href", "<?= base_url(); ?>formulir/exportexceldataawal/");
      $("#export-pdf").attr("href", "<?= base_url(); ?>formulir/dataawal_permohonan_pdf/");
    } else if (Tujuan == "Lain-Lain") {
      $("#export-excel").attr("href", "<?= base_url(); ?>formulir/exportexcellain/");
      $("#export-pdf").attr("href", "<?= base_url(); ?>formulir/lain_permohonan_pdf/");
    } else {
      $("#export-excel").attr("href", "<?= base_url(); ?>formulir/exportexcel/");
      $("#export-pdf").attr("href", "<?= base_url(); ?>formulir/rekap_permohonan_pdf/");
    }

    $.ajax({
      url: "<?= base_url(); ?>formulir/get_permohonan_filter/",
      method: "POST",
      data: "Tujuan=" + Tujuan,
      success: function(msg) {
        $("#data_formulir").html(msg);
      }
    })
  });

  function showClick(id) {
    var baselink = "<?= base_url('upload/permohonan/') ?>";
    $.ajax({
      url: "<?= base_url('formulir/edit') ?>/" + id,
      success: function(e) {
        var r = eval("(" + e + ")");
        $("#IdFormulir").val(r.IdFormulir)

        var fpermohonan = r.UploadPermohonan;
        if (fpermohonan == null || fpermohonan == "") {
          $(".LinkUploadPermohonan").hide();
        } else {
          linkpermohonan = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fpermohonan + "' title='Surat Permohonan' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadPermohonan").html(linkpermohonan);
          $(".LinkUploadPermohonan").show();
        }

        var fkak = r.UploadKak;
        if (fkak == null || fkak == "") {
          $(".LinkUploadKak").hide();
        } else {
          linkkak = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkak + "' title='KAK' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKak").html(linkkak);
          $(".LinkUploadKak").show();
        }

        var fkartuidentitas = r.UploadKartuIdentitas;
        if (fkartuidentitas == null || fkartuidentitas == "") {
          $(".LinkUploadKartuIdentitas").hide();
        } else {
          linkkartuidentitas = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkartuidentitas + "' title='Kartu Identitas' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKartuIdentitas").html(linkkartuidentitas);
          $(".LinkUploadKartuIdentitas").show();
        }

        var fketerangankajietik = r.UploadKeteranganKajiEtik;
        if (fketerangankajietik == null || fketerangankajietik == "") {
          $(".LinkUploadKeteranganKajiEtik").hide();
        } else {
          linkketerangankajietik = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fketerangankajietik + "' title='Keterangan Kaji Etik' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKeteranganKajiEtik").html(linkketerangankajietik);
          $(".LinkUploadKeteranganKajiEtik").show();
        }

        var fkuisioner = r.UploadKuisioner;
        if (fkuisioner == null || fkuisioner == "") {
          $(".LinkUploadKuisioner").hide();
        } else {
          linkkuisioner = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkuisioner + "' title='Kuisioner' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKuisioner").html(linkkuisioner);
          $(".LinkUploadKuisioner").show();
        }

        var frekomptsp = r.UploadRekomPtsp;
        if (frekomptsp == null || frekomptsp == "") {
          $(".LinkUploadRekomPtsp").hide();
        } else {
          linkrekomptsp = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + frekomptsp + "' title='Rekomendasi PTSP' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadRekomPtsp").html(linkrekomptsp);
          $(".LinkUploadRekomPtsp").show();
        }

        var fizinriset = r.UploadIzinRiset;
        if (fizinriset == null || fizinriset == "") {
          $(".LinkUploadIzinRiset").hide();
        } else {
          linkizinriset = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fizinriset + "' title='Izin Riset' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadIzinRiset").html(linkizinriset);
          $(".LinkUploadIzinRiset").show();
        }

        var fketerangandirjen = r.UploadKeteranganDirjen;

        if (fketerangandirjen == null || fketerangandirjen == "") {
          $(".LinkUploadKeteranganDirjen").hide();
        } else {
          linkketerangandirjen = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fketerangandirjen + "' title='Keterangan Dirjen' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadKeteranganDirjen").html(linkketerangandirjen);
          $(".LinkUploadKeteranganDirjen").show();
        }

        var fpernyataanhasil = r.UploadPernyataanHasil;

        if (fpernyataanhasil == null || fpernyataanhasil == "") {
          $(".LinkUploadPernyataanHasil").hide();
        } else {
          linkpernyataanhasil = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fpernyataanhasil + "' title='Pernyataan Hasil' target='_blank'><i class='fa fa-file'></i><a></button>";
          $(".LinkUploadPernyataanHasil").html(linkpernyataanhasil);
          $(".LinkUploadPernyataanHasil").show();
        }

        $("#detailmodal").modal('show')
      }
    })
  }

  function editClick(id) {
    $.ajax({
      url: "<?= base_url('formulir/edit') ?>/" + id,
      success: function(e) {
        var r = eval("(" + e + ")");
        $("#IdFormulir").val(r.IdFormulir)
        $("#Nomor").val(r.Nomor)
        $("#Kategori").val(r.Kategori)
        $("#NIK").val(r.NIK)
        $("#Nama").val(r.Nama)
        $("#Alamat").val(r.Alamat)
        $("#Email").val(r.Email)
        $("#NoTelp").val(r.NoTelp)
        $("#Pekerjaan").val(r.Pekerjaan)
        $("#RincianInformasi").val(r.RincianInformasi)
        $("#TujuanInformasi").val(r.TujuanInformasi)
        $("#CaraMemperoleh").val(r.CaraMemperoleh)
        $("#Salinan").val(r.Salinan)
        $("#CaraDapatSalinan").val(r.CaraDapatSalinan)

        $("#mymodal").modal('show')
      }
    })
  }
</script>