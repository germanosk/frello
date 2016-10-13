<?php 
 
class MY_Controller extends CI_Controller {
 
 	public function __construct()
       {
            parent::__construct();
			
			$is_open_session = $this->session->userdata("is_open_session");
			
			if ($is_open_session != 1) 
                        {
				redirect(base_url('login'));
                        }			
       }
}