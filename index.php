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

   <!-- Авторизация -->

   <form action="vendor/signin.php" method="post">
      <label>Введите телефон или почту</label>
      <input type="text" name="login"  placeholder="Введите номер телефона или email">
      <label>Пароль</label>
      <input type="password" name="password" placeholder="Введите пароль">
      <button type="submit">Войти</button>
      <p>
         Нет аккаунта? - <a href="register.php">Зарегистрируйся</a>
      </p>

       <!-- капча -->
      <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>

<div
   style="height: 100px;"
    id="captcha-container"
    class="smart-captcha"
    data-sitekey="<ysc1_4PA9KeliApVK810BymfUPIXJ9LW3VJWR0QiV7wMVa4a83c63>"
>
</div>

<div id="captcha-container" class="smart-captcha" ...>
    <input type="hidden" name="smart-token" value="<токен>">
    ...
</div>

   </form>
      
</body>
</html>
<?php
define('SMARTCAPTCHA_SERVER_KEY', '<******>');

function check_captcha($token) {
    $ch = curl_init();
    $args = http_build_query([
        "secret" => SMARTCAPTCHA_SERVER_KEY,
        "token" => $token,
        "ip" => $_SERVER['REMOTE_ADDR']
    ]);
    curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);

    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200) {
        echo "Allow access due to an error: code=$httpcode; message=$server_output\n";
        return true;
    }
    $resp = json_decode($server_output);
    return $resp->status === "ok";
}

$token = $_POST['smart-token'];
if (check_captcha($token)) {
    echo "Passed\n";
} else {
    echo "Robot\n";
}



