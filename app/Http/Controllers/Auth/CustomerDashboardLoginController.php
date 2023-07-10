<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Customer;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showDashboardCustomerLogin()
    {
        // defind route name
        $route = 'cus-auth-login';

        return view('dashboard.auth.login', compact('route'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dashboardCustomerLogin(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        //check user roles
        try {
            $user = User::where('username', $request->username)->first();
            if (!$user->is_customer) {
                return redirect()->intended(RouteServiceProvider::Dashboard);
            } else {
                return redirect()->intended(RouteServiceProvider::Customer);
            }
            
        } catch(QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('customer-login');
    }

}
