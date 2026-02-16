<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Build list of available sessions (each maps to a database connection)
     */
    protected function getAvailableSessions()
    {
        $sessions = config('sessions.available', ['2022_2023', '2023_2024', '2024_2025', '2025_2026']);
        return array_reverse($sessions); // newest first
    }

    public function showLoginForm()
    {
        $sessions = $this->getAvailableSessions();

        return view('login.login', [
            'message' => null,
            'sessions' => $sessions,
            'defaultSession' => $sessions[0] ?? null,
            'logoUrl' => asset(config('sessions.login_logo', 'images/setting/general/6205.png')),
        ]);
    }

    // use "login" input for either email or student_id
    public function username()
    {
        return 'login';
    }

    /**
     * Switch to the database for the selected session before login attempt.
     * The session_key (e.g. 2024_2025) maps to connection "session_2024_2025"
     */
    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'session_key' => 'required|string',
        ]);

        $sessionKey = $request->input('session_key');
        if (empty($sessionKey)) {
            return redirect()->back()
                ->withInput($request->only('login', 'remember'))
                ->withErrors(['session_key' => 'Please select an academic session.']);
        }

        $connection = 'session_' . $sessionKey;
        if (!array_key_exists($connection, config('database.connections'))) {
            return redirect()->back()
                ->withInput($request->only('login', 'remember'))
                ->withErrors(['session_key' => 'Invalid session selected.']);
        }

        $request->session()->put('db_connection', $connection);
        Config::set('database.default', $connection);
        DB::purge($connection);
        DB::reconnect($connection);

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
            'sessions' => $sessions,
            'defaultSession' => $request->input('session_key', $sessions[0] ?? null),
            'logoUrl' => asset(config('sessions.login_logo', 'images/setting/general/6205.png')),
        ]);
    }
}
