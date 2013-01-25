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

    function insert_order($tariff) {

        if ($this->check_data($tariff->count)) {
            $day = 24 * 3600;
            $days_proxy = $tariff->period;
            $data = array(
                'tariff_id' => $tariff->id,
                'user_id' => $this->ion_auth->user()->row()->id,
                'begin_date' => date('Y-m-d H:i:s', time()),
                'end_date' => date('Y-m-d H:i:s', time() + $days_proxy * $day),
            );
            $this->db->insert('orders', $data);
            $order_id = $this->db->insert_id();

            $this->db->limit($tariff->count)->update('proxy', array('order_id' => $order_id));

            return true;
        } else {

            return false;
        }
    }

}