<!-- Formulir Header (Page header) -->
<section class="content-header">
    <h1>
        Rekap Survey Kepuasan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Rekap Survey Kepuasan</a></li>
    </ol>
</section>

<!-- Main formulir -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header with-border'>
                    <div class="col-md-2">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $rating1 ?></h3>
                                <p>Bintang 1</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-star"></i>
                            </div>
                            <a href="#" class="small-box-footer">Klik Di Sini <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= $rating2 ?></h3>
                                <p>Bintang 2</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-star"></i>
                            </div>
                            <a href="#" class="small-box-footer">Klik Di Sini <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= $rating3 ?></h3>
                                <p>Bintang 3</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-star"></i>
                            </div>
                            <a href="#" class="small-box-footer">Klik Di Sini <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><?= $rating4 ?></h3>
                                <p>Bintang 4</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-star"></i>
                            </div>
                            <a href="#" class="small-box-footer">Klik Di Sini <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?= $rating5 ?></h3>
                                <p>Bintang 5</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-star"></i>
                            </div>
                            <a href="#" class="small-box-footer">Klik Di Sini <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class='box-body'>
                    <div id="data_formulir" class="table-responsive">
                        <table class="table table-bordered table-striped" id="">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rating</th>
                                    <th>Komentar</th>
                                    <th>IP</th>
                                    <th>Tanggal Submit</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($rating_data as $rating) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$start ?></td>
                                        <td>Bintang <?php echo $rating->Rating ?></td>
                                        <td><?php echo $rating->Komentar ?></td>
                                        <td><?php echo $rating->IP ?></td>
                                        <td><?php echo $rating->CreatedDate ?></td>
                                        <td style="text-align:center" width="140px">
                                            <?php
                                            echo anchor(site_url('formulir/delete_rating/' . $rating->IdRating), '<i class="fa fa-trash-o"></i>', 'title="Delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Anda Yakin Hapus Rating ini ?\')"');
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

<script type="text/javascript">
    $(document).ready(function() {
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
    });
</script>