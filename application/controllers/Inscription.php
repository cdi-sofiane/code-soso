<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inscription
 *
 * @author soso
 */
class Inscription extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create() {
//        $this->load->view('sidebare_view');
        $this->load->view('inscription_view');
    }

    public function ajaxval() {
        $mail = $this->input->post('mail');
        echo $mail;
    }

    public function create_new() {

        validation_formulair_inscription();

//    var_dump($_POST).die();
    }

    public function verification_mail() {
        $this->load->model('Utilisateur');
        $mail = $this->input->post('mail');
        $pass = '';
//        var_dump($mail).die();
        $user_verif = new Utilisateur($mail, $pass);
        $info = $user_verif->getAddrmail();
        if ($info == null) {
            $data['ind'] = 'green';
            echo json_encode($data['ind']);
        } else {
            $data['ind'] = 'red';
            echo json_encode($data['ind']);
        }
    }

    public function validation_formulair_inscription() {
//        var_dump($_POST).die();
        $this->form_validation->set_rules('nom', 'nom', 'required');
       $this->form_validation->set_rules('prenom', 'prenom', 'required');
     
        $this->form_validation->set_rules('addr_mail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|matches[password1]');
        
        
        if ($this->form_validation->run() == true) {
            redirect('inscription/create');
        } else {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            redirect('accueil');
        }
    }

    //put your code here
}
