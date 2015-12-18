<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	public function recherche()
	{
		$this->load->view('vrecherche.php');
	}
