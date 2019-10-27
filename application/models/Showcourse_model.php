<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showcourse_model extends CI_Model {
    private $tbl_name = "courses";

    function get_all($keyword){
        $this->db->like('courseCode',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();

    }
}