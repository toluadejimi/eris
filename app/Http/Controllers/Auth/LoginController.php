<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {

        $message = null;

        $data['message'] = $message;

        return view('login.login', $data);
    }

    // use "login" input for either email or student_id
    public function username()
    {
        return 'login';
    }

    protected function credentials(Request $request)
    {
        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'reg_id';

        return [
            $field => $login,
            'password' => $request->input('password'),
        ];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'reg_id';

        $user = User::where($field, $login)->first();





        if (! $user) {
            $message = ucfirst($field) . ' not found.';
        } else {
            $message = 'The password you entered is incorrect.';
        }

        $data['message'] = $message;
        return view('login.login', $data);


    }
}
