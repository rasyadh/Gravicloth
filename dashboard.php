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

    <script src="public/javascript/jquery.min.js"></script>
    <script src="public/javascript/semantic.min.js"></script>
    <script src="public/javascript/Chart.min.js"></script>
    <script src="public/javascript/moment.js"></script>
</head>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include 'dashboard/sidebar.php'; ?>

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