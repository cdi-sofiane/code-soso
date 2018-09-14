<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library('form_validation');
        $this->load->model('Utilisateur');
        $this->load->view('header_view');
        $this->load->view('connexion_view');
        $this->load->library('session');
    }

    public function index() {
        
    }

    public function login() {

        $addr_mail = $_POST['email'];
        $password = $_POST['password'];

//            var_dump($addr_mail).die();
        $utilisateur = new Utilisateur($addr_mail, $password);
        if ($utilisateur->get_utilisateur() == true) {
//            check_login();

            redirect('accueil/bord');
        } else {

            redirect('/connexion');
        }
    }

    public function inscription() {
        redirect('inscription/create');
    }

    public function se_new_user() {

        $setUser = new Utilisateur('azer@aze', 'pass');
        $setUser->setNom('$nom');
        $setUser->setPrenom('$prenom');
        $setUser->setTel('0651311311');
        $setUser->set_name_utilisateur();
    }

}
