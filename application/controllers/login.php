<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Localized_controller
{
    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->lang_load(array('form_view','button_view'));
        $this->load->view('v_login');
    }

    public function profile()
    {

        $result = $this->User_Database->read_user_information($this->session->userdata('email'));
        $data = array(
            'name' => $result[0]->name,
            'email' => $result[0]->email
        );
        lang_load(array('form_view','button_view'));
        $this->load->view('v_profile', $data);
    }

    public function back()
    {
        redirect(base_url());
    }

    public function authenticate()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password'))
        );
        $result = $this->User_Database->login($data);
        if ($result == TRUE)
        {
            $this->session->set_userdata("is_open_session", 1);
            $this->session->set_userdata("email", $this->input->post('email'));
            redirect(base_url('panel'));
        } else
        {
            $data['erro'] = 'User / Password incorrect';
            $this->load->view('v_login', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("is_open_session");
        redirect(base_url());
    }

}
