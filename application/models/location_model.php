<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class location_model extends CI_Model {

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
            }
            else{
                $this->db->trans_commit();
                return true;
            }
    }

    function get_all(){

        $this->db->select('building.buildingID,building.buildingName,room.roomname');
        $this->db->from('room');
        $this->db->join('building','building.buildingID = room.buildingID');
        $result = $this->db->get();
        return $result->result();   
    }

    function delete($buildingID){

        $this->db->from('room');
        $this->db->join('building', 'building.buildingID = room.buildingID');
        $this->db->where('room.buildingID', $buildingID);
        $this->db->delete('room');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

    function updete($data){

        // $this->db->where('building',$data["building"]);
        // $buildingID = $this->db->insert_id();
        // $data["room"]["buildingID"] = $buildingID;     
        // $this->db->set("room",$data["room"]);
        // $result = $this->db->get($this->tbl_name);
        // return $result->result();

     }

}