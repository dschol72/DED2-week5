<?php
$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    session_start();
    
    if((isset($_POST['username'])) && (isset($_POST['password'])) && (!empty($_POST['username'])) && (!empty($_POST['password'])))
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        include('../includes/db_connect.php');

        $sql = "SELECT id, username, password FROM DED2_users WHERE username='$username'";
        
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $row['password']))
            {
                if(password_needs_rehash($hash, PASSWORD_DEFAULT))
                {
                    $id = $row['id'];
                    $password = $row['password'];
                    
                    $hash = password_hash($password, PASSWORD_DEFAULT);                    
                    $sql2 = "UPDATE DED2_users SET password='$hash' WHERE id='$id'";

                    if (!mysqli_query($conn, $sql2))
                    {
                        echo 'An error has occured.';
                    }
                }
                
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['is_auth'] = true;
                
                header('location: ../member_pages/logged_in.php');
            }
            else
            {
                $errors[] = 'Vul een juiste combinatie van username en wachtwoord in.';
            }
        }
        else
        {
            $errors[] = 'Deze gebruikersnaam is niet geregistreerd.';
        }

        mysqli_close($conn);   
    }
    else
    {
        $errors[] = 'Vul alle velden correct in';
    }
}

$paginaTitel = 'Home';
include('../includes/header.php');
?>

<main>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="username" id="username" placeholder="Username" maxlength="30" autofocus><br>
        <input type="password" name="password" id="password" placeholder="Password" maxlength="20"><br>
        <input type="submit" value="Log in" name="submit">
    </form>
    
    <p>Not a member yet? Please <a href="register.php">register</a>!!</p>
    <?php
    if(count($errors) > 0)
    {
        foreach($errors as $error)
        {
            echo '<br>' . $error;
        }
    }
    ?>
</main>

<?php
include('../includes/footer.php');
?>