<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertlocation_model extends CI_Model {

    private $tbl_name = "room";
    // private $tbl_name = "building";

    function create_get($data){
        // $this->db->select('building.buildingID','building.buildingName','room.buildingID','room.location');
        // $this->db->set('roomID', $roomID);
        // $this->load->db->from();
        // $this->db->set('roomID', $roomID);
        // $this->db->set('location', $location);
        // $this->db->set('buildingID', $buildingID);
        // $this->db->set('buildingName', $buildingName);
        // $this->db->set('buildingID', $buildingID);
        // $this->db->set('buildingName',$buildingName);
        $this->db->trans_start();
        $this->db->insert('room', $data);
        $this->db->trans_complete();
 
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

    function insertdata($data){
        // $this->db->trans_begin();
        //     $this->insertdata("room",$data["room"]);
            $this->db->insert('building',$data["building"]);
            $buildingID = $this->db->insert_id();
            $data["room"]["buildingID"] = $buildingID;
        
            $this->db->insert("room",$data["room"]);
            // $roomID = $this->db->insert_id();
            // $data["buildingID"]["roomID"]["location"] = $roomID;



            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }else{
                $this->db->trans_commit();
                return true;
            }
    }
}