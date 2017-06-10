<?php
   
   if(session_destroy()) {
      ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/gravicloth/?p=login';
        </script>
      <?php
   }
?>