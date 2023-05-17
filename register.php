

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
   <!-- form of registration -->

   <form action="vendor/signup.php" method="post">
      <label>Имя</label>
      <input type="text" name="name" placeholder="Введите имя">
      <label>Телефон</label>
      <input type="tel" name="phone" placeholder="Введите номер телефона">
      <label>Почта</label>
      <input type="email" name="email" placeholder="Введите свою почту">
      <label>Пароль</label>
      <input type="password" name="password" placeholder="Введите пароль">
      <label>Подтверждение пароля</label>
      <input type="password" name="ret_password" placeholder="Введите повторно пароль">
      <button type="submit">Войти</button>
      <p>
         У вас уже есть аккаунт? - <a href="/">Авторизируйтесь</a>
      </p>
   </form>
</body>
</html>