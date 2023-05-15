<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\User;
use Core\Controller;
use App\Core\Message;

class UserController extends Controller
{
    private $user = null;
    public function __construct()
    {
        $this->user = new User();
    }

    public function profile()
    {
        $pageTitle = Message::$pageTitle['users']['profile'];
        $msg = Session::getFlash('msg');

        $user = Auth::user();

        $this->view('admin/users/profile', compact('pageTitle', 'msg', 'user'));
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id
        ], [
            'required' => Message::$messages['users']['validate']['required'],
            'min' => Message::$messages['users']['validate']['min'],
            'email' => Message::$messages['users']['validate']['email'],
            'unique' => Message::$messages['users']['validate']['unique'],
        ], Message::$messages['users']['attributes']);

        //Update
        $attributes  = [
            'name' => $request->name,
            'email' => $request->email,

        ];

        $status = $this->user->updateUser($attributes, $id);

        if ($status) {
            Session::put('msg', 'Cập nhật thành công');
            $user = $this->user->getUser('id', $id);
            Auth::setLogin($user);
        } else {
            Session::put('msg', 'Cập nhật không thành công');
        }
        redirect(route('admin.users.profile'));
    }

    public function changePassword()
    {
        $pageTitle = Message::$pageTitle['users']['password'];
        $msg = Session::getFlash('msg');

        $this->view('admin/users/password', compact('pageTitle', 'msg'));
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ], [
            'required' => Message::$messages['users']['validate']['required'],
            'min' => Message::$messages['users']['validate']['min'],
            'same' => Message::$messages['users']['validate']['same']
        ], Message::$messages['users']['attributes']);

        //Check mật khẩu cũ
        $user = $this->user->getUser('id', $id);
        if (!empty($user)) {
            if (password_verify($request->old_password, $user['password'])) {
                //Xử lý đổi mật khẩu

                $hash = password_hash($request->password, PASSWORD_DEFAULT);
                $status = $this->user->updateUser([
                    'password' => $hash,
                ], $id);

                if ($status) {
                    Session::put('msg', 'Đổi mật khẩu thành công');
                    Auth::logout();
                } else {
                    Session::put('msg', 'Không thể đổi mật khẩu vào lúc này');
                }

            } else {

                Validator::putError('old_password', Message::$messages['users']['validate']['password.correct']);

            }
        }

        redirect(route('admin.users.password'));
    }
}
