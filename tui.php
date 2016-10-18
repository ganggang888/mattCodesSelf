<?php
/**
 * Copyright 2014
 *
 * Redistribution and modification in source or binary forms are not permitted without specific prior written permission. 
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
	
	
// decrypt
$decryptData = new \Aes256();
		$decryptData = $objAes256->encrypt(123456789);
		echo $decryptData;
	
	/**
	* Class for AES256
	*/
	class Aes256 {
	
	   	var $ENCRYPT_KEY = "abcdefghijklmnopqrstuvwxyz012345";
	
		/**
		* construnctor
		* @param null
		*/
	   	function Aes256() {}
		
		/**
		* encrypt
		* @param @value plain text
		*/
		function encrypt ($value)
		{                
		    $padSize = 16 - (strlen ($value) % 16) ;
		    $value = $value . str_repeat (chr ($padSize), $padSize) ;
		    $output = mcrypt_encrypt (MCRYPT_RIJNDAEL_128, $this->ENCRYPT_KEY, $value, MCRYPT_MODE_CBC, str_repeat(chr(0),16)) ;                
		    return base64_encode ($output) ;        
		}
		
		/**
		* decrypt
		* @param @value encrypted text
		*/
		function decrypt ($value) 
		{                       
		    $value = base64_decode ($value) ;                
		    $output = mcrypt_decrypt (MCRYPT_RIJNDAEL_128, $this->ENCRYPT_KEY, $value, MCRYPT_MODE_CBC, str_repeat(chr(0),16)) ;                
		    
		    $valueLen = strlen ($output) ;
		    if ( $valueLen % 16 > 0 )
		        $output = "";
		
		    $padSize = ord ($output{$valueLen - 1}) ;
		    if ( ($padSize < 1) or ($padSize > 16) )
		        $output = "";                // Check padding.                
		
		    for ($i = 0; $i < $padSize; $i++)
		    {
		        if ( ord ($output{$valueLen - $i - 1}) != $padSize )
		            $output = "";
		    }
		    $output = substr ($output, 0, $valueLen - $padSize) ;
		
		    return $output;        
		}
	}
?>