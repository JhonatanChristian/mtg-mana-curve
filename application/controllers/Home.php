<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Localization_Model');
	}

	public function index()
	{
		/* Localization. */
		$this->Localization_Model->localization('header');
		$this->Localization_Model->localization('footer');
		$this->Localization_Model->localization('calculator_mana_curve');

		/* View. */
		$this->load->view('app/home');
	}

}
