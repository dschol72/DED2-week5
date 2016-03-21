<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if((isset($_POST['username'])) && (isset($_POST['password'])) && (!empty($_POST['username'])) 
       && (!empty($_POST['password'])) && (isset($_POST['email'])) && (!empty($_POST['email'])))
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $email      = $_POST['email'];
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        include('../includes/db_connect.php');

        $sql = "INSERT INTO DED2_users (username, password, email) VALUES ('$username', '$hash', '$email')";

        if (mysqli_query($conn, $sql))
        {
            header('location: login.php');
        }

        mysqli_close($conn);
    }
}

$paginaTitel = 'Register';
include('../includes/header.php');
?>

<main>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="username" placeholder="Username" maxlength="30"><br>
        <input type="password" name="password" placeholder="Password" maxlength="20"><br>
        <input type="text" name="email" placeholder="E-mail address" maxlength="50"><br>
        <input type="submit" value="Register" name="submit">
    </form>
    
    <p>Already a member? Please <a href="login.php">login</a>!!</p>
</main>

<?php
include('../includes/footer.php');
?>