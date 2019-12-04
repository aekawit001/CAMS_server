<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class lecturers_model extends CI_Model{

        private $tbl_name = "lecturers";

        function get_all(){
            $result = $this->db->get($this->tbl_name);
            return $result->result();   //result คือ อาเรย์ of object
        }

        function getteachcoursesmodel($teaching){
            // $data['startdate'] = date('Y-m-d H:i:s');
            // $datestart = date('Y-m-d',time());

            $result = $this->db->from($this->tbl_name);
            $this->db->join('teaching', 'teaching.lecturerID = lecturers.lecturerID');
            $this->db->join('courses', 'courses.courseID = teaching.courseID');
            $this->db->join('class', 'class.courseID = courses.courseID');
            $this->db->join('room','room.roomID = class.roomID');
            $this->db->join('building','building.buildingID = room.buildingID');
            // $this->db->where($data);
            $this->db->where('teaching.teachingID', $teaching);
            
            $result = $this->db->get();
            return $result->result();
        }

        function getsearch_all($keyword){
            $this->db->like('firstName', $keyword);
            $result = $this->db->get($this->tbl_name);
            return $result->result();   //result คือ อาเรย์ of object
        }

        function insert($data){
            return $this->db->insert($this->tbl_name, $data);
        }

        function update($data){
            $this->db->where('lecturerID',$data['lecturerID']);
            $this->db->update($this->tbl_name,$data);
            $result = $this->db->get($this->tbl_name);
            return $result;
        }
        function historystudentabycoursesmodel($courseID){
            $this->db->from('teaching');
            $this->db->join('courses', 'courses.courseID = teaching.courseID');
            $this->db->join('class', 'class.courseID = courses.courseID');
            $this->db->join('checkname', 'class.classID = class.classID');
            $this->db->join('students', 'students.studentID = checkname.studentID');
            // $this->db->join('checkname', 'checkname.classID = class.classID');
            $this->db->where('class.courseID', $courseID);
            $result = $this->db->get();
            return $result->result();
        }

        /// เริ่ม
        function getlecturersbyCoursemodel($lecturerID){
            $this->db->from('lecturers');
            // $this->db->join('class', 'class.courseID = class.courseID');
            // $this->db->join('room', 'room.roomID = class.roomID');
            // $this->db->join('building', 'building.buildingID = room.buildingID');
            $this->db->join('teaching', 'teaching.lecturerID = lecturers.lecturerID');
            $this->db->join('courses', 'courses.courseID = teaching.courseID');
            $this->db->join('class', 'class.courseID = courses.courseID');
            $this->db->join('room','room.roomID = class.roomID');
            $this->db->join('building','building.buildingID = room.buildingID');

            $this->db->where('teaching.lecturerID', $lecturerID);

            $result = $this->db->get();
            return $result->result();
        }
    }
?>