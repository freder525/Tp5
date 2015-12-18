<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function pageadmin(){
		//Vérification en cas d'accès direct à l'adresse de la page
		if($this->estAdmin())
		{
			$param['resultat']=$this->mindex->readalltable('livre');	
			$this->load->view('vlivreGestion',$param);	
		}
		else
		{
			//Rediriger vers la page de login
			$data['chaine']="";
			$this->load->view('vlogin',$data);
		}
	}

	private function estAdmin(){
		if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'a')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
