<div class="container">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header">
						<div class="col-md-12">
							<h3 class="box-title" style="text-align: center;font-weight: bold;font-size: 22px;margin: 20px 0 10px;display: block;">Statistik Layanan Informasi Publik</h3>
							<!-- <p class="text-center">Tahun 2022 - Sekarang</p> -->
						</div>


						<div class="box-body">
							<!-- FILTER PERMOHONAN SELESAI -->
							<div class="col-md-6" style="margin: 30px 0 10px;">
								<div class="form-group" style="margin-bottom: 0;">
									<label for="exampleFormControlSelect1">Filter Tahun</label>
									<select class="form-control" id="exampleFormControlSelect1">
										<option value="all">- Semua -</option>
										<option value="all-2024">2024</option>
										<option value="all-2023">2023</option>
										<option value="all-2022">2022</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div>

							<div data-show="all">
								<div class="col-md-3">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan</h5>
										<h2>1521</h2>
									</div>
								</div>
								<div class="col-md-3">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Keberatan</h5>
										<h2>208</h2>
									</div>
								</div>
								<div class="col-md-3">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan Selesai</h5>
										<h2>1259</h2>
									</div>
								</div>
								<div class="col-md-3">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan Dalam Proses</h5>
										<h2>54 <span>/ Juli 2024</span></h2>
									</div>
								</div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Permohonan Selesai</div>
										<div id="container"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-4">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Pemohon Informasi</div>
										<div id="container1"></div>
										<table>
											<tr>
												<th>Kategori</th>
												<th>Jumlah</th>
											</tr>
											<tr>
												<td>Individu</td>
												<td>797</td>
											</tr>
											<tr>
												<td>Badan Hukum</td>
												<td>30</td>
											</tr>
											<tr>
												<td>Kelompok Orang</td>
												<td>136</td>
											</tr>
										</table>
									</div>
								</div>

								<div class="col-md-4">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Mekanisme Permohonan</div>
										<div id="container2"></div>
										<table>
											<tr>
												<th>Kategori</th>
												<th>Jumlah</th>
											</tr>
											<tr>
												<td>Datang Langsung</td>
												<td>0</td>
											</tr>
											<tr>
												<td>Malakui Surat/Email/Fax/Website</td>
												<td>1521</td>
											</tr>
										</table>
									</div>
								</div>

								<div class="col-md-4">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Permintaan Infromasi</div>
										<div id="container3"></div>
										<table>
											<tr>
												<th>Kategori</th>
												<th>Jumlah</th>
											</tr>
											<tr>
												<td>Laporan Keuangan</td>
												<td>0</td>
											</tr>
											<tr>
												<td>Laporan Tahunan</td>
												<td>0</td>
											</tr>
											<tr>
												<td>Kontrak Kerja</td>
												<td>0</td>
											</tr>
											<tr>
												<td>Laporan Hasil Pemeriksaan</td>
												<td>0</td>
											</tr>
											<tr>
												<td>Penelitian</td>
												<td>1521</td>
											</tr>
										</table>
									</div>
								</div>

							</div>

							<div data-show="all-2024">
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan</h5>
										<h2>554</h2>
									</div>
								</div>
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Keberatan</h5>
										<h2>55</h2>
									</div>
								</div>
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan Selesai</h5>
										<h2>499</h2>
									</div>
								</div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Permohonan Selesai</div>
										<div id="permohonan-2024"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Permohonan Informasi</div>
										<div id="permohonan-informasi-2024"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Mekanisme Permohonan</div>
										<div id="mekanisme-permohonan-2024"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Permintaan Infromasi</div>
										<div id="permintaan-informasi-2024"></div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>

							<div data-show="all-2023">
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan</h5>
										<h2>820</h2>
									</div>
								</div>
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Keberatan</h5>
										<h2>121</h2>
									</div>
								</div>
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan Selesai</h5>
										<h2>699</h2>
									</div>
								</div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Permohonan Selesai</div>
										<div id="permohonan-2023"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Permohonan Informasi</div>
										<div id="permohonan-informasi-2023"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Mekanisme Permohonan</div>
										<div id="mekanisme-permohonan-2023"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Permintaan Infromasi</div>
										<div id="permintaan-informasi-2023"></div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>

							<div data-show="all-2022">
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan</h5>
										<h2>359</h2>
									</div>
								</div>
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Keberatan</h5>
										<h2>7</h2>
									</div>
								</div>
								<div class="col-md-4">
									<div class="bg-blue-ppid box-statistik">
										<h5>Jumlah Permohonan Selesai</h5>
										<h2>352</h2>
									</div>
								</div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Permohonan Selesai</div>
										<div id="permohonan-2022"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Permohonan Informasi</div>
										<div id="permohonan-informasi-2022"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Mekanisme Permohonan</div>
										<div id="mekanisme-permohonan-2022"></div>
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-12">
									<div class="chart-penyelesaian-permohonan">
										<div class="judul-card-atas">Kategori Permintaan Infromasi</div>
										<div id="permintaan-informasi-2022"></div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>

						</div>
					</div>
				</div>
			</div>
	</section>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- DataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
	$("select").on("change", function() {
		var value = this.value
		// hide all data-show
		$('[data-show]').hide().filter(function() {
			return $(this).data('show') === value;
		}).show() // only show matching ones

		$('[data-hide]').show().filter(function() {
			return $(this).data('hide') === value;
		}).hide()

	}).change()

	// CHART PENYELESAIAN PERMOHONAN
	Highcharts.chart('container', {
		chart: {
			type: 'bar'
		},
		colors: [
			'#4572A7'
		],
		title: {
			text: '',
			align: 'left'
		},
		xAxis: {
			categories: ['Tahun 2022', 'Tahun 2023', 'Tahun 2024'],
			title: {
				text: null
			},
			gridLineWidth: 1,
			lineWidth: 0
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Permohonan',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			},
			gridLineWidth: 0
		},
		tooltip: {
			valueSuffix: ' Permohonan'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				},
				groupPadding: 0.1,
			}
		},
		legend: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Permohonan',
			data: [365, 537, 357]
		}]
	});

	// KATEGORI PEMOHON INFORMASI
	Highcharts.chart('container1', {
		chart: {
			type: 'pie'
		},
		title: {
			text: ''
		},
		tooltip: {
			valueSuffix: ''
		},
		subtitle: {
			text: ''
		},
		plotOptions: {
			series: {
				allowPointSelect: true,
				cursor: 'pointer',
				showInLegend: true
			}
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Jumlah',
			colorByPoint: true,
			data: [{
					name: 'Individu',
					y: 746
				},
				{
					name: 'Badan Hukum',
					y: 23
				},
				{
					name: 'Kelompok Orang',
					y: 136
				}
			]
		}]
	});

	// MEKANISME PERMOHONAN
	Highcharts.chart('container2', {
		chart: {
			type: 'pie'
		},
		title: {
			text: ''
		},
		tooltip: {
			valueSuffix: ''
		},
		subtitle: {
			text: ''
		},
		plotOptions: {
			series: {
				allowPointSelect: true,
				cursor: 'pointer',
				showInLegend: true,
			}
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Jumlah',
			colorByPoint: true,
			data: [{
					name: 'Datang Langsung',
					y: 0
				},
				{
					name: 'Malakui Surat/Email/Fax/Website',
					y: 1463
				}
			]
		}]
	});

	// Kategori Permintaan Infromasi
	Highcharts.chart('container3', {
		chart: {
			type: 'pie'
		},
		title: {
			text: ''
		},
		tooltip: {
			valueSuffix: ''
		},
		subtitle: {
			text: ''
		},
		plotOptions: {
			series: {
				allowPointSelect: true,
				cursor: 'pointer',
				showInLegend: true,
			}
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Jumlah',
			colorByPoint: true,
			data: [{
					name: 'Laporan Keuangan',
					y: 0
				},
				{
					name: 'Laporan Tahunan',
					y: 1
				},
				{
					name: 'Kontrak Kerja',
					y: 0
				},
				{
					name: 'Laporan Hasil Pemeriksaan (LHP)',
					y: 0
				},
				{
					name: 'Penelitian',
					y: 1463
				}
			]
		}]
	});

	//TAHUN 2024
	//Permohnan selsesai 2024
	Highcharts.chart('permohonan-2024', {
		chart: {
			type: 'column'
		},
		colors: [
			'#4572A7'
		],
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
			crosshair: true,
			accessibility: {
				description: ' '
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah'
			}
		},
		tooltip: {
			valueSuffix: ' Permohonan Selesai'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				},
				groupPadding: 0.1,
			}
		},
		legend: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Jumlah',
			data: [59, 50, 64, 72, 99, 92, 58]
		}]
	});

	// BATANG DUA 
	Highcharts.chart('permohonan-informasi-2024', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Individu',
				data: [49, 48, 57, 67, 91, 83, 51]
			},
			{
				name: 'Badan Hukum',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Kelompok Orang',
				data: [10, 2, 7, 5, 8, 9, 7]
			}
		]
	});

	Highcharts.chart('mekanisme-permohonan-2024', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Datang Langsung',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Melalui Website',
				data: [59, 50, 64, 72, 99, 92, 58]
			}
		]
	});

	Highcharts.chart('permintaan-informasi-2024', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Laporan Keuangan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Tahunan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Tahunan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Kontrak Kerja',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Hasil Pemeriksaan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Penelitian',
				data: [59, 50, 64, 72, 99, 92, 58]
			}
		]
	});

	//TAHUN 2023
	//Permohnan selsesai 2023
	Highcharts.chart('permohonan-2023', {
		chart: {
			type: 'column'
		},
		colors: [
			'#4572A7'
		],
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: ' '
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah'
			}
		},
		tooltip: {
			valueSuffix: ' Permohonan Selesai'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				},
				groupPadding: 0.1,
			}
		},
		legend: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Jumlah',
			data: [49, 42, 77, 70, 116, 101, 96, 48, 51, 62, 54, 54]
		}]
	});

	// BATANG DUA 
	Highcharts.chart('permohonan-informasi-2023', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Individu',
				data: [38, 36, 66, 53, 104, 92, 84, 38, 37, 44, 45, 46]
			},
			{
				name: 'Badan Hukum',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Kelompok Orang',
				data: [11, 6, 11, 17, 12, 9, 12, 10, 14, 18, 9, 8]
			}
		]
	});

	Highcharts.chart('mekanisme-permohonan-2023', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Datang Langsung',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Melalui Website',
				data: [49, 42, 77, 70, 116, 101, 96, 48, 51, 62, 54, 54]
			}
		]
	});

	Highcharts.chart('permintaan-informasi-2023', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Laporan Keuangan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Tahunan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Tahunan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Kontrak Kerja',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Hasil Pemeriksaan',
				data: [0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Penelitian',
				data: [49, 42, 77, 70, 116, 101, 96, 48, 51, 62, 54, 54]
			}
		]
	});

	//TAHUN 2022
	//Permohnan selsesai 2022
	Highcharts.chart('permohonan-2022', {
		chart: {
			type: 'column'
		},
		colors: [
			'#4572A7'
		],
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: ' '
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah'
			}
		},
		tooltip: {
			valueSuffix: ' Permohonan Selesai'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				},
				groupPadding: 0.1,
			}
		},
		legend: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Jumlah',
			data: [24, 21, 29, 41, 22, 34, 29, 17, 25, 44, 35, 38]
		}]
	});

	// BATANG DUA 
	Highcharts.chart('permohonan-informasi-2022', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Individu',
				data: [24, 20, 28, 38, 22, 30, 29, 17, 20, 36, 24, 34]
			},
			{
				name: 'Badan Hukum',
				data: [0, 1, 1, 2, 0, 4, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Kelompok Orang',
				data: [0, 0, 0, 1, 0, 0, 0, 0, 5, 8, 11, 4]
			}
		]
	});

	Highcharts.chart('mekanisme-permohonan-2022', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Datang Langsung',
				data: [24, 21, 29, 41, 22, 34, 29, 17, 11, 0, 0, 0]
			},
			{
				name: 'Melalui Website',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 14, 44, 35, 38]
			}
		]
	});

	Highcharts.chart('permintaan-informasi-2022', {
		chart: {
			type: 'column'
		},
		title: {
			text: ' ',
			align: 'left'
		},
		subtitle: {
			text: ' ',
			align: 'left'
		},
		xAxis: {
			categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			crosshair: true,
			accessibility: {
				description: 'Bulan'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ' '
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		credits: {
			enabled: false
		},
		series: [{
				name: 'Laporan Keuangan',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Tahunan',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Tahunan',
				data: [0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Kontrak Kerja',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Laporan Hasil Pemeriksaan',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			},
			{
				name: 'Penelitian',
				data: [24, 21, 29, 41, 22, 33, 29, 17, 25, 44, 35, 38]
			}
		]
	});






	// datatable
	$(document).ready(function() {
		var table = $('#data').DataTable({
			responsive: true,
			"ajax": {
				"type": "POST",
				"url": "hasil_penelitian.json",
				"timeout": 500,
				"dataSrc": function(json) {
					if (json != null) {
						return json
					} else {
						return "";
					}
				}
			},
			"sAjaxDataProp": "",
			"width": "100%",
			"order": [
				[0, "asc"]
			],
			"aoColumns": [{
					"mData": null,
					"title": "Nomor Pengajuan PPID",
					render: function(data, type, row, meta) {
						return no_pengajuan_ppid;
					}
				},
				{
					"mData": null,
					"title": "Nama",
					"render": function(data, row, type, meta) {
						return data.nama;
					}
				},
				{
					"mData": null,
					"title": "Instansi/Universitas",
					"render": function(data, row, type, meta) {
						return data.instansi;
					}
				},
				{
					"mData": null,
					"title": "Judul Penelitian",
					"render": function(data, row, type, meta) {
						return data.judul_penelitian;
					}
				},
				{
					"mData": null,
					"title": "Kendala yang Dihadapi Saat Penelitian",
					"render": function(data, row, type, meta) {
						return data.kendala_yang_dihadapi_saat_penelitian;
					}
				},
				{
					"mData": null,
					"title": "Link File Penelitian",
					"sortable": false,
					"render": function(data, row, type, meta) {
						let btn = '';

						if (data.nama != "Achmad Zaenudin") {
							btn += "<button style='font-size: 11px;' class='btn btn-primary' id='link' name='detail'><i class='fa fa-search'></i></button>";
						}

						return btn;
					}
				}
			]
		});

		$('#data tbody').on('click', '#detail', function() {
			var current_row = $(this).parents('tr');
			if (current_row.hasClass('child')) {
				current_row = current_row.prev();
			}
			var data = table.row(current_row).data();

			document.getElementById("no_pengajuan_ppid").value = data["no_pengajuan_ppid"];
			document.getElementById("nama").value = data["nama"];
			document.getElementById("instansi").value = data["instansi"];
			document.getElementById("judul_penelitian").value = data["judul_penelitian"];
			document.getElementById("kendala_yang_dihadapi_saat_penelitian").value = data["kendala_yang_dihadapi_saat_penelitian"];

			$("#viewModal").modal("show");
		});

	});
</script>
