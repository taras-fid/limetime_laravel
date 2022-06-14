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
//            setcookie('login', $login, 0, '/');
//            DB::table('users')->insert([
//                [
//                    'login' => $login,
//                    'password' => $password,
//                    "created_at" =>  Carbon::now(), # new \Datetime()
//                    "updated_at" => Carbon::now(),  # new \Datetime()
//                ],
//            ]);
            return redirect()->route('review.host');
        }
        else {
            return view('pay_page', ['errors' => $errors]);
        }
    }
}
