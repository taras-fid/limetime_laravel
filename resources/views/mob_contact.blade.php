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
	<link rel="stylesheet" href="/css/contact_mob.css">
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
			<div class="main_img"></div>
			<div class="map_img"></div>
		</content/>
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
                            <img src="/img/login_icon.png" alt="">????????????
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
                                <img src="/img/2.png" alt="">0???
                            </a>
                        </button>
                    @else
                        <button onclick="myFunction()" class="cart_btn">
                            <a href="/mob/cart">
                                <img src="/img/2.png" alt="">{{$cart_cost_from_cookie}}???
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
                        <span style="color: #FFD912;">????????'????????????</span> ????????????
                    </a>
                </li>
                <li>
                    <a class="menu_discounts" href="/mob/discount">
                        ??????????
                    </a>
                </li>
                <li>
                    <a class="menu_catalog" href="/mob/katalog">
                        ??????????????
                    </a>
                </li>
                <li>
                    <a class="menu_giftcards" href="/mob/discountcard">
                        <span style="color: #FFD912;">?????????????????????? ????????????</span>
                    </a>
                </li>
                <li>
                    <a class="menu_blog" href="#">
                        ????????
                    </a>
                </li>
                <li>
                    <a class="menu_reviews" href="/mob/reviews">
                        ??????????????
                    </a>
                </li>
                <li>
                    <a class="menu_contacts" href="/mob/contact">
                        ????????????????
                    </a>
                </li>
                <li>
                    <a class="menu_delivery" href="/mob/delivery">
                        ???????????????? ?? ????????????
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu_footer">
            <ul>
                <li style="position: absolute; left: 10%;">
                    <h3><a class="phone_footer" href="tel:+380967777777">+38 (096) <span style="color: #FFD912;">777 77 77</span></a></h3>
                    <div class="phone_call">
                        <h5>???????????????? ??????????????</h5>
                        <img src="/img/footer_line.png" alt="line for div">
                    </div>
                </li>
                <li class="adress">
                    <h5>
                        ??.????????,<br>
                        ??????. ???????????????????? ????????,<br>
                        ??????.81, ????.5
                    </h5>
                </li>
                <li class="polit_conf">
                    <h5>???????????????? ????????????????????????????????</h5>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
