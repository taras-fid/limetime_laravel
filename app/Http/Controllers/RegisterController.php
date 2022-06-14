<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register_post(Request $request) {
        $login = $request -> input('login');
        $password = $request -> input('password');
        $rep_password = $request -> input('rep_password');
        $errors = array();
        if(!$login) {
            array_push($errors, 'login is empty');
        }
        if (!$password || !$rep_password) {
            array_push($errors, 'password is empty');
        }
        if ($password !== $rep_password) {
            array_push($errors, 'pass != rep_pass');
        }
        $user = new User;
        $all_users = $user->all();
        foreach ($all_users as $user) {
            if($user->login === $login) {
                array_push($errors, 'user with this login is already exists');
            }
        }
        if (count($errors) === 0) {
            setcookie('login', $login, 0, '/');
            $user->login = $login;
            $user->password = $password;
            DB::table('users')->insert([
                [
                    'login' => $login,
                    'password' => $password,
                    "created_at" =>  Carbon::now(), # new \Datetime()
                    "updated_at" => Carbon::now(),  # new \Datetime()
                ],
            ]);

            return redirect()->route('index.host');
        }
        else {
            return view('register_in_page', ['errors' => $errors]);
        }
    }
}
