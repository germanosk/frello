<?php

Class User_model extends CI_Model
{

// Insert registration data in database
    public function insert_user($data)
    {
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
         else
        {
            return false;
        }
    }

// Read data using username and password
    public function login($data)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            return true;
        } else
        {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($email)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
        {
            return $query->result();
        } else
        {
            return false;
        }
    }

}

?>