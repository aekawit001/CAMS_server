<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class location extends BD_Controller{
    function __construct()
    {    
        parent::__construct();
        $this->load->model('location_model');
    }
    
    function create_post(){

        $roomname = $this->post('roomname');
        $location = $this->post('location');
        $buildingName = $this->post('buildingName');

        $data = array(  
            "roomname" => $roomname,
            "location" => $location,
            "buildingName" => $buildingName
        );

        $data["room"] = array(
  
            'roomname' => $this->post("roomname"),
            'location' => $this->post("location")

        );
        $data["building"] = array(
            'buildingName' => $this->post("buildingName")
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
        $buildingID = $this->get('buildingID');
        $result = $this->location_model->delete($buildingID);
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

    function update_post(){
        $buildingID = $this->post('buildingID');
        $buildingName = $this->post('buildingName');
        $roomname = $this->post('roomname');
        $location = $this->post('location');
        $data = array( 
            "buildingID" => $buildingID,
            "roomname" => $roomname,
            "location" => $location,
            "buildingName" => $buildingName
        );

        $data["room"] = array(
            'roomname' => $this->post("roomname"),
            'location' => $this->post("location"),
            'buildingID' => $this->post("buildingID") 
        );
        $data["building"] = array(
            'buildingName' => $this->post("buildingName"),
            'buildingID' => $this->get("buildingID")
        );

        $result = $this->location_model->update($data);

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