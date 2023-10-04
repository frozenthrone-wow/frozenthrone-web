<?php
namespace App\Classes\Authentication\Login;


interface LoginInterface {

    /**
     * Logs user in the website
     *
     * @param string $username
     * @param string $password
     * @return array
     */
    public function loginUser(): array;
}
