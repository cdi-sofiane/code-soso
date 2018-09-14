

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('check_login')) {

    function check_login($session) {
        $CI = & get_instance();
        $CI->load->helper('url');
        if (!$session) {
            session_destroy();
            redirect('connexion');
        }
    }

}

    
    
  
    //put your code here

