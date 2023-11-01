<?php
/**
 * 
 */
class Helper
{
    public static function show($data = '', $stop = true)
    {
        print "<pre>";
        var_dump($data);
        print "</pre>";
        if ($stop) {
            exit;
        }
    }


    public static function encode($data)
    {
        $keyEncoded = base64_decode(KEY);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
        $dataString = openssl_encrypt($data, "aes-256-cbc", $keyEncoded, 0, $iv);
        return base64_encode($dataString . "::" . $iv);
    }

    public static function decode($data)
    {
        $keyEncoded = base64_decode(KEY);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
        list($dataString, $iv) = array_pad(explode("::", base64_decode($data), 2), 2, null);
        return openssl_decrypt($dataString, "aes-256-cbc", $keyEncoded, 0, $iv);
    }
}


?>