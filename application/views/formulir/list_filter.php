<div id="data_formulir" class="table-responsive">
  <table class="table table-bordered table-striped" id="mytable2">
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
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#mytable2").DataTable({
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