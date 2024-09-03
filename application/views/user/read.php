<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Manajemen User
    <mdall>Data User</mdall>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Manajemen User</a></li>
    <li class="active">Data User</li>
  </ol>
</section>

<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class="col-md-12">
      <div class='box box-solid'>
        <div class="box-header with-border">
          <h3 class='box-title'><i class='fa fa-user'></i> USER</h3>
          <hr>
          <td><a href="<?= site_url('user') ?>" class="btn btn-default">Cancel</a></td>
        </div>
        <div class="box-body" style="padding:20px;">
          <div class="form-group">
            <label class="col-md-5">Username</label>
            <div class="col-md-7">
              <p><?= $username; ?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5">Nama Lengkap</label>
            <div class="col-md-7">
              <p><?= $nama; ?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5">Nomor HP</label>
            <div class="col-md-7">
              <p><?= $telp; ?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5">Alamat Email</label>
            <div class="col-md-7">
              <p><?= $email; ?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5">Alamat</label>
            <div class="col-md-7">
              <p><?= $alamat; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>