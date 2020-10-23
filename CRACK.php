<?php
$master = "OTEzODQ0eWlodDV1Zm80d4y4bIOBt2NwHaA698Qd/i5mHk4rflzsjhPu9oqzvX9INCTpG+MDqikrTfZM/x/QtfOafmSPWHnskckvfzNLzwmVj7Pg9n8t5Q8pwLT8tlTpczw3bcF8+Ca46J/Va4lnRBBBRqBZ217wxjVPnWqOoqeEC7eZvfPdQ9DaMmd/N0Kcd5vmlEAyds5Nj70TG4gXawobUfft6BZzgbVGly7a5MeCOs/lGeQY3fVbt53xvuDSb/nuhgZwbDkA8K5zzyFBjA==";
    # --- ENCRYPTION ---
	 date_default_timezone_set('Asia/Dubai');

	$timenoew = time();
	$timenoewtrim = $timenoew-substr($timenoew,-2);

    $key = $timenoewtrim.$timenoewtrim."1234";
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = "913844yiht5ufo4w";



    # --- ENCRYPTION ---
   for($oij = 0;$oij < 99; $oij++){
    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
	$timenoew = time();
	$timenoewtrim = $timenoew-substr($timenoew,-2) - $oij * 100;


    $key = $timenoewtrim.$timenoewtrim."1234";
    # --- DECRYPTION ---
    
    $ciphertext_dec = base64_decode($master);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

	    # may remove 00h valued characters from end of plain text
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
									echo '<br><br>Decrypted<br>';
    
    echo  "<h1>".$plaintext_dec . "</h1>\n";
   }
	
	




?>