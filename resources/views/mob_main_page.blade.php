<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Limetime</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,600&family=Roboto:wght@700&family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/css/main_mob.css">
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
						<a class="logo_name" href="/mob">
							<span style="color: #FFD912;">LIME</span>TIME
						</a>
					</li>
					<li>
						<a class="logo_phone" href="tel:+380967777777">+38 (096) <span style="color: #FFD912;">777 77 77</span></a>
					</li>
				</ul>
			</div>
			<button onclick="myFunction()" class="menu_btn"></button>
		</header>
		<content>
			<div class="limonade_text">
				<ul>
					<li>
						<h2 style="color: white;">Лимонади<br/>на будь-який смак</h2>
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
					щоб ви <span style="font-weight: 600;">пили в радість, а не спеку</span>
				</h5>
			</div>
			<div class="text3_page1">
				<h5>
					Бадьорячі натуральні напої з неймовірними смаками<br />
					Відчуй себе добре після першого ковтка!<br />
					<span style="font-weight: 600;">Сміливі смакові поєднання</span>,<br />
					які невкладаються в голові, але такі приємні на смак <br><br>
				</h5>

				<h5 class="more_info_page1_url">
					<a href="#">Цікаво, що то за лимонадики🤔</a>
				</h5>
				<img src="/img/line2_page1.png" alt="line for url more info aboulemonade">
				<h2>
					60 ₴ / 250 мл
				</h2>
			</div>
			<div class="img_page1">
				<ul>
					<img src="/img/lim3_img.png" alt="">
					<img src="/img/lim4_img.png" alt="">
					<img src="/img/lim2_img.png" alt="">
				</ul>
			</div>
			<button class="btn_page1">
				<a href="/mob/katalog">
					Перейти в каталог
				</a>
			</button>
		</content/>
	</div>
    <div class="menu" id="menu">
        <div class="logo_menu">
            <a class="logo_menu_name" href="/mob">
                <span style="color: #FFD912;">LIME</span>TIME
            </a>
            <ul class="log_cart">
                <li>
                    <a href="/login">
                        <img src="/img/login_icon.png" alt="">Увійти
                    </a>
                </li>
                <li><button onclick="myFunction()" class="cart_btn">
                        <a href="/mob/cart">
                            <img src="/img/2.png" alt="">180₴
                        </a>
                    </button>
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
