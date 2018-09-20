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
        $this->load->model('Ressources');
    }

    public function bord() {
        $session = $this->session->is_logged;
        check_login($session);
        $this->load->model('Ressources');
        $data['is_logged'] = $this->session->is_logged[0];
        $data['projet'] = $this->load_projet();
//       
        $ressources = new Ressources();
        $data['file'] = $ressources->get_ressources();
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

        $folder = $this->input->post('id_repertoir');

//        
//        $this->load->view(base_url() .'dossier/projet_selectionner',$folder);
        $response['redirect'] = base_url() . 'dossier/projet_selectionner/' . $folder . '';
        echo json_encode($response);
    }

    public function upload() {
        $this->load->library('upload');
        $fileName = $_FILES["file_name"]["name"];
        $fileName = str_replace('_', '', $fileName);
        $ext = explode('.', $fileName);


        $fileTmpLoc = $_FILES["file_name"]["tmp_name"];
        $fileType = $_FILES["file_name"]["type"]; //
        $fileSize = $_FILES["file_name"]["size"];
        $fileErrorMsg = $_FILES["file_name"]["error"];
        $target_path = './upload/ressources/' . basename($fileName);
        $target_file_path = './upload/ressources/';
//		var_dump($fileName).die();
//        
//        $data['message'] = $this->session->set_flashdata('message', "Le fichier [" . $fileName . "] a été enregistré avec succès !");
        $ressources = new Ressources($target_file_path, $ext[1]);

        $ressources->setNom($fileName);
        $ressources->setTaille($fileSize);
        if ($ressources->file_exist()) {
            $moveResult = move_uploaded_file($fileTmpLoc, $target_path);
            $data['file'] = get_dir_file_info('./upload/ressources/', 'name');
            if ($fileName !== "") {
                $ressources->upload_file();
                redirect('accueil/bord');
            } else {
                redirect('accueil/bord');
            }
        } else {
            redirect('accueil/bord');
        }
    }

}
