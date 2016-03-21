<?php
session_start();
if($_SESSION['is_auth'] !== true)
{
    header('location: ../index.php');
    exit;
}

include('../includes/db_connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if((isset($_POST['title'])) && (isset($_POST['article'])) &&(!empty($_POST['title'])) && (!empty($_POST['article'])))
    {
        // Include bestand met handige functies
        include('../includes/functions.php');
        
        $title      = sanitize($_POST['title']);
        $article    = sanitize($_POST['article']);
        $id         = sanitize($_POST['id']);

        $title      = mysqli_real_escape_string($conn, $title);
        $article    = mysqli_real_escape_string($conn, $article);
        $id         = mysqli_real_escape_string($conn, $id);
        
        $sql2 = "UPDATE DED2_articles SET title='$title', article='$article' WHERE id='$id'";
        
        if (mysqli_query($conn, $sql2))
        {
            header('location: all_articles.php');
        }
        else
        {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
else
{
    $paginaTitel = 'Edit article';
    include('../includes/header.php');
    
    $id = $_GET['id'];
    $sql = "SELECT title, article FROM DED2_articles WHERE ID='$id'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
        
        /*
        echo '<pre>';
        print_r($row);
        echo '</pre>';
        */
    ?>
       
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="title" value="<?php echo $row['title']; ?>" maxlength="30"><br>
            <textarea name="article" cols="30" rows="10"><?php echo $row['article']; ?></textarea><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Update acticle" name="submit">
        </form>
    </main>

    <?php
    }
    include('../includes/footer.php');
}
?>