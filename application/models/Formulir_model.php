<?php

use phpDocumentor\Reflection\PseudoTypes\False_;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Formulir_model extends CI_Model
{

    public $table = 'formulir';
    public $id = 'IdFormulir';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('IdFormulir', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_by_user($id_user)
    {
        $this->db->where('IdUserInput', $id_user)->order_by('CreatedDate', 'DESC');
        return $this->db->get($this->table)->result();
    }

    // get all
    function selesai_revisi()
    {
        $query = $this->db->where('Status', 3)->order_by('CreatedDate', 'DESC')
            ->get($this->table);
        return $query->result();
    }

    // get all filter
    function get_all_filter($Tujuan)
    {
        $this->db->where('TujuanInformasi', $Tujuan)->order_by('CreatedDate', 'DESC');
        return $this->db->get($this->table)->result();
    }

    // get all query
    function get_all_query()
    {
        $Organisasi = $this->session->userdata('Organisasi');
        $Organisasi2 = $this->session->userdata('periode');
        if (!empty($Organisasi)) {
            $sql = "SELECT a.*
                    FROM formulir a
                    ORDER BY a.CreatedDate DESC";
        } else {
            $sql = "SELECT a.*
                    FROM formulir a
                    ORDER BY a.CreatedDate DESC";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_filter_query($Tujuan)
    {
        $Organisasi = $this->session->userdata('Organisasi');
        // $Organisasi2 = $this->session->userdata('periode');
        if (!empty($Organisasi)) {
            $sql = "SELECT a.*
                        FROM formulir a
                        WHERE TujuanInformasi = '$Tujuan'
                        ORDER BY a.CreatedDate DESC";
        } else {
            $sql = "SELECT a.*
                        FROM formulir a
                        WHERE TujuanInformasi = '$Tujuan'
                        ORDER BY a.CreatedDate DESC";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_all_query2()
    {
        $Organisasi = $this->session->userdata('Organisasi');
        $Organisasi2 = $this->session->userdata('periode');
        if (!empty($Organisasi)) {
            $sql = "SELECT a.*
                    FROM formulir a
                    ORDER BY a.Order";
        } else {
            $sql = "SELECT a.*
                    FROM formulir a
                    ORDER BY a.Order";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_all_query3()
    {
        $Organisasi = $this->session->userdata('Organisasi');
        $Organisasi2 = $this->session->userdata('periode');
        $sql = "SELECT a.*, b.username, b.nama, c.Seksi, d.Bidang
                FROM formulir a
                LEFT JOIN user b ON a.ResponseUser = b.id
                LEFT JOIN seksi c ON a.Disposisi = c.IdSeksi
                LEFT JOIN bidang d ON a.Disposisibid = d.IdBidang
                GROUP BY a.IdFormulir
                ORDER BY a.CreatedDate DESC";

        return $this->db->query($sql)->result();
    }

    // get all filter
    function get_query3_filter($Tujuan)
    {
        $sql = "SELECT a.*, b.username, b.nama, c.Seksi, d.Bidang
                FROM formulir a
                LEFT JOIN user b ON a.ResponseUser = b.id
                LEFT JOIN seksi c ON a.Disposisi = c.IdSeksi
                LEFT JOIN bidang d ON a.Disposisibid = d.IdBidang
                WHERE a.TujuanInformasi = '$Tujuan'
                GROUP BY a.IdFormulir
                ORDER BY a.CreatedDate DESC";

        return $this->db->query($sql)->result();
    }

    // get all query
    function get_all_query_keberatan()
    {
        $Organisasi = $this->session->userdata('Organisasi');
        $Organisasi2 = $this->session->userdata('periode');
        if (!empty($Organisasi)) {
            $sql = "SELECT a.*
                    FROM formulir a
                    WHERE IsKeberatan = 1
                    ORDER BY a.CreatedDate DESC";
        } else {
            $sql = "SELECT a.*
                    FROM formulir a
                    WHERE IsKeberatan = 1
                    ORDER BY a.CreatedDate DESC";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_all_query_jawaban_keberatan()
    {
        $Organisasi = $this->session->userdata('Organisasi');
        $Organisasi2 = $this->session->userdata('periode');
        $sql = "SELECT a.*, b.username
                FROM formulir a LEFT JOIN user b ON a.ResponseKeberatanUser = b.id
                WHERE IsKeberatan = 1
                ORDER BY a.CreatedDate DESC";

        return $this->db->query($sql)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_nomor($nomor)
    {
        $this->db->where('Nomor', $nomor);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_nomor_keberatan($nomor)
    {
        $this->db->where('NomorKeberatan', $nomor);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('IdFormulir', $q);
        $this->db->or_like('KodeLokasi', $q);
        $this->db->or_like('KodeBarang', $q);
        $this->db->or_like('IdProgram', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('IdFormulir', $q);
        $this->db->or_like('KodeLokasi', $q);
        $this->db->or_like('KodeBarang', $q);
        $this->db->or_like('IdProgram', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);

        // MENGEMBALIKAN RESPONSE ID FORMULIR
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // update data formulir
    function update_keberatan($nomor, $data)
    {
        $this->db->where('Nomor', $nomor);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function getNomor()
    {
        $q = $this->db->query("select MAX(Nomor) as max_no from formulir");
        $id = 0;
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $id = ((int)$k->max_no) + 1;
            }

            if ($id == 1) {
                $id = date("Y") . sprintf("%05d", $id);
            }
        } else {
            $id = date("Y") . sprintf("%05d", 1);
        }
        return $id;
    }

    public function getNomorKeberatan()
    {
        $q = $this->db->query("select MAX(NomorKeberatan) as max_no from formulir");
        $id = 0;
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $id = ((int)$k->max_no) + 1;
            }

            if ($id == 1) {
                $id = date("Y") . '1' . sprintf("%04d", $id);
            }
        } else {
            $id = date("Y") . '1' . sprintf("%04d", 1);
        }
        return $id;
    }

    function search_organisasi($title)
    {
        $this->db->like('NamaOrganisasi', $title, 'both');
        $this->db->order_by('NamaOrganisasi', 'ASC');
        $this->db->limit(20);
        return $this->db->get('organisasi')->result();
    }

    // Fungsi untuk melakukan proses upload file
    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
    public function insert_multiple($data)
    {
        $this->db->insert_batch('formulir', $data);
    }

    public function find($id = '')
    {
        return $this->db->where('IdFormulir', $id)->get($this->table)->row();
    }
}

/* End of file Formulir_model.php */
/* Location: ./application/models/Formulir_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */