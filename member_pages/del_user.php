<?php
session_start();
if($_SESSION['is_auth'] !== true)
{
    header('location: ../index.php');
    exit;
}

$paginaTitel = 'Delete user';
echo '<meta http-equiv="refresh" content="3;url=all_users.php">';
include('../includes/header.php');

include('../includes/db_connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM DED2_users WHERE id='$id'";

if (mysqli_query($conn, $sql))
{
    echo "Record deleted successfully, with id=$id";
}
else
{
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

include('../includes/footer.php');
?>