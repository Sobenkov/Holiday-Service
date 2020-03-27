<?php 
setcookie('user', $user['login'], time() - 3600*24, "/"); //обнуляем куки, выходим из авторизации
header ('location: index.php'); //автопереход на главную
 ?>