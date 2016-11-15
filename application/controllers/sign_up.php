<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sign_up extends MY_Localized_controller
{
    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->new_user();
    }

    private function new_user()
    {
        $this->lang_load('form_validation');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required',
                        array('required'=>$this->lang->line('error_name_required',FALSE)));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.email]',
                        array('required' => $this->lang->line('error_email_required',FALSE),
                            'is_unique' => $this->lang->line('error_email_is_unique',FALSE)));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]',
                        array('required' => $this->lang->line('error_password_required',FALSE),
                            'matches' => $this->lang->line('error_password_matches',FALSE))
                );
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->lang_load(array('form_view','button_view'));
            $this->load->view('v_sign_up');
        } else
        {
            $this->save_user();
        }
    }

    private function save_user()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => hash("sha512",$this->input->post('password'))
        );
        $result = $this->user_model->insert_user($data);
        if ($result == TRUE)
        {
            $data['message_display'] = 'Registration Successfully !';
        } else
        {
            $data['message_display'] = 'This account already exist!';
        }
        
        $this->lang_load(array('form_view','button_view'));
        $this->load->view('v_sign_up', $data);
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
