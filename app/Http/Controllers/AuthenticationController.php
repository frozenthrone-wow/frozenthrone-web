<?php

namespace App\Http\Controllers;

use App\Classes\Authentication\Login\Login;
use App\Classes\Authentication\Registration\Registration;
use App\Classes\Utility\Output;
use App\DTO\RegisterDTO;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register(Request $request): object
    {
        $Output = null;

        $RegisterObject = new RegisterDTO(
            $request->Username ?? "",
            $request->Password ?? "",
            $request->PasswordRepeat ?? "",
            $request->Email ?? "",
        );

        $Registration = new Registration();
        $validationResult = $Registration->validateInput($RegisterObject);

        if(!$validationResult['valid'])
        {
            $Output = Output::make(
                $validationResult['message'],
                409
            );
        } else {
            $registrationResult = $Registration->registerUserBnet($RegisterObject);

            if($registrationResult)
            {
                $Output = Output::make(
                    'Account successfully registered!',
                    200
                );
            } else {
                $Output = Output::make(
                    'Something bad happened. Please try again!',
                    500
                );
            }
        }

        return $Output;
    }

    public function login(Request $request): object
    {
        $username = $request['cpanel-login'];
        $password = $request['cpanel-password'];

        $Login = new Login($username, $password);
        $result = $Login->loginUser();

        return redirect(
            route('cpanelHome')
        );
    }
}
