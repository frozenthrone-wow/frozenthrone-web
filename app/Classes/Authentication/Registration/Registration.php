<?php



namespace App\Classes\Authentication\Registration;
use App\Classes\Authentication\AuthCommon;
use App\DTO\RegisterDTO;
use Illuminate\Support\Facades\DB;
use App\Classes\Utility\WOWDB;

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
        $username = $registerObject->getUsername();
        // Default hash is bcrypt (config\hashing.php)
        $email = $registerObject->getEmail();
        $password = $registerObject->getPassword();

        list($salt, $verifier) = $this->getUserSalt($username, $password);    
        $query =
        'INSERT INTO account(username, salt, verifier, email, joindate) VALUES(:username, :salt, :verifier, :email, :joindate)';

        $registerResult = WOWDB::insert(
            $query,
            [
                ":username" => $username,
                ":salt" => $salt,
                ":verifier" => $verifier,
                ":email" => $email,
                ":joindate" => date('Y-m-d H:i:s'),
            ],
        );

        return (array)$registerResult;
	}



    private function usernameDuplicate(string $Username): bool
    {
        $query = 'SELECT id
        FROM acore_auth.account
        where username = :login;';

        $result = WOWDB::select($query, [':login' => $Username]);

        return count($result) > 0;
    }

    private function getUserSalt($username, $password)
    {
      // generate a random salt
      $salt = random_bytes(32);

      // calculate verifier using this salt
      $verifier = $this->calculateSRP6Verifier($username, $password, $salt);

      // done - this is what you put in the account table!
      return array($salt, $verifier);
    }

    private function calculateSRP6Verifier($username, $password, $salt)
    {
      // algorithm constants
      $g = gmp_init(7);
      $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);

      // calculate first hash
      $h1 = sha1(strtoupper($username . ':' . $password), TRUE);

      // calculate second hash
      $h2 = sha1($salt.$h1, TRUE);

      // convert to integer (little-endian)
      $h2 = gmp_import($h2, 1, GMP_LSW_FIRST);

      // g^h2 mod N
      $verifier = gmp_powm($g, $h2, $N);

      // convert back to a byte array (little-endian)
      $verifier = gmp_export($verifier, 1, GMP_LSW_FIRST);

      // pad to 32 bytes, remember that zeros go on the end in little-endian!
      $verifier = str_pad($verifier, 32, chr(0), STR_PAD_RIGHT);

      // done!
      return $verifier;
    }

}
