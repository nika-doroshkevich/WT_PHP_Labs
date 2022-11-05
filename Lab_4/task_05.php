<?php

class CryptoManager
{
    private string $method;
    private string $key;

    public function __construct(string $key) {
		$this->method = 'rc4'; 
        $this->key = $key;
    }

    public function get_methods() : array {
        return openssl_get_cipher_methods();
    }

    public function encrypt(string $data) : string {
        return openssl_encrypt($data, $this->method, $this->key);
    }

    public function decrypt(string $data) : string {
        return openssl_decrypt($data, $this->method, $this->key);
    }
}
echo "<form method=\"post\" action=\"task_05.php\">";
echo "<input type=\"text\" name=\"Message\" value=\"Enter a message\">";
echo "<input type=\"text\" name=\"Key\" value=\"Enter a key\">";
echo "<input type=\"radio\" name=\"Choice\" value=\"Encrypt\"><label for=\"Encrypt\">Encrypt</label>";
echo "<input type=\"radio\" name=\"Choice\" value=\"Decrypt\"><label for=\"Decrypt\">Decrypt</label>";
echo "<input type=\"submit\" value=\"Run\">";
echo "</form>";

if ($_POST){

$Crypt = new CryptoManager($_POST['Key']);
if ($_POST['Choice'] == 'Encrypt') 
	echo $Crypt->encrypt($_POST['Message']);
if ($_POST['Choice'] == 'Decrypt') 
	echo $Crypt->decrypt($_POST['Message']);
}
