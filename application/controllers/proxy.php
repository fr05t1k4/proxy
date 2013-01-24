<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proxy extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('proxy_model');
        if (!$this->ion_auth->logged_in())
            redirect('error');
    }

    function get_proxy() {

        if ($this->input->post()) {
            $tarif = $this->input->post('tarif');
            $tarif_info = explode('-', $tarif);
            $tarif_info = (object) array(
                        'price_proxy' => $tarif_info[0],
                        'days_proxy' => $tarif_info[1],
                        'count_proxy' => $tarif_info[2],
            );
            
            if ($this->proxy_model->check_data($tarif_info->count_proxy) == FALSE)
                redirect('error');

            if ($this->proxy_model->insert_tariff($tarif_info))
                redirect('error');
            
            
        }
        $this->load->view('header-view');
        $this->load->view('index-view');
        $this->load->view('footer-view');
    }

}