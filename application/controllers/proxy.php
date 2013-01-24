<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proxy extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('proxy_model');
        if (!$this->ion_auth->logged_in())
            redirect('login');
    }

    function checkout() {
        redirect('tariff');
        if (!$this->input->post()) {
            $tarif_id = $this->input->post('tarif');

            if (($tariff = $this->db->get_where('tariff', array('id' => $tarif_id))->row()) == FALSE)
                redirect('error');

            if ($this->proxy_model->insert_tariff($tariff))
                redirect('error');
        } else {
            redirect('tariff');
        }
        $this->load->view('header-view');
        $this->load->view('index-view');
        $this->load->view('footer-view');
    }

}