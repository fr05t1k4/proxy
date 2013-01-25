<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proxy extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('proxy_model');
        
    }
    function add_order(){
    if ($this->proxy_model->insert_order($tariff) == FALSE) {
                    $this->report->error('Ошибка добавления заказа');
                } else {

                    $this->report->success('Всё ништяк, база обновлена');
                }
    }

}