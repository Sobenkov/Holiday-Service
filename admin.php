<?php
    $login = filter_var(trim($_POST['login']), //берем данные из формы
    FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','','zd12-2');
    //создаем переменную result и через SQL делаем запрос ко всему в таблице Users нашей БД
    $result = $mysql->query("SELECT * FROM `admin` WHERE `login` = 
    '$login'"); //найдем пользователя в бд
    $user = $result->fetch_assoc(); //конвертируем для удобства в массив
    if(count($user) == 0) {
        http_response_code(404);
        include('404.php'); //если юзера нет, то 404
        die();
     }

              
    //делаем куки, чтобы сохранить пользователя
    setcookie('user', $user['login'], time() + 3600*24, "/"); //куки будут жить 1 час*24 и действовать на всех страницах

    $mysql->close();

    header ('location: admin_lk.php'); //переход в лк
?>