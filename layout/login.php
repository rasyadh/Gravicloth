<?php

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM user WHERE email=:email LIMIT 1';
    $q = $pdo->prepare($sql);
    $q->execute(array(':email'=>$email));
    $userRow = $q->fetch(PDO::FETCH_ASSOC);
    if ($q->rowCount() > 0){
        if (password_verify($pass, $userRow['password'])){
            $_SESSION['user_session'] = $userRow['id_user'];
            ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost/gravicloth/?=home';
                </script>
            <?php
            return true;
        }
        else {
            return true;
        }
    }
    else
    {
        $error = "Wrong Details !";
    } 
    Database::disconnect();
}

?>

<div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
    <div class="column" id="content-login-regis">
        <a href="?p=content-home">
            <img class="ui centered medium image" src="public/images/logo.png">
        </a>

        <p class="ui header">Silahkan masuk ke dalam akun kamu</p>
        </br>

        <form class="ui form" method="POST">
            <?php
                if(isset($error))
                {
                    ?>
                    <div class="ui warning message">
                        <div class="header">Could you check something!</div>
                        <p><?php echo $error; ?></p>
                    </div>
                    <?php
                }
            ?>
            <div class="field">
                <div class="ui labeled input">
                    <div class="ui basic label">
                        <i class="mail blue icon"></i>
                    </div>
                <input type="text" name="email" placeholder="E-mail">
                </div>
            </div>
            <div class="field">
                <div class="ui labeled input">
                    <div class="ui basic label">
                        <i class="lock blue icon"></i>
                    </div>
                <input type="password" name="password" placeholder="Password">
                </div>
            </div>
            <input class="ui fluid primary button" type="submit" name="login" value="Masuk">
            </br>
            <a>Lupa Password?</a>
        </form>

        </br>
        <div class="ui horizontal divider">Atau</div>
        </br>
        <button class="ui facebook button"><i class="facebook icon"></i>Masuk dengan Facebook</button>
        <button class="ui google plus button"><i class="google icon"></i>Masuk dengan Google</button>
        </br>
        </br>
        <p>Belum punya akun? <a href="?p=register">Daftar Sekarang</a></p>
    </div>
</div>

<script>
$('.ui.checkbox').checkbox();
</script>