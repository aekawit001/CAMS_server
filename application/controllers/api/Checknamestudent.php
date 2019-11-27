<?php
    // defined('BASEPATH') OR exit('No direct script access allowed');
    // header('Access-Control-Allow-Origin: *');
    // header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    class Checknamestudent extends BD_Controller{
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('checknamestudent_model');

        }
        // function get_all_get(){         // all_get || all_post || all_delete
        //     $result = $this->checknamestudent_model->get_all();
        //     // $this->response(['response' => $result]);
        //     $this->response($result); 

        // }

        function getCourseByUserId_get(){
            $userID = $this->get('user_ID');
            $result = $this->checknamestudent_model->getCourseByUserId($userID);
            $data = [];
            foreach ($result as $key => $value) {
                $data[$key]['data'] = $value;
                $data[$key]['time'] = $this->checknamestudent_model->getdatatime($value->courseID);
            }
            // $this->response(['response' => $result]);
            $this->response($data); 

        }

        
        function gethistory_get(){
            $classID = $this->post("classID");
            $studentID = $this->post("studentID");
            $result = $this->checknamestudent_model->gethistorydata($classID, $studentID);
            // success
            // $this->response([
            //     'status' => true,
            //     'response' => $result
            // ], REST_Controller::HTTP_OK);

            $this->response($result); 

            
        }

        function postCheckname_post(){
            $classID = $this->post("classID");
            $studentID = $this->post("studentID");

            $config['upload_path'] = 'public/image/checkname/';
            $img = $this->post("picture");
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imageName = uniqid().'.png';
            $file = $config['upload_path']. '/'. $imageName;
            $success = file_put_contents($file, $data);
            

            if (!$success){
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data_check = $this->checknamestudent_model->postChecknamedata($classID, $studentID);
                $data = array(
                    "classID"=> $classID,
                    "studentID"=> $studentID,
                    "datetime" => date('Y-m-d H:i:s',time()),
                    "picture" => $imageName,
                );
            
                // $datetime = "datetime";
                // if($classID > $datetime){
                //     $this->response([
                //         'status' => false,
                //         'message' => 'Error'
                //     ], REST_Controller::HTTP_CONFLICT);
                // }
                // echo datetime;
                // if(){
    
                // $option = [
                //     "data_check" => $data_check,
                //     "data" => $data,
                //     "model" => $this->checknamestudent_model,
                //     "image_path" => $file
                // ];
        
                // $this->response($data); 
                // $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
                $result = $this->checknamestudent_model->insert($data);
                $this->response([
                    'status' => $result
                ], REST_Controller::HTTP_OK);
    
            }
        }


       
        // function create_post(){
        //     $checknameID = $this->input->post('checknameID');
        //     // $studentID = $this->input->post('studentID');
        //     // $classID = $this->input->post('classID');
        //     // $datetime = $this->input->post('datetime');
        //     $location = $this->input->post('location');

        //     $data = [
        //         'checknameID' => $checknameID,
        //         // 'studentID' => $studentID,
        //         // 'classID' => $classID,
        //         // 'datetime' => $datetime,
        //         'location' => $location,
        //         // 'status' => 0
        //     ];
        //     // $result = $this->Checknamestudent_model->insert($data);
        //     $this->response([
        //         'status' => true,
        //         'response' => $result
        //     ],REST_Controller::HTTP_OK);
        // }
      
    }
?>