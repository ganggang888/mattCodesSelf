<?php
class AMPCrypt {
    private static function getKey(){
        return md5('E45EG12GFD4561G3FG123D');
     }
    public static function encrypt($value){
         $td = mcrypt_module_open('tripledes', '', 'ecb', '');
         $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
         $key = substr(self::getKey(), 0, mcrypt_enc_get_key_size($td));
         mcrypt_generic_init($td, $key, $iv);
         $ret = base64_encode(mcrypt_generic($td, $value));
         mcrypt_generic_deinit($td);
         mcrypt_module_close($td);
        return $ret;
     }
    public static function dencrypt($value){
         $td = mcrypt_module_open('tripledes', '', 'ecb', '');
         $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
         $key = substr(self::getKey(), 0, mcrypt_enc_get_key_size($td));
         $key = substr(self::getKey(), 0, mcrypt_enc_get_key_size($td));
         mcrypt_generic_init($td, $key, $iv);
         $ret = trim(mdecrypt_generic($td, base64_decode($value))) ;
         mcrypt_generic_deinit($td);
         mcrypt_module_close($td);
        return $ret;
     }
}

$a = new \AMPCrypt();
$jia = AMPCrypt::encrypt('123456');
var_dump($jia);