<?php 

    session_start();
    require_once '../config/connect.php';

    $id=$_GET['id'];

    $query = "DELETE FROM `tasks` WHERE `id_task` = '$id'";

    mysqli_query($connect, $query);

    header('Location: ../vendor/profile.php');

?>