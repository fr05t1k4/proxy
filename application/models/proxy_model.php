<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proxy_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
            redirect('login');
    }

    function check_data($count_proxy) {

        $tarif_null = array('order_id' => '0');
        $res = $this->db->get_where('proxy', $tarif_null, $count_proxy)->result();
        If (!isset($res[$count_proxy - 1]))
            return false;
        else
            return true;
    }

    function check_tariff($tariff_id = null) {

        if (isset($tariff_id)) {
            $tariff = $this->db->get_where('tariff', array('id' => $tariff_id))->row();
            return $tariff;
        } else {
            return false;
        }
    }

    function update_proxy($data) {

        if (!empty($data)) {
                      
           $this->db->limit($data['count'])->update('proxy', array('order_id' => $data['order_id']));

            return true;
        } else {

            return false;
        }
    }

}