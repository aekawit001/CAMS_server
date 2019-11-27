<?php
    defined('BASEPATH') OR exit('No direct script access allowed');



    class Checknamestudent_model extends CI_Model{

         
        private $tbl_name = "studentsregeter";

        // function get_all(){
        //     $this->db->select("courses.courseID, courses.courseCode, courses.courseName, courses.lesson, checkname.courseID, checkname.status, checkname.day, studentsregeter.courseID, studentsregeter.studentID ");
        //     $this->db->from($this->tbl_name);
        //     $this->db->join('studentsregeter', 'courses.courseID = studentsregeter.courseID');
        //     // $this->db->join('checkname', 'class.courseID = checkname.courseID');
        //     $this->db->join('class', 'courses.courseID = class.courseID');
        //     $result = $this->db->get();
        //     return $result->result();
        // }

        function getCourseByUserId($userID){
            $datestart = date('Y-m-d',time());
            
            // $this->db->();
            $this->db->from($this->tbl_name);
            $this->db->join('courses', 'courses.courseID = studentsregeter.courseID');
            $this->db->where('studentsregeter.studentID', $userID);
            $result = $this->db->get();
            // echo $this->db->last_query();
            return $result->result();

        }

        function getdatatime($coursesid){
            $datestart = date('Y-m-d',time());
            $this->db->from('class');
            // $this->db->where('class.classID', $coursesid );
            $this->db->where('class.courseID', $coursesid);
            $this->db->where('class.startdate', $datestart);
            $result = $this->db->get();
            return $result->row();


        }

        function postChecknamedata($classID, $studentID){
            $this->db->from('checkname');
            $this->db->where('classID', $classID);
            $this->db->where('studentID', $studentID);
            $result = $this->db->get();
            return $result->result();
        }

        function insert($data){
            return $this->db->insert('checkname', $data);  //table ''
        }

        function gethistorydata($classID, $studentID){
                $this->db->select("checkname.checknameID, checkname.datetime, checkname.status");
                $this->db->from('checkname');
                $this->db->join('class', 'class.classID = checkname.classID');
                // $this->db->join('course', 'course.courseID = class.courseID');
                // $this->db->where('studentID', $studentID);
                // $this->db->where('studentID', $userID);
                // $this->db->where('classID', $classID);
                // $this->db->where('studentID', $studentID);
                
                $this->db->like('checkname.classID', $classID);
                $this->db->like('checkname.studentID', $studentID);
                $result = $this->db->get();
                return $result->result();
                // $this->db->select("activities_history.activity_history_id, activities.activity_name, activities_history.event_date");
                // $this->db->from($this->tbl_name);
                // $this->db->join('activities', 'activities_history.activity_id = activities.activity_id');
        
                // $this->db->like('activities.activity_name', $keyword);
                // $result = $this->db->get();
                // return $result->result();
    
            }

    }

    //     // function __construct()
// // {
// //     parent::__construct();
// //     $this->$tbl_name = "courses";
// // }

// function get_all(){

//     private $tbl_name = "courses";
// //     $this->$tbl_name = "courses";

//     $this->db->select("courses.courseID, courses.courseCode, courses.courseName, courses.lesson, courses.datatime , checkname.status, class.roomID, class.timeStudy, class.dateStudy");
//     // $this->db->select("courses.courseID, courses.courseCode, courses.courseName, courses.lesson");
//     $this->db->from($this->tbl_name);
//     $this->db->join('checkname', 'courses.courseID = checkname.courseID');
//     $this->db->join('class', 'courses.courseID = class.courseID');
//     $result = $this->db->get();
//     return $result->result();
// }
// // function create_model(){

// // }
?>