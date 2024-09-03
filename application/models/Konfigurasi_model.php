<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model
{
    protected $table = 'konfigurasi';
    protected $primaryKey = 'id_konfigurasi';
    protected $allowedFields = [];

    function __construct()
    {
        parent::__construct();
    }

    // Listing
    public function listing()
    {
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    // Edit
    public function edit($data)
    {
        $this->db->where($this->primaryKey, $data['id_konfigurasi']);
        $this->db->update($this->table, $data);
    }
}
