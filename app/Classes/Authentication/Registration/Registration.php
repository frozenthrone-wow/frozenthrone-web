<?php



namespace App\Classes\Authentication\Registration;
use App\Classes\Authentication\AuthCommon;
use App\DTO\RegisterDTO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class Registration implements RegistrationInterface {

    use AuthCommon;


    function __construct()
    {

    }

	/**
	 * Checks if the data sent by User during registration is valid
	 *
	 * @param RegisterDTO $registerObject
	 * @return array
	 */
	public function validateInput(RegisterDTO $registerObject): array
    {
        $response = [
            'message' => '',
            'valid' => true,
        ];

        $username = $registerObject->getUsername();
        $password = $registerObject->getPassword();
        $passwordRepeat = $registerObject->getPasswordRepeat();
        $email = $registerObject->getEmail();
        $securityCode = $registerObject->getSecurityCode();

        #region Username Validation
        if(strlen($username) < $this->limits()['minCharLimit']['username'])
        {
            $response['message'] = $this->errors()['minCharLimit']['username'];
            $response['valid'] = false;
        }

        if(strlen($username) > $this->limits()['maxCharLimit']['username'])
        {
            $response['message'] = $this->errors()['maxCharLimit']['username'];
            $response['valid'] = false;
        }
        #endregion

        #region Password Validation
        if(strlen($password) < $this->limits()['minCharLimit']['password'])
        {
            $response['message'] = $this->errors()['minCharLimit']['password'];
            $response['valid'] = false;
        }

        if(strlen($password) > $this->limits()['maxCharLimit']['password'])
        {
            $response['message'] = $this->errors()['maxCharLimit']['password'];
            $response['valid'] = false;
        }

        if($passwordRepeat != $password)
        {
            $response['message'] = $this->errors()['passwordMismatch'];
            $response['valid'] = false;
        }
        #endregion

        #region Duplicate Check
        if($this->usernameDuplicate($username))
        {
            $response['message'] = $this->errors()['existing'];
            $response['valid'] = false;
        }
        #endregion
        return $response;
	}

	/**
	 * Saves account data in DB to complete the registration process.
	 *
	 * @param RegisterDTO $registerObject
	 * @return array
	 */
	public function registerUser(RegisterDTO $registerObject): array
    {

        $response = [
            'message' => 'Account created with success!',
            'success' => true,
        ];

        //change uuid4 to whatever uuid you need
        $uuid = Uuid::uuid4()->__toString();
        $username = $registerObject->getUsername();

        // Default hash is bcrypt (config\hashing.php)
        $password = Hash::make($registerObject->getPassword());
        $email = $registerObject->getEmail();
        $securityCode = $registerObject->getSecurityCode();

        $query =
        'INSERT INTO "data"."Account"
        ("Id", "LoginName", "PasswordHash", "SecurityCode", "EMail", "RegistrationDate", "State", "TimeZone", "VaultPassword", "IsVaultExtended")
        VALUES(:uuid, :login, :password, :securityCode, :email, :registrationDate, 0, 0, \'\', false);';

        $registerResult = DB::insert(
            $query,
            [
                ":uuid" => $uuid,
                ":login" => $username,
                ":password" => $password,
                ":securityCode" => $securityCode,
                ":email" => $email,
                ":registrationDate" => date('Y-m-d H:i:s'),
            ],
        );

        return (array)$registerResult;
	}

    private function usernameDuplicate(string $Username): bool
    {
        $query = 'SELECT "Id"
        FROM "data"."Account"
        where "LoginName" = :login;';

        $result = DB::select($query, [':login' => $Username]);

        return count($result) > 0;
    }
}
