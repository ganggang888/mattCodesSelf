<?php
 /*
 用法：
 Security::encrypt($str,$key);
 Security::decrypt($str,$key);
 */
class Security {
    public static function encrypt($input, $key) {
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $input = Security::pkcs5_pad($input, $size);
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $data = base64_encode($data);
        return $data;
    }
 
    private static function pkcs5_pad ($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
 
    public static function decrypt($sStr, $sKey) {
        $decrypted= mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            $sKey,
            base64_decode($sStr),
            MCRYPT_MODE_ECB
        );
        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s-1]);
        $decrypted = substr($decrypted, 0, -$padding);
        return $decrypted;
    }
}
$a = Security::encrypt("32989","GUbjZBfniQzrtrCm055hxER6N37YeRyG");
var_dump($a);
var_dump(Security::decrypt("zP2HbSIqJzG+77f5X6/zhw==",'GUbjZBfniQzrtrCm055hxER6N37YeRyG'));

function encrypt($input) {
    $key = "GUbjZBfniQzrtrCm055hxER6N37YeRyG";
    $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
    $input = pkcs5_pad($input, $size);
    $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
    $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td, $key, $iv);
    $data = mcrypt_generic($td, $input);
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    $data = base64_encode($data);
    return $data;
}
function pkcs5_pad ($text, $blocksize) {
    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text . str_repeat(chr($pad), $pad);
}

$c = encrypt(123456789);
echo(Security::decrypt("9Yz/UWlhRPwPv1/oV7W8a6eyi/MTybA0nrGdxgwOX36COcsr08JnRpppYAkOmgMWF/kOiMd6ly8c4WxjXh+pBfobOn1bLct564rih4ANSCyGKoREJ3CN4CRlsbRuydnYoYeRgq5++MlS86BGsd1MX1+DV+3cTTsgSTUil9VwSChls6udUQuZ5RZeU9Eua0d0kVeLGGvj/rs7QlcOIfIc7ZLh9rZmJakhLQ7HUn7EzmUYlSWAZEtZML4NzNL9YMqJ5fUGbCeRXoPzkTdiAdgnqzBTV/2gJDplpdulZoMffLkyaCZm2GAQkJ1RjQH/PBM/eLD2Q/P7hqgbe5UjZyrtw/lDjUnOJrTSrBYgvKL5dZsgXeppwr7CTalBneAZB9TTp0UN94aAQ2o2prk54EucoolzMDzdtTXiaQJcPffTBWL39iSEP13YJLECmuTmIkWWjLrWHhAnP4pFte6AZO4kfTgFLMt4M6Rj3ehBMAry9p7rYvoVkgcAyj5U4uuEh/DhwPRWgDssH10iZO+FYwy9PTbp8oe4fTPMlJxGO+XfElYqI3ZsrIx8rJkJYlefab7edNM+WAfzcEZiS3KvPkRtDSEJsRu0Qrc4+7hIMipfSy5AtbGWUwaUk2AGpwazfAXRp9eUrrIDROmclayRcv323ismh19J7eAYJgFqo9fy3F7OHyDx6xbLfEHum+x7wreZuLlUacI/KoiLkAeTX8wrkrQpkr6D+VuwKA6ZgboA6aoCo/wtIfKftBkJCLg9Lwh2Wlwa+sBmDuLU3cF05CVEG/ZN4sbwWXjR+kXBdH1bZJOZGnFRHc/4ldrCPRbVuPjikK3MZ26fOwhcR59hOZpCGVik++d7Eh11EWaK6qLFLYQbouoBV+I2JxffgqQu2Nlfo468Ik59OhYoZxaJ3YEysMag7/gcodrFA33doezdtL5Jddw00i+/MZO7+KZWhG2HgXpoapv/jRmrCphBkfviMgT6yJRSkbN5zvmjSjiKz1stYU+KaSpJd/dO+GJAlR45nyBVib3sx5uV5mfkcAK0EbMzXXezJREoE5EFT57nUseQnmAyoopVwwSC1g79/s4ACdu7tRTS5NEwxcZUIYCBXO5h1q2mvxfFX6supKWrdcvJ8gChDUez1t1js+Wt2VZoq03Pd7p0py5l2i76dkWRcxZPThRPqj1KpqZZ/2nQyk/5mrxS/HcJHeABxt+yeXCEnRIcVDRz8vPN0LiQfJe6VUI0V8n8br/SzlIvcsE5kCqgyZV4TrqVBUlK+ZZ+x49703MtY36zsGUWMAlNOu+WY4QxVky3esGtZcK1oeRL/EyVWGLvyAxyjA0+r9fX9JmsWe5ImVNgJVGw0ruH85cO18+/uewEYIQVrzJJgEG+KBdmmF89OHhIWnJMn3Uxg5jrxuRyf/nQvthYPa12GkMV9+zPPlB/7rsj4dVTbM1auTL8eRITI0KBWiAa4Nvg9CZc0CBtHcAiJEEOyXLAKYhmgw==",'GUbjZBfniQzrtrCm055hxER6N37YeRyG'));
