<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'file'));
        $this->load->model('Utilisateur');
        $this->load->library('session');
    }
	public function index()
	{
            $this->load->model('Utilisateur');
            $utilisateur = new Utilisateur();
            $util=$this->se_new_user($utilisateur);
            $utilisateur->get_utilisateur();
            
		$this->load->view('welcome_message',array($utilisateur,$util));
	}
        
        public function se_new_user(){
            
          $setUser =new Utilisateur();
          $setUser->set_name_utilisateur('jack', 'soso', '18@zaz', '$password','132548596','2');
        }
}
