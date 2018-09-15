<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ressource
 *
 * @author Sekio
 */
class Ressource extends Projet {

    private $id;
    public $fk_id_projet;
    public $nom;
    public $url;
    public $taille;
    public $format;
    public $ext;

    public function __construct($addr_mail = '', $password = '', $fk_id_utilisateur = '', $createur = '',$url='',$ext='') {
        parent::__construct($addr_mail, $password, $fk_id_utilisateur, $createur);
        
        $this->url=$url;
        $this->ext=$ext;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getFk_id_projet() {
        return $this->fk_id_projet;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTaille() {
        return $this->taille;
    }

    public function getFormat() {
        return $this->format;
    }

    public function getExt() {
        return $this->ext;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFk_id_projet($fk_id_projet) {
        $this->fk_id_projet = $fk_id_projet;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setTaille($taille) {
        $this->taille = $taille;
    }

    public function setFormat($format) {
        $this->format = $format;
    }

    public function setExt($ext) {
        $this->ext = $ext;
    }

        //put your code here
}
