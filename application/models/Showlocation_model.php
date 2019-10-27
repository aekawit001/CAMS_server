<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showlocation_model extends CI_Model {
    private $tbl_name = "room";

    function get_all($keyword){
        $this->db->select("room.roomID,building.buildingName");
        $this->db->from($this->tbl_name);
        $this->db->join('room','building.buildingID = room.buildingID');

        $this->db->like('room',$keyword);
        $result = $this->db->get();
        return $result->result();

    }
}