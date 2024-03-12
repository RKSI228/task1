<?php
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');

    require_once 'config/connect.php';

    $id_task = $_GET['id'];
    $sql = "SELECT * FROM `tasks` WHERE `id_task` = '$id_task'";
    $sql = mysqli_query($connect , $sql);
    $result = mysqli_fetch_assoc($sql);

    $_SESSION['id_task'] = $id_task;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Редактирование поста</title>
</head>
<body>
    <!-- форма авторизации -->

    <form action="vendor/updated.php" method="post">
        <label>Название задачи</label>
        <input type="text" name="task_name" value="<?=$result['task_name'];?>">
        <label>Введите приоритет от 1 до 3</label>
        <select name="priority">
            <option value="1">Низкий</option>
            <option value="2">Средний</option>
            <option value="3">Высокий</option>
        </select>
        <input type="date" name="due_date" value="<?=$result['due_date'];?>">
        <label>Статус выполнения</label>
        <input type="text" name="completed" value="<?=$result['completed'];?>">
        <button type="submit">Изменить</button>
        <p>
            <a href="../vendor/profile.php">Назад</a>      
        </p>
    </form>
</body>
</html>