<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertlocation_model extends CI_Model {

    private $tbl_name = "room";

    function create_get($data){
        $this->db->trans_start();
        $this->db->insert('room', $data);
        $this->db->trans_complete();
 
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

    function insertdata($data){
            $this->db->insert('building',$data["building"]);
            $buildingID = $this->db->insert_id();
            $data["room"]["buildingID"] = $buildingID;     
            $this->db->insert("room",$data["room"]);

            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }else{
                $this->db->trans_commit();
                return true;
            }
    }
}