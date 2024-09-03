<!-- Formulir Header (Page header) -->
<section class="content-header">
  <h1>
    Permohonan Keberatan Informasi Publik
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-book"></i> Permohonan Keberatan Informasi Publik</a></li>
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
              <label class="col-sm-1 control-label"></label>
              <div class="col-sm-6">

              </div>
              <div class="col-sm-5">
                <div class="pull-right">
                  <?= anchor(
                    site_url('formulir/rekap_permohonan_pdf'),
                    '<i class="fa fa-file-pdf-o"></i> Cetak Rekap',
                    'class="btn btn-danger btn-sm" target="_blank"'
                  ); ?>
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
                  <th>Nomor Keberatan</th>
                  <th>Permohonan</th>
                  <th>Alasan Keberatan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $start  = 0;
                foreach ($formulir_data as $formulir) {
                ?>
                  <tr>
                    <td><?= ++$start ?></td>
                    <td><?= $formulir->NomorKeberatan ?></td>
                    <td>
                      Nomor Permohonan : <?= $formulir->Nomor ?><br>
                      Rincian Informasi : <?= $formulir->RincianInformasi ?><br>
                      Jawaban dari PPID : <?= $formulir->Response ?>
                    </td>
                    <td><?= $formulir->AlasanKeberatan ?></td>
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
</script>