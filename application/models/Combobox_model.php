<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Combobox_model extends CI_Model
{

    public $table = 'combo_box';
    public $id = 'id_combobox';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db
            ->join('tipe', 'tipe.IdTipe = combo_box.id_tipe')
            ->order_by('id_tipe', 'ASC')
            ->order_by('nama', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db
            ->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by tipe
    function get_by_tipe($tipe)
    {
        $this->db
            ->where('is_active', 1)
            ->where('id_tipe', $tipe);

        return $this->db->get($this->table)->result();
    }

    // // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    // function delete($id)
    // {
    //     $this->db->where($this->id, $id);
    //     $this->db->delete($this->table);
    // }
}
