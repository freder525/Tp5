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
		//TODO : Ajouter tous les champs à valider côté PHP
		$this->form_validation->set_rules('pseudo','Pseudo','required|callback_pseudoValide');
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if ($this->form_validation->run())
			{
				$this->mindex->ajouterutilisateur($this->input->post('name'),$this->input->post('email'),$this->input->post('tel'),
				$this->input->post('adresse'), $this->input->post('ville'), $this->input->post('cp'), 
				$this->input->post('pseudo'), $this->input->post('pass'), $this->input->post('commentaire')); 
			}
		}

		$this->load->view('vinscription');
	}
<<<<<<< HEAD
	public function recherche()
	{
		$this->load->view('vrecherche');
	}
		public function horaire()
=======
	function pseudoValide($pseudo)
	{
		//Vérifie en asynchrone si le pseudo est pris
		if($this->mindex->pseudoEstPris($pseudo))
		{
			$this->form_validation->set_message('pseudoValide', 'Le pseudo est déjà pris.');
			return false;
		}
		else
		{
			return true;
		}
	}
	public function horaire()
>>>>>>> origin/master
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
	public function mondossier()
	{
		if($this->mindex->estConnecte())
		{
			$resultat1=$this->mindex->livresempruntes($_SESSION['user']['id']);
			$resultat2=$this->mindex->livresreserves($_SESSION['user']['id']);
			$param=array(
				'usertype'=>$_SESSION['user']['type'],
				'empruntes'=>$resultat1,
				'reserves'=>$resultat2,
				);
			$this->load->view('vpageutilisateur', $param);
		}
		else
		{
			$this->login();
		}
		
	}
	public function profil()
	{
		if($this->mindex->estConnecte())
		{
			if ($this->form_validation->run())
			{

			}
			else
			{
				//Récupérer les informations de l'usager
				$donneesUsager = $this->mindex->infosprofilutilisateur($_SESSION['user']['id']);
				$param = array('nom' => $donneesUsager['nom'],
							   'adresse' => $donneesUsager['adresse'],
							   'ville' => $donneesUsager['ville'],
							   'cp' => $donneesUsager['cp'],
							   'telephone' => $donneesUsager['telephone'],
							   'courriel' => $donneesUsager['courriel'],
							   'pseudo' => $donneesUsager['pseudo'],
							   'commentaire' => $donneesUsager['commentaire']);
			}

			$this->load->view('vprofil', $param);
		}
		else
		{
			$this->login();
		}
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
				//Ajouter l'usager à la session
				$this->session->set_userdata('user', $rs);

				$resultat1=$this->mindex->livresempruntes($rs['id']);
				$resultat2=$this->mindex->livresreserves($rs['id']);
				$param=array(
					'usertype'=>$rs['type'],
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
