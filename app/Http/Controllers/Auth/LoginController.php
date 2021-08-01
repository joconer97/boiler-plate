<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use App\Http\Resources\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\Events\Registered;
use Laravel\Passport\ApiTokenCookieFactory;  


class LoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $cookieFactory;

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $field = $request['email'];
        $password = $request['password'];
        $minutes = 525601;


        if(Auth::guard('client')->attempt(['email' => $field, 'password' => $password]))
        {
            $user = Auth::guard('client')->user();

            if($user->deactivated)
            {
                return response("Your account has been deactivated. Please contact admin to reactivate your account.", 422);
            }
            
            $token = $user->createToken('VIRTEX_TOKEN')->accessToken;
            

            return response([
                'user' => new UserResource($user),
                'token' => $token,
            ], 200)
            ->cookie('VIRTEX', $token, $minutes);
        }
        else
        {
            return response("Email / Password does not match. Please try again.", 422);
        }
    }
    
    /**
     * Retrieve currently authenticated user
     * 
     * @return \App\Http\Resources\UserResource
     */
    public function auth()
    {
        return new UserResource(auth()->user());
    }

    /**
     * Handle logout attempt
     *
     * @return \Illuminate\Http\Response
     */
    public function unauthenticate()
    {
        $user = auth()->user();
        $user->token()->revoke();

        return response("Logged out", 200)
                ->withCookie(Cookie::forget('VIRTUAL_EVENT'));;
    }
}
