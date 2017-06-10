<?php

class User {
    private $db;

    function __construct($cont){
        $this->db = $cont;
    }

    public function register($name, $email, $password)
    {
       try
       {
           $role = 2; //Customer
           $new_password = password_hash($password, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO user (id_role, name, email, password) VALUES(:role, :name, :email, :pass)");
           $stmt->bindparam(":role", $role);
           $stmt->bindparam(":name", $name);
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":pass", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }

    public function login($email, $pass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
          $stmt->execute(array(':email'=>$email));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($pass, $userRow['password']))
             {
                $_SESSION['user_session'] = $userRow['id_user'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
   
}

?>