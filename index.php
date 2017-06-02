<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Gravicloth - Custom Clothing IT Brand</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="public/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="public/css/app.css">

    <script src="public/javascript/jquery.min.js"></script>
    <script src="public/javascript/semantic.min.js"></script>
    <script type="text/javascript" src="lib/slick/slick.min.js"></script>
    <script src="public/javascript/banner-carousel.js"></script>
    <script src="public/javascript/following-header.js"></script>
</head>

<body>
    <div class="pusher">
        <?php 
        include 'config/dbconfig.php';
        include 'layout/partials/header.php'; ?>

        <?php 
        $pages_dir = 'layout';
        $category = ['kaos', 'kemeja', 'jaket', 'polo', 'sweater', 'tas', 'celana'];

        if (!empty($_GET['p'])){
            $pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);
 
			$p = $_GET['p'];
            
			if(in_array($p.'.php', $pages)){
				include($pages_dir.'/'.$p.'.php');
			} 
            else if (in_array($p, $category)) {
                $cat_selected = $p;
                include($pages_dir.'/content-category.php');
            }
            else {
				include($pages_dir.'/404.php');
			}
        }
        else {
            include($pages_dir.'/home.php');
        }
        ?>

        <?php include 'layout/partials/social.php'; ?>

        <?php include 'layout/partials/footer.php'; ?>
    </div>
</body>

</html>