<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	public function recherche()
	{
		$this->load->view('vrecherche.php');
	}
	public function rechercheLivre()
	{
		$recherche = $this->input->post('recherche');
		$this->db->select('titre, auteur');
		$this->db->from('livre');
		$this->db->where(array('id' => '006.76 P5759h'));
		$resultat2 = $this->db->get(); 
		echo $resultat2->result_array();
		
	}
}