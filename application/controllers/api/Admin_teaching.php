<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin_teaching extends BD_Controller{
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin_teaching_model');
            
        }


       
    }