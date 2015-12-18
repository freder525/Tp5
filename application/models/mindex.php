<?php
class Mindex extends CI_Model {
	public function readalltable($table)
	{
		$rs=$this->db->get($table);
		return $rs->result_array();
		
		//retourne un tableau indic? dont chaque case contient un tableau
		// associatif correspondant ? une ligne de $rs
		// Ce tableau sera r?cup?r? dans le controller
		
	}
	public function ajouterlivre($id, $titre, $auteur, $annee, $genre, $etat)
	{					
		$data = array(
			'id'=>$id,
			'titre'=>$titre,
			'auteur'=>$auteur,
			'annee'=>$annee,
			'genre'=>$genre,
			'etat'=>$etat
		);
		$this->db->insert('livre', $data);
	}
	public function supprimerlivre($table, $id){
		$this->db->delete($table, array('id' => $id)); 
	}
	public function supprimercommentaire($id){
		$this->db->delete('billets', array('id' => $id)); 
	}
	
	public function ajouterutilisateur($name, $email, $tel, $adresse, $ville, $cp, $pseudo, $pass)
	{					
		$data = array(
			'nom'=>$name,
			'adresse'=>$adresse,	
			'ville'=>$ville,
			'cp'=>$cp,
			'telephone'=>$tel,
			'courriel'=>$email,
			'pseudo'=>$pseudo,
			'motdepasse'=>$pass,
			'type'=>'u'
		);
		$this->db->insert('lecteur', $data);
		
		$data = array(
			'contenu'=>$commentaire,
			'id_ami'=>$pseudo
		);
		$this->db->insert('billets',$data);
	}
	public function modifierutilisateur($idUsager, $donneesUsager)
	{
		$this->db->where('id', $idUsager);
		$this->db->update('lecteur', $donneesUsager);
	}
	public function modifiermotpasseutilisteur($idUsager, $motDePasse)
	{
		$this->db->where('id', $idUsager);
		$this->db->update('lecteur', array('motdepasse' => $motDePasse));
	}
	public function authentifutilisateur($login, $pass){ 
		$this->db->select('id, pseudo, type');
		$this->db->from('lecteur');
		$this->db->where(array('pseudo' => $login, 'motdepasse'=>$pass));
		$query = $this->db->get(); 
		return $query->row_array(0);
		
	}
	public function infosprofilutilisateur($idUsager)
	{
		$this->db->select('nom, adresse, ville, cp, telephone, courriel, pseudo');
		$this->db->from('lecteur');
		$this->db->where(array('id' => $idUsager));
		$requeteProfil = $this->db->get();
		return $requeteProfil->row_array(0);
	}
	public function livresempruntes($id){
		$this->db->select('titre, auteur, id_emprunt');
		$this->db->from('livre');
		$this->db->where(array('id_emprunt' => $id));
		$resultat1 = $this->db->get(); 
		return $resultat1->result_array();
		
	}
	public function livresreserves($id){
		$this->db->select('titre, auteur, id_emprunt');
		$this->db->from('livre');
		$this->db->where(array('id_reserve' => $id));
		$resultat2 = $this->db->get(); 
		return $resultat2->result_array();
		
	}
	public function lirelivre($id){
		$query = $this->db->get_where('livre', array('id' => rawurldecode($id))); 
		return $query->result_array();
	}
	public function miseajourlivre($id, $titre, $auteur, $annee, $genre){
		$data = array(
               'titre' => $titre,
               'auteur' => $auteur,
					'annee' => $annee,
               'genre' => $genre
            );

		$this->db->where('id', $id);
		$this->db->update('livre', $data); 
	}
	public function pseudoEstPris($pseudo)
	{
		$requetePEstPris = $this->db->get_where('lecteur', array('pseudo' => $pseudo));
		if($requetePEstPris->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function estConnecte()
	{
		return isset($_SESSION['user']) ? true : false;
	}
}
?>