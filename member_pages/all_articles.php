<?php
$paginaTitel = 'Show all articles';
include('../includes/header.php');
?>

<main>

<?php
include('../includes/db_connect.php');

$sql = "SELECT id, title, article, created FROM DED2_articles ORDER BY created DESC";
$result = mysqli_query($conn, $sql);

/*
echo '<pre>';
print_r($result);
echo '</pre>';
*/

if (mysqli_num_rows($result) > 0)
{
    echo '<table>';
    echo '<tr><th>Title</th><th>Article</th><th>Date</th><th>&nbsp;</th><th>&nbsp;</th></tr>';
    while($row = mysqli_fetch_assoc($result))
    {        
        echo '<tr>
                <td><a href="show_article.php?id=' . $row['id'] . '">' . $row['title'] . '</a></td>
                <td>' . $row['article'] . '</td>
                <td>' . $row['created'] . '</td>
                <td><a href="edit_article.php?id=' . $row['id'] . '"><i class="fa fa-pencil"></i></a></td>
                <td><a href="del_article.php?id=' . $row['id'] . '" onclick="return confirm(\'Delete this article?\')"><i class="fa fa-trash"></i></a></td>
              </tr>';
    }
    
    echo '</table>';
    
    if($_SESSION['is_auth'] === true)
    {
        echo '<p style="float:right;"><a href="add_article.php">Create</a> a new article</p>';
    }
    
}
else
{
    echo 'There are no articles, be the first to <a href="add_article.php" class="link-color">create</a> one';
}

mysqli_close($conn);
?>

</main>

<?php
include('../includes/footer.php');
?>