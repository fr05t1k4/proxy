<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proxy extends CI_Controller {

    public function index() {
        $this->load->view('header-view');
        $this->load->view('footer-view');
    }

}