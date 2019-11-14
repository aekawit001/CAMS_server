<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertlocation extends API_Controller{
    function __construct()
    {    
        parent::__construct();
        $this->load->model('insertlocation_model');
    }
    
    function create_get(){
        $roomID = $this->get('roomID');
        $location = $this->get('location');
        $buildingID = $this->get('buildingID');
        $buildingName = $this->get('buildingName');
        $data = array(
            "roomID" => $roomID,
            "location" => $location,
            "buildingID" => $buildingID,
            "buildingName" => $buildingName
        );

        $data["room"] = array(
            'roomID' => $this->get("roomID"),
            'location' => $this->get("location"),
            'buildingID' => $this->get("buildingID") 
        );
        $data["building"] = array(
            'buildingName' => $this->get("buildingName"),
            'buildingID' => $this->get("buildingID")
        );

        $result = $this->insertlocation_model->insertdata($data);

        if ($result != null)
            {
                $this->response([
                    'status' => true,
                    'response' => $result
                ], REST_Controller::HTTP_OK); 
            }else{
            //error
                $this->response([
                    'status' => false,
                    'message' => ''
                ], REST_Controller::HTTP_CONFLICT);
            }
        
        /*error
        $this->response([
            'stetus' => false,
            'massage' => $result
        ], REST_Controller::HTTP_CONFLICT);*/
    }
}