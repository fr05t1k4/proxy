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

        if ($this->input->post()) {


            $this->form_validation->set_rules('tarif', 'Тариф', 'numeric|required');

            if ($this->form_validation->run() !== FALSE) {

                $tarif_id = $this->input->post('tarif');

                if (($tariff = $this->db->get_where('tariff', array('id' => $tarif_id))->row()) == FALSE)
                    $this->report->error('Тариф не найден');

                if ($this->proxy_model->insert_tariff($tariff))
                    $this->report->error('Ошибка добавления заказа');
                
            } else {
                $this->report->error(validation_errors());
            }
        }
        $this->load->view('header-view');
        $this->load->view('pages/tariff-view');
        $this->load->view('footer-view');
    }

}