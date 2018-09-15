<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projet
 *
 * @author Sekio
 */
class Projet extends Utilisateur{
    //put your code here
    
    private $id;
    public $fk_id_utilisateur = array();
    public $createur;
    public $nom;
    public $ressources_3d;
    
    
    public function __construct($addr_mail = '', $password = '',$fk_id_utilisateur='',$createur='') {
        parent::__construct($addr_mail, $password);
        
        
    }
}
