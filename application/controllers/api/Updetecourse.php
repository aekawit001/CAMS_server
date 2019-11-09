<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updetecourse extends API_Controller{
    function __construct()
    {    
        parent::__construct();
        $this->load->model('updetecourse_model');
    }

    function get_all_get(){
        $courseID = $this->get('courseID');
        $courseCode = $this->get('courseCode');
        $courseName = $this->get('courseName');
        $result = $this->updetecourse_model->get_all($courseID,$courseCode,$courseName);
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