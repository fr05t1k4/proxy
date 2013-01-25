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
        $view = 'pages/tariff-view';
        $data = '';
        if ($this->input->post()) {

            $this->load->model('proxy_model');
            $this->form_validation->set_rules('tarif', 'Тариф', 'numeric|required');

            if ($this->form_validation->run() !== FALSE) {

                $tarif_id = $this->input->post('tarif');
                
                if (($tariff = $this->proxy_model->check_tariff($tarif_id)) == FALSE) {
                    $this->report->error('Тариф не найден');
                    
                
                } else if ($this->proxy_model->check_data($tariff->count) == FALSE) {
                    $this->report->error('Извините, необходимое количество прокси отсутствует');
                } else{
                    $order = array(
                        'tariff_id' => $tariff->id,
                        'user_id' => $this->ion_auth->user()->row()->id
                    );
                    $this->db->insert('orders', $order);
                    $order_id = $this->db->insert_id();
                    
                    $operation = array(
                        'status' => 0,
                        'order_id' => $order_id,
                        'sum' => number_format($tariff->price, 1 , '.', ''),
                        'type' => 'Внешняя',
                        'comment' => 'Оплата',
                        'description' => 'Через систему onpay',
                        'date' => date('Y-m-d H:i:s', time())
                    );
                    $this->db->insert('operations', $operation);
                    
                    redirect('/payment/checkout');
                }
              
            } else {
                $this->report->error(validation_errors());
            }
        }
        $this->load->view('header-view');
        $this->load->view($view, $data);
        $this->load->view('footer-view');
    }
    
    public function pay() {
        
    }
    
    public function check() {
        
    }

}