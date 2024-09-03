<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Formulir_History_model extends CI_Model
{

    public $table = 'formulir_history';
    public $id = 'id_history';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_by_id_formulir($id)
    {
        return $this->db->where('id_formulir', $id)->order_by('created_at', 'ASC')->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->set('id_history', 'UUID()', FALSE);
        $this->db->insert($this->table, $data);
    }
}
