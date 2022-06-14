<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login_post(Request $request) {
        $login = $request -> input('login');
        $password = $request -> input('password');
        $errors = array();
        if(!$login) {
            array_push($errors, 'login is empty');
        }
        if (!$password) {
            array_push($errors, 'password is empty');
        }
        $user = new User;
        $all_users = $user->all();
        foreach ($all_users as $user) {
            if($user->login === $login) {
                if($user->password === $password) {
                    setcookie('login', $login, 0, '/');
                    return redirect()->route('index.host');
                }
                else {
                    array_push($errors, 'false password');
                    return view('log_in_pc_page', ['errors' => $errors]);
                }
            }
        }
        array_push($errors, 'no user with this login');
        return view('log_in_pc_page', ['errors' => $errors]);
    }

}
