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
		<a href="index.php">Главная</a>
	</header>
	<!-- тело сайта -->
	<main>
	
			<?php
			    $host = 'localhost';  // Хост, у нас все локально
			    $user = 'root';    // Имя созданного вами пользователя
			    $pass = ''; // Установленный вами пароль пользователю
			    $db_name = 'zd12-2';   // Имя базы данных
			    $connect = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
			 ?>

			<h3>Изменение календаря</h3>
			
		  <?php
			  if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
			    //удаляем строку из таблицы
			    $sql = mysqli_query($connect, "DELETE FROM `holidays` WHERE `id` = {$_GET['del_id']}"); //удаляем элемент по айди, который обозначается ниже
			  }
			?>
			<!-- календарь из бд -->
			<table class ="admin__calendar" border='1'>
			  <tr>
			    <td><b>Праздник</b></td>
			    <td><b>Дата</b></td>
			    <td><b>Описание</b></td>
			    <td><b>Удалить</b></td>
			  </tr>
			  <?php
			    $sql = mysqli_query($connect, "SELECT * FROM `holidays`"); //подключаемя к таблице "com" и берем из нее все
			    while ($holi = mysqli_fetch_array($sql)) { //пока есть данные, выводим
			      echo '<tr>' .
			           "<td>{$holi['name']}</td>" . //название праздника
			           "<td>{$holi['date']}</td>" . //дату
			           "<td>{$holi['description']}</td>" . //описание
			           "<td><a href='?del_id={$holi['id']}'>Удалить</a></td>" . //при нажатии обозначается айди и стартует действие выше на удаление
			           '</tr>';
			    }
			  ?>
				</table>

				<form action="new_holi.php" method="POST">
					<input type="text" name="name" placeholder="Название праздника">					
					<input type="text" name="date" placeholder="Дата праздника"><br><br>
					<textarea name="description" cols="55" rows="10" placeholder="Описание праздника"></textarea><br><br>
					<input type="submit" class="btn">
				</form>

	</main>

	<footer>
		<?php 
		if($_COOKIE['user'] == !''):
		 ?>
		<a href="exit.php">Выйти</a> <!-- обнуляем куки через файл exit -->
		<?php else: ?>
		<a href="form_admin.php">Войти в админку</a>	
		<?php endif;?>
	</footer>

</body>
</html>