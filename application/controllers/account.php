<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller {

    public function settings() {

        $this->load->view('header-view');
        $this->load->view('auth/index');
        $this->load->view('footer-view');
    }

}