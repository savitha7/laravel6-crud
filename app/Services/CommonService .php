<?php
namespace App\Services;

class CommonService
{
    public $encrypt_method = 'AES-256-CBC';
    public $secret_key = 'emp.web';
    public $secret_iv = 'emp.web2020';

    public function getHashKey(){
        return hash('sha256', $this->secret_key);
    }

    public function gethashIv(){
        return substr(hash('sha256', $this->secret_iv), 0, 16);
    }

    public function encrypt ( $string )
    {
        return base64_encode(openssl_encrypt($string, $this->encrypt_method, $this->getHashKey(), 0, $this->gethashIv()));
    }
    public function decrypt ( $string )
    {
        return openssl_decrypt(base64_decode($string), $this->encrypt_method,  $this->getHashKey(), 0, $this->gethashIv());
    }
}
