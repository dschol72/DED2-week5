<?php
session_start();
if($_SESSION['is_auth'] !== true)
{
    header('location: ../index.php');
    exit;
}

$id = $_GET['id'];
include('../includes/db_connect.php');
$sql = "DELETE FROM DED2_articles WHERE id='$id'";

if (mysqli_query($conn, $sql))
{
    header('location: all_articles.php');
}
else
{
    $paginaTitel = 'Oops, something went wrong!!!';
    include('../includes/header.php');
    echo "Error deleting record: " . mysqli_error($conn);
    include('../includes/footer.php');
}

mysqli_close($conn);
?>