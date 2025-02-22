<?php


namespace kasushou\helper;
class IpHelper
{
    public static function is_ip($str)
    {
        $ip = explode('.', $str);
        for ($i = 0; $i < count($ip); $i++) {
            if ($ip[$i] > 255) {
                return false;
            }
        }
        return preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $str);
    }

    public static function  ip(){
        $ip='未知IP';
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            return self::is_ip($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:$ip;
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return self::is_ip($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$ip;
        }else{
            return self::is_ip($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:$ip;
        }
    }



}