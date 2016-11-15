<?php
class Language extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function choose($lang, $url)
    {
        if(!$lang)
        {
            $config =& get_config();
            $lang = empty($config['language']) ? 'english' : $config['language'];
        }
        $this->session->language = $lang;
        redirect(base_url($url));
    }

}