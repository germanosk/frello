<?php 
if ( ! class_exists('MY_Localized_controller'))
{
    require_once APPPATH.'core/MY_Localized_controller.php';
}

class MY_Controller extends MY_Localized_controller {
 
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