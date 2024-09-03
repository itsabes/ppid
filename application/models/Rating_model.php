<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rating_model extends CI_Model
{

    public $table = 'rating';
    public $id = 'IdRating';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('Rating >', 3)->limit(5, 5)->order_by('rand()');
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all_data()
    {
        $this->db->where('Rating >', 0)->order_by('Rating', 'DESC');
        return $this->db->get($this->table)->result();
    }
}
