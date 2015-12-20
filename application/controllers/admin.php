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
    
    public function ajouterLivre(){
        if($this->estAdmin()){                       
            $this->load->view('vmodifierlivre');	
        }
        else{
            redirect('Site/mondossier');
        }        		
	}
    
    public function insererLivre(){
        if($this->estAdmin()){                       
            $this->mindex->ajouterlivre($this->input->post('id'), $this->input->post('typeDoc'), $this->input->post('titre'),$this->input->post('auteur'),
            $this->input->post('annee'), $this->input->post('genre')); 
		
		redirect('admin/pageadmin');	
        }
        else{
            redirect('Site/mondossier');
        }        		
	}
    
    public function livreSupp($id){
        if($this->estAdmin()){
            $this->mindex->supprimerlivre(rawurldecode($id));            
            redirect('admin/pageadmin');
        }
        else{
            redirect('Site/mondossier');
        }        		
	}
    
    public function livreModif($id){
        if($this->estAdmin()){
            $param['resultat']=$this->mindex->lirelivre(rawurldecode($id));
            $this->load->view('vmodifierlivre',$param);	
        }
        else{
            redirect('Site/mondossier');
        }  
	}
    
    public function enregisterlivremodif(){
		$this->mindex->miseajourlivre($this->input->post('id'),$this->input->post('titre'),$this->input->post('auteur'),
		$this->input->post('annee'), $this->input->post('genre')); 
		
		redirect('admin/pageadmin');
	}
}
?>
