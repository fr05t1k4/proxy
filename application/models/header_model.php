<?php

class Header_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_unread_messages() {

        if ($this->ion_auth->is_admin()) {
            $result = $this->db->where(array(
                        'admin_read' => 0
                    ))->get('messages')->result();
        } else {
            $result = $this->db->from('messages')
                    ->where(array(
                        'messages.user_read' => 0,
                        'questions.user_id' => $this->ion_auth->user()->row()->id
                    ))
                    ->join('questions', 'questions.id = messages.question_id')
                    ->get('messages')
                    ->result();
        }
        
        return count($result);
    }
    
    

}
