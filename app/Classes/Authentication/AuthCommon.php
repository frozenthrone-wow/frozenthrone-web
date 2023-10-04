<?php

namespace App\Classes\Authentication;

Trait AuthCommon {
    protected function limits(): array{
        return [
            'minCharLimit' => [
                'username' => config('legionweb.registration.username.minChar'),
                'password' => config('legionweb.registration.password.minChar'),
            ],
            'maxCharLimit' => [
                'username' => config('legionweb.registration.username.maxChar'),
                'password' => config('legionweb.registration.password.maxChar'),
            ]
        ];
    }

    protected function errors(): array {
        return [
            'minCharLimit' => [
                'username' => "Minimum number of characters: ".$this->limits()['minCharLimit']['username'],
                'password' => "Minimum number of characters: ".$this->limits()['minCharLimit']['password'],
            ],
            'maxCharLimit' => [
                'username' => "Maximum number of characters: ".$this->limits()['maxCharLimit']['username'],
                'password' => "Maximum number of characters: ".$this->limits()['maxCharLimit']['password'],
            ],
            'existing' => "We're sorry, but the Username is already taken!",
            'passwordMismatch' => "The passwords are not the same. Please check them again.",
            'credentialsError' => "Invalid login credentials.",
        ];
    }
}
