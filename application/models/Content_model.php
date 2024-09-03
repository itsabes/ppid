<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_model extends CI_Model
{
    public $table = 'content';
    public $id = 'IdContent';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('IdContent', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get by id tipe
    function get_by_tipe($tipe)
    {
        $sql = "SELECT a.*
                    FROM content a
                    WHERE tipe=" . $tipe . " AND IsActive = 1
                    ORDER BY a.IdContent";

        return $this->db->query($sql)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get all query
    function get_all_query2()
    {
        $Organisasi = $this->session->userdata('Organisasi');
        $Organisasi2 = $this->session->userdata('periode');
        if (!empty($Organisasi)) {
            $sql = "SELECT a.*
                    FROM content a
                    ORDER BY a.Order";
        } else {
            $sql = "SELECT a.*
                    FROM content a
                    ORDER BY a.Order";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_all_query3($tipe)
    {
        // SELECT a.*, b.username FROM content a LEFT JOIN user b ON a.UpdateUser = b.id WHERE tipe=21 ORDER BY a.JudulContent, a.TahunData

        $Organisasi = $this->session->userdata('Organisasi');

        // echo $Organisasi;

        $Organisasi2 = $this->session->userdata('periode');
        if (!empty($Organisasi)) {
            $sql = "SELECT a.*, b.username
                    FROM content a LEFT JOIN user b ON a.UpdateUser = b.id
                    WHERE tipe=" . $tipe . " 
                    GROUP BY a.JudulContent, a.TahunData 
                    ORDER BY a.JudulContent, a.TahunData";
        } else {
            if ($tipe == 21) {
                $sql = "SELECT a.*, b.username
                        FROM content a LEFT JOIN user b ON a.UpdateUser = b.id
                        WHERE tipe=" . $tipe . "
                        GROUP BY a.JudulContent, a.TahunData 
                        ORDER BY a.JudulContent, a.TahunData";
            } else if ($tipe == 23) {
                $sql = "SELECT cast(trim('.' from left(a.JudulContent, 2)) as int) as no, a.*, b.username
                        FROM content a LEFT JOIN user b ON a.UpdateUser = b.id
                        WHERE tipe=" . $tipe . "
                        ORDER BY no, a.TahunData";
            } else if ($tipe == 27) {
                $sql = "SELECT a.*, b.username
                        FROM content a LEFT JOIN user b ON a.UpdateUser = b.id
                        WHERE tipe=" . $tipe . "
                        GROUP BY a.BulanData, a.TahunData
                        ORDER BY a.IdContent";
            } else {
                $sql = "SELECT a.*, b.username
                        FROM content a LEFT JOIN user b ON a.UpdateUser = b.id
                        WHERE tipe=" . $tipe . "
                        GROUP BY a.JudulContent, a.TahunData
                        ORDER BY a.TahunData, a.JudulContent";
            }
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_skdr_by_tahun($tahun)
    {
        $sql = "SELECT a.*
                        FROM content a
                        WHERE TahunData=" . $tahun . " AND IsActive = 1 AND Tipe = 7
                        ORDER BY a.NoContent";

        return $this->db->query($sql)->result();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('IdContent', $q);
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
        $this->db->like('IdContent', $q);
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
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function getIdContentBelanja()
    {
        $q = $this->db->query("select MAX(IdContent) as id_max from content");
        $id = 0;
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $id = ((int)$k->id_max);
            }
        } else {
            $id = 1;
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
        $this->db->insert_batch('content', $data);
    }

    public function find($id = '')
    {
        return $this->db->where('IdContent', $id)->get($this->table)->row();
    }
}

/* End of file Content_model.php */
/* Location: ./application/models/Content_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */