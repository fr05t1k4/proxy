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

    public function result() {
        if (!$this->input->post())
            redirect('');
        header('Content-Type: text/xml');
        $this->load->model('proxy_model');
        echo '<?xml version="1.0" encoding="UTF-8"?>';


        $onpay_id = $this->input->post('onpay_id');
        $pay_for = $this->input->post('pay_for');
        $order_amount = $this->input->post('order_amount');
        $order_currency = $this->input->post('order_currency');
        $exchange_rate = $this->input->post('exchange_rate');
        $type = $this->input->post('type');
        $comment = $this->input->post('comment');
        $paymentDateTime = $this->input->post('paymentDateTime');
        $md5 = $this->input->post('md5');
        if ($this->input->post('type') == 'pay')
            $onpay = $onpay_id . ';';
        if ($this->input->post('type') == 'check')
            $onpay = '';
        $str = $type . ";" . $pay_for . ";" . $onpay . $order_amount . ";" . $order_currency . ";" . SECRET_KEY_API;


        $hash = strtoupper(md5($str));

        if ($md5 !== $hash)
            $result = array('code' => 7, 'pay_for' => $pay_for, 'comment' => 'Неверная контрольная сумма', 'md5' => $hash);
        else {
            $order = $this->db->get_where('orders', array('id' => $pay_for))->row();
            if (empty($order))
                $result = array('code' => 3, 'pay_for' => $pay_for, 'comment' => 'Ваш заказ не найден. Начните сначала', 'md5' => $hash);
            else {

                $tariff_id = $order->tariff_id;
                if (($tariff = $this->proxy_model->check_tariff($tariff_id)) == FALSE)
                    $result = array('code' => 3, 'pay_for' => $pay_for, 'comment' => 'Неверный тариф', 'md5' => $hash);
                else {
                    if ((int) $order_amount !== (int) $tariff->price)
                        $result = array('code' => 3, 'pay_for' => $pay_for, 'comment' => 'Неверная сумма заказа', 'md5' => $hash);
                    else {
                        $valute = 'TST';
                        if ($order_currency !== $valute)
                            $result = array('code' => 3, 'pay_for' => $pay_for, 'comment' => 'Неверная валюта заказа', 'md5' => $hash);
                        else {
                            if ($this->proxy_model->check_data($tariff->count) == FALSE)
                                $result = array('code' => 3, 'pay_for' => $pay_for, 'comment' => 'Отсутствует необходимое количество прокси', 'md5' => $hash);
                            else {
                                $last_order = $this->db->get_where('operations', array('order_id' => $pay_for))->row();
                                
                                if ($last_order->status == 1) {
                                    $result = array('code' => 3, 'pay_for' => $pay_for, 'comment' => 'Этот заказ уже оплачен', 'md5' => $hash);
                                } else {
                                    if ($this->input->post('type') == 'check') {
                                        $result = array('code' => 0, 'pay_for' => $pay_for, 'comment' => 'OK', 'md5' => $hash);
                                    }


                                    if ($this->input->post('type') == 'pay') {
                                        $operation = array(
                                            'status' => 1,
                                            'date' => date('Y-m-d H:i:s', strtotime($paymentDateTime))
                                        );
                                        $this->db->where('order_id', $pay_for)->update('operations', $operation);
                                        $tariff = $this->proxy_model->check_tariff($tariff_id);
                                        $ord = array(
                                            'begin_date' => date('Y-m-d H:i:s', time()),
                                            'end_date' => date('Y-m-d H:i:s', time() + $tariff->period * (60 * 60 * 24))
                                        );
                                        $this->db->where('id', $pay_for)->update('orders', $ord);
                                        $data = array(
                                            'order_id' => $order->id,
                                            'count' => $tariff->count,
                                        );
                                        $this->proxy_model->update_proxy($data);
                                        $result = array('code' => 0, 'pay_for' => $pay_for, 'comment' => 'OK', 'md5' => $hash);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }




        echo '<result>' .
        '<code>' . $result['code'] . '</code>' .
        '<pay_for>' . $result['pay_for'] . '</pay_for>' .
        '<comment>' . $result['comment'] . '</comment>' .
        '<md5>' . $result['md5'] . '</md5>' .
        '</result>';
    }

}