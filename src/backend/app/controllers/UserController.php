<?php

/*use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;*/


class UserController extends Controller
{

    public function signin()
    {
        return View::make('user.signin');
    }

    public function auth()
    {
        if (Auth::attempt(Input::except('_token')))
        {
            return Redirect::route('home');
        }
        return Redirect::route('signin')
            ->with('error', Lang::get('user.signin.error'))
            ->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

}