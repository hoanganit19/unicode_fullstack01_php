<?php

namespace App\Controllers\Auth;

use Core\Request;
use Core\Session;
use App\Models\User;
use Core\Controller;
use App\Core\Message;

class LoginController extends Controller
{
    private $userModel = null;
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function getForm()
    {
        $pageTitle = Message::$pageTitle['auth']['login'];

        $msg = Session::getFlash('msg');

        if (!empty(Session::get('userLogin'))) {
            redirect(route('admin.dashboard.index'));
        }

        $this->view('auth/login', compact('pageTitle', 'msg'));
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'required' => Message::$messages['auth']['validate']['required'],
                'email' => Message::$messages['auth']['validate']['email']
            ],
            Message::$messages['auth']['attributes']
        );

        //Xử lý login
        $user = $this->userModel->getUser('email', $request->email);

        if (!empty($user)) {
            $hash = $user['password'];

            if (password_verify($request->password, $hash)) {
                Session::put('userLogin', $user);
                redirect(route('admin.dashboard.index'));
            } else {
                Session::put('msg', Message::$messages['auth']['login.failed']);
                redirect(route('auth.login'));
            }
        } else {
            Session::put('msg', Message::$messages['auth']['login.failed']);
            redirect(route('auth.login'));
        }
    }
}
