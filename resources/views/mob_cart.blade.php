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
	<link rel="stylesheet" href="/css/cart_mob.css">
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
						<h3>КОРЗИНА</h3>
					</li>
					<li>
						<img src="/img/r_line_page4.png" alt="line for logo">
					</li>
				</ul>
			</div>
			<button onclick="myFunction()" class="menu_btn"></button>
		</header>
        <div class="cart" id="cart">
            <ul>
                @foreach($drinks as $drink)
                    @if(isset($_COOKIE["id_cart_drink_{$drink->id}_{$drink->price_250}"]))
                        <?php ?>
                        <li>
                            <img src="/img/{{$_COOKIE["img_cart_drink_{$drink->id}_{$drink->price_250}"]}}" alt="item icon">
                            <h4>{{$_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_250}"]}}</h4>
                            <h5>{{$_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_250}"]}} по 250 мл<br><br>{{$_COOKIE["price_cart_drink_{$drink->id}_{$drink->price_250}"]}}₴</h5>
                            <form action="{{ route('mob.cart.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $drink->id }}" name="id">
                                <input type="hidden" value="{{ $_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_250}"] }}" name="old_quantity">
                                @if(isset($_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_500}"]))
                                    <input type="hidden" value="{{ $_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_500}"] }}" name="new_quantity">
                                @endif
                                <input type="hidden" value="{{ $drink->price_250 }}" name="old_price">
                                <input type="hidden" value="{{ $drink->price_500 }}" name="new_price">
                                <button class="change_btn">хо ще</button>
                            </form>
                            <form action="{{ route('mob.cart.remove') }}" method="POST" enctype="multipart/form-data">
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
                            <form action="{{ route('mob.cart.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $drink->id }}" name="id">
                                <input type="hidden" value="{{ $_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_500}"] }}" name="old_quantity">
                                @if(isset($_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_1000}"]))
                                    <input type="hidden" value="{{ $_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_1000}"] }}" name="new_quantity">
                                @endif
                                <input type="hidden" value="{{ $drink->price_500 }}" name="old_price">
                                <input type="hidden" value="{{ $drink->price_1000 }}" name="new_price">
                                <button class="change_btn">хо ще</button>
                            </form>
                            <form action="{{ route('mob.cart.remove') }}" method="POST" enctype="multipart/form-data">
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
                            <form action="{{ route('mob.cart.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $drink->id }}" name="id">
                                <input type="hidden" value="{{ $_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_1000}"] }}" name="old_quantity">
                                @if(isset($_COOKIE["name_cart_drink_{$drink->id}_{$drink->price_250}"]))
                                    <input type="hidden" value="{{ $_COOKIE["quantity_cart_drink_{$drink->id}_{$drink->price_250}"] }}" name="new_quantity">
                                @endif
                                <input type="hidden" value="{{ $drink->price_1000 }}" name="old_price">
                                <input type="hidden" value="{{ $drink->price_250 }}" name="new_price">
                                <button class="change_btn">хо менше</button>
                            </form>
                            <form action="{{ route('mob.cart.remove') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $drink->id }}" name="id">
                                <input type="hidden" value="{{ $drink->price_1000 }}" name="price">
                                <button class="del_btn">видалити</button>
                            </form>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="footer" id="footer">
                <button>
                    @if(!$cart_cost_from_cookie)
                        <h4>Сплатити</h4>
                        <h4 style="position: relative; left: 180px; top: -5px;">{{$cart_cost_from_cookie}}₴</h4>
                    @else
                        <a href="/pay">
                            <h4>Сплатити</h4>
                            <h4 style="position: relative; left: 180px; top: -5px;">{{$cart_cost_from_cookie}}₴</h4>
                        </a>
                    @endif
                </button>
            </div>
        </div>
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
