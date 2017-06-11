<?php

session_start();

if (isset($_SESSION['user_session'])){
    $user_check = $_SESSION['user_session'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT id_user FROM user WHERE id_user=:id_user';
    $q = $pdo->prepare($sql);
    $q->execute(array(':id_user'=>$user_check));
    $row = $q->fetch(PDO::FETCH_ASSOC);
    $login_session = $row['id_user'];   
}

?>