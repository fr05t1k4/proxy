<?php

class Report extends CI_Session {

    function __construct() {

        parent::__construct();
    }

    function error($message, $url = NULL) {

        $error = $this->userdata('error'); // $_SESSION['error'];
        $error[] = $message;
        $this->set_userdata('error', $error); // = $_SESSION['error'] = $error;

        if (!is_null($url))
            redirect($url);
    }

    function success($message, $url = NULL) {

        $success = $this->userdata('success'); // $_SESSION['success'];
        $success[] = $message;
        $this->set_userdata('success', $success);

        if (!is_null($url))
            redirect($url);
    }

    function show() {

        if ($this->userdata('error')) {
            foreach ($this->userdata('error') as $error)
                echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a>' . $error . '</div>';
            $this->unset_userdata('error');
        }

        if ($this->userdata('success')) {
            foreach ($this->userdata('success') as $success)
                echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a>' . $success . '</div>';
            $this->unset_userdata('success');
        }
    }

}