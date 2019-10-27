<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showcourse extends API_Controller{
    function __construct()
    {    
        parent::__construct();
        $this->load->model('showcourse_model');
    }

    function get_all_get(){
        $keyword = $this->get('keyword');
        $result = $this->showcourse_model->get_all($keyword);
        $this->response([
            'stetus' => true,
            'massage' => $result
        ], REST_Controller::HTTP_OK);
        
        /*error
        $this->response([
            'stetus' => false,
            'massage' => $result
        ], REST_Controller::HTTP_CONFLICT);*/
    }
}