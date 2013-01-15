<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('question_model');
        if (!$this->ion_auth->logged_in())
            redirect('error');
    }

    function ask_question() {


        if ($this->input->post()) {
            $this->form_validation->set_rules('topic', 'Тема', 'trim|stip_tags|xss_clean|required|max_length[255]');
            $this->form_validation->set_rules('message', 'Сообщение', 'trim|stip_tags|xss_clean|required');

            if ($this->form_validation->run() !== FALSE) {
                $topic = $this->input->post('topic');
                $message = $this->input->post('message');

                $question_id = $this->question_model->create_question($topic);

                if ($this->question_model->create_message($message, $question_id)) {
                    $this->session->set_flashdata('msg', 'Ваш запрос будет обработан в ближайшее время!');
                    redirect('/');
                }
            }
        }
        $this->load->view('header-view');
        $this->load->view('question/ask-question-view');
        $this->load->view('footer-view');
    }

    function question_history() {



        $topics = $this->question_model->get_question();
        $data['topics'] = $topics;
        $this->load->view('header-view');
        $this->load->view('question/question-history-view', $data);
        $this->load->view('footer-view');
    }
    
}

?>