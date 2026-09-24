<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fixmenu extends CI_Controller
{
    public function index()
    {
        // Require admin login
        if ($this->session->userdata('level') !== 'admin') {
            echo "Akses ditolak. Harap login sebagai admin terlebih dahulu.";
            return;
        }

        echo "<h2>Sinkronisasi Menu dari Tipe Data</h2>";

        // Cari ID parent Rumah Data
        $rumah_data = $this->db->get_where('menu', ['name' => 'Rumah Data'])->row();
        if (!$rumah_data) {
            echo "Menu 'Rumah Data' tidak ditemukan. Tidak bisa melanjutkan.<br>";
            return;
        }
        $parent_rumah_data = $rumah_data->id;

        // Cari ID parent Informasi Publik (jika ada)
        $info_publik = $this->db->get_where('menu', ['name' => 'Informasi Publik'])->row();
        $parent_info_publik = $info_publik ? $info_publik->id : $parent_rumah_data;

        // Ambil semua tipe
        $tipes = $this->db->get('tipe')->result();
        
        $added = 0;
        foreach ($tipes as $t) {
            $link = ($t->IdTipe <= 5) ? 'content/index/' . $t->IdTipe : 'content/data/' . $t->IdTipe;
            
            // Cek apakah menu sudah ada
            $exists = $this->db->get_where('menu', ['link' => $link])->num_rows();
            if ($exists == 0) {
                // Tentukan parent
                $parent_id = ($t->IdTipe <= 5) ? $parent_info_publik : $parent_rumah_data;
                
                // Insert menu baru
                $data_menu = [
                    'name'      => $t->keterangan,
                    'link'      => $link,
                    'icon'      => 'fa fa-circle-o',
                    'is_active' => 1,
                    'is_parent' => $parent_id,
                    'pos'       => 1, // backend
                    'aplikasi'  => '*', // atau sesuaikan dengan aplikasi
                    'level'     => 'admin', // hanya admin (atau '*')
                    'urut'      => 99
                ];
                
                $this->db->insert('menu', $data_menu);
                echo "Berhasil menambahkan menu: <b>" . $t->keterangan . "</b> (" . $link . ")<br>";
                $added++;
            }
        }
        
        // Force add menu Informasi Publik (IdTipe 1-4, 6)
        $info_publik_menus = [
            1 => 'Daftar Informasi Publik',
            2 => 'Informasi Berkala',
            3 => 'Informasi Serta-Merta',
            4 => 'Informasi Setiap Saat',
            6 => 'Informasi Pengendalian Pencemaran Udara'
        ];

        foreach ($info_publik_menus as $id => $name) {
            $link = 'content/index/' . $id;
            $exists = $this->db->get_where('menu', ['link' => $link])->num_rows();
            if ($exists == 0) {
                $data_menu = [
                    'name'      => $name,
                    'link'      => $link,
                    'icon'      => 'fa fa-circle-o',
                    'is_active' => 1,
                    'is_parent' => $parent_info_publik,
                    'pos'       => 1,
                    'aplikasi'  => '*',
                    'level'     => 'admin',
                    'urut'      => 99
                ];
                $this->db->insert('menu', $data_menu);
                echo "Berhasil menambahkan menu: <b>" . $name . "</b> (" . $link . ")<br>";
                $added++;
            }
        }
        
        // Force add menu Rumah Data (IdTipe lainnya dari routes.php)
        $menus = [
            21 => 'LHKPN',
            22 => 'Pedoman Pengelolaan Kepegawaian',
            23 => 'Regulasi',
            24 => 'Surat Perjanjian dengan Pihak Ketiga',
            25 => 'Informasi Hasil Penelitian',
            26 => 'Pedoman Pengelolaan Keuangan',
            27 => 'Agenda Kerja Pimpinan',
            31 => 'Rencana Kerja',
            32 => 'Laporan Kinerja',
            33 => 'Laporan Keuangan',
            34 => 'Laporan Tahunan Pelayanan Informasi PPID',
            35 => 'Kalender Kegiatan',
            36 => 'Inventaris Aset',
            37 => 'Rencana Strategis',
            51 => 'Penanggungjawab Program',
            52 => 'Rencana Kerja Operasional',
            53 => 'Neraca Keuangan',
            54 => 'CALK',
            55 => 'Laporan Realisasi Anggaran',
            56 => 'Rencana Kerja Anggaran',
            57 => 'Dokumen Pelaksanaan Anggaran',
            58 => 'Nilai Anggaran',
            59 => 'Informasi Keuangan Covid19',
            42 => 'Statistik Permohonan Informasi',
            60 => 'Laporan Aduan Masyarakat',
            61 => 'DIPA RKA KL'
        ];

        foreach ($menus as $id => $name) {
            $link = 'content/data/' . $id;
            $exists = $this->db->get_where('menu', ['link' => $link])->num_rows();
            if ($exists == 0) {
                $data_menu = [
                    'name'      => $name,
                    'link'      => $link,
                    'icon'      => 'fa fa-circle-o',
                    'is_active' => 1,
                    'is_parent' => $parent_rumah_data,
                    'pos'       => 1,
                    'aplikasi'  => '*',
                    'level'     => 'admin',
                    'urut'      => 99
                ];
                $this->db->insert('menu', $data_menu);
                echo "Berhasil menambahkan menu: <b>" . $name . "</b> (" . $link . ")<br>";
                $added++;
            }
        }

        echo "<br>Selesai. Total menu ditambahkan: " . $added;
        echo "<br><br><a href='" . base_url('dashboard') . "'>Kembali ke Dashboard</a>";
    }
}
