<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_model extends CI_Model {
    private $tbl_name = "activities";

    function get_all($keyword){
        $this->db->like('activity_name',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();

    }
}