<?php 
 $host = 'localhost';  // Хост, у нас все локально
 $user = 'root';    // Имя созданного вами пользователя
 $pass = ''; // Установленный вами пароль пользователю
 $db_name = 'zd12-2';   // Имя базы данных
 $connect = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

  //Если переменная Name передана
  if (isset($_POST["name"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($connect, "INSERT INTO `holidays` (`name`, `date`, `description`) VALUES ('{$_POST['name']}', '{$_POST['date']}', '{$_POST['description']}')");
    //Если вставка прошла успешно
    if ($sql) {
      header ('location: admin_lk.php'); //автопереход на главную
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
    }
  }
?>