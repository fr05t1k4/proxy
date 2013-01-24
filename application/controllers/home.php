<?php

class Home extends CI_Controller {

    function __construct() {

        parent::__construct();
        
    }
    
    function index(){
        $this->load->view('header-view');
        $this->load->view('index-view');
        $this->load->view('footer-view');
    }
}
