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

        echo "<br>Selesai. Total menu ditambahkan: " . $added;
        echo "<br><br><a href='" . base_url('dashboard') . "'>Kembali ke Dashboard</a>";
    }
}
