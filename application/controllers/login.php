<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function new_user_registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[pass_ver]');
        $this->form_validation->set_rules('pass_ver', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('signup');
        } else
        {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => sha1($this->input->post('pass'))
            );
            $result = $this->User_Database->registration_insert($data);
            if ($result == TRUE)
            {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('signup', $data);
            } else
            {
                $data['message_display'] = 'This account already exist!';
                $this->load->view('signup', $data);
            }
        }
    }

    public function profile()
    {

        $result = $this->User_Database->read_user_information($this->session->userdata('email'));
        $data = array(
            'name' => $result[0]->name,
            'email' => $result[0]->email
        );
        $this->load->view('v_profile', $data);
    }

    public function back()
    {

        redirect(base_url());
    }

    public function logout()
    {
        $this->session->unset_userdata("is_open_session");
        redirect(base_url());
    }

}
