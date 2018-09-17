<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projet
 *
 * @author soso
 */
class Projet extends CI_Model {

    //put your code here

    private $id;
    public $utilisateur_id = array();
    public $createur;
    public $nom;
    public $ressources;

    public function __construct($addr_mail = '', $password = '', $utilisateur_id = '', $createur = '') {
        parent::__construct($addr_mail, $password);

        $this->utilisateur_id = $utilisateur_id;
        $this->createur = $createur;
    }

    public function getId() {
        return $this->id;
    }


    public function getCreateur() {
        return $this->createur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getRessources() {
        return $this->ressources;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getUtilisateur_id() {
        return $this->utilisateur_id;
    }

    public function setUtilisateur_id($utilisateur_id) {
        $this->utilisateur_id = $utilisateur_id;
    }

     

    public function setCreateur($createur) {
        $this->createur = $createur;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
 
        public function setRessources($ressources) {
        $this->ressources = $ressources;
    }

    public function ajout_new_projet_par_createur() {
//        
        $this->db->insert('projet',$this);
        
         
    }
    
    public function get_all_projet(){
        $query=$this->db->select('*')->from('projet')->get()->result();
        return $query;
//        var_dump($query).die();
    }

}
