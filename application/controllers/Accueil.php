<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accueil
 *
 * @author soso
 */
class Accueil extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file', 'login'));
        $this->load->library('session');
        $this->load->model('Projet');
    }

    public function bord() {
        $session = $this->session->is_logged;
//     $_SESSION['is_logged']).die();
        check_login($session);
        $data['is_logged'] = $this->session->is_logged[0];
        $data['projet'] = $this->load_projet();
//        var_dump($data);
        $this->load->view('accueil_view', $data);
    }

    public function load_projet() {
        $this->load->model('Projet');
        return $this->Projet->get_all_projet();
    }

    public function new_projet() {
        $this->load->model('Utilisateur');
        $utilisateur_id = $this->input->post('user_id');
        $createur = $this->input->post('createur');
        $nom_projet = $this->input->post('nom_projet');
        $projet = new Projet();

        $projet->setUtilisateur_id($utilisateur_id);
        $projet->setNom($nom_projet);
        $projet->setCreateur($createur);

        $projet->ajout_new_projet_par_createur();

        echo json_encode($projet->get_all_projet());
    }

    public function check_ressources() {
        $folder=$this->input->post('id_repertoir');
//        var_dump($folder).die();
        $response['redirect'] = base_url() . 'dossier/projet_selectionner/'.$folder.'';
        echo json_encode($response);
//        die;
//        var_dump($response).die();
//        redirect('dossier/projet_selectionner');
    }

}
