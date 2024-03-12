<?php
    session_start();
    require_once '../config/connect.php';

    if(!$_SESSION['user']) header('Location: ../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль <?=$_SESSION['user']['login']?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="line">
            <h2>Просмотр задач</h2>
        </div>
        <br>
        <a class="btn btn-primary" href="../create.php" role="button">Добавить задачу</a>
        <a class="btn btn-danger" href="../vendor/logout.php" role="button" class="logout">Выход</a> 
        <br>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Название</th>
                <th>Приоритет</th>
                <th>Дата начала</th>
                <th>Статус</th>
            </thead>
            <tbody>
                <?php
                    require_once '../config/connect.php';

            
                    $user_id = $_SESSION['user']['id_users'];

                    $sql = "SELECT * FROM `tasks` WHERE `id_users` = '$user_id'";
                    $result = mysqli_query($connect,$sql);

                    while($row = mysqli_fetch_assoc($result)){
                        if($row['priority'] == 1) $alo = "Низкий";
                        else if($row['priority'] == 2) $alo = "Средний";
                        else if($row['priority'] == 3) $alo = "Высокий";

                        if($row['completed'] == 0) $completed = "Выполняется";
                        if($row['completed'] == 1) $completed = "Выполнен";
                        echo "
                        <tr>
                            <td>$row[id_task]</td>
                            <td>$row[task_name]</td>
                            <td>$alo</td>
                            <td>$row[due_date]</td>
                            <td>$completed</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='../update.php?id=$row[id_task]'>Изменить</a>
                                <a class='btn btn-danger btn-sm' href='../vendor/delete.php?id=$row[id_task]'>Удалить</a>
                            </td>
                        </tr>
                        ";
                    }
                    
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>

<pre>
    <?php
        print_r($row);
    ?>
</pre>











<!--<div class="header">
        <h2><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#"> <?= $_SESSION['user']['email'] ?> </a>
        <a href="../vendor/logout.php" class="logout">Выход</a>
</div> -->