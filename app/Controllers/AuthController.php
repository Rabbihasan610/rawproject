<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\CSRF;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;

class AuthController extends BaseController
{
    public function showLogin()
    {
        return $this->adminView('auth.login', [
            'title' => 'Login',
            'error' => Session::flash('error'),
            'old'   => Session::flash('old')
        ]);
    }

    public function login()
    {
        $request = new Request();
        $response = new Response();



        if(!CSRF::check($request->input('_token'))) {
            Session::flash('error', 'Invalid CSRF token.'); 
            return $response->redirect('/login');
        }

        $data = $request->all();

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            Session::flash('error', 'Invalid email format.'); 
            return $response->redirect('/login');
        }

        if(strlen($data['password']) < 6) {
            Session::flash('error', 'Password must be at least 6 characters.'); 
            return $response->redirect('/login');
        }

        Session::set('user_id', 1);

        $response->redirect('/dashboard');
    }


    public function logout()
    {
        $res = new Response();
        Session::forget('user_id');
        $res->redirect('/login');
    }
}