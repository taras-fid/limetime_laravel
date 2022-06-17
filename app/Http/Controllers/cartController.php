<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Order;
use Illuminate\Http\Request;

class cartController extends Controller
{

    public function getCatalog() {
        $drinks = new Drink();
        $catalog = $drinks->all();
        $review_obj = new Order();
        $reviews = $review_obj->all();
        return view('index', ['drinks'=>$catalog->sortByDesc('stars')], ['reviews'=>$reviews->sortByDesc('created_at')]);
    }

    public function addCart(Request $request) {
        if(isset($_COOKIE["id_cart_drink_{$request->id}_{$request->price}"])) {
            $quantity_cart_drink = $_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"];
            unset($_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"]);
            setcookie("quantity_cart_drink_{$request->id}_{$request->price}", $quantity_cart_drink+1, 0, '/');

            $price_cart_drink = $_COOKIE["price_cart_drink_{$request->id}_{$request->price}"];
            unset($_COOKIE["price_cart_drink_{$request->id}_{$request->price}"]);
            setcookie("price_cart_drink_{$request->id}_{$request->price}", $price_cart_drink+$request->price, 0, '/');

            $cart_cost = $_COOKIE['cart_cost'] + $request->price;
            unset($_COOKIE['cart_cost']);
            setcookie('cart_cost', $cart_cost, 0, '/');
        }
        else {
            setcookie("id_cart_drink_{$request->id}_{$request->price}", $request->id, 0, '/');
            setcookie("name_cart_drink_{$request->id}_{$request->price}", $request->name, 0, '/');
            setcookie("quantity_cart_drink_{$request->id}_{$request->price}", $request->quantity, 0, '/');
            setcookie("price_cart_drink_{$request->id}_{$request->price}", $request->price, 0, '/');
            setcookie("img_cart_drink_{$request->id}_{$request->price}", $request->img_name, 0, '/');
            if(isset($_COOKIE['cart_cost'])) {
                $cart_cost = $_COOKIE['cart_cost'] + $request->price;
                unset($_COOKIE['cart_cost']);
                setcookie('cart_cost', $cart_cost, 0, '/');
            }
            else {
                setcookie('cart_cost', $request->price, 0, '/');
            }

        }

        session()->flash('success', 'Product is Added to Cart Successfully !');

        $drinks = new Drink();
        $catalog = $drinks->all();
        return redirect()->route('index.host', ['drinks' => $catalog]);
    }

    public function updateCart(Request $request)
    {
        unset($_COOKIE["id_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("id_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("id_cart_drink_{$request->id}_{$request->new_price}", $request->id, 0, '/');

        $name_cart_drink = $_COOKIE["name_cart_drink_{$request->id}_{$request->old_price}"];
        unset($_COOKIE["name_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("name_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("name_cart_drink_{$request->id}_{$request->new_price}", $name_cart_drink, 0, '/');

        if(isset($request->new_quantity)) {
            $quantity_cart_drink = $request->old_quantity + $request->new_quantity;
        }
        else {
            $quantity_cart_drink = $request->old_quantity;
        }
        unset($_COOKIE["quantity_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("quantity_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("quantity_cart_drink_{$request->id}_{$request->new_price}", $quantity_cart_drink, 0, '/');

        unset($_COOKIE["price_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("price_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("price_cart_drink_{$request->id}_{$request->new_price}", $request->new_price*$quantity_cart_drink, 0, '/');

        $img_cart_drink = $_COOKIE["img_cart_drink_{$request->id}_{$request->old_price}"];
        unset($_COOKIE["img_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("img_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("img_cart_drink_{$request->id}_{$request->new_price}", $img_cart_drink, 0, '/');

        $cart_cost = $_COOKIE['cart_cost'] + ($request->new_price - $request->old_price) * $request->old_quantity;
        unset($_COOKIE['cart_cost']);
        setcookie('cart_cost', $cart_cost, 0, '/');


        session()->flash('success', 'Item Cart is Updated Successfully !');

        $drinks = new Drink();
        $catalog = $drinks->all();
        return redirect()->route('index.host', ['drinks' => $catalog]);

    }

    public function removeCart(Request $request)
    {
        unset($_COOKIE["id_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("id_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        unset($_COOKIE["name_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("name_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        $quantity_cart_drink = $_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"];
        unset($_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("quantity_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        unset($_COOKIE["price_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("price_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        unset($_COOKIE["img_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("img_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        $cart_cost = $_COOKIE['cart_cost'] - $request->price*$quantity_cart_drink;
        unset($_COOKIE['cart_cost']);
        setcookie('cart_cost', $cart_cost, 0, '/');
        session()->flash('success', 'Item Cart Remove Successfully !');

        $drinks = new Drink();
        $catalog = $drinks->all();
        return redirect()->route('index.host', ['drinks' => $catalog]);
    }


    // MOBILE //


    public function getCatalogMob() {
        $drinks = new Drink();
        $catalog = $drinks->all();
        return view('mob_cart', ['drinks'=>$catalog->sortByDesc('stars')]);
    }

    public function addCartMob(Request $request) {
        if(isset($_COOKIE["id_cart_drink_{$request->id}_{$request->price}"])) {
            $quantity_cart_drink = $_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"];
            unset($_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"]);
            setcookie("quantity_cart_drink_{$request->id}_{$request->price}", $quantity_cart_drink+1, 0, '/');

            $price_cart_drink = $_COOKIE["price_cart_drink_{$request->id}_{$request->price}"];
            unset($_COOKIE["price_cart_drink_{$request->id}_{$request->price}"]);
            setcookie("price_cart_drink_{$request->id}_{$request->price}", $price_cart_drink+$request->price, 0, '/');

            $cart_cost = $_COOKIE['cart_cost'] + $request->price;
            unset($_COOKIE['cart_cost']);
            setcookie('cart_cost', $cart_cost, 0, '/');
        }
        else {
            setcookie("id_cart_drink_{$request->id}_{$request->price}", $request->id, 0, '/');
            setcookie("name_cart_drink_{$request->id}_{$request->price}", $request->name, 0, '/');
            setcookie("quantity_cart_drink_{$request->id}_{$request->price}", $request->quantity, 0, '/');
            setcookie("price_cart_drink_{$request->id}_{$request->price}", $request->price, 0, '/');
            setcookie("img_cart_drink_{$request->id}_{$request->price}", $request->img_name, 0, '/');
            if(isset($_COOKIE['cart_cost'])) {
                $cart_cost = $_COOKIE['cart_cost'] + $request->price;
                unset($_COOKIE['cart_cost']);
                setcookie('cart_cost', $cart_cost, 0, '/');
            }
            else {
                setcookie('cart_cost', $request->price, 0, '/');
            }

        }

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('catalog.mob');
    }

    public function updateCartMob(Request $request)
    {
        unset($_COOKIE["id_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("id_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("id_cart_drink_{$request->id}_{$request->new_price}", $request->id, 0, '/');

        $name_cart_drink = $_COOKIE["name_cart_drink_{$request->id}_{$request->old_price}"];
        unset($_COOKIE["name_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("name_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("name_cart_drink_{$request->id}_{$request->new_price}", $name_cart_drink, 0, '/');

        if(isset($request->new_quantity)) {
            $quantity_cart_drink = $request->old_quantity + $request->new_quantity;
        }
        else {
            $quantity_cart_drink = $request->old_quantity;
        }
        unset($_COOKIE["quantity_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("quantity_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("quantity_cart_drink_{$request->id}_{$request->new_price}", $quantity_cart_drink, 0, '/');

        unset($_COOKIE["price_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("price_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("price_cart_drink_{$request->id}_{$request->new_price}", $request->new_price*$quantity_cart_drink, 0, '/');

        $img_cart_drink = $_COOKIE["img_cart_drink_{$request->id}_{$request->old_price}"];
        unset($_COOKIE["img_cart_drink_{$request->id}_{$request->old_price}"]);
        setcookie("img_cart_drink_{$request->id}_{$request->old_price}", null, -1, '/');
        setcookie("img_cart_drink_{$request->id}_{$request->new_price}", $img_cart_drink, 0, '/');

        $cart_cost = $_COOKIE['cart_cost'] + ($request->new_price - $request->old_price) * $request->old_quantity;
        unset($_COOKIE['cart_cost']);
        setcookie('cart_cost', $cart_cost, 0, '/');

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.host');

    }

    public function removeCartMob(Request $request)
    {
        unset($_COOKIE["id_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("id_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        unset($_COOKIE["name_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("name_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        $quantity_cart_drink = $_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"];
        unset($_COOKIE["quantity_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("quantity_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        unset($_COOKIE["price_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("price_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        unset($_COOKIE["img_cart_drink_{$request->id}_{$request->price}"]);
        setcookie("img_cart_drink_{$request->id}_{$request->price}", null, -1, '/');

        $cart_cost = $_COOKIE['cart_cost'] - $request->price*$quantity_cart_drink;
        unset($_COOKIE['cart_cost']);
        setcookie('cart_cost', $cart_cost, 0, '/');
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.host');
    }
}
