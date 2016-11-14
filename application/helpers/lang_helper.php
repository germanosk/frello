<?php
function lang_load($lang_file)
{
    if($this->session->get_userdata('language'))
    {
        $this->lang->load($lang_file,$this->session->get_userdata('language'));
    }else
    {
        $this->lang->load($lang_file);
    }
}

