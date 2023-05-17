<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Авторизация и регистрация</title>
   <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
   <!-- form of autorization -->

   <form action="vendor/signin.php" method="post">
      <label>Введите телефон или почту</label>
      <input type="text" name="login"  placeholder="Введите номер телефона или email">
      <label>Пароль</label>
      <input type="password" name="password" placeholder="Введите пароль">
      <button type="submit">Войти</button>
      <p>
         Нет аккаунта? - <a href="register.php">Зарегистрируйся</a>
      </p>

      <?php
         if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] .' </p>';
         }
         unset($_SESSION['message']);
         ?>
      </form>
</body>
</html>