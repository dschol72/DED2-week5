<?php
// Include bestand met handige functies
include('../includes/functions.php');

$paginaTitel = 'Show article';
include('../includes/header.php');
?>

<main>
    
<?php
include('../includes/db_connect.php');

$id = $_GET['id'];

$sql = "SELECT title, article, created FROM DED2_articles WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);
  
    echo '<h1 style="font-weight:bold; margin: 20px 10px;">' . strtoupper($row['title']) . '<span>' . toDutch($row['created']) . '</span></h1>';
    echo '<p style="margin: 0 10px;">' . $row['article'] . '</p>';
}
else
{
    echo 'This article can\'t be found in the database.';
}

mysqli_close($conn);
?>

</main>

<?php
include('../includes/footer.php');
?>