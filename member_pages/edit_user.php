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
    if((isset($_POST['username'])) && (isset($_POST['password'])) && (isset($_POST['email'])) &&(!empty($_POST['username'])) && (!empty($_POST['password'])) && (!empty($_POST['email'])))
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $email      = $_POST['email'];
        $id         = $_POST['id'];
        
        $sql2 = "UPDATE DED2_users SET username='$username', password='$password', email='$email' 
        WHERE id='$id'";

        if (mysqli_query($conn, $sql2))
        {
            header('location: all_users.php');
        }
        else
        {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        echo 'Fout afhandeling hier...';
    }
}
else
{
    $paginaTitel = 'Edit user';
    include('../includes/header.php');
    $id = $_GET['id'];

    $sql = "SELECT username, password, email FROM DED2_users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
    ?>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="username" value="<?php echo $row['username']; ?>" maxlength="20"><br>
            <input type="text" name="password" value="<?php echo $row['password']; ?>" maxlength="20"><br>
            <input type="text" name="email" value="<?php echo $row['email']; ?>" maxlength="30"><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Add user" name="submit">
        </form>
    </main>
    <?php
    }
    else
    {
        echo 'Er is een fout opgetreden.';
    }
}

mysqli_close($conn);

include('../includes/footer.php');
?>