<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

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
	public function index()
	{
		$this->load->view('biblio_Moncalm');
	}
	public function inscription()
	{
		$this->load->view('vinscription');
	}
		public function horaire()
	{
		$this->load->view('vhoraire');
	}
		public function activites()
	{
		$this->load->view('vactivites');
	}
		public function login()
	{
		$data['chaine']="";
		$this->load->view('vlogin',$data);
	}
		public function nous_joindre()
	{
		$this->load->view('vnous_joindre');
	}
	public function accessibilite()
	{
		$this->load->view('vaccessibilite');
	}
		public function loginamis()
	{
		$data['chaine']="";
		$this->load->view('vloginamis',$data);
	}
	public function pageutilisateur(){
		$this->form_validation->set_rules('login','Nom d\'utilisateur','trim|required');
		$this->form_validation->set_rules('pass','Mot de passe','trim|required');
		if ($this->form_validation->run())
		{
			$login=$this->input->post('login');
			$pass=$this->input->post('pass');
 
			$rs=$this->mindex->authentifutilisateur($login, $pass);
 
			if (count($rs)==0){
				$data['chaine']="Mot de passe ou nom d'utilisateur incorrect";
			$this->load->view('vlogin', $data);
			}
			else{
			$resultat1=$this->mindex->livresempruntes($login);
			$resultat2=$this->mindex->livresreserves($login);
			$param=array(
				'usertype'=>$rs[0]['type'],
				'empruntes'=>$resultat1,
				'reserves'=>$resultat2,
				);
			$this->load->view('vpageutilisateur', $param);
			}
		}
		else 
		{
		$data['chaine']="";	
		$this->load->view('vlogin', $data);
		}
	}
		public function amiconnecte(){
		$this->form_validation->set_rules('login','Nom d\'utilisateur','trim|required');
		$this->form_validation->set_rules('pass','Mot de passe','trim|required');
		if ($this->form_validation->run())
		{
			 $login=$this->input->post('login');
			$pass=$this->input->post('pass');
 
			$rs=$this->mindex->authentifami($login, $pass);
			if (count($rs)==0){
				$data['chaine']="Mot de passe ou nom d'utilisateur incorrect";
			$this->load->view('vloginamis', $data);
			}
			else{
			$resultat=$this->mindex->readalltable('billets');
			$param=array(
				'login'=>$login,
				'commentaires'=>$resultat,
				);
			$this->load->view('vamiconnecte', $param);
			}
		}
		else 
		{
			$data['chaine']="";
			$this->load->view('vloginamis', $data);
		}
	}
	public function inscriptionamis()
	{
		$this->mindex->ajouterami($this->input->post('name'),$this->input->post('email'),$this->input->post('tel'),
		$this->input->post('adresse'), $this->input->post('ville'), $this->input->post('cp'), 
		$this->input->post('pseudo'), $this->input->post('pass'), $this->input->post('commentaire')); 
		
		redirect('site/inscription');
	}
	public function pageadmin(){
	$param['resultat']=$this->mindex->readalltable('livre');	
	$this->load->view('vlivreGestion',$param);	
	}
	public function livreSupp($id){
	$this->mindex->supprimerlivre('livre',$id);
	redirect('site/pageadmin');		
	}
	public function suppCommentaire($id){
	$this->mindex->supprimercommentaire($id);
	redirect('site/amiconnecte');		
	}
	public function livreModif($id){
	$param['resultat']=$this->mindex->lirelivre($id);
	$this->load->view('vmodifierlivre',$param);		
	}
	public function enregisterlivremodif(){
		$this->mindex->miseajourlivre($this->input->post('id'),$this->input->post('titre'),$this->input->post('auteur'),
		$this->input->post('annee'), $this->input->post('genre')); 
		
		redirect('site/pageadmin');
	}
	public function deconnexion(){
		session_start();
		$_SESSION=array();
		session_destroy();
		redirect('site/index');
	}
}
?>
