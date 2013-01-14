<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {

        $this->load->view('header-view');
        $this->load->view('index-view');
        $this->load->view('footer-view');
    }

    public function check() {
        $this->load->library('RollingCurl');
        $this->load->library('AngryCurl');

        $ac = new AngryCurl(array('AngryCurl', 'call_back_func'));

        $ac->init_console();
        $ac->load_useragent_list('useragent.txt');



        $ac->load_proxy_list(
                // path to proxy-list file
                'proxy_list.txt',
                // optional: number of threads
                200,
                // optional: proxy type
                'socks5',
                // optional: target url to check
                'http://google.com'
        );

        $i = 0;

        while ($i < $ac->n_proxy) {
            $url = 'http://baystore.ru/';
            // adding URL to queue
            $ac->get($url);
            // you may also use $AC->post($url); shortcut as well

            $i++;
        }

        $ac->execute(20);
        var_dump(AngryCurl::$alive_proxy_list_info);
        //$ac->print_debug();
        unset($ac);
    }

    public function check2() {
        $this->output->enable_profiler(TRUE);
        
        $file = file_get_contents('proxy_list.txt');

        $proxy_list = explode("\n", $file);

        $mh = curl_multi_init();
        $curl_array = array();
        $url = "http://ya.ru/";

        foreach ($proxy_list as $i => $proxy) {
            $curl_array[$i] = curl_init("http://google.ru/");

            curl_setopt($curl_array[$i], CURLOPT_HEADER, 0);
            curl_setopt($curl_array[$i], CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.1) Gecko/2008070208');
            curl_setopt($curl_array[$i], CURLOPT_PROXY, $proxy);
            curl_setopt($curl_array[$i], CURLOPT_VERBOSE, 1);
            curl_setopt($curl_array[$i], CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            curl_setopt($curl_array[$i], CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl_array[$i], CURLOPT_HTTPPROXYTUNNEL, FALSE);
            curl_setopt($curl_array[$i], CURLOPT_CUSTOMREQUEST, "HEAD");
            curl_multi_add_handle($mh, $curl_array[$i]);
        }

        $running = NULL;

        do {
            usleep(10000);
            curl_multi_exec($mh, $running);
        } while ($running > 0);

        foreach ($proxy_list as $i => $url) {
            $res[$url] = (bool) curl_multi_getcontent($curl_array[$i]);
        }

        foreach ($proxy_list as $i => $url) {
            curl_multi_remove_handle($mh, $curl_array[$i]);
        }
        curl_multi_close($mh);

        var_dump($res);
    }

    public function callback_function($response, $info, $request) {
        //var_dump($response);
        var_dump($info);
        //var_dump($request);
    }

}