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

<div class="admin__form"> 

<form action="admin.php" method="post" name="form_admin"> <!-- форма подключится к файлу auth после субмита -->
   <input maxlength="20" type="text" name="login" placeholder="Логин" required><br><br>
   <input type="password" name="password" placeholder="Пароль" required><br><br>
   <input type="submit" value="Войти" class="btn">
</form>
</div>

</body>
</html>

