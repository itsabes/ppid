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
							<!-- <div class="col-md-3">
								<h5>Daftar Informasi Publik </h5>
								<h2>1148</h2>
							</div> -->
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


							<!-- <div class="col-md-12">
								<div class="chart-penyelesaian-permohonan">
									<div class="judul-card-atas">Hasil Penelitian</div>
									<table id="data" class="table table-striped table-bordered" style="width:100%"></table>
								</div>
							</div> -->

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
