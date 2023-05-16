<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;


class Test extends RestController {

	
	public function index_get()
	{
        echo APPPATH;
		//$this->load->view('welcome_message');
	}
}
