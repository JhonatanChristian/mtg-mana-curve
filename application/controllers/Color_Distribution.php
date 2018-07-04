<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color_Distribution extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Localization_Model');
	}

	public function index()
	{
		/* Localization. */
		$this->Localization_Model->localization('header');
		$this->Localization_Model->localization('footer');
		$this->Localization_Model->localization('color_distribution');

		/* View. */
		$this->load->view('app/color-distribution');
	}

}
