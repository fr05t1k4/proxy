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
                    redirect('question/question_history');
                }
            }
        }

        $this->load->view('header-view');
        $this->load->view('question/ask-question-view');
        $this->load->view('footer-view');
    }

    function question_history() {



        $topics = $this->question_model->get_question();

        // Получаем количесво не прочитанных сообщений
        foreach ($topics as &$topic) {
            
            // Проверяем какие не прочитанные сообщения нам нужны
            $is_admin = ($this->ion_auth->is_admin()) ? 'admin_read' : 'user_read';
            
            // Задаем условие для выборки непрочитанных сообщений
            $filter = array(
                'question_id' => $topic->id,
                $is_admin => 0
            );

            $unreadable_messages = $this->db->get_where('messages', $filter)->result();
            
            $topic->count_unread = count($unreadable_messages);
        }

        $data['topics'] = $topics;
        $this->load->view('header-view');
        $this->load->view('question/question-history-view', $data);
        $this->load->view('footer-view');
    }

    function messages($id = NULL) {


        $data['question'] = $this->db->get_where('questions', array('id' => $id))->row();
        if (empty($data['question']))
            redirect('error');
        $user_id = $this->ion_auth->user()->row()->id;
        if ($data['question']->user_id !== $user_id && !$this->ion_auth->is_admin())
            redirect('error');

        $messages = $this->question_model->get_messages($id);
        $data['messages'] = $messages;

        if ($this->input->post() && !$data['question']->closed) {



            $this->form_validation->set_rules('message', 'Сообщение', 'trim|strip_tags|xss_clean|required');
            $this->form_validation->set_rules('question_id', 'Id обращения', 'numeric|max_length[5]|required');

            if ($this->form_validation->run() !== FALSE) {
                $message = $this->input->post('message');
                $question_id = $this->input->post('question_id');
                $this->question_model->create_message($message, $question_id);
                redirect(current_url());
            }
        }

        if ($this->ion_auth->is_admin()):
            $this->db->set('admin_read', 1)->where(array('question_id' => $data['question']->id, 'admin_read' => 0))->update('messages');
        else:
            $this->db->set('user_read', 1)->where(array('question_id' => $data['question']->id, 'user_read' => 0))->update('messages');
        endif;



        $this->load->view('header-view');
        $this->load->view('question/messages-view', $data);
        $this->load->view('footer-view');
    }

    public function open($id) {
        if (!$this->ion_auth->is_admin())
            redirect('error');
        $this->db->set('closed', 0)->where('id', $id)->update('questions');
        redirect('question/question_history');
    }

    public function close($id) {
        if (!$this->ion_auth->is_admin())
            redirect('error');
        $this->db->set('closed', 1)->where('id', $id)->update('questions');
        redirect('question/question_history');
    }

}

?>