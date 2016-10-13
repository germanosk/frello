<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sign_up extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('sign_up');
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

    public function user_registration_show()
    {
        $this->load->view('v_registration');
    }

    public function new_user_registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[pass_ver]');
        $this->form_validation->set_rules('pass_ver', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('v_registration');
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
                $this->load->view('v_registration', $data);
            } else
            {
                $data['message_display'] = 'This account already exist!';
                $this->load->view('v_registration', $data);
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
