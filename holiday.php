<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Праздники</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- верхняя шапка сайта -->
	<header>
		<h1>Проверка праздников бесплатно без СМС</h1>
		<a href="index.php">Главная</a>
	</header>
	<!-- тело сайта -->

	<main>
		<div class="holiday">
		<?php 

			$host = 'localhost';   // Хост, у нас все локально
			$user = 'root';       // Имя созданного вами пользователя
			$password = '';      // Установленный вами пароль пользователю
			$db = 'zd12-2';     // Имя базы данных
			$connect = mysqli_connect($host, $user, $password, $db);        // Соединяемся с базой
			$holi = $_GET["day"]; //берем число из формы
			$sql = mysqli_query($connect, "SELECT * FROM `holidays`");    //подключаемя к таблице "holidays" и берем из нее все
			while($holiday = mysqli_fetch_array($sql)){  //преобразуем данные в массив

			$out;     // введем переменную для вывода

			foreach( $holiday as $holiday["date"] )                   // в цикле переберем все элементы массива по дате
			    if( $holiday["date"] == $holi) {              // если ключ массива равен дате из формы
			        $out = "<b>".$holiday["date"]. date('.Y'). " - " .$holiday["name"]. "</b><br><br>" .$holiday["description"];        // пишем в переменную
			    } elseif( empty( $out ) )                               // иначе, но если только переменная пуста,
			        $out = $holi .' праздников, к сожалению, нет :с'; // заполняем ее 
			} 

			echo $out;

		 ?>
		 </div>

		 <form action="holiday.php" class="main__form" method="GET">
		 	<label for="day">Введите дату, чтобы узнать праздник!</label><br><br>
		 	<input name="day" type="text" placeholder="Например, 09.05">
		 	<input type="submit" class="btn">
		 </form>
		 <br><br>
		 <form action="holiday_day.php" class="main__form" method="GET">
		 	<label for="name">Введите название, чтобы узнать, когда этот праздник!</label><br><br>
		 	<input name="name" type="text" placeholder="Например, День Победы">
		 	<input type="submit" class="btn">
		 </form> 

	</main>

	<footer>
		<?php 
		if($_COOKIE['user'] == !''): //если произведен вход, то будет выводится ссылка на админку, если нет - предложение войти
		?>
		<a href="admin_lk.php">Админка</a>
		<?php else: ?>
		<a href="form_admin.php">Войти в админку</a>	
		<?php endif;?>
	</footer>

</body>
</html>