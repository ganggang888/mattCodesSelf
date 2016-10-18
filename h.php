<?php
function encryptsss ($value)
{   
    $key = "GUbjZBfniQzrtrCm055hxER6N37YeRyG";
    $padSize = 16 - (strlen ($value) % 16) ;
    $value = $value . str_repeat (chr ($padSize), $padSize) ;
    $output = mcrypt_encrypt (MCRYPT_RIJNDAEL_128, $key, $value, MCRYPT_MODE_CBC,"055hxER6N37YeRyG") ;                
    return base64_encode ($output) ;        
}
var_dump(encryptsss(123456));