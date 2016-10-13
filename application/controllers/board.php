<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends MY_Controller {

	public function index()
	{
		$this->load->view('all_boards');
	}
}
