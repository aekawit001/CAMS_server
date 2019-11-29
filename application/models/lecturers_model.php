<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class lecturers_model extends CI_Model{

        private $tbl_name = "lecturers";

        function get_all(){
            $result = $this->db->get($this->tbl_name);
            return $result->result();   //result คือ อาเรย์ of object
        }

        function getsearch_all($keyword){
            $this->db->like('firstName', $keyword);
            $result = $this->db->get($this->tbl_name);
            return $result->result();   //result คือ อาเรย์ of object
        }

        function insert($data){
            return $this->db->insert($this->tbl_name, $data);
        }

        function update($data){
            $this->db->where('lecturerID',$data['lecturerID']);
            $this->db->update($this->tbl_name,$data);
            $result = $this->db->get($this->tbl_name);
            return $result;
        }
    }
?>