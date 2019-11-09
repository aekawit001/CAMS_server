<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletecourse extends API_Controller{
    function __construct()
    {    
        parent::__construct();
        $this->load->model('deletecourse_model');
    }

    function get_all_get(){
        $courseID = $this->get('courseID');
        $result = $this->deletecourse_model->get_all($courseID);
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