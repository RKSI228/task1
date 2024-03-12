<?php
    session_start();
    require_once '../config/connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
    $check_user = mysqli_query($connect,$query);

    //echo mysqli_num_rows($check_user);
    if(mysqli_num_rows($check_user) > 0) 
    {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = 
        [
            "login" => $user['login'],
            "id_users" => $user['id_users'],
            "full_name" => $user['full_name'],
            "email" => $user['email']
        ];

        header('Location: ../vendor/profile.php');
    }
    else
    {
        $_SESSION['message'] = 'Не верный логин или пароль!';
        header('Location: ../index.php');
    }
?>