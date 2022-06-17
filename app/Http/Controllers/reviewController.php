<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class reviewController extends Controller
{
    public function review_post(Request $request) {
        $order_obj = new Order();
        $orders = $order_obj->all();
        if ($orders->isEmpty()) {
            $id_order = 1;
        }
        else {
            $last_order = $orders[count($orders)-1];
            $id_order = $last_order->order_id;
        }
        $stars = $request -> input('stars');
        $text = $request -> input('text');
        $errors = array();
        if($stars > 5 || $stars < 1) {
            array_push($errors, 'stars num must be 1-5 value');
        }
        if (count($errors) === 0) {
            if(isset($_COOKIE['login'])) {
                $user_obj = new User();
                $users = $user_obj->all();
                foreach ($users as $user) {
                    if($user->login == isset($_COOKIE['login'])) {
                        $user->bonus = $user->bonus + $_COOKIE['cart_cost']*0.1;
                        $user->save();
                        $id_user = $user->id;
                    }
                }
            }
            else {
                $id_user = null;
            }
            $drink_obj = new Drink();
            $drinks = $drink_obj->all();
            $revInd = true;
            foreach ($drinks as $drink) {
                $rev_ind = true;
                if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_250}"])) {
                    if ($revInd) {
                        $revInd = false;
                        DB::table('orders')->insert([
                            [
                                'order_id' => $id_order,
                                'user_id' => $id_user,
                                'drink_id' => $drink->id,
                                'price' => $drink->price_250,
                                'review_text' => $text,
                                'stars' => $stars,
                                "created_at" => Carbon::now(), # new \Datetime()
                                "updated_at" => Carbon::now(),  # new \Datetime()
                            ],
                        ]);
                    } else {
                        DB::table('orders')->insert([
                            [
                                'order_id' => $id_order,
                                'user_id' => $id_user,
                                'drink_id' => $drink->id,
                                'price' => $drink->price_250,
                                'review_text' => null,
                                'stars' => null,
                                "created_at" => Carbon::now(), # new \Datetime()
                                "updated_at" => Carbon::now(),  # new \Datetime()
                            ],
                        ]);
                    }
                    if ($rev_ind) {
                        if ($drink->stars) {
                            $old_stars = $drink->stars * $drink->rev_count;
                            $drink->rev_count = $drink->rev_count + 1;
                            $new_stars = ($old_stars + $stars) / $drink->rev_count;
                            $drink->stars = $new_stars;
                            $rev_ind = false;
                        } else {
                            $drink->stars = $stars;
                            $drink->rev_count = 1;
                        }
                        $drink->save();
                    }
                }
                if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_500}"])) {
                    if ($revInd) {
                        $revInd = false;
                        DB::table('orders')->insert([
                            [
                                'order_id' => $id_order,
                                'user_id' => $id_user,
                                'drink_id' => $drink->id,
                                'price' => $drink->price_500,
                                'review_text' => $text,
                                'stars' => $stars,
                                "created_at" => Carbon::now(), # new \Datetime()
                                "updated_at" => Carbon::now(),  # new \Datetime()
                            ],
                        ]);
                    } else {
                        DB::table('orders')->insert([
                            [
                                'order_id' => $id_order,
                                'user_id' => $id_user,
                                'drink_id' => $drink->id,
                                'price' => $drink->price_500,
                                'review_text' => null,
                                'stars' => null,
                                "created_at" => Carbon::now(), # new \Datetime()
                                "updated_at" => Carbon::now(),  # new \Datetime()
                            ],
                        ]);
                    }
                    if ($rev_ind) {
                        if ($drink->stars) {
                            $old_stars = $drink->stars * $drink->rev_count;
                            $drink->rev_count = $drink->rev_count + 1;
                            $new_stars = ($old_stars + $stars) / $drink->rev_count;
                            $drink->stars = $new_stars;
                            $rev_ind = false;
                        } else {
                            $drink->stars = $stars;
                            $drink->rev_count = 1;
                        }
                        $drink->save();
                    }
                }
                if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_1000}"])) {
                    if ($revInd) {
                        $revInd = false;
                        DB::table('orders')->insert([
                            [
                                'order_id' => $id_order,
                                'user_id' => $id_user,
                                'drink_id' => $drink->id,
                                'price' => $drink->price_1000,
                                'review_text' => $text,
                                'stars' => $stars,
                                "created_at" => Carbon::now(), # new \Datetime()
                                "updated_at" => Carbon::now(),  # new \Datetime()
                            ],
                        ]);
                    } else {
                        DB::table('orders')->insert([
                            [
                                'order_id' => $id_order,
                                'user_id' => $id_user,
                                'drink_id' => $drink->id,
                                'price' => $drink->price_1000,
                                'review_text' => null,
                                'stars' => null,
                                "created_at" => Carbon::now(), # new \Datetime()
                                "updated_at" => Carbon::now(),  # new \Datetime()
                            ],
                        ]);
                    }
                    if ($rev_ind) {
                        if ($drink->stars) {
                            $old_stars = $drink->stars * $drink->rev_count;
                            $drink->rev_count = $drink->rev_count + 1;
                            $new_stars = ($old_stars + $stars) / $drink->rev_count;
                            $drink->stars = $new_stars;
                            $rev_ind = false;
                        } else {
                            $drink->stars = $stars;
                            $drink->rev_count = 1;
                        }
                        $drink->save();
                    }
                }
            }
            return $this->deleteAllCookies();
        }
        else {
            return view('review_page', ['errors' => $errors]);
        }
    }

    public function review_cancel() {
        $order_obj = new Order();
        $orders = $order_obj->all();
        if ($orders->isEmpty()) {
            $id_order = 1;
        }
        else {
            $last_order = $orders[count($orders)-1];
            $id_order = $last_order->order_id;
        }
        if(isset($_COOKIE['login'])) {
            $user_obj = new User();
            $users = $user_obj->all();
            foreach ($users as $user) {
                if($user->login == isset($_COOKIE['login'])) {
                    $user->bonus = $user->bonus + $_COOKIE['cart_cost']*0.1;
                    $user->save();
                    $id_user = $user->id;
                }
            }
        }
        else {
            $id_user = null;
        }
        $drink_obj = new Drink();
        $drinks = $drink_obj->all();
        foreach ($drinks as $drink) {
            if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_250}"])) {
                DB::table('orders')->insert([
                    [
                        'order_id' => $id_order,
                        'user_id' => $id_user,
                        'drink_id' => $drink->id,
                        'price' => $drink->price_250,
                        'review_text'=> null,
                        'stars'=> null,
                        "created_at" =>  Carbon::now(), # new \Datetime()
                        "updated_at" => Carbon::now(),  # new \Datetime()
                    ],
                ]);
            }
            if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_500}"])) {
                DB::table('orders')->insert([
                    [
                        'order_id' => $id_order,
                        'user_id' => $id_user,
                        'drink_id' => $drink->id,
                        'price' => $drink->price_500,
                        'review_text'=> null,
                        'stars'=> null,
                        "created_at" =>  Carbon::now(), # new \Datetime()
                        "updated_at" => Carbon::now(),  # new \Datetime()
                    ],
                ]);
            }
            if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_1000}"])) {
                DB::table('orders')->insert([
                    [
                        'order_id' => $id_order,
                        'user_id' => $id_user,
                        'drink_id' => $drink->id,
                        'price' => $drink->price_1000,
                        'review_text'=> null,
                        'stars'=> null,
                        "created_at" =>  Carbon::now(), # new \Datetime()
                        "updated_at" => Carbon::now(),  # new \Datetime()
                    ],
                ]);
            }
        }
        return $this->deleteAllCookies();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAllCookies(): \Illuminate\Http\RedirectResponse
    {
        $drink_obj = new Drink();
        $drinks = $drink_obj->all();
        foreach ($drinks as $drink) {
            if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_250}"])) {
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

            if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_500}"])) {
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

            if (isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_1000}"])) {
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
        } else {
            $message = "Ваше замовлення сплачено успішно! Дякуємо, що обираєте наші лимонадики";
        }
        setcookie("message", $message, 0, '/');
        if ($_COOKIE['mob_pc_ind'] === 'pc'){
            return redirect()->route('index.host');
        }
        else {
            return redirect()->route('mob.host');
        }
    }
}
