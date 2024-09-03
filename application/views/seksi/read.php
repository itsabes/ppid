        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Master
                <small>Plant</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Master</a></li>
                <li class="active">Plant</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'><i class='fa fa-building'></i> PLANT </h3>
                <hr>
        <table class="table table-bordered">
	    <tr><td>Kode Plant</td><td><?php echo $kode_plant; ?></td></tr>
	    <tr><td>Nama Plant</td><td><?php echo $nama_plant; ?></td></tr>
	    <tr><td>Lokasi Plant</td><td><?php echo $lokasi_plant; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sos/plant') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->