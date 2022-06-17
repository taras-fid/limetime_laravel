<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class payController extends Controller
{
    public function pay_post(Request $request) {
        $bonus = $request -> input('bonus');
        $card = $request -> input('card');
        $date = $request -> input('date');
        $cvc = $request -> input('cvc');
        $date_arr = str_split($date);
        $card_arr = str_split($card);
        $cvc_arr = str_split($cvc);
        $errors = array();
        if(isset($_COOKIE['login'])) {
            $user_obj = new User();
            $users = $user_obj->all();
            foreach ($users as $user) {
                if($user->login == isset($_COOKIE['login'])) {
                    if($bonus  > $user->bonus) {
                        array_push($errors, 'ви не маєте стільки бонусів');
                    }
                    else {
                        $user->bonus = $user->bonus - $bonus;
                        $user->save();
                    }
                }
            }
        }
        else {
            $id_user = null;
        }
        if(!$card) {
            array_push($errors, 'card num is empty');
        }
        if(!$date) {
            array_push($errors, 'date is empty');
        }
        if(!$cvc) {
            array_push($errors, 'cvc num is empty');
        }
        if(count($card_arr) != 16) {
            array_push($errors, 'card num is invalid');
        }
        else {
            foreach ($card_arr as $item) {
                if (!is_numeric($item)) {
                    if(!in_array('card num is invalid', $errors)) {
                        array_push($errors, 'card num is invalid');
                    }
                }
            }
        }
        if(count($date_arr) != 5) {
            array_push($errors, 'date is invalid');
        }
        else {
            foreach ($date_arr as $item) {
                if (!is_numeric($item)) {
                    if($item === $date_arr[2]) {
                        if($item === '/' || $item === "|" || $item === '-' || $item === '_' || $item === '.' || $item === "," || $item === ':' || $item === ';') {
                            continue;
                        }
                        else {
                            if(!in_array('date is invalid', $errors)) {
                                array_push($errors, 'date is invalid');
                            }
                        }
                    }
                }
            }
        }
        if(count($cvc_arr) != 3) {
            array_push($errors, 'cvc num is invalid');
        }
        else {
            foreach ($cvc_arr as $item) {
                if (!is_numeric($item)) {
                    if(!in_array('cvc num is invalid', $errors)) {
                        array_push($errors, 'cvc num is invalid');
                    }
                }
            }
        }
        if (count($errors) === 0) {
            return redirect()->route('review.host');
        }
        else {
            if (isset($_COOKIE['login'])) {
                $user_collection = DB::table('users')->where('login', $_COOKIE['login'])->get();
                foreach ($user_collection as $item) {
                    $user_bonus = $item->bonus;
                    error_log("{$user_bonus}");
                }
            }
            else {$user_bonus = null;}
            return view('pay_page', ['errors' => $errors], ['user'=>$user_bonus]);
        }
    }
}
