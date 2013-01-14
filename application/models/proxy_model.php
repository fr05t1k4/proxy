<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proxy_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getmicrotime() {
        list ($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

    function socks_connect($host, $port) {

        $f = @fsockopen($host, $port, $errno, $errstr, 10);

        if (!$f) {
            return false;
        } else {
            echo "start...\n";
           
            $h = gethostbyname('ip-address.domaintools.com');
            preg_match("#(\d+)\.(\d+)\.(\d+)\.(\d+)#", $h, $m);
            fwrite($f, "\x05\x01\x00");
            $r = fread($f, 2);
            if (!( ord($r[0]) == 5 and ord($r[1]) == 0))
                return false;
            fwrite($f, "\x05\x01\x00\x01" . chr($m[1]) . chr($m[2]) . chr($m[3]) . chr($m[4]) . chr(80 / 256) . chr(80 % 256));
            $r = fread($f, 10);
            if (!( ord($r[0]) == 5 and ord($r[1]) == 0))
                return false;
            return $f;
        }
    }

    function check_socks($socksip, $socksport) {
        $start = $this->getmicrotime();
        $socket = $this->socks_connect($socksip, $socksport);
        if ($socket) {
            fwrite($socket, "GET /myip.xml HTTP/1.0\r\nHost: ip-address.domaintools.com\r\nProxy-Connection: close\r\n\r\n");
            $l = '';
            while (!feof($socket)) {
                $l.=fread($socket, 1024);
            }
            @fclose($socket);
            if (strlen($l) > 5) {
                preg_match('/<blacklist_status>([a-z]+)<\/blacklist_status>/i', $l, $arr);
                preg_match('/<city>([a-z]+)<\/city>/i', $l, $arr2);
                preg_match('/<region>([a-z]+)<\/region>/i', $l, $arr3);
                return array('true', $arr[1], $arr3[1], $arr2[1], round(($this->getmicrotime() - $start), 4));
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
      Пример как юзать:
      # IP сокса
      $socksip    = '192.168.0.2';
      # Порт сокса
      $socksport = 31337;

      # Проверяем сокс
      $data = check_socks($socksip,$socksport)
      if(is_array($data)){
      echo "Socks check - ok...<br />";
      echo "blacklist status: ".$data[1]."<br />";
      echo "city: ".$data[2]."<br />";
      echo "region: ".$data[3]."<br />";
      echo "speed time: ".$data[4]."<br />";
      }else{ echo "Socks check - fail..."; }
     */
}