<?php
namespace App\DTO;

class RegisterDTO {
    private string $Username;
    private string $Password;
    private string $PasswordRepeat;
    private string $Email;
    private int $SecurityCode;

    function __construct($username, $password, $passwordrepeat, $email)
    {
        $this->Username = $username;
        $this->Password = $password;
        $this->Email = $email;
        $this->PasswordRepeat = $passwordrepeat;
    }

    public function getUsername(): string
    {
        return $this->Username;
    }

    public function getPassword(): string
    {
        return $this->Password;
    }

    public function getPasswordRepeat(): string
    {
        return $this->PasswordRepeat;
    }

    public function getEmail(): string
    {
        return $this->Email;
    }
}
