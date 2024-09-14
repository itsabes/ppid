<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// CUSTOM URL
$route['login'] = 'auth'; // Login

$route['profil-pejabat-struktural'] = 'home/pejabat'; // Profil Pejabat Struktural
$route['kanal-layanan-informasi'] = 'home/kanal'; // Kanal Layanan Informasi	
$route['waktu-dan-biaya-layanan'] = 'home/waktu'; // Waktu dan Biaya Layanan
$route['berita'] = 'home/berita'; // Berita PPID Dinas Kesehatan DKI Jakarta
$route['infografis'] = 'home/infografis'; // Infografis
$route['video'] = 'home/video'; // Video
$route['konten'] = 'home/konten'; // Konten
$route['sosialisasi'] = 'home/sosialisasi'; // Sosialisasi
$route['maklumat-informasi-publik'] = 'home/maklumat'; // Maklumat
$route['ppid-upt-ukpd'] = 'home/upt'; // PPID UPT UKPD
$route['berita_informasi_kesehatan'] = 'home/infokesehatan'; // Informasi Jaminan Kesehatan Nasional

$route['daftar-informasi-publik'] = 'content/view/1'; // Daftar Informasi Publik
$route['informasi-berkala'] = 'content/view/2'; // Informasi Berkala
$route['informasi-serta-merta'] = 'content/view/3'; // Informasi Serta-Merta
$route['informasi-setiap-saat'] = 'content/view/4'; // Informasi Setiap Saat
$route['informasi-pengendalian-pencemaran-udara'] = 'content/view/6'; // Pencemaran udara

$route['profilrsudsabes'] = 'content/publish/56'; // Dinas Kesehatan Provinsi DKI Jakarta
$route['profilPPID'] = 'content/publish/55'; // PPID Dinas Kesehatan DKI Jakarta
$route['prosedur-layanan-informasi-publik'] = 'content/publish/250'; // Prosedur Layanan Informasi Publik
$route['prosedur-pengelolaan-keberatan-informasi-publik'] = 'content/publish/251'; // Prosedur Pengelolaan Keberatan Informasi Publik
$route['prosedur-permohonan-penyelesaian-sengketa-informasi'] = 'content/publish/252'; // Prosedur Permohonan Penyelesaian Sengketa Informasi
$route['prosedur-penanganan-sengketa-informasi'] = 'content/publish/253'; // Prosedur Penanganan Sengketa Informasi
$route['sop'] = 'content/publish/254'; // SOP PPID

$route['lhkpn'] = 'content/publish_data/21'; // LHKPN
$route['pedoman-pengelolaan-kepegawaian'] = 'content/publish_data/22'; //  Pedoman Pengelolaan Kepegawaian
$route['regulasi'] = 'content/publish_data/23'; // Regulasi
$route['surat-perjanjian'] = 'content/publish_data/24'; // Surat-surat Perjanjian Dinas Kesehatan Provinsi DKI Jakarta dengan Pihak Ketiga
$route['informasi-hasil-penelitian'] = 'content/publish_data/25'; // Informasi mengenai Hasil Penelitian
$route['pedoman-pengelolaan-keuangan'] = 'content/publish_data/26'; // Pedoman Pengelolaan Keuangan
$route['agenda-kerja-pimpinan'] = 'content/publish_data/27'; // Agenda Kerja Pimpinan Dinas Kesehatan Provinsi DKI Jakarta
$route['rencana-kerja'] = 'content/publish_data/31'; // Rencana Kerja dan Anggaran Dinas Kesehatan pada APBD Pemerintah Provinsi DKI Jakarta
$route['laporan-kinerja'] = 'content/publish_data/32'; // Ringkasan Informasi mengenai Kinerja berupa Narasi tentang Realisasi Kegiatan yang telah maupun sedang dijalankan beserta capaiannya
$route['laporan-keuangan'] = 'content/publish_data/33'; // Ringkasan Laporan Keuangan Dinas Kesehatan Provinsi DKI Jakarta
$route['laporan'] = 'content/publish_data/34'; // Laporan Tahunan Pelayanan Informasi PPID Dinas Kesehatan DKI Jakarta
$route['kalender-kegiatan'] = 'content/publish_data/35'; // Kalender Kegiatan Dinas Kesehatan Provinsi DKI Jakarta
$route['inventaris-aset'] = 'content/publish_data/36'; // Data Perbendaharaan atau Inventaris Aset
$route['rencana-strategis'] = 'content/publish_data/37'; // Rencana Strategis Dinas Kesehatan Provinsi DKI Jakarta

$route['penanggungjawab-program'] = 'content/publish_data/51'; // Penanggungjawab Program
$route['rencana-kerja-operasional'] = 'content/publish_data/52'; // Rencana Kerja Operasional
$route['neraca-keuangan'] = 'content/publish_data/53'; // Neraca Keuangan
$route['calk'] = 'content/publish_data/54'; // CALK
$route['laporan-realisasi-anggaran'] = 'content/publish_data/55'; // Laporan Realisasi Anggaran
$route['rencana-kerja-anggaran'] = 'content/publish_data/56'; // Rencana Kerja Anggaran
$route['dokumen-pelaksanaan-anggaran'] = 'content/publish_data/57'; // Dokumen Pelaksanaan Anggaran
$route['nilai-anggaran'] = 'content/publish_data/58'; // Nilai Anggaran
$route['informasi-keuangan-covid19'] = 'content/publish_data/59'; // Informasi Keuangan Covid19
// $route['statistik-permohonan-informasi'] = 'content/publish_data/59'; // Informasi Keuangan Covid19
$route['laporan-aduan-masyarakat'] = 'content/publish_data/60'; // Laporan Aduan Masyarakat
$route['DIPA-RKA-KL'] = 'content/publish_data/61'; // Laporan Aduan Masyarakat

$route['form_permohonan_penelitian'] = 'formulir/create'; // Form Permohonan Penelitian
$route['form-keberatan'] = 'formulir/keberatan_create'; // Form Keberatan Informasi Publik
$route['cek_status_penelitian'] = 'formulir/cek_permohonan'; // Form Cek Permohonan Penelitian
$route['cek_status_keberatan'] = 'formulir/cek_keberatan'; // Form Cek Permohonan keberatan

$route['form_permohonan_informasi'] = 'permohonaninformasi'; // Form Permohonan Informasi Publik (API KE PPID PEMPROV)
$route['cek_status_informasi'] = 'permohonaninformasi/cekStatus'; // Form Cek Permohonan Informasi Publik (API KE PPID PEMPROV)

$route['alamat-ukpd-upt'] = 'unitkerja/index'; // Alamat UKPD dan UPT

$route['tugas-fungsi-RSUD'] = 'content/publish/1160'; // Alamat UKPD dan UPT