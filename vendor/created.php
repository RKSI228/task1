<?php
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');

    require_once '../config/connect.php';
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $completed = $_POST['completed'];

    $user_id = $_SESSION['user']['id_users'];

    //$sql = "INSERT INTO `goods` (`id`, `title`, `description`, `price`) VALUES (NULL, '$title', '$description', '$price')";
    $sql = "INSERT INTO `tasks` (`id_task`, `id_users`, `task_name`, `priority`, `due_date`, `completed`) VALUES (NULL, '$user_id', '$task_name', '$priority', '$due_date', '$completed')";
    mysqli_query($connect, $sql);

    header('Location: ../vendor/profile.php');
?>