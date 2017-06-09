<?php

function encrypt(string $input)
{
    $hash = rand(0, 9999);

    $iv = random_bytes(16);

    $encrypted = openssl_encrypt($input, 'aes-256-ctr', $hash, 0, $iv);
    $return = $encrypted . '.' . $hash . '.' . $iv;
    $return = rawurlencode($return);
    return $return;
}