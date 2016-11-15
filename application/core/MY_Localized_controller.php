<?php

class MY_Localized_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function lang_load($lang_file)
    {
        
        if ($this->session->language)
        {
            $this->lang->load($lang_file, $this->session->language);
        } else
        {
            $this->lang->load($lang_file);
        }
    }

}
