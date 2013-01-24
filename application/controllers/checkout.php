<?php

class Checkout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        
        
        $this->load->view('header-view');
        $this->load->view('checkout/checkout-view');
        $this->load->view('footer-view');
        
    }

}