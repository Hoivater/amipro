<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="AMISTUDIOPRO консультант-помощник в составлении схем амигуруми для вязания крючком">

    %script_top%

    <script src="https://kit.fontawesome.com/de9f65bcf0.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">
	<title>Amistudiopro-вход</title>

</head>
<body class="pStart">
	<div class="container-fluid main p-0 m-0">
		<div class = "page" id = "one">
		<a href = "%name_site%/auth" id="main_auth">
			AMISTUDIOPRO
		</a>
			<!-- 
			<div class="block_auth">
				<a href = "%name_site%/auth" class="enter">
					<img src="%name_site%/resourse/visible/enter.svg" class="enterimg"> Войти
				</a>
			</div> -->
			<div class="">
				<img src = "%name_site%/resourse/visible/bottom.svg" onclick="window.scrollBy(0, window.innerHeight)" class="tops">
			</div>

		</div>

		<div class = "page p-3" id = "two">

				<img src = "%name_site%/resourse/visible/top.svg" onclick="window.scrollBy(0, -window.innerHeight)" class="bottoms">
				<div class="for_text">
					<h2 class="text-center pt-3">AMISTUDIOPRO</h2>
					<p>
						AMISTUDIOPRO - консультант-помощник в составлении схем амигуруми для вязания крючком.
					</p>
					<ul>
						<li>
							Телеграм-бот: регистрироваться и создавать схемы и заметки можно прямо в нем.
						</li>
						<li>
							Быстрый набор схем обыкновенным числовым рядом: 6,12,18...
						</li>
						<li>
							Заметки и памятки.
						</li>
					</ul>
					<img src = "%name_site%/resourse/visible/amicot.png">
					<div class="clean"></div>
				</div>
		</div>

	</div>
</body>

	<script>
		$('a.enter').hover(
		    function { $('img.enterimg').attr('src', '%name_site%/resourse/visible/enter_s.svg'); },
		    function { $('img.enterimg').attr('src', '%name_site%/resourse/visible/enter.svg'); }
		);


		$('#main_auth').circleType({radius:135});

	</script>
%script_bottom%
</html>