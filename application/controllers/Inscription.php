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

        $this->load->model('Utilisateur');
    }

    public function create() {
        $this->load->view('inscription_view');
    }

    public function ajaxval() {
        $mail = $this->input->post('mail');
        echo $mail;
    }

    public function create_new() {
        
    }

    public function verification_mail() {
        $this->load->model('Utilisateur');
        $mail = $this->input->post('mail');
        $pass = '';

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
        $this->form_validation->set_rules('nom', 'nom');
        $this->form_validation->set_rules('prenom', 'prenom');

        $this->form_validation->set_rules('addr_mail', 'Email', 'required|valid_email');

        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|matches[password1]');


        if ($this->form_validation->run() == true) {
            $mail = $this->input->post('addr_mail');
            $pass = $this->input->post('password2');

            $new_user = new Utilisateur($mail, $pass);

            $new_user->setNom($this->input->post('nom'));
            $new_user->setPrenom($this->input->post('prenom'));
            $new_user->setTel($this->input->post('tel'));

            $new_user->set_new_utilisateur();

            redirect('inscription/create');
        } else {
            $this->load->library('session');
            $this->session->sess_destroy();
            redirect('connexion');
        }
    }

}
