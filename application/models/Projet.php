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
class Projet extends Utilisateur {

    //put your code here

    private $id;
    public $fk_id_utilisateur = array();
    public $createur;
    public $nom;
    public $ressources_3d;

    public function __construct($addr_mail = '', $password = '', $fk_id_utilisateur = '', $createur = '') {
        parent::__construct($addr_mail, $password);

        $this->fk_id_utilisateur = $fk_id_utilisateur;
        $this->createur = $createur;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getFk_id_utilisateur() {
        return $this->fk_id_utilisateur;
    }

    public function getCreateur() {
        return $this->createur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getRessources_3d() {
        return $this->ressources_3d;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFk_id_utilisateur($fk_id_utilisateur) {
        $this->fk_id_utilisateur = $fk_id_utilisateur;
    }

    public function setCreateur($createur) {
        $this->createur = $createur;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setRessources_3d($ressources_3d) {
        $this->ressources_3d = $ressources_3d;
    }



}
