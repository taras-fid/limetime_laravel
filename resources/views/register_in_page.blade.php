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
				<div class="header_log">
					<a href="/">
						<span style="color: #FFD912;">Lime</span>Time
					</a>
				</div>
                <form action="/register/check" method="POST">
                    @csrf
                    <ul class="log_in_box">
                        <li>
                            <img src="/img/user_icon.png" alt="password icon">
                            <input type="text" name="login" placeholder="ЛОГІН.." />
                        </li>
                        <li style=" top: 17px;">
                            <img src="/img/password_icon.png" alt="password icon">
                            <input type="password" name="password" placeholder="ПАРОЛЬ.." />
                        </li>
                        <li style=" top: 34px;">
                            <img src="/img/password_icon.png" alt="password icon">
                            <input type="password" name="rep_password" placeholder="ПАРОЛЬ.." />
                        </li>
                        <a href="/login"><h5 style="top: 40px;">Увійти</h5></a>
                        <button style=" top: 45px;" type="submit">Зареєструватись</button>
                        @if($errors)
                            @foreach($errors as $error)
                                <h2 style="position:relative; top: 50px; color: red; font-size: 20px;">ERROR: {{$error}}</h2>
                            @endforeach
                        @endif
                    </ul>
                </form>
			</div>
		</page_4_bg>
	</main_section>
</body>
</html>
