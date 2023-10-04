<?php
namespace App\Classes\Authentication\Registration;

use App\DTO\RegisterDTO;

interface RegistrationInterface  {

    /**
     * Checks if the data sent by User during registration is valid
     *
     * @param RegisterDTO $registerObject
     * @return array
     */
    public function validateInput(
        RegisterDTO $registerObject
    ): array;


    /**
     * Saves account data in DB to complete the registration process.
     *
     * @param RegisterDTO $registerObject
     * @return array
     */
    public function registerUser(
        RegisterDTO $registerObject
    ): array;
}
