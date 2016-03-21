<?php
session_start();
$root_dir = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fontys - <?php echo $paginaTitel; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Anonymous+Pro' rel='stylesheet'>
    <link href="<?php echo $root_dir; ?>/css/reset.css" rel="stylesheet">
    <link href="<?php echo $root_dir; ?>/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"  rel="stylesheet">
</head>
<body>
<header>
    <h1><a href="<?php echo $root_dir; ?>">Weird Al Yankovic</a></h1>
    <nav>
        <ul>
            <?php
            if($_SESSION['is_auth'] === true)
            {
                echo '<li><a class="active" href="'<?php' echo $root_dir; ?>"><i class="fa fa-home"></i> Home</a></li>';
            }
            else
            {
                echo '<li><a class="active" href="'<?php' echo $root_dir; ?>"><i class="fa fa-home"></i> Home</a></li>';
            }
            ?>
            <li>
                <a href="<?php echo $root_dir; ?>member_pages/all_articles.php">
                <i class="fa fa-file-text-o"></i> Articles
                </a>
            </li>
            <li><a href="#contact"><i class="fa fa-map-marker"></i> Contact</a></li>
            <li><a href="#about"><i class="fa fa-info"></i> About</a></li>
            
            <?php
            if(!isset($_SESSION['username']))
            {
                if((basename($_SERVER['PHP_SELF']) != 'login.php') && (basename($_SERVER['PHP_SELF']) != 'register.php'))
                {
                    echo '<li><a href="../pages/login.php" title="Login/Register"><i class="fa fa-sign-in"></i></a></li>';
                }
            }
            else
            {
                if(basename($_SERVER['PHP_SELF']) != 'logout.php')
                {
                    echo '<li><a href="../pages/logout.php" title="Logout"><i class="fa fa-sign-out"></i></a></li>';
                }
            }
            ?>
            
        </ul>
    </nav>
</header>