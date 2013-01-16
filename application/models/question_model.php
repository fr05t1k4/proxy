<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Question_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create_question($topic, $id = NULL) {

        $data = array(
            'topic' => $topic,
            'date' => date('Y-m-d H:i:s', time()),
            'user_id' => $this->ion_auth->user()->row()->id
        );
        $this->db->insert('questions', $data);

        return $this->db->insert_id();
    }

    function create_message($message, $question_id, $our = 0) {

        $data = array(
            'message' => $message,
            'question_id' => $question_id,
            'date' => date('Y-m-d H:i:s', time()),
            'our' => ($this->ion_auth->is_admin()) ? 1 : 0
        );


        return ($this->db->insert('messages', $data)) ? TRUE : FALSE;
    }

    function get_question() {
        if ($this->ion_auth->is_admin())
            $topics = $this->db->order_by('closed')->order_by('id','DESC')->get_where('questions')->result();
        else {
            $user_id = $this->ion_auth->user()->row()->id;
            $topics = $this->db->order_by('id','DESC')->get_where('questions', array('user_id' => $user_id))->result();
        }

        return $topics;
    }

    function get_messages($qid) {

        $messages = $this->db->get_where('messages', array('question_id' => $qid))->result();
        return $messages;
    }

}