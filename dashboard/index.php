<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Dashboard - Gravicloth</title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="../public/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../public/css/jquery.dataTables.min.css">

    <script src="../public/javascript/jquery.min.js"></script>
    <script src="../public/javascript/semantic.min.js"></script>
    <script src="../public/javascript/jquery.dataTables.min.js"></script>
    <script src="../public/javascript/dataTables.semanticui.min.js"></script>
    <script src="../public/javascript/Chart.min.js"></script>
    <script src="../public/javascript/moment.js"></script>
</head>

<body>

<?php

include '../config/dbconfig.php';
include '../config/admin-session.php';

if(isset($_SESSION['admin_session']) != "")
{
    ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/gravicloth/dashboard.php';
        </script>
    <?php
}

if(isset($_POST['admin-login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM user WHERE email=:email AND id_role=1 LIMIT 1';
    $q = $pdo->prepare($sql);
    $q->execute(array(':email'=>$email));
    $userRow = $q->fetch(PDO::FETCH_ASSOC);

    if ($q->rowCount() > 0){
        if (password_verify($pass, $userRow['password'])){
            $_SESSION['admin_session'] = $userRow['id_user'];
            ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost/gravicloth/dashboard.php';
                </script>
            <?php
            return true;
        }
        else {
            echo '<div class="ui container" style="margin-top: 1em;">
                <div class="ui error message">
                    <p>Login Gagal</p>
                </div>
            </div>';
        }
    }
    else
    {
        echo '<div class="ui container" style="margin-top: 1em;">
                <div class="ui error message">
                    <p>Login Gagal</p>
                </div>
            </div>';
    } 
    Database::disconnect();
}

?>

<div class="ui very padded container" style="padding: 10em;">
    <div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
        <div class="column" id="content-login-regis">
            <a href="?p=content-home">
                <img class="ui centered medium image" src="../public/images/logo.png">
            </a>

            <p class="ui header">Admin Page Login</p>
            </br>

            <form class="ui form" method="POST">
                <div class="field">
                    <div class="ui labeled input">
                        <div class="ui basic label">
                            <i class="mail blue icon"></i>
                        </div>
                    <input type="text" name="email" required placeholder="E-mail">
                    </div>
                </div>
                <div class="field">
                    <div class="ui labeled input">
                        <div class="ui basic label">
                            <i class="lock blue icon"></i>
                        </div>
                    <input type="password" name="password" required placeholder="Password">
                    </div>
                </div>
                <input class="ui fluid primary button" type="submit" name="admin-login" value="Masuk">
                </br>
            </form>
        </div>
    </div>
</div>
</body>
</html>