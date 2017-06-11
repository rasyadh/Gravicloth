<?php

if (isset($_SESSION['admin_session'])){
    $admin_check = $_SESSION['admin_session'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT id_user FROM user WHERE id_user=:id_user AND id_role=1';
    $q = $pdo->prepare($sql);
    $q->execute(array(':id_user'=>$admin_check));
    $row = $q->fetch(PDO::FETCH_ASSOC);
    $admin_login_session = $row['id_user'];   
}

?>