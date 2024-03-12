<?php
    session_start();

    if($_SESSION['user'])
    {
        header('Location: ../vendor/profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Форма регистрации</title>
</head>
<body>
    <!-- форма авторизации -->

    <form action="vendor/registration.php" method="post" enctype="multipart/form-data">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите своё полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес почты">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Повтор пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Зарегестрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="index.php">Авторизируйтесь!</a>
        </p>
            <?php
                if($_SESSION['message'])
                {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
    </form>
</body>
</html>