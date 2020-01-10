<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin_showuser_model extends CI_Model{

        private $tbl_name = "lecturers";

       
        function showusername_teacher_model(){
            $this->db->select('lecturerID, prefix, firstName, lastName, email, phoneNumber');
            $result = $this->db->get($this->tbl_name);
            return $result->result();
        }

       // delete_lecturerid
       function delete_lecturer($lecturerID){    
            $this->db->where('lecturerID', $lecturerID); 
            return $this->db->delete($this->tbl_name);  
        }

        function getBeforelecturerID_model($lecturerID){
            // $this->db->select('teaching.teachingID, teaching.courseID, teaching.lecturerID, courses.courseCode, courses.courseName');
            $this->db->where('lecturerID', $lecturerID);
            // $this->db->join('courses', 'courses.courseID = teaching.courseID');
            $result = $this->db->get($this->tbl_name);
            return $result->result();
        }

        function post_updatelecturer($data){
            $this->db->where('lecturerID',$data['lecturerID']);
            $this->db->update($this->tbl_name,$data);
            $result = $this->db->get($this->tbl_name);
            return $result;
        }


        //student
        function showusername_student_model(){
            $this->db->select('studentID, prefix, firstName, lastName, email, phone');
            $result = $this->db->get('students');
            return $result->result();
        }

        // delete_lecturerid
        function delete_student($studentID){    
            $this->db->where('studentID', $studentID); 
            return $this->db->delete('students');  
        }
        // getupdate
        function getBeforestudentID_model($studentID){
            $this->db->where('studentID', $studentID);
            $result = $this->db->get('students');
            return $result->result();
        }
        //update
        function post_updatestudent($data){
            $this->db->where('studentID',$data['studentID']);
            $this->db->update('students',$data);
            $result = $this->db->get('students');
            return $result;
        }

       
    }
?>