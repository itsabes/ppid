<style>
	div.uppercase {
		text-transform: uppercase;
	}

	div.lowercase {
		text-transform: lowercase;
	}

	div.capitalize {
		text-transform: capitalize;
	}

	.modal-dialog {
		width: 700px;
	}

	.modal-header {
		background-color: #337AB7;
		padding: 10px 10px;
		color: #FFF;
		border-bottom: 2px dashed #337AB7;
	}

	.jaksehat .carosel-button {
		padding-bottom: 50px;
		left: 0;
	}

	.carosel-button {
		padding-bottom: 150px;
		left: 71%;
	}

	.carosel-button button {
		font-size: 24px;
		border: 4px solid #fff;
	}

	.owl-item {
		background: #0073b7;
		color: #fff;
		border-radius: 10px;
		padding: 15px;
		text-align: center;
	}

	.owl-item a {
		color: #fff;
	}

	.owl-carousel .owl-stage-outer {
		width: 91%;
	}

	.owl-carousel .owl-item {
		width: 4% !important;
		margin-bottom: 20px;
	}

	.Embed .Header,
	.Embed .HoverCard,
	.Embed .Feedback,
	.Embed .SocialProof,
	.Embed .Footer {
		display: none !important;
	}

	.promosi .owl-item {
		width: 23% !important;
	}

	.promosi .owl-stage {
		width: 100% !important;
	}

	.promosi h4 {
		background: #0073b7;
		color: #fff;
		border-radius: 3px;
		padding: 15px;
		text-align: center;
		font-size: 16px;
	}

	#seventyfive {
		position: fixed;
		right: 0vw;
		bottom: 2.5vw;
		z-index: 999;
		width: 6vw;
	}

	#cls {
		position: fixed;
		right: 5vw;
		bottom: 6vw;
		z-index: 999;
		color: #254A74;
		font-size: 25px;

	}

	.intro-banner-vdo-play-btn .ripple {
		position: absolute;
		width: 20vw;
		height: 20vw;
		z-index: -1;
		opacity: 0;
		border-radius: 100%;
		-webkit-animation: ripple 1.8s infinite;
		animation: ripple 1.8s infinite;
	}

	.pinkBg {
		background-color: #40ae87 !important;
		background-image: linear-gradient(90deg, #40ae87, #40ae87);
	}

	.intro-banner-vdo-play-btn .ripple:nth-child(2) {
		animation-delay: .3s;
		-webkit-animation-delay: .3s;
	}

	.intro-banner-vdo-play-btn .ripple:nth-child(3) {
		animation-delay: .6s;
		-webkit-animation-delay: .6s;
	}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/star-rating.css' ?>">

<div class="logo-dinkes-bounce">
	<div id="iconhut">
		<a href="http://rsudsawahbesar.jakarta.go.id/" target="_blank">
			<img id="seventyfive" src="<?= site_url('upload/image/sabes.png') ?>">
		</a>
	</div>
	<div style="position:fixed; left:1.2vw; top:3.8vw; z-index:99;">
		<div id="rp" href="#" class="intro-banner-vdo-play-btn pinkBg" target="_blank">
			<span class="ripple pinkBg"></span>
			<span class="ripple pinkBg"></span>
			<span class="ripple pinkBg"></span>
		</div>
	</div>
	<a href="#" onclick="this.style.display='none'; document.getElementById('rp').style.display='none'; document.getElementById('iconhut').style.display='none';">
		<div id="cls">
			<i class="fa fa-times-circle" aria-hidden="true"></i>
		</div>
	</a>
</div>


<!-- START CAROUSEL -->
<div id="slideshow">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
			<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
			<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
			<li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?= site_url('upload/image/banner sabes/ppid sabes-1.png') ?>" alt="PPID RSUD SAWAH BESAR">
			</div>
			<!-- <div class="item">
				<img src="
				<?=
				site_url('upload/image/slider-gedung-dinkes.jpg')
				?>
				" alt="Second slide">
			</div> -->
			<div class="item">
				<a href="<?= base_url() . 'login' ?>" target="_blank">
					<img src="<?= site_url('upload/image/banner sabes/ppid sabes-2.png') ?>" alt="Second slide">
				</a>
			</div>
			<div class="item">
				<!-- <a href="https://ppid-dinkes.jakarta.go.id/alamat-ukpd-upt" target="_blank"> -->
				<a href="#" target="_blank">
					<img src="<?= site_url('upload/image/banner sabes/ppid sabes-3.png') ?>" alt="Fourth slide">
				</a>
			</div>
			<!-- <div class="item">
				<a href="https://ppid-dinkes.jakarta.go.id/berita_informasi_kesehatan" target="_blank">
					<img src="<?= site_url('upload/image/banner sabes/ppid sabes-1.png') ?>" alt="Fourth slide">
				</a>
			</div> -->
			<div class="item jaksehat">
				<a href="https://dinkes.jakarta.go.id/jaksehatweb" target="_blank">
					<img src="<?= site_url('upload/image/banner sabes/ppid sabes-4.png') ?>" alt="Third slide">
				</a>
			</div>
			<div class="item">
				<!-- <a href="<?= base_url() . 'login' ?>" target="_blank"> -->
					<img src="<?= site_url('upload/image/banner sabes/ppid sabes-5.png') ?>" alt="Fourth slide">
				<!-- </a> -->
			</div>
		</div>
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="fa fa-angle-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="fa fa-angle-right"></span>
		</a>
	</div>
</div>
<!-- END CAROUSEL -->

<div class="container">
	<div class="row">
		<div class="container">
			<section class='content'>
				<div class="row">
					<!-- Form Pengaduan -->
					<div class="col-md-12">
						<div class="row form_all_daftar_menu_permohonan">
							<div class="box_data_permohonan">
								<div class="col-md-4">
									<button type="button" class="btn informasi-publiks" data-toggle="modal" data-target="#informasi-publik">
										<i class="fa-solid fa-file-circle-plus"></i> <br>
										Permohonan <br> Informasi Publik
									</button>
								</div>
								<div class="col-md-4">
									<button type="button" class="btn penelitian-publiks" data-toggle="modal" data-target="#penelitian-publik">
										<i class="fa-solid fa-file-circle-plus"></i><br>
										Permohonan <br> Penelitian
									</button>
								</div>
								<div class="col-md-4">
									<a href="https://sipadu.jakarta.go.id/" target="_blank">
										<button type="button" class="btn bg-aqua">
											<i class="fa-solid fa-file-circle-exclamation"></i> <br>
											Form Pengaduan Penyalahgunaan <br>Wewenang dan Pelanggaran ASN
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12" style="z-index: 999;">
						<div class="col-md-3">
							<div class="small-box box-pengaduan-tambah" style="background: #bc3c42;">
								<div class="inner">
									<a href="https://ppid-dinkes.jakarta.go.id/daftar-informasi-publik" target="_blank">
										<i class="fa-solid fa-list"></i>
										<p class="text-center">Daftar <br>Informasi Publik</p>
									</a>
								</div>
							</div>
						</div>


						<div class="col-md-3">
							<div class="small-box bg-purple box-pengaduan-tambah">
								<div class="inner">
									<a href="https://ppid.jakarta.go.id/kanal-pengaduan-resmi" target="_blank">
										<i class="fa-solid fa-headset"></i>
										<p class="text-center">Kanal Pengaduan <br>Resmi</p>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="small-box bg-olive box-pengaduan-tambah">
								<div class="inner">
									<a href="<?= base_url() ?>statistik-permohonan-informasi" target="_blank">
										<i class="fa-solid fa-chart-simple"></i>
										<p class="text-center">Statistik Layanan <br>Informasi Publik</p>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="small-box bg-green box-pengaduan-tambah">
								<div class="inner">
									<a href="javascript:void(0)" onclick="openRate()">
										<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
										<p class="text-center">Berikan Rating <br>Informasi Publik kami</p>
									</a>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-chart-line"></i> &nbsp;&nbsp; Dashboard Kesehatan</h3>
						<div class="box box-solid">
							<div class="box-body">
								<div class="col-md-3">
									<div class="dashboard-kesehatan">
										<a href="https://dinkes.jakarta.go.id/stuntingjakarta/dashboard/stunting" target="_blank">
											<div class="body-card-dash">
												<img src="<?= site_url('upload/image/icon/stunting.png') ?>">
												<h4>Data Stunting</h4>
											</div>
											<p>
												Data Stunting merupakan representasi dari Dashboard Status Gizi
												Provins...
											</p>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="dashboard-kesehatan">
										<a href="https://dashboard-dinkes.jakarta.go.id/agd" target="_blank">
											<div class="body-card-dash">
												<img src="<?= site_url('upload/image/icon/DATA-KEGIATAN-AGD.png') ?>">
												<h4>Data Kegiatan AGD</h4>
											</div>
											<p>
												Data Kegiatan AGD merupakan representasi dari kegiatan AGD yang
												terjadi...
											</p>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="dashboard-kesehatan">
										<a href="https://dashboard-dinkes.jakarta.go.id/puskesmas" target="_blank">
											<div class="body-card-dash">
												<img src="<?= site_url('upload/image/icon/kunjungan-rs.png') ?>">
												<h4>Data Kunjungan dan Diagnosa Puskesmas</h4>
											</div>
											<p>
												Data Kunjungan Puskesmas merupakan representasi da...
											</p>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="dashboard-kesehatan">
										<a href="https://dashboard-dinkes.jakarta.go.id/rsud" target="_blank">
											<div class="body-card-dash">
												<img src="<?= site_url('upload/image/icon/kunjungan-puskesmas.png') ?>">
												<h4>Data Kunjungan dan Diagnosa Rumah Sakit</h4>
											</div>
											<p>
												Data Kunjungan Rumah Sakit merupakan representasi ...
											</p>
										</a>
									</div>
								</div>
							</div>
							<div class="box-footer text-center">
								<a href="#" target="_blank" class="btn btn-warning">Lainnya</a>
							</div>
						</div>
					</div> -->

					<!-- list UPT -->
					<div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-laptop-medical"></i> &nbsp;&nbsp;Website PPID
							UPT/UKPD</h3>
						<div class="box box-solid">
							<div class="box-body">
								<div class="row">
									<div class="promosi">
										<?php foreach ($website_ppid as $website_ppid) { ?>
											<a href="<?= $website_ppid->WebPpid ?>" target="_blank">
												<div class="col-md-3">
													<h4><?= $website_ppid->NamaUk ?></h4>
												</div>
											</a>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="box-footer text-center">
								<a href="<?php base_url() ?>ppid-upt-ukpd" class="btn btn-warning">UPT/UKP Lainnya</a>
							</div>
						</div>
					</div>

					<!-- VIDEO START -->
					<div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-video"></i> &nbsp;&nbsp; Video Tentang PPID</h3>
						<div class="box box-solid">
							<div class="box-body">
								<div class="col-md-6">
									<div class="box box-solid">
										<div class="box-header with-border">
											<h3 class="box-title">Permohonan Penelitian PPID Dinkes DKI Jakarta</h3>
										</div>
										<div class="box-body">
											<video width="100%" id="video" controls height="305">
												<source src="<?= base_url() . 'upload/video/PPID-Permohonan-Penelitian.mp4' ?>" type="video/mp4">
											</video>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="box box-solid">
										<div class="box-header with-border">
											<h3 class="box-title">Menu pada Website PPID Dinkes DKI Jakarta</h3>
										</div>
										<div class="box-body">
											<video width="100%" id="video" controls height="305">
												<source src="<?= base_url() . 'upload/video/rev_Menu pada Website PPID Dinkes DKI Jakarta.mp4' ?>" type="video/mp4">
											</video>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer text-center">
								<a href="<?= base_url() ?>video" class="btn btn-warning">Video Lainnya</a>
							</div>
						</div>
					</div>
					<!-- VIDEO END -->

					<!-- promosi kesehatan -->
					<div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-heart-pulse"></i> &nbsp;&nbsp;Promosi Kesehatan</h3>
						<div class="box box-solid">
							<div class="box-body">
								<div class="row">
									<div class="promosi">
										<div class="">
											<a href="https://drive.google.com/drive/folders/1XEZI6ol8e8ZZBBi9xjmqO24SO1pDudd2?usp=drive_link" target="_blank">
												<div class="col-md-3">
													<h4>ISPA</h4>
												</div>
											</a>
											<a href="https://drive.google.com/drive/folders/1X9SPJFsBa5E_ivagua337uR0D2AF-lr1?usp=drive_link" target="_blank">
												<div class="col-md-3">
													<h4>Kanker Paru</h4>
												</div>
											</a>
											<a href="https://drive.google.com/drive/folders/1X7oQZRd7BJZOG2hAF-kUCup9uTOHMyKZ?usp=drive_link" target="_blank">
												<div class="col-md-3">
													<h4>Monkeypox</h4>
												</div>
											</a>
											<a href="https://drive.google.com/drive/folders/1gPG94YPtDNEg56Exw0BEr16ElpjI14ZO" target="_blank">
												<div class="col-md-3">
													<h4>Polusi Udara</h4>
												</div>
											</a>
											<a href="https://drive.google.com/drive/folders/1XGlusNTdaXKTpiFdCYBaGLcX7wfOY5YH?usp=drive_link" target="_blank">
												<div class="col-md-3">
													<h4>Diare (Rotavirus)</h4>
												</div>
											</a>
											<a href="https://drive.google.com/drive/folders/1X89TYNjNbLo4JwWojXqxBaprw3sohlJk?usp=drive_link" target="_blank">
												<div class="col-md-3">
													<h4>Gangguan Penglihatan</h4>
												</div>
											</a>
											<a href="https://drive.google.com/drive/folders/1jNhslEkQiPzFq2OqXvQIalumi8sNKGDv?usp=drive_link" target="_blank">
												<div class="col-md-3">
													<h4>Hepatitis</h4>
												</div>
											</a>
											<a href="https://drive.google.com/drive/folders/1RFinFsGBZHp3y2jo1HZrp7sryMe5hVOm?usp=drive_link" target="_blank">
												<div class="col-md-3">
													<h4>Stunting</h4>
												</div>
											</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<!-- INFOGRAFIS START -->
					<div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-image"></i>&nbsp;&nbsp; Infografis</h3>
						<div class="box box-solid">
							<div class="box-body">
								<!-- <div class="col-md-3">
									<div class="box box-default">
										<div class="box-body">
											<img src="<?= site_url('upload/image/DIPA PPID-01.jpg') ?>" width="100%">
										</div>
										<button class="btn btn-info btn-block" onclick="showClick('DIPA PPID-01.jpg')">Lihat</button>
									</div>
								</div> -->

								<!-- <div class="col-md-3">
									<div class="box box-default">
										<div class="box-body">
											<img src="<?= site_url('upload/image/Realisasi Anggaran Dinas Kesehatan Tahun 2022 -01.jpg') ?>" width="100%">
										</div>
										<button class="btn btn-info btn-block" onclick="showClick('Realisasi Anggaran Dinas Kesehatan Tahun 2022 -01.jpg')">Lihat</button>
									</div>
								</div> -->

								<!-- <div class="col-md-3">
									<div class="box box-default">
										<div class="box-body">
											<img src="<?= site_url('upload/image/informasi-ppid.jpeg') ?>" width="100%">
										</div>
										<button class="btn btn-info btn-block" onclick="showClick('informasi-ppid.jpeg')">Lihat</button>
									</div>
								</div> -->

								<!-- <div class="col-md-3">
									<div class="box box-default">
										<div class="box-body">
											<img src="<?= site_url('upload/image/prosedur-permohonan.jpeg') ?>" width="100%">
										</div>
										<button class="btn btn-info btn-block" onclick="showClick('prosedur-permohonan.jpeg')">Lihat</button>
									</div>
								</div> -->

							</div>
							<div class="box-footer text-center">
								<!-- <a href="<?php base_url() ?>infografis" class="btn btn-warning">Infografis Lainnya</a> -->
								<a href="#" class="btn btn-warning">Infografis Lainnya</a>
							</div>
						</div>
					</div>
					<!-- INFOGRAFIS END -->

					<!-- Berita -->
					<div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-newspaper"></i> &nbsp;&nbsp;Berita Tentang PPID
						</h3>
						<div class="box box-solid">
							<div class="box-body">
								<!-- <div class="col-md-6 featured article">
									<div class="thumbnail col-sm-4">
										<img src="https://dinkes.jakarta.go.id/assets/upload/image/6583f37e8ca94-1703146366.jpg" alt="">
									</div>
									<div class="col-sm-8">
										<h4>
											<a href="https://dinkes.jakarta.go.id/berita/read/dinas-kesehatan-provinsi-dki-jakarta-raih-penghargaan-sebagai-badan-publik-informatif-kategori-dinas-pada-ajang-anugerah-keterbukaan-informasi-publik-tahun-2023" target="_blank">
												Dinas Kesehatan Provinsi DKI Jakarta Raih Penghargaan sebagai Badan
												Publik Informatif Kategori Dinas pada Ajang Anugerah Keterbukaan
												Informasi Publik Tahun 2023
											</a>
										</h4>
										<p>
											Jakarta, 21 Desember 2023- Dinas Kesehatan Provinsi DKI Jakarta berhasil
											meraih penghargaan sebagai Badan Publik Informatif Kategori Dinas pada Ajang
											Anugerah Keterbukaan Informasi Publik Tahun 2023 yang diselenggarakan di
											Balai Agung, Balaikota DKI Jakarta, Kamis (21/12).
										</p>
										<a href="https://dinkes.jakarta.go.id/berita/read/dinas-kesehatan-provinsi-dki-jakarta-raih-penghargaan-sebagai-badan-publik-informatif-kategori-dinas-pada-ajang-anugerah-keterbukaan-informasi-publik-tahun-2023" target="_blank">
											<p style="font-size: 12px;color:#3c8dbc;font-weight:400;">Selengkapnya</p>
										</a>
									</div>
								</div> -->
								<!-- <div class="col-md-6 featured article">
									<div class="thumbnail col-sm-4">
										<img src="https://dinkes.jakarta.go.id/assets/upload/image/654cc7a7ec0ea-1699530663.jpg" alt="">
									</div>
									<div class="col-sm-8">
										<h4>
											<a href="https://dinkes.jakarta.go.id/berita/read/dinas-kesehatan-provinsi-dki-jakarta-berhasil-raih-juara-umum-anugerah-humas-jakarta-tahun-2023" target="_blank">
												Dinas Kesehatan Provinsi DKI Jakarta Berhasil Raih Juara Umum Anugerah
												Humas Jakarta Tahun 2023
											</a>
										</h4>
										<p>
											Jakarta, 21 Desember 2023- Dinas Kesehatan Provinsi DKI Jakarta berhasil
											meraih penghargaan sebagai Badan Publik Informatif Kategori Dinas pada Ajang
											Anugerah Keterbukaan Informasi Publik Tahun 2023 yang diselenggarakan di
											Balai Agung, Balaikota DKI Jakarta, Kamis (21/12).
										</p>
										<a href="https://dinkes.jakarta.go.id/berita/read/dinas-kesehatan-provinsi-dki-jakarta-berhasil-raih-juara-umum-anugerah-humas-jakarta-tahun-2023" target="_blank">
											<p style="font-size: 12px;color:#3c8dbc;font-weight:400;">Selengkapnya</p>
										</a>
									</div>
								</div> -->
							</div>
							<div class="box-footer text-center">
								<!-- <a href="<?php base_url() ?>berita" class="btn btn-warning">Berita Lainnya</a> -->
								<a href="#" class="btn btn-warning">Berita Lainnya</a>
							</div>
						</div>
					</div>

					<!-- KONTEN START -->
					<div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-images"></i>&nbsp;&nbsp;Konten Tentang PPID</h3>
						<div class="box box-solid">
							<div class="box-body">
								<div class="row">
									<!-- <div class="col-md-4">
										<div class="box-header with-border">
											<h3 class="box-title">Instagram @dinkesdki</h3>
										</div>
										<div class="box-body">
											<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CxmmJFRvOhs/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
												<div style="padding:16px;"> <a href="https://www.instagram.com/p/CxmmJFRvOhs/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
														<div style=" display: flex; flex-direction: row; align-items: center;">
															<div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
															</div>
															<div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
																<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
																</div>
																<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
																</div>
															</div>
														</div>
														<div style="padding: 19% 0;"></div>
														<div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
															<svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<g transform="translate(-511.000000, -20.000000)" fill="#000000">
																		<g>
																			<path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
																			</path>
																		</g>
																	</g>
																</g>
															</svg>
														</div>
														<div style="padding-top: 8px;">
															<div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
																View this post on Instagram</div>
														</div>
														<div style="padding: 12.5% 0;"></div>
														<div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
															<div>
																<div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
																</div>
																<div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
																</div>
																<div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
																</div>
															</div>
															<div style="margin-left: 8px;">
																<div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
																</div>
																<div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
																</div>
															</div>
															<div style="margin-left: auto;">
																<div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
																</div>
																<div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
																</div>
																<div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
																</div>
															</div>
														</div>
														<div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
															<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
															</div>
															<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
															</div>
														</div>
													</a>
													<p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
														<a href="https://www.instagram.com/p/CxmmJFRvOhs/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Dinas Kesehatan DKI Jakarta
															(@dinkesdki)</a>
													</p>
												</div>
											</blockquote>
											<script async src="//www.instagram.com/embed.js"></script>
										</div>
									</div> -->

									<!-- <div class="col-md-4">
										<div class="box-header with-border">
											<h3 class="box-title">Instagram @dinkesdki</h3>
										</div>
										<div class="box-body">
											<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CzIIP2Fv-rn/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
												<div style="padding:16px;"> <a href="https://www.instagram.com/p/CzIIP2Fv-rn/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
														<div style=" display: flex; flex-direction: row; align-items: center;">
															<div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
															</div>
															<div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
																<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
																</div>
																<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
																</div>
															</div>
														</div>
														<div style="padding: 19% 0;"></div>
														<div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
															<svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<g transform="translate(-511.000000, -20.000000)" fill="#000000">
																		<g>
																			<path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
																			</path>
																		</g>
																	</g>
																</g>
															</svg>
														</div>
														<div style="padding-top: 8px;">
															<div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
																View this post on Instagram</div>
														</div>
														<div style="padding: 12.5% 0;"></div>
														<div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
															<div>
																<div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
																</div>
																<div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
																</div>
																<div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
																</div>
															</div>
															<div style="margin-left: 8px;">
																<div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
																</div>
																<div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
																</div>
															</div>
															<div style="margin-left: auto;">
																<div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
																</div>
																<div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
																</div>
																<div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
																</div>
															</div>
														</div>
														<div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
															<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
															</div>
															<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
															</div>
														</div>
													</a>
													<p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
														<a href="https://www.instagram.com/p/CzIIP2Fv-rn/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Dinas Kesehatan DKI Jakarta
															(@dinkesdki)</a>
													</p>
												</div>
											</blockquote>
											<script async src="//www.instagram.com/embed.js"></script>
										</div>
									</div> -->

									<!-- <div class="col-md-4">
										<div class="box-header with-border">
											<h3 class="box-title">Instagram @dinkesdki</h3>
										</div>
										<div class="box-body">
											<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cxc0F8tPYH_/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
												<div style="padding:16px;"> <a href="https://www.instagram.com/p/Cxc0F8tPYH_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
														<div style=" display: flex; flex-direction: row; align-items: center;">
															<div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
															</div>
															<div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
																<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
																</div>
																<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
																</div>
															</div>
														</div>
														<div style="padding: 19% 0;"></div>
														<div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
															<svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<g transform="translate(-511.000000, -20.000000)" fill="#000000">
																		<g>
																			<path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
																			</path>
																		</g>
																	</g>
																</g>
															</svg>
														</div>
														<div style="padding-top: 8px;">
															<div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
																View this post on Instagram</div>
														</div>
														<div style="padding: 12.5% 0;"></div>
														<div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
															<div>
																<div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
																</div>
																<div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
																</div>
																<div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
																</div>
															</div>
															<div style="margin-left: 8px;">
																<div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
																</div>
																<div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
																</div>
															</div>
															<div style="margin-left: auto;">
																<div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
																</div>
																<div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
																</div>
																<div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
																</div>
															</div>
														</div>
														<div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
															<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
															</div>
															<div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
															</div>
														</div>
													</a>
													<p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
														<a href="https://www.instagram.com/p/Cxc0F8tPYH_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Dinas Kesehatan DKI Jakarta
															(@dinkesdki)</a>
													</p>
												</div>
											</blockquote>
											<script async src="//www.instagram.com/embed.js"></script>
										</div>
									</div> -->
								</div>
							</div>
							<div class="box-footer text-center">
								<!-- <a href="<?php base_url() ?>konten" class="btn btn-warning">Konten Lainnya</a> -->
								<a href="#" class="btn btn-warning">Konten Lainnya</a>
							</div>
						</div>
					</div>
					<!-- KONTEN END -->

					<!-- SOSIALISASI START -->
					<div class="col-md-12">
						<h3 class="judul-card-atas"><i class="fa-solid fa-file-video"></i>&nbsp;&nbsp;Video Sosialisasi Tentang PPID</h3>
						<div class="box box-solid">
							<div class="box-body">
								<div class="row">
									<div class="col-md-12">
										<iframe width="100%" height="415" src="https://www.youtube.com/embed/iqeWoFKaUxc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									</div>
								</div>
							</div>
							<div class="box-footer text-center">
								<a href="<?php base_url() ?>sosialisasi" class="btn btn-warning">Sosialisasi Lainnya</a>
							</div>
						</div>
					</div>
					<!-- SOSIALISASI END -->

				</div><!-- /.row -->
			</section><!-- /.content -->
		</div>
	</div>
</div>

<!-- modal permohonan -->
<div class="modal fade" id="informasi-publik">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Permohonan Informasi Publik</h4>
			</div>
			<div class="modal-body">
				<div class="col-md-3">
					<a href="<?= site_url('form_permohonan_informasi') ?>">
						<div class="panel panel-default">
							<div class="panel-body informasi-publiks">
								<h4 class="text-center title">Form Permohonan Informasi Publik</h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="<?= site_url('form-keberatan') ?>">
						<div class="panel panel-default bg-blue">
							<div class="panel-body informasi-publiks">
								<h4 class="text-center title">Form Pengajuan Keberatan Informasi Publik</h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="<?= site_url('cek_status_informasi') ?>">
						<div class="panel panel-default bg-yellow">
							<div class="panel-body informasi-publiks">
								<div class="icon">
									<h4 class="text-center title">Cek Status Permohonan Informasi Publik</h4>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="<?= site_url('cek_status_keberatan') ?>">
						<div class="panel panel-default bg-red">
							<div class="panel-body informasi-publiks">
								<h4 class="text-center title">Cek Status Pengajuan Keberatan</h4>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal permohonan -->
<div class="modal fade" id="penelitian-publik">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Permohonan Penelitian</h4>
			</div>
			<div class="modal-body" style="height:100%;">
				<div class="col-md-6">
					<a href="<?= site_url('form_permohonan_penelitian') ?>">
						<div class="panel panel-default">
							<div class="panel-body penelitian-publiks">
								<h4 class="text-center title">Form Permohonan Penelitian</h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-6">
					<a href="<?= site_url('cek_status_penelitian') ?>">
						<div class="panel panel-default">
							<div class="panel-body penelitian-publiks">
								<h4 class="text-center title">Cek Status Permohonan Penelitian</h4>
							</div>
						</div>
					</a>
				</div>
				<hr>
				<div class="col-md-12">
					<p><strong>Dokumen administrasi terkait izin penelitian di Dinas Kesehatan dikirimkan melalui https://ppid-dinkes.jakarta.go.id/ dengan dokumen sebagai berikut:</strong></p>
					<ul>
						<li>Surat permohonan dari institusi perihal permohonan ijin penelitian, ditujukan kpd PPID Dinas Kesehatan; berisi minimal tujuan penlitian, nama peneliti, No kontak, judul penelitian dan lokus penelitian. <span class="text-danger">*</span></li>
						<li>KTP<span class="text-danger">*</span></li>
						<li>KAK/Proposal<span class="text-danger">*</span></li>
						<li>Kaji Etik penelitian</li>
						<li>Ijin PTSP (jika penelitian bukan dalam rangka tugas akhir sekolah/kuliah dan penelitian yang tdk didanai oleh APBD/APBN).</li>
						<li>Rekomenasi Kemendagri (untuk penelitian Nasional-2 provinsi atau lebih)</li>
						<li>Surat dari BRIN (jika penelitu utama adala WNA)</li>
						<li>Kuesioner atau daftar wawancara (optional)</li>
						<li>Surat Pernyataan yang ditandatangani di atas materai<span class="text-danger">*</span></li>
					</ul>
					<p class="text-danger">(seluruh dokumen di upload dalam bentuk pdf)</p>
				</div>
				<div>
					<img src="<?= site_url('upload/image/Proses Pengajuan Penelitaian PPID-01.jpg') ?>" alt="" style="height: 500px;display: block;margin-left: auto;margin-right: auto;">
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal View File START -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<img id="fileup" src="" width="100%" />
			</div>
			<div class="modal-footer">
				<a href="#" data-dismiss="modal" class="btn btn-md btn-default"><i class="fa fa-arrow-left"></i>
					&nbsp;&nbsp;TUTUP</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal View File END -->

<!-- Modal Rating START -->
<div class="modal fade" id="modal-rating" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<input id="rating-input" type="text" title="" />
				<div><span id="alert_rating" style="font-size: 13px; color: red; display: none;"><i>Bintang
							harus dipilih!</i></span></div>
				Komentar : <br>
				<textarea id="komentar" class="form-control" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
				<div><span id="alert_komentar" style="font-size: 13px; color: red; display: none;"><i>Komentar
							harus diisi!</i></span></div>
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0)" onclick="submitRate()" class="btn btn-md btn-primary float-right"><i class="fa fa-check"></i>
					&nbsp;&nbsp;Submit</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal Rating END -->

<script type="text/javascript" src="<?= base_url() . 'assets/js/star-rating.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/owl.js' ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var $inp = $('#rating-input');

		$inp.rating({
			min: 0,
			max: 5,
			step: 1,
			size: 'xs',
			showClear: false
		});
	});

	function showClick(filepath) {
		$('#fileup').attr('src', "<?= base_url() . 'upload/image/'; ?>" + filepath);

		$("#mymodal").modal('show');
	}

	function openRate() {
		$("#modal-rating").modal('show')
	}

	function submitRate() {
		var rating = $('#rating-input').val();
		var komentar = $('#komentar').val();

		if (rating === '' || rating === 0) {
			$("#alert_rating").show();
			$("#rating-input").focus();
			res = res && false;
			exit;
		} else {
			$("#alert_rating").hide();
		}

		if (komentar === '') {
			$("#alert_komentar").show();
			$("#komentar").focus();
			res = res && false;
			exit;
		} else {
			$("#alert_komentar").hide();
		}

		$("#modal-rating").modal('hide')

		$.ajax({
			url: "<?= base_url(); ?>home/submit_rating",
			data: "rating=" + rating + "&komentar=" + komentar,
			cache: false,
			success: function(msg) {
				alert("Terima kasih atas penilaian anda.");
			}
		})
	}
</script>