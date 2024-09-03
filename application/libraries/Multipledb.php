<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Multipledb {
  var $db = NULL;
  
  function __construct()
  {
    $CI = &get_instance();
    $this->db = $CI->load->database('db2', TRUE);  
    $this->db2 = $CI->load->database('db3', TRUE);  
    $this->db3 = $CI->load->database('db4', TRUE);
    $this->db4 = $CI->load->database('db5', TRUE);
    $this->db5 = $CI->load->database('db6', TRUE);
  }
}