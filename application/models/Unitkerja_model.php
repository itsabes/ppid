<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unitkerja_model extends CI_Model
{

    public $table = 'unit_kerja';
    public $id = 'IdUnitKerja';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('NamaUk', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_limit($param)
    {
        $this->db->order_by('NamaUk', 'ASC');
        return $this->db->where('JenisUk', $param['jenis'])
            ->limit($param['limit'], $param['start'])
            ->get($this->table)->result();
    }

    // get jenis
    function get_jenis($jenis)
    {
        $this->db->where('JenisUk', $jenis)->order_by('NamaUk', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
