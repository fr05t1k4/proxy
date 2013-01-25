<?php

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function checkout() {

        $data = array(
            'operation' => array(),
            'order' => array(),
            'tariff' => array()
        );

        // Получаем заказ последний от пользователя
        $order = $this->db->where('user_id', $this->ion_auth->user()->row()->id)->order_by('id', 'desc')->get('orders')->row();

        if (empty($order))
            $this->report->error('Ваш заказ куда-то пропал!');
        else {

            // Удаляем предыдущие не оплаченые заказы
            $this->db->where(array(
                'id !=' => $order->id,
                'begin_date' => NULL,
                'end_date' => NULL
            ))->delete('orders');


            $operation = $this->db->get_where('operations', array('order_id' => $order->id))->row();
            if (empty($operation))
                $this->report->error('Ваша транзакция не найдена!');
            else {

                $this->db->where(array(
                    'id !=' => $operation->id,
                    'status' => 0
                ))->delete('operations');

                $tariff = $this->db->get_where('tariff', array('id' => $order->tariff_id))->row();
                if (empty($tariff))
                    $this->report->error('Тариф не найден');
                else {
                    $data = array(
                        'operation' => $operation,
                        'order' => $order,
                        'tariff' => $tariff
                    );
                }
            }
        }
        $this->load->view('header-view', $data);
        $this->load->view('payment/checkout-view', $data);
        $this->load->view('footer-view', $data);
    }

}