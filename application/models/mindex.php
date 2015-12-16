<?php
class Mindex extends CI_Model {
	public function readalltable($table)
	{
		$rs=$this->db->get($table);
		return $rs->result_array();
		
		//retourne un tableau indicé dont chaque case contient un tableau
		// associatif correspondant à une ligne de $rs
		// Ce tableau sera récupéré dans le controller
		
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
	
	public function ajouterami($name, $email, $tel, $adresse, $ville, $cp, $pseudo, $pass, $commentaire)
	{					
		$data = array(
			'nom'=>$name,
			'courriel'=>$email,
			'telephone'=>$tel,
			'adresse'=>$adresse,
			'ville'=>$ville,
			'cp'=>$cp,
			'id'=>$pseudo,
			'motdepasse'=>$pass
		);
		$this->db->insert('amis', $data);
		
		$data = array(
			'contenu'=>$commentaire,
			'id_ami'=>$pseudo
		);
		$this->db->insert('billets',$data);
	}
	public function authentifutilisateur($login, $pass){ 
		$this->db->select('id, type');
		$this->db->from('lecteur');
		$this->db->where(array('id' => $login, 'motdepasse'=>$pass));
		$query = $this->db->get(); 
		return $query->result_array();
		
	}
		public function authentifami($login, $pass){ 
		$this->db->select('id');
		$this->db->from('amis');
		$this->db->where(array('id' => $login, 'motdepasse'=>$pass));
		$query = $this->db->get(); 
		return $query->result_array();
		
	}
	public function livresempruntes($login){
		$this->db->select('titre, auteur, id_emprunt');
		$this->db->from('livre');
		$this->db->where(array('id_emprunt' => $login));
		$resultat1 = $this->db->get(); 
		return $resultat1->result_array();
		
	}
	public function livresreserves($login){
		$this->db->select('titre, auteur, id_emprunt');
		$this->db->from('livre');
		$this->db->where(array('id_reserve' => $login));
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
}
?>