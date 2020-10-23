
<?php
    # --- ENCRYPTION ---
	 date_default_timezone_set('Asia/Dubai');

	$timenoew = time();
	$timenoewtrim = $timenoew-substr($timenoew,-2);

    $key = $timenoewtrim.$timenoewtrim."1234";
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = "913844yiht5ufo4w";
	/*
	var_dump($iv);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);

    # prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);
echo "Encrypted<br>";
    echo  $ciphertext_base64 . "\n";

    # === WARNING ===

    # Resulting cipher text has no integrity or authenticity added
    # and is not protected against padding oracle attacks.
    
    # --- DECRYPTION ---
    
    $ciphertext_dec = base64_decode($ciphertext_base64);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    # may remove 00h valued characters from end of plain text
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
									echo '<br><br>Decrypted<br>';
    
    echo  $plaintext_dec . "\n";
	
	
	
	*/
?>

<?php 
if(isset($_POST['string'])){
	    # --- ENCRYPTION ---
	$timenoew = time();
	$timenoewtrim = $timenoew-substr($timenoew,-2);
	$timevalid = $timenoewtrim + 100;



    $key = $timenoewtrim.$timenoewtrim."1234";
    $plaintext = $_POST['string'];

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = "913844yiht5ufo4w";

    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);

    $ciphertext = $iv . $ciphertext;
    
    $ciphertext_base64 = base64_encode($ciphertext);
echo "This hash is only valid till: ".date("d M Y@ H:i:s", $timevalid )."<br><br>Encrypted<br>";
    echo  "<h1>".$ciphertext_base64 . "</h1>\n";

}
?>

<?php 

if(isset($_POST['hash'])){
    # --- ENCRYPTION ---

    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
	$timenoew = time();
	$timenoewtrim = $timenoew-substr($timenoew,-2);


    $key = $timenoewtrim.$timenoewtrim."1234";
    # --- DECRYPTION ---
    
    $ciphertext_dec = base64_decode($_POST['hash']);
    
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



<br>
<br>
<br>
<br>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h1>Encrypt</h1>
    <input type="text" name="string"/>
    <input type="submit">
    <hr>
</form>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h1>Decrypt</h1>
    <input type="text" name="hash"/>
    <input type="submit">
    <hr>
</form>