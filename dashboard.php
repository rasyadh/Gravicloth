<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Dashboard - Gravicloth</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="public/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="public/css/jquery.dataTables.min.css">

    <script src="public/javascript/jquery.min.js"></script>
    <script src="public/javascript/semantic.min.js"></script>
    <script src="public/javascript/jquery.dataTables.min.js"></script>
    <script src="public/javascript/dataTables.semanticui.min.js"></script>
    <script src="public/javascript/Chart.min.js"></script>
    <script src="public/javascript/moment.js"></script>
</head>

<body>
    <div class="ui bottom attached segment pushable">
        <?php 
            include 'config/dbconfig.php';
            // session_start();
            
            // include 'config/admin-session.php';

            /*if(isset($_SESSION['admin_session']))
            {
                $user_id = $_SESSION['admin_session'];
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT * FROM user u, user_detail ud WHERE u.id_user=:id_user AND ud.id_user=:user_id';
                $q = $pdo->prepare($sql);
                $q->execute(array(':id_user'=>$user_id, ':user_id'=>$user_id));
                $adminInfoRow = $q->fetch(PDO::FETCH_ASSOC);                
                echo '<div class="ui container">Coba</div>';
            }
            else {
                ?>
                    <script type="text/javascript">
                    window.location.href = 'http://localhost/gravicloth/dashboard';
                    </script>
                <?php
            }*/
            

            include 'dashboard/sidebar.php'; 
        ?>

        <!-- Main view for templates -->
        <div class="pusher" id="main-content">
            <?php 
            $pages_dashboard_dir = 'dashboard';
            if (!empty($_GET['d'])){
                $pages_dashboard = scandir($pages_dashboard_dir, 0);
                unset($pages_dashboard[0], $pages_dashboard[1]);
    
                $d = $_GET['d'];
                
                if(in_array($d.'.php', $pages_dashboard)){
                    include($pages_dashboard_dir.'/'.$d.'.php');
                } else {
                    echo 'Halaman tidak ditemukan! :(';
                }
            }
            else {
                include($pages_dashboard_dir.'/overview.php');
            }
            ?>
        </div>
    </div>
</body>

</html>