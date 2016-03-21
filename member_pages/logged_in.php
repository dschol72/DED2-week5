<?php
session_start();
if($_SESSION['is_auth'] !== true)
{
    header('location: ../index.php');
    exit;
}
else
{
    $paginaTitel = 'Logged in';
    include('../includes/header.php');

    echo '<main>';
    echo '<h1>Welcome '. $_SESSION['username']; 
    echo '</main>';

    include('../includes/footer.php');
}
?>