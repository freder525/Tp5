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
				$this->input->post('pseudo'), $this->input->post('pass')); 
			}
		}

		$this->load->view('vinscription');
	}

	public function recherche()
	{

		$this->load->view('vrecherche');
	}
	public function horaire()
	{
	$this->load->view('vhoraire');
	}

	public function pseudoValide($pseudo)
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
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$leLivre = $this->mindex->lirelivre($this->input->post('isbn'));

				if($leLivre['nbr_renouvelements'] == 3)
				{
					$param['erreur'] = 'Vous avez atteint le nombre maximal de renouvelements (3)';
				}
				else if($leLivre['id_reserve'] != 0)
				{
					$param['erreur'] = "L'article est réservé par une autre personne, vous ne pouvez le renouveler";
				}
				else
				{
					$this->mindex->renouveleremprunt($this->input->post('isbn'), $_SESSION['user']['id'], $leLivre['nbr_renouvelements']);
					$param['reussite'] = "L'article a bien été renouvelé. Il vous reste ".(2 - $leLivre['nbr_renouvelements']).' renouvelement(s)';
				}	
			}
			else
			{

			}
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
			//Récupérer les informations de l'usager
			$donneesSessUsager = $this->mindex->infosprofilutilisateur($_SESSION['user']['id']);

			$param = array('nom' => $donneesSessUsager['nom'],
						   'adresse' => $donneesSessUsager['adresse'],
						   'ville' => $donneesSessUsager['ville'],
						   'cp' => $donneesSessUsager['cp'],
						   'telephone' => $donneesSessUsager['telephone'],
						   'courriel' => $donneesSessUsager['courriel'],
						   'pseudo' => $donneesSessUsager['pseudo']);

			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				//Création des règles de validation selon le formulaire utilisé
				$estModifInfos = false;
				$estModifMotDePasse = false;
				//Formulaire modification de profil
				if($estModifInfos = $this->input->post('nom') != null)
				{
					$this->form_validation->set_rules('nom','Nom','required');
					$this->form_validation->set_rules('adresse','Adresse','required');
				}

				//Formulaire de modification de mot de passe
				if($estModifMotDePasse = $this->input->post('nouveau_pass')  != null)
				{
					$this->form_validation->set_rules('ancien_pass','Ancien mot de passe','required');
					$this->form_validation->set_rules('nouveau_pass','Nouveau mot de passe','required');
				}

				if ($this->form_validation->run())
				{
					if($estModifInfos)
					{
						//Modifier les informations de l'usager
						$donneesPostUsager = array('nom' => $this->input->post('nom'),
									   		 	   'adresse' => $this->input->post('adresse'),
									   		 	   'ville' => $this->input->post('ville'),
										 	 	   'cp' => $this->input->post('cp'),
											 	   'telephone' => $this->input->post('telephone'),
										     	   'courriel' => $this->input->post('courriel'));
						$this->mindex->modifierutilisateur($_SESSION['user']['id'], $donneesPostUsager);

						//Redondant pour plus de clartée
						$param = $donneesPostUsager;
						$param['pseudo'] = $_SESSION['user']['pseudo'];
						$param['reussite'] = 'Votre profil a bien été modifié';
					}

					if($estModifMotDePasse)
					{
						//Modifier le mot de passe si l'ancien est valide
						if($this->mindex->authentifutilisateur($_SESSION['user']['pseudo'], $this->input->post('ancien_pass')) != NULL)
						{
							$this->mindex->modifiermotpasseutilisteur($_SESSION['user']['id'], $this->input->post('nouveau_pass'));
							$param['reussite'] = 'Votre mot de passe a bien été modifié';
						}
						else
						{
							$param['erreur'] = 'Votre mot de passe actuel entré n\'est pas valide';
						}
					}
				}
				else
				{
					$param['erreur'] = 'Les champs avec une astérisque (*) sont tous obligatoires, veuillez les remplir S.V.P.';
				}

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
	public function rechercheLivre()
	{
		$recherche = $this->input->post('recherche');
		$this->db->from('livre');
		$this->db->like(array('titre' => $recherche));
		$rs=$this->db->get();
		
		echo json_encode($rs->result_array());
	}
	public function details_article($isbn)
	{
		$isbnConverti = str_replace("-", " ", $isbn);

		$infosLivre = $this->mindex->lirelivre($isbnConverti);
		if($infosLivre != NULL)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user']))
			{
				//Note : la validation es déjà effectuée à savoir si l'article peut être emprunté ou réservé
				if(isset($_POST['Emprunter']))
				{
					if($this->mindex->calculersoldeusager($_SESSION['user']['id']) < 5.00)
					{
						if($this->mindex->nbrempruntsusager($_SESSION['user']['id']) < 5)
						{
							//Les vérifications sont faites, effectuer l'emprunt
							$this->mindex->enregistreremprunt($isbnConverti, $_SESSION['user']['id']);
							$infosLivre['id_emprunt'] = $_SESSION['user']['id'];
							$infosLivre['reussite'] = "L'emprunt a bien été effectuée";
						}
						else
						{
							$infosLivre['erreur'] = "Vous avez déjà atteint le nombre maximal d'emprunts (5)";
						}	
					}
					else
					{
						$infosLivre['erreur'] = "Votre solde est trop élevé pour effectuer un emprunt";
					}
				}
				else if(isset($_POST['Réserver']))
				{
					if($this->mindex->calculersoldeusager($_SESSION['user']['id']) < 5.00)
					{
						if($this->mindex->nbrreservationsusager($_SESSION['user']['id']) < 3)
						{
							//Les vérifications sont faites, effectuer l'emprunt
							$this->mindex->enregistrerreservation($isbnConverti, $_SESSION['user']['id']);
							$infosLivre['id_reserve'] = $_SESSION['user']['id'];
							$infosLivre['reussite'] = "La réservation a bien été effectuée";
						}
						else
						{
							$infosLivre['erreur'] = "Vous avez déjà atteint le nombre maximal de réservations (3)";
						}	
					}
					else
					{
						$infosLivre['erreur'] = "Votre solde est trop élevé pour effectuer une réservation";
					}
				}

				$this->load->view('vdetails_article', $infosLivre);
			}
			else
			{
				$this->load->view('vdetails_article', $infosLivre);
			}
		}
		else
		{
			show_404();
		}
	}
	
	public function suppCommentaire($id){
	$this->mindex->supprimercommentaire($id);
	redirect('site/amiconnecte');		
	}
	
	
    
	public function deconnexion(){
		session_start();
		$_SESSION=array();
		session_destroy();
		redirect('site/index');
	}
}
?>
