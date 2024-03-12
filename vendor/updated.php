<?php 
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');

    require_once '../config/connect.php';
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $completed = $_POST['completed'];

    $id_task = $_SESSION['id_task'];

    $query = "UPDATE `tasks` SET `task_name`='$task_name',`priority`='$priority',`due_date`='$due_date',
    `completed`='$completed' WHERE `id_task` = '$id_task'";

   
    if(mysqli_query($connect, $query)) header('Location: ../vendor/profile.php');
    
?>