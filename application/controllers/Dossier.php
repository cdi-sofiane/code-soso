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
    }

    public function projet_selectionner() {

        echo var_dump($_POST);
        $this->load->view('ressources_view');
    }

}
