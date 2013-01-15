<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Question_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create_question($topic, $id = NULL) {

        if (!$this->ion_auth->logged_in())
            redirect('error');

        $data = array(
            'topic' => $topic,
            'date' => date('Y-m-d H:i:s', time()),
            'user_id' => $this->ion_auth->user()->row()->id
        );
        $this->db->insert('questions', $data);

        return $this->db->insert_id();
    }

    function create_message($message, $id, $our = 0) {

        if (!$this->ion_auth->logged_in())
            redirect('error');
        
        $data = array(
            'message' => $message,
            'question_id' => $id,
            'date' => date('Y-m-d H:i:s', time()),
            'our' => $our
        );


        return ($this->db->insert('messages', $data)) ? TRUE : FALSE;
    }
    
    function get_question(){
        
        $user_id = $this->ion_auth->user()->row()->id;
        $topics =$this->db->get_where('questions', array('user_id'=> $user_id))->result();
       
        return $topics;
    }

}

?>
