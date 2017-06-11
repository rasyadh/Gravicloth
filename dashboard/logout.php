<?php
   
   if(session_destroy()) {
     unset($_SESSION['user_session']);
      ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/gravicloth/dashboard';
        </script>
      <?php
   }
?>