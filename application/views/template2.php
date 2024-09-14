<!DOCTYPE html>
<html lang="en" id="effectweb">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= namaweb(); ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Icon -->
	<link rel="icon" type="image/x-icon" href="<?= icon(); ?>">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?= icon(); ?>">
	<link rel="shortcut icon" type="image/png" href="<?= icon(); ?>">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/bootstrap/css/bootstrap.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/select2/select2.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/iCheck/all.css">
	<!-- Colorpicker -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/colorpicker/bootstrap-colorpicker.min.css">
	<!-- Timepicker -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/daterangepicker/daterangepicker-bs3.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/datatables/dataTables.bootstrap.css">
	<!-- Ion Slider -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.css">
	<!-- ion slider Nice -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.skinNice.css">
	<!-- bootstrap slider -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/bootstrap-slider/slider.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/dist/css/skins/_all-skins.min.css">
	<!-- jQuery 2.1.4 -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- custom css -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/custom.css" />
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">



	<!-- CSS MAIN START -->
	<style>
		.table thead {
			background-color: #34495E;
			color: #fff;
		}

		.borderless td,
		.borderless th {
			border: none;
		}

		footer {
			background-color: #254A74;
			color: #fff;
		}

		.greyscaleall {
			filter: grayscale(100%);
		}
	</style>
	<!-- CSS MAIN END -->

	<!-- CSS RATING START -->
	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

		.ratings {
			background-color: #fff;
			padding: 54px;
			border: 1px solid rgba(0, 0, 0, 0.1);
			box-shadow: 0px 10px 10px #E0E0E0;
		}

		.product-rating {
			font-size: 50px;
		}

		.stars i {
			font-size: 18px;
			color: #28a745;
		}

		.rating-text {
			margin-top: 10px;
		}

		.jumlah-rating {
			color: #fff;
		}

		.coment-rating {
			color: #fff;
		}
	</style>
	<!-- CSS RATING END -->

	<?php
	$app          = 'ppid-dinkes';
	$level        = $this->access->get_level();

	if ($app == "ppid-dinkes") {
		$colorskin  = "skin-purple";
		$appname    = "ppid-dinkes";
		$bgdrop     = "bg-green";
	}
	?>
</head>

<body class="hold-transition <?= $colorskin ?> layout-top-nav fixed">
	<div class="wrapper">

		<header class="main-header">
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<div class="container">
					<div class="row justify-content-center">
						<div class="navbar-header">
							<a href="<?= site_url() ?>"><img src="<?= logo() ?>" width="180px"></a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
								<i class="fa fa-bars"></i>
							</button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<?php
								if ($level == 'admin') {
									$menu         = $this->db->query("SELECT * from menu where is_parent=0 and is_active=1 and pos = 2 and (aplikasi='$app' or aplikasi='*') ORDER BY urut ASC");
								} else {
									$menu         = $this->db->query("SELECT * from menu where is_parent=0 and is_active=1 and pos = 2 and (aplikasi='$app' or aplikasi='*') and (level='$level' or level='*') ORDER BY urut ASC");
								}

								foreach ($menu->result() as $m) {
									// chek ada sub menu
									if ($level == 'admin') {
										$submenu    = $this->db->query("SELECT * from menu where is_parent=$m->id and is_active=1 and pos = 2 and (aplikasi='$app' or aplikasi='*') ORDER BY urut ASC");
									} else {
										$submenu    = $this->db->query("SELECT * from menu where is_parent=$m->id and is_active=1 and pos = 2 and (aplikasi='$app' or aplikasi='*') and (level='$level' or level='*') ORDER BY urut ASC");
									}

									if ($submenu->num_rows() > 0) {
										// tampilkan submenu   
										$menusid      = "m" . $m->id;

										echo "<li class='dropdown " . $this->session->userdata($menusid) . "'>
                        " . anchor('#',  $m->name . " <span class='caret'></span>", "class='dropdown-toggle' data-toggle='dropdown'") . "
                            <ul class='dropdown-menu' role='menu'>";

										foreach ($submenu->result() as $s) {
											$menuid     = "m" . $s->id;

											echo "<li id='" . $s->id . "' class='menus " . $this->session->userdata($menuid) . "'>
                    " . anchor(site_url() . $s->link, "<i class='$s->icon'></i> <span>" . $s->name) . "</span></li>";
										}

										echo "</ul>
                        </li>";
									} else {
										$menusid      = "m" . $m->id;

										echo "<li id='" . $m->id . "' class='menus " . $this->session->userdata($menusid) . "'>
                  " . anchor(site_url() . $m->link, "<i class='$m->icon'></i> <span>" . $m->name) . "</span></li>";
									}
								}
								?>

								<li class="dropdown ">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Berita <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li id="100" class="menus "><a href="<?= base_url() ?>berita"><i class="fa fa-"></i> <span>Berita PPID</span></a></li>
										<li id="105" class="menus "><a href="<?= base_url() ?>sosialisasi"><i class="fa fa-"></i> <span>Sosialisasi PPID</span></a></li>
										<li id="105" class="menus "><a href="https://dinkes.jakarta.go.id/berita/kategori/artikel"><i class="fa fa-"></i> <span>Artikel Kesehatan</span></a></li>
										<li id="100" class="menus "><a href="<?= base_url() ?>berita_informasi_kesehatan"><i class="fa fa-"></i> <span>Informasi Kesehatan</span></a></li>
										<li id="100" class="menus "><a href="https://dinkes.jakarta.go.id/berita/layanan/siaran-pers"><i class="fa fa-"></i> <span>Siaran Pers</span></a></li>
									</ul>
								</li>

								<li>
									<?php if ($level == '') { ?>
										<a href="<?= base_url() . 'login' ?>">
											<button class="btn btn-md" style="background: #f08b11;color:#fff;border: 1px solid #fff;margin-left:7px;margin-top: -5px;"> LOGIN</button>
										</a>
									<?php } else { ?>
										<a href="<?= base_url() . 'dashboard' ?>">
											<button class="btn btn-md" style="background: #f08b11;color:#fff;border: 1px solid #fff;margin-left:7px;margin-top: -5px;"> HOME</button>
										</a>
									<?php } ?>
								</li>

							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
			</nav>
		</header>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!--<div class="container">-->
			<!--<section class="content-header">-->
			<?= $contents; ?>
			<!--</section>-->
			<!--</div>-->
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<div id="socmedwrap">
			<?php if (nama_facebook() != '-') { ?>
				<a target="_blank" href="<?= facebook(); ?>" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
				<br>
			<?php } ?>

			<?php if (nama_instagram() != '-') { ?>
				<a target="_blank" href="<?= instagram(); ?>" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
				<br>
			<?php } ?>

			<!-- <?php if (nama_twitter() != '-') { ?>
				<a target="_blank" href="<?= twitter(); ?>" title="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
				<br>
			<?php } ?> -->

			<?php if (nama_youtube() != '-') { ?>
				<a target="_blank" href="<?= youtube(); ?>" title="Youtube"><i class="fa-brands fa-youtube"></i></a>
				<br>
			<?php } ?>

			<!-- <?php if (nama_tiktok() != '-') { ?>
				<a target="_blank" href="<?= tiktok(); ?>" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
			<?php } ?> -->
		</div>

		<footer>
			<div class="row">
				<div class="col-lg-12">
					<div class="box-body">
						<div class="row">
							<div class="col-md-3">
								<h4 class="page-header"><?= namaweb(); ?></h4>
								<i class="fa fa-home"></i> Office : <br>
								<?= alamat(); ?>
								<i class="fa fa-map" aria-hidden="true"></i> Location : <br>
								<span>
									<?= htmlspecialchars_decode(google_map()); ?>
								</span><br><br>
								<i class="fa fa-phone"></i> Telepon : <br><?= telepon(); ?> <?= jam_operasional(); ?><br><br>
								<i class="fa fa-envelope"></i> Email : <br><?= email(); ?>
							</div>
							<div class="col-md-3">
								<h4 class="page-header"> Media Sosial <?= singkatan(); ?></h4>

								<?php if (nama_website() != '-') { ?>
									<a href="<?= website(); ?>" class="btn btn-success btn-block btn-social" target="_blank">
										<i class="fa fa-globe"></i>
										<span><?= nama_website(); ?></span>
									</a>
								<?php } ?>

								<!-- <?php if (nama_facebook() != '-') { ?>
									<a href="<?= facebook(); ?>" class="btn btn-primary btn-block btn-social" target="_blank">
										<i class="fa-brands fa-facebook"></i>
										<span><?= nama_facebook(); ?></span>
									</a>
								<?php } ?> -->

								<?php if (nama_instagram() != '-') { ?>
									<a href="<?= instagram(); ?>" class="btn btn-instagram btn-block btn-social" target="_blank">
										<i class="fa-brands fa-instagram"></i>
										<span><?= nama_instagram(); ?></span>
									</a>
								<?php } ?>

								<!-- <?php if (nama_twitter() != '-') { ?>
									<a href="<?= twitter(); ?>" class="btn btn-twitter btn-block btn-social" target="_blank">
										<i class="fa-brands fa-x-twitter"></i>
										<span><?= nama_twitter(); ?></span>
									</a>
								<?php } ?> -->

								<?php if (nama_youtube() != '-') { ?>
									<a href="<?= youtube(); ?>" class="btn btn-danger btn-block btn-social" target="_blank">
										<i class="fa-brands fa-youtube"></i>
										<span><?= nama_youtube(); ?></span>
									</a>
								<?php } ?>

								<!-- <?php if (nama_tiktok() != '-') { ?>
									<a href="<?= tiktok(); ?>" class="btn btn-github btn-block btn-social" target="_blank">
										<i class="fa-brands fa-tiktok"></i>
										<span><?= nama_tiktok(); ?></span>
									</a>
								<?php } ?> -->
							</div>
							<div class="col-md-3">
								<h4 class="page-header">Informasi</h4>
								<div class="timeline-body">
									<iframe width="310" height="180" src="//www.youtube.com/embed/c10Yqe5ab8Y" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>

							<!-- <div class="col-md-3">
								<h4 class="page-header">Informasi</h4> -->
							<!--<img src = "<?= base_url(); ?>/upload/image/informasi-ppid.jpeg" width="100%">-->
							<!-- <div class="timeline-body">
								<iframe width="310" height="180" src="//www.youtube.com/embed/c10Yqe5ab8Y" frameborder="0" allowfullscreen></iframe>
							</div> -->
							<!--
							<div class="timeline-footer">
								<a href="#" class="btn btn-xs bg-maroon">Lihat Komentar</a>
							</div>
							-->
							<!-- </div> -->
							<div class="col-md-3">
								<h4 class="page-header">Visitor Counter</h4>

								<!-- View Counter -->

								<!-- Histats.com  (div with counter) -->
								<div id="histats_counter"></div>

								<!-- Histats.com  START  (aync)-->
								<script type="text/javascript">
									var _Hasync = _Hasync || [];
									_Hasync.push(['Histats.start', '1,4702480,4,424,112,75,00011110']);
									_Hasync.push(['Histats.fasi', '1']);
									_Hasync.push(['Histats.track_hits', '']);
									(function() {
										var hs = document.createElement('script');
										hs.type = 'text/javascript';
										hs.async = true;
										hs.src = ('//s10.histats.com/js15_as.js');
										(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
									})();
								</script>

								<noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4702480&101" alt="hit tracker" border="0"></a></noscript>
								<!-- Histats.com  END  -->
							</div>
							<div class="col-md-3">
								<h4 class="page-header">Rating</h4>
								<div class="text-center">
									<!-- <a href='https://writingbachelorthesis.com/'>Visitor Counter</a>
									 <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=82dd0fb446edc92293cc1c8703c391f65a1b377a'></script>
									 <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/963146/t/0"></script>
									</div> -->
									<?php
									$rating_data = $this->db->query("SELECT * from rating where Rating > 3 ORDER BY RAND() DESC LIMIT 5");
									?>

									<table class="table">
										<tbody>
											<?php
											foreach ($rating_data->result() as $rating) :
											?>
												<tr>
													<td class="jumlah-rating" style="width: 20%;">
														<span><?= $rating->Rating ?></span><span>/5</span>
													</td>
													<td class="stars" style="width: 30%;">
														<?php
														$bintang = $rating->Rating;
														for ($x = 0; $x <= $bintang - 1; $x++) {
														?>

															<?= '<a><i class="fa fa-star"></i></a>' ?>

														<?php
														}
														?>
													</td>
													<td class="coment-rating" style="width: 50%;">
														<?= $rating->Komentar; ?>
													</td>
												</tr>
											<?php
											endforeach;
											?>
										</tbody>
									</table>

									<div class="text-center">
										<a href="<?php base_url() ?>rating" class="btn btn-warning">Rating Lainnya</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Create the tabs -->
			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
				<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript::;">
								<i class="menu-icon fa fa-birthday-cake bg-red"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

									<p>Will be 23 on April 24th</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript::;">
								<i class="menu-icon fa fa-user bg-yellow"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

									<p>New phone +1(800)555-1234</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript::;">
								<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

									<p>nora@example.com</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript::;">
								<i class="menu-icon fa fa-file-code-o bg-green"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

									<p>Execution time 5 seconds</p>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

					<h3 class="control-sidebar-heading">Tasks Progress</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript::;">
								<h4 class="control-sidebar-subheading">
									Custom Template Design
									<span class="label label-danger pull-right">70%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript::;">
								<h4 class="control-sidebar-subheading">
									Update Resume
									<span class="label label-success pull-right">95%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-success" style="width: 95%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript::;">
								<h4 class="control-sidebar-subheading">
									Laravel Integration
									<span class="label label-warning pull-right">50%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript::;">
								<h4 class="control-sidebar-subheading">
									Back End Framework
									<span class="label label-primary pull-right">68%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->
				</div>
				<!-- /.tab-pane -->
				<!-- Stats tab content -->
				<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
				<!-- /.tab-pane -->
				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<form method="post">
						<h3 class="control-sidebar-heading">General Settings</h3>

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Report panel usage
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Some information about this general settings option
							</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Allow mail redirect
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Other sets of options are available
							</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Expose author name in posts
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Allow the user to show his name in blog posts
							</p>
						</div>
						<!-- /.form-group -->

						<h3 class="control-sidebar-heading">Chat Settings</h3>

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Show me as online
								<input type="checkbox" class="pull-right" checked>
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Turn off notifications
								<input type="checkbox" class="pull-right">
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Delete chat history
								<a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
							</label>
						</div>
						<!-- /.form-group -->
					</form>
				</div>
				<!-- /.tab-pane -->
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>

	</div><!-- ./wrapper -->

	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<!-- <script src="<?= base_url(); ?>assets/js/jquery-ui-1.14.0/jquery-ui.min.js"></script> -->
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.5 -->
	<script src="<?= base_url(); ?>AdminLTE3/bootstrap/js/bootstrap.min.js"></script>
	<!-- select2 -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/select2/select2.full.min.js"></script>
	<!-- raphael -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<!-- ChartJS 1.0.1 -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/chartjs/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/sparkline/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?= base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/knob/jquery.knob.js"></script>
	<!-- daterangepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="<?= base_url(); ?>AdminLTE3/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- InputMask -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="<?= base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="<?= base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!-- DataTables -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>AdminLTE3/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/fastclick/fastclick.min.js"></script>
	<!-- AdminLTE3 App -->
	<script src="<?= base_url(); ?>AdminLTE3/dist/js/app.min.js"></script>
	<!-- Ion Slider -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.min.js"></script>
	<!-- Bootstrap slider -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/bootstrap-slider/bootstrap-slider.js"></script>
	<!-- CK Editor -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/ckeditor/ckeditor.js"></script>
	<!-- iCheck -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/iCheck/icheck.min.js"></script>
	<!-- Colorpicker -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
	<!-- Colorpicker -->
	<script src="<?= base_url(); ?>AdminLTE3/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- AdminLTE3 dashboard demo (This is only for demo purposes) -->
	<script src="<?= base_url(); ?>AdminLTE3/dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE3 for demo purposes -->
	<script src="<?= base_url(); ?>AdminLTE3/dist/js/demo.js"></script>

	<!-- DISABILITAS -->
	<script src="https://code.responsivevoice.org/responsivevoice.js?key=<?= responsivevoice(); ?>"></script>
	<script src="https://web.animemusic.us/widget_disabilitas.js"></script>

	<script>
		$.AdminLTESidebarTweak = {};

		$.AdminLTESidebarTweak.options = {
			EnableRemember: true,
			NoTransitionAfterReload: false
			//Removes the transition after page reload.
		};

		$(function() {
			"use strict";

			$("body").on("collapsed.pushMenu", function() {
				if ($.AdminLTESidebarTweak.options.EnableRemember) {
					document.cookie = "toggleState=closed";
				}
			}).on("expanded.pushMenu", function() {
				if ($.AdminLTESidebarTweak.options.EnableRemember) {
					document.cookie = "toggleState=opened";
				}
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.menus').click(function() {
				var idMenu = $(this).attr('id');
				$.post('<?= base_url(); ?>dashboard/currMenu', {
					idMenu: idMenu
				});
			});
		});
	</script>

	<!-- Page script -->
	<script type="text/javascript">
		$(function() {
			//Initialize datepicker3 Elements
			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: 'true',
				language: 'id'
			});

			//Initialize Select2 Elements
			$(".select2").select2();
		});

		$(function() {
			//Datemask dd/mm/yyyy
			$("#datemask").inputmask("dd/mm/yyyy", {
				"placeholder": "dd/mm/yyyy"
			});

			//Datemask2 mm/dd/yyyy
			$("#datemask2").inputmask("mm/dd/yyyy", {
				"placeholder": "mm/dd/yyyy"
			});

			//Money Euro
			$("[data-mask]").inputmask();

			//Date range picker
			$('#reservation').daterangepicker();

			//Date range picker with time picker
			$('#reservationtime').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				format: 'MM/DD/YYYY h:mm A'
			});

			//Date range as a button
			$('#daterange-btn').daterangepicker({
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate: moment()
				},
				function(start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				}
			);

			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});

			//Red color scheme for iCheck
			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass: 'iradio_minimal-red'
			});

			//Flat red color scheme for iCheck
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass: 'iradio_flat-green'
			});

			//Colorpicker
			$(".my-colorpicker1").colorpicker();

			//color picker with addon
			$(".my-colorpicker2").colorpicker();

			//Timepicker
			$(".timepicker").timepicker({
				showInputs: false
			});
		});
	</script>

	<!--GOOGLE-->
	<!-- <script>
		(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-102154306-1', 'auto');
		ga('send', 'pageview');
  	</script> -->

	<!-- <script type="text/javascript">
		var _paq = _paq || [];
		_paq.push(['trackPageView']);
		_paq.push(['enableLinkTracking']);
		(function() {
		var u = "//jalahoaks.jakarta.go.id/apps/matomo/";
		_paq.push(['setTrackerUrl', u + 'matomo.php']);
		_paq.push(['setSiteId', 2]);
		var d = document,
			g = d.createElement('script'),
			s = d.getElementsByTagName('script')[0];
		g.type = 'text/javascript';
		g.async = true;
		g.defer = true;
		g.src = u + 'matomo.js';
		s.parentNode.insertBefore(g, s);
		})();
  </script> -->
</body>

</html>