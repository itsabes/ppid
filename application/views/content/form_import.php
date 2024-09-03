<script>
    $(document).ready(function() {
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        &nbsp;
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Data Management</a></li>
        <li><a href="#">TB Budget</a></li>
    </ol>
</section>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-solid'>
                <div class='box-header'>
                    <table class="table table-bordered">
                        <tr>
                        <tr>
                            <td style='vertical-align:middle'><img src="<?php echo base_url('assets/img/logokoser.png') ?>" width='90px'></td>
                            <td style='text-align:center;width:100%'><strong>
                                    <font size="5">PEMERINTAH KOTA SERANG<br>NERACA SALDO</font>
                                </strong></td>
                        </tr>
                    </table>
                    <hr>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Organisasi</label>
                            <div class="col-sm-6">
                                <select data-placeholder="Pilih Organisasi..." class="form-control select2" style="width: 100%;" tabindex="2" name="IdOrganisasi" id="IdOrganisasi" <?php if (!empty($plant_sess)) {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?>>
                                    <option value=""></option>
                                    <?php
                                    foreach ($data_organisasi->result_array() as $dp) {
                                        $pilih = '';
                                        if ($dp['IdOrganisasi'] == $IdOrganisasi or $dp['IdOrganisasi'] == $org_sess or $dp['IdOrganisasi'] == $org_sess2) {
                                            $pilih = 'selected="selected"';
                                    ?>
                                            <!--<option value="<?php echo $dp['IdOrganisasi']; ?>" <?php echo $pilih; ?>><?php echo $dp['kode_plant'] . " - " . $dp['NamaOrganisasi']; ?></option>-->
                                            <option value="<?php echo $dp['IdOrganisasi']; ?>" <?php echo $pilih; ?>><?php echo $dp['KodeOrganisasi'] . " " . $dp['NamaOrganisasi']; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <!--<option value="<?php echo $dp['IdOrganisasi']; ?>"><?php echo $dp['kode_plant'] . " - " . $dp['NamaOrganisasi']; ?></option>-->
                                            <option value="<?php echo $dp['IdOrganisasi']; ?>"><?php echo $dp['KodeOrganisasi'] . " " . $dp['NamaOrganisasi']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <?php
                                if (!empty($plant_sess)) { ?>
                                    <input type="hidden" name="IdOrganisasi" value="<?php echo $plant_sess; ?>" />
                                <?php } ?>
                                <?php echo form_error('IdOrganisasi') ?>
                            </div>

                            <div class="col-sm-5">
                                <div class="pull-right">
                                    <?php
                                    echo anchor('excel/format_neracasaldo.xlsx', '<i class="fa fa-download"></i> Download Excel Format', array('class' => 'btn btn-success btn-flat'));
                                    ?>
                                    <?php //echo anchor(site_url('excel/format.xlsx'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm btn-flat"'); 
                                    ?>
                                    <?php //echo anchor(site_url('realisasi/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm btn-flat"'); 
                                    ?>
                                    <?php //echo anchor(site_url('realisasi/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm btn-flat"'); 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div><!-- /.box-header -->
                <div class='box-body'>

                    <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
                    <form method="post" action="<?php echo base_url("neracasaldo/import"); ?>" enctype="multipart/form-data">
                        <!--
                -- Buat sebuah input type file
                -- class pull-left berfungsi agar file input berada di sebelah kiri
                -->
                        <input type="file" name="file">
                        <br>
                        <!--
                -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
                -->
                        <input type="submit" name="preview" class="btn btn-primary  btn-flat" value="Preview">
                        <?php echo "<a href='" . base_url("neracasaldo") . "' class='btn btn-warning btn-flat'><i class='fa fa-refresh'></i> Cancel</a>"; ?>
                    </form>
                    <hr>
                    <?php
                    if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
                        if (isset($upload_error)) { // Jika proses upload gagal
                            echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
                            die; // stop skrip
                        }

                        // Buat sebuah tag form untuk proses import data ke database
                        echo "<form method='post' action='" . base_url("neracasaldo/import_action") . "'>";

                        // Buat sebuah div untuk alert validasi kosong
                        echo "<div style='color: red;' id='kosong'>
                Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";

                        echo "<table class='table table-bordered table-striped' style='border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;'>
                        <tr>
                            <th>Period</th>
                            <th>Month</th>
                            <th style='text-align:left'>CoA</th>
                            <th style='text-align:right'>Value</th>
                        </tr>
                    </thead>";

                        $numrow = 1;
                        $kosong = 0;

                        // Lakukan perulangan dari data yang ada di excel
                        // $sheet adalah variabel yang dikirim dari controller
                        foreach ($sheet as $row) {
                            // Ambil data pada excel sesuai Kolom
                            $periode = $row['A']; // Ambil data COA
                            $month = $row['B']; // Ambil data COA
                            $coa = $row['C']; // Ambil data COA
                            $nominal = $row['D']; // Ambil data Nominal

                            // Cek jika semua data tidak diisi
                            if ($periode == "" && $nominal == "" && $coa == "" && $nominal == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                            // Cek $numrow apakah lebih dari 1
                            // Artinya karena baris pertama adalah nama-nama kolom
                            // Jadi dilewat saja, tidak usah diimport
                            if ($numrow > 1) {
                                // Validasi apakah semua data telah diisi
                                $periode_td = (!empty($periode)) ? "" : " style='background: #E07171;'"; // Jika periode kosong, beri warna merah
                                $month_td = (!empty($month)) ? "" : " style='background: #E07171;'"; // Jika month kosong, beri warna merah
                                $coa_td = (!empty($coa)) ? "" : " style='background: #E07171;'"; // Jika coa kosong, beri warna merah
                                $nominal_td = (!empty($nominal)) ? "" : " style='background: #E07171;text-align:right'"; // Jika nominal kosong, beri warna merah

                                // Jika salah satu data ada yang kosong
                                if ($periode == "" or $month == "" or $coa == "") {
                                    $kosong++; // Tambah 1 variabel $kosong
                                }

                                echo "<tr>";
                                echo "<td" . $periode_td . ">" . $periode . "</td>";
                                echo "<td" . $month_td . ">" . $month . "</td>";
                                echo "<td" . $coa_td . ">" . $coa . "</td>";
                                echo "<td" . $nominal_td . " style='text-align:right'>" . number_format($nominal, 2, ",", ".") . "</td>";
                                echo "</tr>";
                            }

                            $numrow++; // Tambah 1 setiap kali looping
                        }

                        echo "</table>";

                        // Cek apakah variabel kosong lebih dari 0
                        // Jika lebih dari 0, berarti ada data yang masih kosong
                        if ($kosong > 0) {
                    ?>
                            <script>
                                $(document).ready(function() {
                                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                                    $("#kosong").show(); // Munculkan alert validasi kosong
                                });
                            </script>
                    <?php
                        } else { // Jika semua data sudah diisi
                            echo "<hr>";

                            // Buat sebuah tombol untuk mengimport data ke database
                            echo "<button type='submit' class='btn btn-success btn-flat' name='import'><i class='fa fa-upload'></i> Import</button> ";
                            //echo "<a href='".base_url("realisasi")."' class='btn btn-warning btn-sm btn-flat'><i class='fa fa-refresh'></i> Cancel</a>";
                        }

                        echo "</form>";
                    }
                    ?>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#mytable").DataTable({
                                "lengthMenu": [
                                    [25, 50, 100, 500, -1],
                                    [25, 50, 100, 500, "All"]
                                ]
                            });
                        });
                    </script>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<script type="text/javascript">
    $("#Periode").change(function() {
        var Periode = $("#Periode").val();
        $.ajax({
            url: "<?php echo base_url(); ?>neracasaldo/ambil_data_neracasaldo",
            data: "Periode=" + Periode,
            cache: false,
            success: function(msg) {
                $("#data_neracasaldo").html(msg);
                //window.location.assign("<?php echo base_url(); ?>teknikal/teknisi");
            }
        })
    });

    $("#Month").change(function() {
        var Month = $("#Month").val();
        $.ajax({
            url: "<?php echo base_url(); ?>neracasaldo/ambil_data_neracasaldoi",
            data: "Month=" + Month,
            cache: false,
            success: function(msg) {
                $("#data_neracasaldo").html(msg);
                //window.location.assign("<?php echo base_url(); ?>teknikal/teknisi");
            }
        })
    });

    //$('#data_pembbu').load('<?php echo base_url(); ?>belanja/ambil_data_outlet_session');
</script>