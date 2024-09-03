<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Manajemen Pegawai <small>Profile Pegawai</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Manajemen Pegawai</a></li>
		<li class="active">Profile Pegawai</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<img class="profile-user-img img-responsive img-circle" src="<?= base_url(); ?>upload/pegawai/<?= $Foto; ?>" alt="User profile picture">

					<h3 class="profile-username text-center"><?= $NamaPegawai; ?></h3>
				</div>
			</div>
		</div>

		<!-- /.col -->
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="profile">
						<form action="<?= $action; ?>" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class='box box-solid' style="height:auto;padding:10px;">
								<div class="box-body" style="padding:20px;">
									<div class="form-group">
										<label class="col-sm-2">NIP </label>
										<div class="col-sm-3">
											<input type="text" id="Nip" name="Nip" class="form-control" placeholder="NIP" value="<?= $Nip; ?>">
										</div>
										<div class="col-sm-3"><?= form_error('Nip') ?></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Nama </label>
										<div class="col-sm-7">
											<input type="text" id="NamaPegawai" name="NamaPegawai" class="form-control" placeholder="Nama Pegawai" value="<?= $NamaPegawai; ?>">
										</div>
										<div class="col-sm-3"><?= form_error('NamaPegawai') ?></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Tempat Lahir</label>
										<div class="col-sm-7">
											<input type="text" id="TempatLahir" name="TempatLahir" class="form-control" placeholder="Tempat Lahir" value="<?= $TempatLahir; ?>">
										</div>
										<div class="col-sm-3"><?= form_error('TempatLahir') ?></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Tanggal Lahir </label>
										<div class="col-sm-3">
											<div class="input-group">
												<input type="text" id="TanggalLahir" name="TanggalLahir" class="form-control datepicker" placeholder="" value="<?php $TanggalLahir <> '' ? $TanggalLahir : ''; ?>">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											</div>
										</div>
										<div class="col-sm-3"><?= form_error('TanggalLahir') ?></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Organisasi</label>
										<div class="col-sm-7">
											<select data-placeholder="Pilih Organisasi..." class="select2" style="width: 100%;" tabindex="2" name="IdOrganisasi" id="IdOrganisasi">
												<option value=""></option>
												<?php
												foreach ($data_organisasi->result_array() as $dp) {
													$pilih = '';
													if ($dp['IdOrganisasi'] == $this->session->userdata("IdOrganisasi") or $dp['IdOrganisasi'] == $IdOrganisasi) {
														$pilih = 'selected="selected"';
												?>
														<option value="<?= $dp['IdOrganisasi']; ?>" <?= $pilih; ?>><?= $dp['KodeOrganisasi'] . " - " . $dp['NamaOrganisasi']; ?></option>
													<?php
													} else {
													?>
														<option value="<?= $dp['IdOrganisasi']; ?>"><?= $dp['KodeOrganisasi'] . " - " . $dp['NamaOrganisasi']; ?></option>
												<?php
													}
												}
												?>
											</select>
											<?= form_error('IdOrganisasi') ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Alamat</label>
										<div class="col-sm-7">
											<textarea id="Alamat" name="Alamat" class="form-control" placeholder="Alamat"><?= $Alamat; ?></textarea>
										</div>
										<div class="col-sm-3"><?= form_error('Alamat') ?></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Email</label>
										<div class="col-sm-7">
											<input type="text" id="Email" name="Email" class="form-control" placeholder="Email" value="<?= $Email; ?>">
										</div>
										<div class="col-sm-3"><?= form_error('Email') ?></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Foto </label>
										<div class="col-sm-5">
											<input type="file" name="Foto" id="Foto">
											<input type="hidden" name="Foto" value="<?= $Foto; ?>">
											<p class="help-block">Max. 1MB</p>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-2"></div>
										<div class="col-sm-5">
											<div id="image_preview"><img id="previewing" src="<?= base_url() . 'upload/pegawai/' . $Foto ?>" width="100" alt=" " /></div>
											<span id='loading'></span>
											<div id="message"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Username </label>
										<div class="col-sm-7">
											<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= $username; ?>" <?php if (!empty($pegawai)) {
																																										echo "readonly";
																																									} ?>>
										</div>
										<div class="col-sm-3"><?= form_error('username') ?></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Password </label>
										<div class="col-sm-7">
											<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?= $password; ?>">
											<!--<input type="checkbox" onclick="myFunction()">Show Password-->
										</div>
										<div class="col-sm-3"><?= form_error('password') ?></div>
									</div>
								</div>
								<div class="box-footer">
									<div class="row">
										<div class="col-sm-2"></div>
										<input type="hidden" name="IdPegawai" value="<?= $IdPegawai; ?>" />
										<button type="submit" class="btn btn-primary btn-flat"><?= $button ?></button>
										<a href="<?= site_url('pegawai/profile/' . $IdPegawai) ?>" class="btn btn-default btn-flat">Cancel</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	function myFunction() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>