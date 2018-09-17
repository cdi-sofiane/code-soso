<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ressource
 *
 * @author soso
 */
class Ressource extends CI_Model {

    private $idressources;
    public $projet_id;
    public $nom;
    public $url;
    public $taille;
    public $format;
    public $ext;

    public function __construct($url = '', $ext = '') {
        parent::__construct($addr_mail, $password, $fk_id_utilisateur, $createur);

        $this->url = $url;
        $this->ext = $ext;
    }

    public function getIdressources() {
        return $this->idressources;
    }

    public function getProjet_id() {
        return $this->projet_id;
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

    public function setIdressources($idressources) {
        $this->idressources = $idressources;
    }

    public function setProjet_id($projet_id) {
        $this->projet_id = $projet_id;
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

}
