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
			$name = $_GET["name"]; //название праздника берем из формы
			$sql = mysqli_query($connect, "SELECT * FROM `holidays`");    //подключаемя к таблице "holidays" и берем из нее все
			while($holiday = mysqli_fetch_array($sql)){  //преобразуем данные в массив

			$out;     // введем переменную для вывода

			foreach( $holiday as $holiday["name"] )                   // в цикле переберем все элементы массива по дате
			    if( $holiday["name"] == $name) {              // если ключ массива равен названию из формы
			        $out = "<b>".$holiday["name"]. " - " .$holiday["date"]. date('.Y'). "</b><br><br>" .$holiday["description"];        // пишем в переменную                                           // останавливаем перебор, так как праздник найден
			    } elseif( empty( $out ) )                               // иначе, но если только переменная пуста,
			        $out = 'Праздника под названием ' .$name .', видимо, нет. Обратитесь к администратору, чтобы добавить его!'; // заполняем ее 
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