<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accueil
 *
 * @author Sekio
 */
class Accueil extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
         $this->load->helper(array('form', 'url', 'file','login'));
        $this->load->library('session');
        
      
    }
    
     
    public function bord(){
        check_login();
       
        
        
    }
    
}
