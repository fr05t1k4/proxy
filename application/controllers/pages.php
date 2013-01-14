<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function contacts() {
        
        $this->load->model('contacts_model');
        
        $data = array(
            'phone' => $this->contacts_model->getContact(),
            'address' => 'Тимофеева 17 кв 3'
                );
        $data['icq'] = 'icq';
        
        $this->load->view('header-view');
        $this->load->view('pages/contacts-view', $data);
        $this->load->view('footer-view');
    }

    function tariff() {
        $this->load->view('header-view');
        $this->load->view('pages/tariff-view');
        $this->load->view('footer-view');
    }

}