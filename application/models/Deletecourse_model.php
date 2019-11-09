<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletecourse_model extends CI_Model {
    private $tbl_name = "courses";

    function get_all($courseID){
        //$this->db->where('courseID',$courseID);
        //$this->db->delete($tbl_name);
        $this->db->where('courseID', $courseID);
        $this->db->delete('courses');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
}