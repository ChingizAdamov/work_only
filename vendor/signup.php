<?php
session_start();

   require_once 'connDB.php';


   $name = $_POST['name'];
   $login = $_POST['login'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $ret_password = $_POST['ret_password'];

   if ($password === $ret_password) {
      echo "password and ret_password are the same";

      // хешируем пароли для безопаснсти
      $password = md5($password);
      $ret_password = md5($ret_password);

      mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `login`, `phone`, `email`, `password`, `ret_password`) VALUES (NULL, '$name', '$login', '$phone', '$email', '$password', '$ret_password')");

       $_SESSION['message'] = 'Регистация прошла успешно';
      header('Location: ../index.php');

   } else {
      // В случае не совпадения паролей, то пользователь перенаправляется на register.php
      header('Location: ../register.php');
   }
?>
