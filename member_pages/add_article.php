<?php
session_start();
if($_SESSION['is_auth'] !== true)
{
    header('location: ../index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if((isset($_POST['title'])) && (isset($_POST['article'])) &&(!empty($_POST['title'])) && (!empty($_POST['article'])))
    {
        // Include bestand met handige functies
        include('../includes/functions.php');
        include('../includes/db_connect.php');
        
        $title      = sanitize($_POST['title']);
        $article    = sanitize($_POST['article']);
        
        $title      = mysqli_real_escape_string($conn, $title);
        $article    = mysqli_real_escape_string($conn, $article);

        $sql = "INSERT INTO DED2_articles (title, article) VALUES ('$title', '$article')";

        if (mysqli_query($conn, $sql))
        {
            header('location: all_articles.php');
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}

    $paginaTitel = 'Add article';
    include('../includes/header.php');
?>
       
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" maxlength="30"><br>
            <textarea name="article" cols="30" rows="10"></textarea><br>
            <input type="submit" value="Add acticle" name="submit">
        </form>
    </main>

   <?php    
    include('../includes/footer.php');
?>