

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('check_login')) {

    function check_login() {
        $CI = & get_instance();
        $CI->load->helper('url');
        if (!$CI->session->userdata('is_logged')) {
            redirect('connexion');
        }
    }

}

    
    
  
    //put your code here

