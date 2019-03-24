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
class Dossier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file', 'login'));
        $this->load->library('session');
       $this->load->view('ressources_view');
    }

    public function projet_selectionner() {
<<<<<<< HEAD
        $url = $_SERVER['PHP_SELF'];
        $id_projet = explode('/', $url)[4];
         $this->load->model('Ressources');
         $data['fichier']=$this->Ressources->find_all_file_in_project($id_projet);
        
//        echo var_dump($folder);
//        exit;
        $this->load->view('ressources_view',$data);
    }

    public function associer() {
        $this->load->model('Ressources');
        $id_ressources = $this->input->post('idressources');
        $id_projet = $this->input->post('id');
        $data['cool'] = $this->Ressources->association_dossier_fichier($id_ressources, $id_projet);
=======
//        redirect('../dossier','refresh');
//        var_dump($_POST) . die();
>>>>>>> dev
    }

    //put your code here
}
