<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proxy_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   

    function check_data($count_proxy) {
        
        $tarif_null = array('tarif_id' => '0');
        $res = $this->db->get_where('proxy', $tarif_null, $count_proxy)->result();
        If (!isset($res[$count_proxy - 1]))
            return false;
        else
            return true;
    }

    function insert_tariff($tariff) {
        
        $days_proxy = $tariff->period;
        $price_proxy = $tariff->price;
        $day = 24 * 3600;
        $data = array(
            'proxy_count' => $tarif_info->count_proxy,
            'user_id' => $this->ion_auth->user()->row()->id,
            'begin_date' => date('Y-m-d H:i:s', time()),
            'end_date' => date('Y-m-d H:i:s', time() + $days_proxy * $day),
        );
        $this->db->insert('tariff', $data);
        
        
        return $this->db->insert_id();
    }

}