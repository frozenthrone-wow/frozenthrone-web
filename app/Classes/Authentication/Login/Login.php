<?php



namespace App\Classes\Authentication\Login;
use App\Classes\Authentication\AuthCommon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class Login implements LoginInterface {

    use AuthCommon;
    private string $username;
    private string $password;


    function __construct(string $username, string $password){

        $this->username = $username;
        $this->password = $password;
    }
    /**
	 * Logs user in the website
	 *
	 * @param string $username
	 * @param string $password
	 * @return array
	 */
	public function loginUser(): array {
        $validated = $this->validate();

        if($validated['valid']) {
            if($this->login())
            {
                return [
                    'message' => 'Logged in successfully',
                    'status' => 200,
                ];
            }
        }

        return [
            'message' => 'Error logging in.',
            'status' => 401,
        ];
	}


    private function validate(): array {

        $response = [
            'message' => '',
            'valid' => true,
        ];


        if(strlen($this->username) < $this->limits()['minCharLimit']['username'])
        {
            $response['message'] = $this->errors()['minCharLimit']['username'];
            $response['valid'] = false;
        }

        if(strlen($this->username) > $this->limits()['maxCharLimit']['username'])
        {
            $response['message'] = $this->errors()['maxCharLimit']['username'];
            $response['valid'] = false;
        }
        #endregion

        #region Password Validation
        if(strlen($this->password) < $this->limits()['minCharLimit']['password'])
        {
            $response['message'] = $this->errors()['minCharLimit']['password'];
            $response['valid'] = false;
        }

        if(strlen($this->password) > $this->limits()['maxCharLimit']['password'])
        {
            $response['message'] = $this->errors()['maxCharLimit']['password'];
            $response['valid'] = false;
        }
        #endregion

        return $response;
    }

    #region Logging in & session building
    private function login(): bool {
        $getAccountDataQuery =
            'SELECT acc."id", acc.nickname, acc."level", account."PasswordHash"
            FROM "data"."Account" account
            LEFT JOIN "website"."access" acc
                ON acc.uuid = account."Id"
            WHERE account."LoginName" = :username;';


        $result = DB::select($getAccountDataQuery, [':username' => $this->username]);

        $userLoggedIn = false;

        if(count($result) < 1) return $userLoggedIn;

        foreach($result as $acc) {
            $acc = (array) $acc;
            if(Hash::check($this->password, $acc['PasswordHash'])) {
                unset($acc['PasswordHash']);
                $this->buildSession($acc);
                $userLoggedIn = true;
            }

            break;
        }

        return $userLoggedIn;
    }


    private function buildSession(array $accountData): void {
        if($accountData['level'] != null && $accountData['level'] >= 0)
        {
            Session::put('cpanel', [
                'id' => $accountData['id'],
                'nickname' => $accountData['nickname'],
                'level' => 9,
            ]);
        }
    }
    #endregion

    #region Utility Methods

    #endregion

}
