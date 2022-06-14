<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class reviewController extends Controller
{
    public function review_post(Request $request) {
        $stars = $request -> input('stars');
        $text = $request -> input('text');
        $errors = array();
        if($stars > 5 || $stars < 1) {
            array_push($errors, 'stars num must be 1-5 value');
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
            if (isset($_COOKIE['login'])) {
                $message = "{$_COOKIE['login']}, ваше замовлення сплачено успішно! Дякуємо, що обираєте наші лимонадики";
            }
            else {
                $message = "Ваше замовлення сплачено успішно! Дякуємо, що обираєте наші лимонадики";
            }
            setcookie("message", $message, 0, '/');
            //return view('review_page', ['errors' => $errors]);
            return redirect()->route('index.host');
        }
        else {
            return view('review_page', ['errors' => $errors]);
        }
    }

    public function review_cancel() {
        // delete all cookies
        $drink_obj = new Drink();
        $drinks = $drink_obj->all();
        foreach ($drinks as $drink) {
            if(isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_250}"])) {
                unset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_250}"]);
                setcookie("id_cart_drink_{$drink->id}_{$drink->price_250}", null, -1, '/');

                unset($_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_250}"]);
                setcookie("name_cart_drink_{$drink->id}_{$drink->price_250}", null, -1, '/');

                unset($_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_250}"]);
                setcookie("quantity_cart_drink_{$drink->id}_{$drink->price_250}", null, -1, '/');

                unset($_COOKIE["price_cart_drink_{$drink->id}_{$drink->price_250}"]);
                setcookie("price_cart_drink_{$drink->id}_{$drink->price_250}", null, -1, '/');

                unset($_COOKIE["img_cart_drink_{$drink->id}_{$drink->price_250}"]);
                setcookie("img_cart_drink_{$drink->id}_{$drink->price_250}", null, -1, '/');
            }

            if(isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_500}"])) {
                unset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_500}"]);
                setcookie("id_cart_drink_{$drink->id}_{$drink->price_500}", null, -1, '/');

                unset($_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_500}"]);
                setcookie("name_cart_drink_{$drink->id}_{$drink->price_500}", null, -1, '/');

                unset($_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_500}"]);
                setcookie("quantity_cart_drink_{$drink->id}_{$drink->price_500}", null, -1, '/');

                unset($_COOKIE["price_cart_drink_{$drink->id}_{$drink->price_500}"]);
                setcookie("price_cart_drink_{$drink->id}_{$drink->price_500}", null, -1, '/');

                unset($_COOKIE["img_cart_drink_{$drink->id}_{$drink->price_500}"]);
                setcookie("img_cart_drink_{$drink->id}_{$drink->price_500}", null, -1, '/');
            }

            if(isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_1000}"])) {
                unset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_1000}"]);
                setcookie("id_cart_drink_{$drink->id}_{$drink->price_1000}", null, -1, '/');

                unset($_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_1000}"]);
                setcookie("name_cart_drink_{$drink->id}_{$drink->price_1000}", null, -1, '/');

                unset($_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_1000}"]);
                setcookie("quantity_cart_drink_{$drink->id}_{$drink->price_1000}", null, -1, '/');

                unset($_COOKIE["price_cart_drink_{$drink->id}_{$drink->price_1000}"]);
                setcookie("price_cart_drink_{$drink->id}_{$drink->price_1000}", null, -1, '/');

                unset($_COOKIE["img_cart_drink_{$drink->id}_{$drink->price_1000}"]);
                setcookie("img_cart_drink_{$drink->id}_{$drink->price_1000}", null, -1, '/');
            }
        }
        if (isset($_COOKIE['cart_cost'])) {
            unset($_COOKIE['cart_cost']);
            setcookie('cart_cost', null, -1, '/');
        }
        if (isset($_COOKIE['login'])) {
            $message = "{$_COOKIE['login']}, ваше замовлення сплачено успішно! Дякуємо, що обираєте наші лимонадики";
        }
        else {
            $message = "Ваше замовлення сплачено успішно! Дякуємо, що обираєте наші лимонадики";
        }
        setcookie("message", $message, 0, '/');
        //return view('review_page', ['message' => $message]);
        return redirect()->route('index.host');
    }
}
