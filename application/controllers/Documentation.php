<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentation extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Localization_Model');
	}

	public function how_it_works()
	{
		/* Localization. */
		$this->Localization_Model->localization('header');
		$this->Localization_Model->localization('footer');
		$this->Localization_Model->localization('how_it_works');

		/* View. */
		$this->load->view('app/how-it-works');
	}

}
