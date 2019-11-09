<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updetecourse_model extends CI_Model {
    private $tbl_name = "courses";

    function get_all($courseID,$courseCode,$courseName){
       $this->db->where('courseID',$courseID);
        
        
            $this->db->set('courseID', $courseID);
            $this->db->set('courseCode', $courseCode);
            $this->db->set('courseName', $courseName);
        

        //$this->db->update($tbl_name, $data);
        $result = $this->db->get($this->tbl_name);
        return $result->result();

    }
}




