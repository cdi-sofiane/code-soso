<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accueil
 *
 * @author soso
 */
class Accueil extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
         $this->load->helper(array('form', 'url', 'file','login'));
        $this->load->library('session');
        
      
    }
    
     
    public function bord(){
       $session= $this->session->is_logged;
//     $_SESSION['is_logged']).die();
        check_login($session);
        
        $this->load->view('accueil_view');
        
    }
    
}
