<?php
$login_from_cookie = $_COOKIE['login'] ?? null;
$cart_cost_from_cookie = $_COOKIE['cart_cost'] ?? 0;
$message = $_COOKIE['message'] ?? null;
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
	<link rel="stylesheet" href="/css/main.css">
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
	<div class="outside_cart" id="outside_cart">
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
							<a class="menu_discounts" href="#page3">
								Акції
							</a>
						</li>
						<li>
							<a class="menu_catalog" href="/catalog">
								Каталог
							</a>
						</li>
						<li>
							<a class="menu_giftcards" href="#page3">
								<span style="color: #FFD912;">Подарункові набори</span>
							</a>
						</li>
						<li>
							<a class="menu_blog" href="#">
								Блог
							</a>
						</li>
						<li>
							<a class="menu_reviews" href="#page4">
								Відгуки
							</a>
						</li>
						<li>
							<a class="menu_contacts" href="#page6">
								Контакти
							</a>
						</li>
						<li>
							<a class="menu_delivery" href="#page5">
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
		<main_section id="main_section" class="main_section">
			<div class="container_page_1_2">
				<div class="page_1" id="page_1">
                    @if($message)
                        <h2 style="background-color: lightgreen; text-align: center" >{{$message}}</h2>
                        <?php unset($_COOKIE['message']); setcookie('message', null, -1, '/'); ?>
                    @endif
					<div class="limonade_text">
						<ul>
							<li>
								<h2 style="color: white; margin-left: 1.5px;">Лимонади<br />на будь-який смак</h2>
							</li>
							<li style="color: #FFD912;">
								<h2>Лимонади<br />на будь-який смак</h2>
							</li>
						</ul>
					</div>
					<div class="text2_page1">
						<h5>
							У нас Ви знайдете саме <span style="color: #FFD912;">Свій</span> лимонад<br />
							Ми дбаємо про наших клієнтів і зробимо все,<br />
							щоб ви <span style="font-weight: 600;">пили в радість, а не в спеку</span>
						</h5>
					</div>
					<button class="btn_page1">
						<a href="/catalog">
							Перейти в каталог
						</a>
					</button>
					<div class="img_page1"></div>
					<div class="text3_page1">
						<h5>
							Бадьорячі натуральні напої з неймовірними смаками<br />
							Відчуй себе добре після першого ковтка!<br />
							<span style="font-weight: 600;">Сміливі смакові поєднання</span>,<br />
							які невкладаються в голові, але такі приємні на смак
						</h5>
						<h5 class="more_info_page1_url">
							<a href="#">Цікаво, що то за лимонадики🤔</a>
						</h5>
						<img src="/img/line2_page1.png" alt="line for url more info about lemonade">
						<h2>
							30 ₴ / 250 мл
						</h2>
					</div>
				</div>
				<div class="page_2" id="page_2">
					<div class="hits_logo">
						<h2>
							Хіти продажу
						</h2>
                        @if($drinks->isEmpty())
                            <h2>
                                КАТАЛОГ ПУСТИЙ
                            </h2>
                        @endif
						<img src="/img/line_logo_page2.png" alt="line for hits logo">
					</div>
                    @if(!$drinks->isEmpty())
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
                                                        <form action="{{ route('index.cart.add') }}" method="POST" enctype="multipart/form-data">
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
                        <button class="btn_page1" style="left: 60%; top: 15%; width: 300px; height: 7.5%;">
                            <a href="/catalog" style="font-weight: 400; font-size: 20px; width: 300px; height: 7.5%;">
                                Перейти в каталог
                            </a>
                        </button>
                    @endif
				</div>
			</div>
			<page_3_bg>
				<div class="page3" id="page3">
					<ul class="logo_page_3">
						<ul>
							<li><img src="/img/line_sale.png" alt="line for sale`s logo"></li>
							<li><h3>Акції та пропозиції</h3></li>
						</ul>
						<h4>😎Клуб пошановувачів лимонаду😎</h4>
					</ul>
					<h5>
						Вступи й отримай 3  порції за ціною 2 регулярно,<br>
						підібраних спеціально для тебя,<br>
						з БЕЗКОШТОВНОЮ доставкою по Києву<br>
						(тарифи від 1200₴ в місяць).
					</h5>
					<button class="btn_page1" style=" top: 50%;"><a href="#" style="font-weight: 400;">Подати заявку</a></button>
					<img src="/img/bottle_page3.png" class="img_page_3" alt="">
                    <button class="btn_page1" style="top: 60%;">
                        <a href="#">
                        Більше акційних пропозицій
                        </a>
                    </button>
				</div>
			</page_3_bg>
			<page_4_bg>
				<div class="page4" id="page4">
					<ul class="page_logo">
						<li style="position: relative; left: -8.5px;"><img src="/img/l_line_page4.png" alt="left line for page logo"></li>
						<li>
							<h3>Відгуки</h3>
						</li>
						<li><img src="/img/r_line_page4.png" alt="right line for page logo"></li>
					</ul>
                    <ul class="page4_pos_4">
                        @foreach($reviews as $review)
                            @if($review->stars)
                                <li>
                                    <ul class="review_infobox">
                                        <img class="user_icon" src="/img/login_icon.png" alt="customer`s icon pic">
                                        @if($review->user)
                                            <h5>{{$review->user->login}}</h5>
                                        @else
                                            <h5>Анонімний лимонадофан</h5>
                                        @endif
                                        @if($review->stars)
                                            <ul class="stars_row">
                                                @for($b = 0; $b < $review->stars; $b++)
                                                    <img src="/img/star_icon.png" alt="">
                                                @endfor
                                            </ul>
                                        @endif
                                        <button>Докладніше</button>
                                    </ul>
                                    <h5 class="review_text">
                                        {{$review->review_text}}
                                    </h5>
                                </li>
                            @endif
                       @endforeach
                    </ul>
				</div>
			</page_4_bg>
			<page_5_bg>
				<div class="page5" id="page5">
					<ul class="logo">
						<h3>Доставка і оплата</h3>
						<img src="/img/delivery_line.png" alt="fade line">
					</ul>
					<ul class="logo_text">
						<h3>твій лимонад за<br><span style="font-size: 30px; color: #DFFF12;">30 хвилин*</span></h3>
					</ul>
					<ul class="text_list">
						<ul class="t_1">
							<h4>
								<span style="font-weight: 600; font-size: 20px;">Оплата</span>
	 							<span style="font-size: 5px;"><br></span>
								Заплатити за своє задоволення ви можете
								<span style="color: #DFFF12; font-weight: 200;">бонусами</span> з власного рахунку
								<br>карткою <span style="color: #DFFF12; font-weight: 200;">Visa/Mastercard
								<br>Paypal</span>/Webmoney<br>
								<span style="color: #DFFF12; font-weight: 200;">криптовалютами</span> мереж bsc/btc/eth/poligon
							</h4>
						</ul>
						<ul class="t_2">
							<h4>
								<span style="font-weight: 600; font-size: 20px;">Доставка</span>
	 							<span style="font-size: 5px;"><br></span>
								нашим надійним компаньйоном, який привезе
								вам лимонад буде дружелюбний кур’єр <span style="color: #DFFF12; font-weight: 200";>Glovo</span>
							</h4>
						</ul>
						<ul class="t_3">
							<h4>
								<span style="font-weight: 600; font-size: 20px;">Заберу самостійно!!!</span>
	  							<span style="font-size: 5px;"><br></span>
								Ми завжди раді бачити вас у себе,<br>
								навіть на пару хвилин<br>34
								подаруємо вам <span style="color: #DFFF12; font-weight: 200;">знижку в 10%</span> за ваш час💛
							</h4>
						</ul>
						<ul class="t_4">
							<h4>
								*швидка доставка входить в рахунок замовлення<br><span style="color: #DFFF12; font-weight: 200;">безкоштовно</span> привеземо замовлення від 500₴
							</h4>
						</ul>
					</ul>
				</div>
			</page_5_bg>
			<page_6_bg>
				<div class="page6" id="page6">
					<ul class="contacts_img_list">
						<img src="/img/contact_img.png" class="img1" alt="contacts 1st img">
						<img src="/img/map_img.png" class="img2" alt="contacts 2nd img">
					</ul>
					<ul class="logo_contact">
						<h3>Контакти</h3>
						<img src="/img/l_line_page4.png" alt="left line for 2nd page logo" style="transform: rotate(180deg);">
					</ul>
				</div>
			</page_6_bg>
		</main_section>
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
	</div>
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
                        <form action="{{ route('index.cart.update') }}" method="POST" enctype="multipart/form-data">
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
                        <form action="{{ route('index.cart.remove') }}" method="POST" enctype="multipart/form-data">
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
                        <form action="{{ route('index.cart.update') }}" method="POST" enctype="multipart/form-data">
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
                        <form action="{{ route('index.cart.remove') }}" method="POST" enctype="multipart/form-data">
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
                        <form action="{{ route('index.cart.update') }}" method="POST" enctype="multipart/form-data">
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
                        <form action="{{ route('index.cart.remove') }}" method="POST" enctype="multipart/form-data">
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
