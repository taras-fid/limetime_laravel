<?php
$login_from_cookie = $_COOKIE['login'] ?? null;
$cart_cost_from_cookie = $_COOKIE['cart_cost'] ?? 0;
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
	<link rel="stylesheet" href="/css/main.css">
    <style>
        input {
            position: absolute;
            width: 260px;
            height: 45px;
            left: 40px;
            background: rgba(255,255,255,0.0);
            border: none;

            font-family: 'Montserrat';
            font-weight: 100;
            font-size: 14px;
            line-height: 20px;
            color: white;
        }
        *:focus {
            outline: none;
        }
        ::placeholder {
            color: #E0E0E0;
        }
    </style>
</head>
<body>
	<main_section id="main_section" class="main_section">
		<page_4_bg>
			<div class="log_in_page">
                <header id="header" class="header">
                    <div class="container">
                        <div class="nav">
                            <ul class="logo">
                                <li>
                                    @if(isset($_COOKIE['mob_pc_ind']))
                                        @if($_COOKIE['mob_pc_ind'] === 'pc')
                                            <a class="logo_name" href="/">
                                                <span style="color: #FFD912;">Lime</span>Time
                                            </a>
                                        @else
                                            <a class="logo_name" href="/mob">
                                                <span style="color: #FFD912;">Lime</span>Time
                                            </a>
                                        @endif
                                    @endif
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
                <form action="/pay/check" method="POST" option="#credit">
                    @csrf
                    @if($login_from_cookie)
                        <ul class="log_in_box">
                            <h2 class="pay_title">Реквізити оплати</h2>
                            <h5 style="color: white; top: 0px; left: -160px; font-size: 13px">ви маєте {{$user}} бонусів</h5>
                            <li>
                                <input style="left: 0px; width: 300px; font-size: 13px" type="number" min="1" max="{{$cart_cost_from_cookie}}" name="bonus" placeholder=" Впишіть сюди к-сть бонусів (1 бонус = 1₴)" />
                            </li>
                            <li>
                                <img src="/img/card_icon.png" alt="card icon">
                                <input type="number" pattern="[0-9]*" name="card" placeholder="7777 7777 7777 7777" />
                            </li>
                            <li style=" top: 17px; width: 120px;">
                                <img src="/img/date_icon.png" alt="password icon">
                                <input style="width: 60px;" type="text" name="date" placeholder="06 / 24" />
                            </li>
                            <li style=" top: -30px; left: 180px; width: 120px;">
                                <img src="/img/cvc_icon.png" alt="password icon">
                                <input style="width: 60px;" type="password" name="cvc" placeholder="CVC" />
                            </li>
                            <button style=" top: 0px; font-size: 20px;" type="submit">Сплатити</button>
                            @if($errors)
                                @foreach($errors as $error)
                                    <h2 style="position:relative; top: 50px; color: red; font-size: 20px;">ERROR: {{$error}}</h2>
                                @endforeach
                            @endif
                        </ul>
                    @else
                        <ul class="log_in_box">
                            <h2 class="pay_title">Реквізити оплати</h2>
                            <li>
                                <img src="/img/card_icon.png" alt="card icon">
                                <input type="number" pattern="[0-9]*" name="card" placeholder="7777 7777 7777 7777" />
                            </li>
                            <li style=" top: 17px; width: 120px;">
                                <img src="/img/date_icon.png" alt="password icon">
                                <input style="width: 60px;" type="text" name="date" placeholder="06 / 24" />
                            </li>
                            <li style=" top: -30px; left: 180px; width: 120px;">
                                <img src="/img/cvc_icon.png" alt="password icon">
                                <input style="width: 60px;" type="password" name="cvc" placeholder="CVC" />
                            </li>
                            <button style=" top: 0px; font-size: 20px;" type="submit">Сплатити</button>
                            @if($errors)
                                @foreach($errors as $error)
                                    <h2 style="position:relative; top: 50px; color: red; font-size: 20px;">ERROR: {{$error}}</h2>
                                @endforeach
                            @endif
                        </ul>
                    @endif
                </form>
			</div>
		</page_4_bg>
	</main_section>
</body>
</html>
