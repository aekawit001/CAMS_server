<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class lecturers extends BD_Controller{
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('lecturers_model');
            
        }

        function get_all_get(){         // all_get || all_post || all_delete
            $result = $this->lecturers_model->get_all();
            $this->response($result); 

        }
        function getsearch_get(){         // all_get || all_post || all_delete
            $keyword = $this->get('keyword');
            $result = $this->lecturers_model->getsearch_all($keyword);
            $this->response($result); 

        }

        function getteachcourses_get(){
            // $datetime = date('Y-m-d H:i:s');
            $teaching = $this->get('teachingID');
            // $startdate = $this->get("startdate");
            // if($startdate >= $datetime){
            // }
            $result = $this->lecturers_model->getteachcoursesmodel($teaching);

            $this->response($result);
        }

        function create_post(){
            // $user_id = $this->post('user_id');
            $firstName = $this->post('firstName');
            $lastName = $this->post('lastName');
            $email = $this->post('email');
            $phoneNumber = $this->post('phoneNumber');
            $data = [
                'lecturerID' => null,
                'roleID' => 2,
                'userID' => 1,
                'firstName' => $firstName,
                // 'user_id' => $user_id,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'email' => $email
            ];
            $result = $this->lecturers_model->insert($data);
            $this->response($result);
        }
        
        function update_post(){
            $firstName = $this->post('firstName');
            $lastName = $this->post('lastName');
            $email = $this->post('email');
            $phoneNumber = $this->post('phoneNumber');
            $data = [
                'lecturerID' => null,
                'roleID' => 2,
                'userID' => null,
                'firstName' => $firstName,
                // 'user_id' => $user_id,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'email' => $email
            ];
            $result = $this->lecturers_model->update($data);
            // $this->response([
            //     'status' => true,
            //     'response' => $result
            // ],REST_Controller::HTTP_OK);
            $this->response($result);

        }
        function historystudentabycourses_get(){
            $courseID = $this->get('courseID');
            $result = $this->lecturers_model->historystudentabycoursesmodel($courseID);
            $this->response($result); 
        }

        ///เริ่ม 
        function getlecturersbyCourse_get(){
            $lecturerID = $this->get('lecturerID');
            $result = $this->lecturers_model->getlecturersbyCoursemodel($lecturerID);
            $this->response($result); 
        }
    }
?>