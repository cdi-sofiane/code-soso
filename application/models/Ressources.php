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
class Ressources extends CI_Model {

    private $idressources;
    public $projet_id;
    public $nom;
    public $url;
    public $taille;
    public $format;
    public $ext;

    public function __construct($url = '', $ext = '') {
        parent::__construct($addr_mail = '', $password = '', $fk_id_utilisateur = '', $createur = '');

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
    
    public function upload_file() {
//        var_dump($this).die();
        $this->db->insert('Ressources',$this);
    }
     public function file_exist(){
        $query=$this->db->select('*')->from('ressources')->where('nom',$this->getNom())->get()->result();
        return $query !=null ? false : true;
        
    }
    public function get_ressources() {
         $query=$this->db->select('*')->from('ressources')->get()->result();
         return $query;
    }
    
    public function association_dossier_fichier($id_ressources,$id_projet){
        $this->db->insert('ressources_has_projet',array('ressources_idressources'=>$id_ressources,'projet_id'=>$id_projet));
        echo var_dump($id_ressources).die();
    }
    
    public function find_all_file_in_project($id_projet) {
//        var_dump($id_projet).die();
      $query=$this->db->query("select * from ressources where idressources in(select ressources_idressources from ressources_has_projet where projet_id=$id_projet)")->result();
      return $query;
        
    }
}
