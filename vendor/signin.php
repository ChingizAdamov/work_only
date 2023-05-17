<?php
   session_start();
   require_once 'connDB.php';

   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = md5($_POST['password']);

   $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `phone` = '$phone' AND `email` = '$email' AND `password` = '$password'");
   if (mysqli_num_rows($check_user) > 0) {
      $redirect_url = 'https://only.digital/';
      header('Location: ' .$redirect_url);
   } else {
      $_SESSION['message'] = "Не верный телефон или пароль";
      header('Location: ../index.php');
}
?>
