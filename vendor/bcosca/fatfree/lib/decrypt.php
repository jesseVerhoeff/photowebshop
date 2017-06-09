<?php

function decrypt(string $input)
{
    $input = rawurldecode($input);
    $input = explode('.', $input);
    if (sizeof($input) !== 3) {
        return false;
    }
    $return = openssl_decrypt($input[0], 'aes-256-ctr', $input[1], 0, $input[2]);
    return $return;
}