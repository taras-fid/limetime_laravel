<?php
$login_from_cookie = $_COOKIE['login'] ?? null;
$cart_cost_from_cookie = $_COOKIE['cart_cost'] ?? 0;
if (isset($_COOKIE['mob_pc_ind'])){
    unset($_COOKIE["mob_pc_ind"]);
}setcookie("mob_pc_ind", 'pc', 0, '/');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Limetime</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,600&family=Roboto:wght@700&family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/css/catalog.css">
	<script>
        function myFunction() {
            let myDiv = document.getElementById('cart');
            myDiv.classList.remove("cart");
            myDiv.classList.add("cart_active");
            // alert("I am an alert box!");
        }
        // document.getElementById('outside_cart').onclick = function(e) {
        //   if(e.target != document.getElementById('cart')) {
        //       let myDiv = document.getElementById('cart');
        // 	  myDiv.classList.remove("cart_active");
        // 	  myDiv.classList.add("cart");
        //   } else {

        //   }
        // }
	</script>
</head>
<body>
    <header id="header" class="header">
    <div class="container">
        <div class="nav">
            <ul class="logo">
                <li>
                    <a class="logo_name" href="/">
                        <span style="color: #FFD912;">Lime</span>Time
                    </a>
                </li>
                <li>
                    <a class="logo_phone" href="tel:+380967777777">+38 (096) <span style="color: #FFD912;">777 77 77</span></a>
                </li>
            </ul>
            <ul class="menu">
                <li>
                    <a href="/mob">
                        <span style="color: #FFD912;">Мобільна</span> версія
                    </a>
                </li>
                <li>
                    <a class="menu_discounts" href="/#page3">
                        Акції
                    </a>
                </li>
                <li>
                    <a class="menu_catalog" href="/catalog">
                        Каталог
                    </a>
                </li>
                <li>
                    <a class="menu_giftcards" href="/#page3">
                        <span style="color: #FFD912;">Подарункові набори</span>
                    </a>
                </li>
                <li>
                    <a class="menu_blog" href="#">
                        Блог
                    </a>
                </li>
                <li>
                    <a class="menu_reviews" href="/#page4">
                        Відгуки
                    </a>
                </li>
                <li>
                    <a class="menu_contacts" href="/#page6">
                        Контакти
                    </a>
                </li>
                <li>
                    <a class="menu_delivery" href="/#page5">
                        Доставка і оплата
                    </a>
                </li>
            </ul>
            <ul class="log_cart">
                <li>
                    @if(!$login_from_cookie)
                        <a href="/login">
                            <img src="/img/login_icon.png" alt="">Увійти
                        </a>
                    @else
                        <a href="/login">
                            <img src="/img/login_icon.png" alt="">{{$login_from_cookie}}
                        </a>
                    @endif
                </li>
                <li>
                    @if(!$cart_cost_from_cookie)
                        <button onclick="myFunction()" class="cart_btn">
                            <a href="#">
                                <img src="/img/2.png" alt="">0₴
                            </a>
                        </button>
                    @else
                        <button onclick="myFunction()" class="cart_btn">
                            <a href="#">
                                <img src="/img/2.png" alt="">{{$cart_cost_from_cookie}}₴
                            </a>
                        </button>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</header>
	<div class="page" id="page">
        <div class="logo_catalog">
            <img src="/img/line_sale.png" alt="line for sale`s logo">
            <h3>КАТАЛОГ@if($drinks->isEmpty()) ПУСТИЙ@endif</h3>
            <img src="/img/line_sale.png" alt="line for sale`s logo" style=" transform: rotate(-180deg);">
        </div>
        <ul class="positions">
            @if(!$drinks->isEmpty())
                @foreach($drinks as $drink)
                    <li>
                        <div class="pos_1">
                            <ul class="stars_row">
                                @if($drink->stars)
                                    @for($i = 0; $i < intval($drink->stars); $i++)
                                        <li><img src="/img/star_icon.png" alt=""></li>
                                    @endfor
                                @endif
                                <ul class="pos_reviews">
                                    @if($drink->rev_count)
                                        <h5>
                                            Відгуки: {{$drink->rev_count}}
                                        </h5>
                                        <img src="/img/line_reviews_pos.png" alt="">
                                    @else
                                        <h5>
                                            Відгуки: 0
                                        </h5>
                                        <img src="/img/line_reviews_pos.png" alt="">
                                    @endif
                                </ul>
                            </ul>
                            <img class="img_for_pos" src="/img/{{$drink->img_name}}" alt="limonade 1">
                            <ul class="name_price_pos">
                                <li>
                                    <h3>
                                        {{$drink->name}}
                                    </h3>
                                </li>
                                <li>
                                    <h4>
                                        <br>
                                        {{$drink->price_250}}₴/{{$drink->price_500}}₴/{{$drink->price_1000}}₴
                                        <br>
                                    </h4>
                                </li>
                            </ul>
                            <ul class="btn_box">
                                <li>
                                    <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $drink->id }}" name="id">
                                        <input type="hidden" value="{{ $drink->name }}" name="name">
                                        <input type="hidden" value="{{ $drink->price_250 }}" name="price">
                                        <input type="hidden" value="{{ $drink->img_name }}" name="img_name">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="buy_btn_pos_page2">придбати</button>
                                    </form>
                                </li>
                                <li>
                                    <button class="reserv_btn_pos_page2">відкласти</button>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
	</div>
    <footer id="footer" class="footer">
        <div class="footer_container">
            <ul>
                <li>
                    <p class="logo_name_footer" style="font-family: 'Montserrat';"><span style="color: #FFD912;">Lime</span>Time</p>
                    <ul class="adress">
                        <li><h5>м.Київ</h5></li>
                        <li><h5>вул. Варшавське шосе</h5></li>
                        <li><h5>буд.81, кв.5</h5></li>
                    </ul>
                </li>
            </ul>
            <ul class="polit_conf">
                <h5 style="font-weight: 300; letter-spacing: 0.05em; font-size: 15px;">Політика конфіденційності</h5>
            </ul>
            <ul>
                <h3><a class="phone_footer" href="tel:+380967777777">+38 (096) <span style="color: #FFD912;">777 77 77</span></a></h3>
                <div class="phone_call">
                    <h5>Замовити дзвінок</h5>
                    <img src="/img/footer_line.png" alt="line for div">
                </div>
            </ul>
        </div>
    </footer>
    <div class="cart" id="cart">
        <h3>
            Корзина
        </h3>
        <img src="/img/r_line_page4.png" alt="cart line img">
        <ul>
            @foreach($drinks as $drink)
                @if(isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_250}"]))
                    <?php ?>
                    <li>
                        <img src="/img/{{$_COOKIE["img_cart_drink_{$drink->id}_{$drink->price_250}"]}}" alt="item icon">
                        <h4>{{$_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_250}"]}}</h4>
                        <h5>{{$_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_250}"]}} по 250 мл<br><br>{{$_COOKIE["price_cart_drink_{$drink->id}_{$drink->price_250}"]}}₴</h5>
                        <form action="{{ route('cart.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $drink->id }}" name="id">
                            <input type="hidden" value="{{ $drink->price_250 }}" name="old_price">
                            <input type="hidden" value="{{ $drink->price_500 }}" name="new_price">
                            <button class="change_btn">хо ще</button>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $drink->id }}" name="id">
                            <input type="hidden" value="{{ $drink->price_250 }}" name="price">
                            <button class="del_btn">видалити</button>
                        </form>
                    </li>
                @endif
                @if(isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_500}"]))
                    <li>
                        <img src="/img/{{$_COOKIE["img_cart_drink_{$drink->id}_{$drink->price_500}"]}}" alt="item icon">
                        <h4>{{$_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_500}"]}}</h4>
                        <h5>{{$_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_500}"]}} по 500 мл<br><br>{{$_COOKIE["price_cart_drink_{$drink->id}_{$drink->price_500}"]}}₴</h5>
                        <form action="{{ route('cart.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $drink->id }}" name="id">
                            <input type="hidden" value="{{ $drink->price_500 }}" name="old_price">
                            <input type="hidden" value="{{ $drink->price_1000 }}" name="new_price">
                            <button class="change_btn">хо ще</button>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $drink->id }}" name="id">
                            <input type="hidden" value="{{ $drink->price_500 }}" name="price">
                            <button class="del_btn">видалити</button>
                        </form>
                    </li>
                @endif
                @if(isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_1000}"]))
                    <li>
                        <img src="/img/{{$_COOKIE["img_cart_drink_{$drink->id}_{$drink->price_1000}"]}}" alt="item icon">
                        <h4>{{$_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_1000}"]}}</h4>
                        <h5>{{$_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_1000}"]}} по 1000 мл<br><br>{{$_COOKIE["price_cart_drink_{$drink->id}_{$drink->price_1000}"]}}₴</h5>
                        <form action="{{ route('cart.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $drink->id }}" name="id">
                            <input type="hidden" value="{{ $drink->price_1000 }}" name="old_price">
                            <input type="hidden" value="{{ $drink->price_250 }}" name="new_price">
                            <button class="change_btn">хо менше</button>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $drink->id }}" name="id">
                            <input type="hidden" value="{{ $drink->price_1000 }}" name="price">
                            <button class="del_btn">видалити</button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>
        <button class="cart_btn">
            @if(!$cart_cost_from_cookie)
                <ul class="total_price_cart" style="left: 0px">
                    <h4>Сплатити</h4>
                    <h5>{{$cart_cost_from_cookie}}₴</h5>
                </ul>
            @else
                <a href="/pay">
                    <ul class="total_price_cart" style="left: 0px">
                        <h4>Сплатити</h4>
                        <h5>{{$cart_cost_from_cookie}}₴</h5>
                    </ul>
                </a>
            @endif
        </button>
    </div>
    <div class="teleport">
        <a href="/mob">Використайте мобільну версію, будь ласка, вам буде зручніше</a>
    </div>
</body>
</html>
