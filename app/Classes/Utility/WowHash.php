<?php

namespace App\Classes\Utility;

class WowHash {

    public static function hashBnetPassword(string $email, string $password): string
    {
        return strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash('sha256', strtoupper(hash('sha256', strtoupper($email)) . ':' . strtoupper($password))))))));
    }

    public static function hashWowPassword(string $username, string $password): string
    {
        return strtoupper(sha1(strtoupper($username . ':' . $password)));
    }
}
