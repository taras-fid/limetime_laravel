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
        textarea {
            position: absolute;
            width: 300px;
            height: 45px;
            left: 0px;
            background: rgba(255,255,255,0.0);
            border: none;

            font-family: 'Montserrat';
            font-weight: 100;
            font-size: 14px;
            line-height: 20px;
            color: white;
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
                <form action="/review/check" method="POST"">
                    @csrf
                    @if($login_from_cookie)
                        <ul class="log_in_box">
                            <h2 class="pay_title">Хочете залишити відгук?</h2>
                            <h4 style="left: 0px; top: 0px; font-size: 8px"> на скільки зірочок із 5 ви б оцінили наші лимонадики? </h4>
                            <li>
                                <input type="number" min="1" max="5" name="stars" placeholder="★ Впишіть сюди к-сть зірочок" />
                            </li>
                            <li style=" top: 17px; width: 300px; height: 200px;">
                                <textarea  style=" height: 200px;" maxlength="220" name="text" placeholder=" ваш відгук, {{$login_from_cookie}} ;)"></textarea>
                            </li>
                            <button style=" top: 30px; left: 20px; width: 100px; font-size: 20px;" type="submit">хочу</button>
                            <form action="/pay/cancel" method="POST">
                                <button style=" top: 30px; background-color: red; left: 80px; width: 100px; font-size: 20px;" type="submit">не хочу</button>
                            </form>
                            @if($errors)
                                @foreach($errors as $error)
                                    <h2 style="position:relative; top: 50px; color: red; font-size: 20px;">ERROR: {{$error}}</h2>
                                @endforeach
                            @endif
                        </ul>
                    @else
                        <ul class="log_in_box">
                            <h2 class="pay_title">Хочете залишити відгук?</h2>
                            <h4 style="left: 0px; top: 0px; font-size: 8px"> на скільки зірочок із 5 ви б оцінили наші лимонадики? </h4>
                            <li>
                                <input type="number" min="1" max="5" name="stars" placeholder="★ Впишіть сюди к-сть зірочок" />
                            </li>
                            <li style=" top: 17px; width: 300px; height: 200px;">
                                <textarea  style=" height: 200px;" maxlength="220" name="text" placeholder=" ваш відгук;)"></textarea>
                            </li>
                            <button style=" top: 30px; left: 20px; width: 100px; font-size: 20px;" type="submit">хочу</button>
                            <div style=" position: relative; height: 45px; left: 180px; width: 100px; top: -13px; border-radius: 5px; background-color: red; text-align: center">
                                <a href="/review/cancel" style="position: relative; top: 10px; font-size: 18px; color: black; font-family: 'Montserrat'; font-weight: 400; letter-spacing: 0.00001em;">
                                    не хочу
                                </a>
                            </div>
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
