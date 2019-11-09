<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertcouese_model extends CI_Model {
    private $tbl_name = "courses";

    function get_all($courseID,$courseCode,$courseName){
        $this->db->set('courseID', $courseID);
        $this->db->set('courseCode', $courseCode);
        $this->db->set('courseName', $courseName);
        $this->db->insert('courses');
        $result = $this->db->get($this->tbl_name);
        return $result->result();

    }
}