<?php
$login_from_cookie = $_COOKIE['login'] ?? null;
$cart_cost_from_cookie = $_COOKIE['cart_cost'] ?? 0;
if (isset($_COOKIE['mob_pc_ind'])){
    unset($_COOKIE["mob_pc_ind"]);
}setcookie("mob_pc_ind", 'mob', 0, '/');
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
	<link rel="stylesheet" href="/css/katalog_mob.css">
	<script>
		function myFunction() {
			let myDiv = document.getElementById('menu');
			myDiv.classList.remove("menu");
			myDiv.classList.add("menu_active");
			// alert("I am an alert box!");
  		}
		// document.getElementById('page').onclick = function(e) {
		//   if(e.target != document.getElementById('menu')) {
		//       let myDiv = document.getElementById('menu');
		// 	  myDiv.classList.remove("menu_active");
		// 	  myDiv.classList.add("menu");
		//   } else {

		//   }
		// }
	</script>
</head>
<body>
	<div class="page" id="page">
		<header>
			<div class="logo">
				<ul>
					<li>
						<h3>КАТАЛОГ</h3>
					</li>
					<li>
						<img src="/img/r_line_page4.png" alt="line for logo">
					</li>
				</ul>
			</div>
			<button onclick="myFunction()" class="menu_btn"></button>
		</header>
        @if($drinks->isEmpty())
            <h2>
                КАТАЛОГ ПУСТИЙ
            </h2>
        @else
            <div class="positions_container">
                <ul class="positions">
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
                                    <form action="{{ route('mob.cart.add') }}" method="POST" enctype="multipart/form-data">
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
                </ul>
            </div>
        @endif
	</div>
    <div class="menu" id="menu">
        <div class="logo_menu">
            <a class="logo_menu_name" href="/mob">
                <span style="color: #FFD912;">LIME</span>TIME
            </a>
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
                            <a href="/mob/cart">
                                <img src="/img/2.png" alt="">0₴
                            </a>
                        </button>
                    @else
                        <button onclick="myFunction()" class="cart_btn">
                            <a href="/mob/cart">
                                <img src="/img/2.png" alt="">{{$cart_cost_from_cookie}}₴
                            </a>
                        </button>
                    @endif
                </li>
            </ul>
        </div>
        <div>
            <ul class="menu_list">
                <li>
                    <a href="/">
                        <span style="color: #FFD912;">Комп'ютерна</span> версія
                    </a>
                </li>
                <li>
                    <a class="menu_discounts" href="/mob/discount">
                        Акції
                    </a>
                </li>
                <li>
                    <a class="menu_catalog" href="/mob/katalog">
                        Каталог
                    </a>
                </li>
                <li>
                    <a class="menu_giftcards" href="/mob/discountcard">
                        <span style="color: #FFD912;">Подарункові набори</span>
                    </a>
                </li>
                <li>
                    <a class="menu_blog" href="#">
                        Блог
                    </a>
                </li>
                <li>
                    <a class="menu_reviews" href="/mob/reviews">
                        Відгуки
                    </a>
                </li>
                <li>
                    <a class="menu_contacts" href="/mob/contact">
                        Контакти
                    </a>
                </li>
                <li>
                    <a class="menu_delivery" href="/mob/delivery">
                        Доставка і оплата
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu_footer">
            <ul>
                <li style="position: absolute; left: 10%;">
                    <h3><a class="phone_footer" href="tel:+380967777777">+38 (096) <span style="color: #FFD912;">777 77 77</span></a></h3>
                    <div class="phone_call">
                        <h5>Замовити дзвінок</h5>
                        <img src="/img/footer_line.png" alt="line for div">
                    </div>
                </li>
                <li class="adress">
                    <h5>
                        м.Київ,<br>
                        вул. Варшавське шосе,<br>
                        буд.81, кв.5
                    </h5>
                </li>
                <li class="polit_conf">
                    <h5>Політика конфіденційності</h5>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
