<?php

if(isset($_POST['register']))
{
   $name = trim($_POST['name']);
   $username = trim($_POST['username']);
   $email = trim($_POST['email']);
   $pass = trim($_POST['password']); 
 
   if($name=="") {
      $error[] = "provide name !"; 
   }
   if($username==""){
       $error[] = "provide username !";
   }
   else if($email=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($pass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($pass) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = 'SELECT username, email FROM user WHERE username=:username AND email=:email';
          $q = $pdo->prepare($sql);
          $q->execute(array(':username'=>$username, ':email'=>$email));
          $row = $q->fetch(PDO::FETCH_ASSOC);
    
          if ($row['username']==$username){
            $error[] = "sorry username id already taken !";  
            Database::disconnect();
          }
         else if($row['email']==$email) {
            $error[] = "sorry email id already taken !";
            Database::disconnect();
         }
         else
         {
             Database::disconnect();
             $pdo = Database::connect();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $role = 2; //Customer
            $new_password = password_hash($pass, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO user (id_role, name, username, email, password) VALUES(:role, :name, :username, :email, :pass)';
            $q = $pdo->prepare($sql);
            $q->execute(array(':role'=>$role, ':name'=>$name, ':username'=>$username, ':email'=>$email, ':pass'=>$new_password));
            Database::disconnect();

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT id_user FROM user WHERE email=:email';
            $q = $pdo->prepare($sql);
            $q->execute(array(':email'=>$email));
            $row = $q->fetch(PDO::FETCH_ASSOC);
            $id_user = $row['id_user'];
            Database::disconnect();

            Database::connect();
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'INSERT INTO user_detail (id_user) VALUES(:id_user)';
            $q = $pdo->prepare($sql);
            $q->execute(array(':id_user'=>$id_user));
            $success = "Registration Success";
            ?>
                <div class="ui container" style="margin-top: 1em;">
                    <div class="ui success message">
                        <p><?php echo $success; ?></p>
                    </div>
                </div>
            <?php
            Database::disconnect();
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 

}

?>

<div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
    <div class="column" id="content-login-regis">
        <a href="?p=content-home">
            <img class="ui centered medium image" src="public/images/logo.png">
        </a>

        <p class="ui header">Daftar akun baru sekarang</p>
        </br>

        <form class="ui form" method="post">
            <?php
                if(isset($error))
                {
                    foreach($error as $error)
                    {
                        ?>
                        <div class="ui error message">
                            <div class="header">Something when wrong</div>
                            <p><?php echo $error; ?></p>
                        </div>
                        <?php
                    }
                }
                else if(isset($success))            
                {
                    ?>
                    <div class="ui success message">
                        <div class="header"><?php echo $success; ?></div>
                        <p><a href='index.php'>login</a> here.</p>
                    </div>
                    <?php
                }
            ?>
            <div class="field">
                <div class="ui labeled input">
                    <div class="ui basic label">
                        <i class="user blue icon"></i>
                    </div>
                <input type="text" name="name" required placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="field">
                <div class="ui labeled input">
                    <div class="ui basic label">
                        <i class="at blue icon"></i>
                    </div>
                <input type="text" name="username" required placeholder="Username">
                </div>
            </div>
            <div class="field">
                <div class="ui labeled input">
                    <div class="ui basic label">
                        <i class="mail blue icon"></i>
                    </div>
                <input type="email" name="email" required placeholder="E-mail">
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
            <div class="field">
                <p class="ui left aligned container">Dengan klik daftar, kamu telah menyetujui Aturan Penggunaan dan Kebijakan Privasi dari Gravicloth.</p>
            </div>
            <input class="ui fluid primary button" type="submit" name="register" value="Daftar">
        </form>
        </br>
        <div class="ui horizontal divider"><div class="g-signin2" data-onsuccess="onSignIn"></div></div>
        </br>
        </br>
        <p>Sudah punya akun? <a href="?p=login">Silakan Login</a></p>
    </div>
</div>