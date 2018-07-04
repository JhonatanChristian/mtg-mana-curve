<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localization_Model extends CI_Model {

  public function localization( $messages_file )
	{
    if(!empty(get_cookie('lang'))){
      $idiom = get_cookie('lang');
    } else {
      $idiom = 'portuguese';
    }

		$this->lang->load($messages_file, $idiom);
	}

}
