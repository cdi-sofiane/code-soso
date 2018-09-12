<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author Soso
 */
class Utilisateur extends CI_Model {
    
    public $id;
    public $nom='nom';
    public $prenom='prenom';
    public $addr_mail='addr_mail';
    public $password ='password';
    public $numero_telephone='tel';
    public $_fk_projet_id='id_projet';
    
    public function __construct() {
        parent::__construct();
        

        
        
    }
    
  

    public function get_utilisateur(){
        return $this->db->query('select * from utilisateur')->result();
         
//        print_r($query).die();
    }
    public  function set_name_utilisateur($nom, $prenom, $addr_mail, $password, $numero_telephone, $_fk_projet_id){
//       $set_user= self::$id;$password;$numero_telephone;$_fk_projet_id;
        
        $set_user= array($nom, $prenom, $addr_mail, $password, $numero_telephone, $_fk_projet_id);
        print_r($set_user).die();
        $this->db->insert('utilisateur',$set_user);
    }
    //put your code here
}
