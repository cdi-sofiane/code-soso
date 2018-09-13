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

    private $id;
    public $nom;
    public $prenom;
    public $addr_mail;
    public $password;
    public $tel;

    public function __construct($addr_mail = '', $password = '') {
        parent::__construct();

//       
        $this->addr_mail = $addr_mail;
        $this->password = $password;
    }

    public function getAddr_mail() {
        return $this->addr_mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setAddr_mail($addr_mail) {
        $this->addr_mail = $addr_mail;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function get_utilisateur() {
        $query = $this->db->query('select * from utilisateur where password ="' . $this->password . '"and addr_mail="' . $this->addr_mail . '"')->result();
        $this->session->set_userdata(array('is_logged'=>$query));
//        var_dump($_SESSION).die();
        if ($query) {
            return true;
        } else {
            return false;
        }


//       
    }

    public function set_name_utilisateur() {

//        var_dump($this);
        $this->db->insert('utilisateur', $this);
    }

    //put your code here
}
