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

    //put your code here
}
