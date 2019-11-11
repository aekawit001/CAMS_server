<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertlocation_model extends CI_Model {

    // private $tbl_name = "room";
    // private $tbl_name = "building";

    // function get_all($location){
    //     // $this->db->select('building.buildingID','building.buildingName','room.buildingID','room.location');
    //     // $this->db->set('roomID', $roomID);
    //     // $this->load->db->from();
    //     $this->db->set('location', $location);
    //     // $this->db->set('buildingID', $buildingID);
    //     // $this->db->set('buildingName',$buildingName);
    //     $this->db->insert('building');
    //     $result = $this->db->get($this->tbl_name);
    //     return $result->result();
        

    // }

    private $tbl_name = ["room"];

    function get_all($roomID,$location,$buildingID,$buildingName){
        $this->db->from($this->tbl_name);
        $this->db->join("building","building.buildingID = room.buildingID");
        $this->db->set('roomID', $roomID);
        $this->db->set('location', $location);
        $this->db->set('buildingID', $buildingID);
        $this->db->set('buildingName', $buildingName);
        $this->db->insert('building');
        $this->db->insert('room');
        $result = $this->db->get($this->tbl_name);
        return $result->result();

    }

    function insertdata($data){
        $this->db->trans_begin();
            $this->insertdata("room",$data["room"]);
            $roomID = $this->db->insert_id();
            $data["building"]["roomID"] = $roomID;

            if($this->db-trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }else{
                $this->db->trans_commit();
                return true;
            }
    }
}