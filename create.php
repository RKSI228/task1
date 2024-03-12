<?php
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Добавление задачи</title>
</head>
<body>
    <!-- форма авторизации -->

    <form action="vendor/created.php" method="post">
        <label>Название задачи</label>
        <input type="text" name="task_name" placeholder="Введите название задачи">
        <label>Введите приоритет от 1 до 3</label>
        <select name="priority">
            <option value="1">Низкий</option>
            <option value="2">Средний</option>
            <option value="3">Высокий</option>
        </select>
        <input type="date" name="due_date" placeholder="Введите дату">
        <label>Статус выполнения</label>
        <input type="text" name="completed" placeholder="Введите статус">
        <button type="submit">Добавить</button>
        <p>
            <a href="../vendor/profile.php">Назад</a>
            
        </p>
    </form>
</body>
</html>