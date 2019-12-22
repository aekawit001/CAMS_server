<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class location extends BD_Controller{
    function __construct()
    {    
        parent::__construct();
        $this->load->model('location_model');
    }
    
    function create_get(){
        $roomID = $this->get('roomID');
        $roomname = $this->get('roomname');
        $location = $this->get('location');
        $buildingID = $this->get('buildingID');
        $buildingName = $this->get('buildingName');
        $data = array( 
            "roomID" => $roomID,
            "roomname" => $roomname,
            "location" => $location,
            "buildingID" => $buildingID,
            "buildingName" => $buildingName
        );

        $data["room"] = array(
            'roomID' => $this->get("roomID"),
            'roomname' => $this->get("roomname"),
            'location' => $this->get("location"),
            'buildingID' => $this->get("buildingID") 
        );
        $data["building"] = array(
            'buildingName' => $this->get("buildingName"),
            'buildingID' => $this->get("buildingID")
        );

        $result = $this->location_model->insertdata($data);

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

    function get_all_get(){         // all_get || all_post || all_delete
        $result = $this->location_model->get_all();
        $this->response($result); 

    }

    function delete_get(){
        $roomID = $this->get('roomID');
        $result = $this->location_model->delete($roomID);
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