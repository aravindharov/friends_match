<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Login_model extends CI_Model
{
    public function insertSignupDetail($user_data, $reset_data)
    {
        $this->db->trans_begin();
        
        $this->db->insert('user', $user_data);
        $lastid = $this->db->insert_id();

        $reset_data['resUserId']=$lastid;
        $this->db->insert('reset', $reset_data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return returnResponse(0, 'Please try again');
        } else {
            $this->db->trans_commit();
            return returnResponse(1, 'Account Created Successfully');
        }
    }
    
}