<div class="container">
    <br>
    <section class='content'>
        <div class='row'>
            <div class="col-md-12">
                <h3>Rating</h3>
                <div class="box box-solid">
                    <!--
                    <div class="box-header with-border">
                    <h3 class="box-title">Frequenty Asked Question</h3>
                    </div>
                    -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- <div class="row"> -->
                        <table class="table table-hover">
                            <tbody>
                                <?php foreach ($rating_all_data as $rating) : ?>
                                    <tr>
                                        <td style="width: 20%;">
                                            <span><?php echo $rating->Rating ?></span><span>/5</span>
                                        </td>
                                        <td class="stars inline-block" style="width: 30%;">
                                            <div class="row">
                                                <?php
                                                $bintang = $rating->Rating;
                                                for ($x = 0; $x <= $bintang - 1; $x++) { ?>
                                                    <?php echo '<a><i class="fa fa-star"></i></a>' ?>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td style="width: 50%;">
                                            <?= $rating->Komentar; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>