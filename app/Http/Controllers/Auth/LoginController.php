<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        return view('login.login', [
            'message' => null,
            'logoUrl' => asset(config('sessions.login_logo', 'images/setting/general/6205.png')),
        ]);
    }

    // use "login" input for either email or student_id
    public function username()
    {
        return 'login';
    }

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
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

        try {
            $user = User::where($field, $login)->first();
        } catch (\Exception $e) {
            $user = null;
        }

        if (! $user) {
            $message = ucfirst($field) . ' not found.';
        } else {
            $message = 'The password you entered is incorrect.';
        }

        $sessions = $this->getAvailableSessions();

        return view('login.login', [
            'message' => $message,
            'logoUrl' => asset(config('sessions.login_logo', 'images/setting/general/6205.png')),
        ]);
    }
}
