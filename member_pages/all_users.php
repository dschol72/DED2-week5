<?php
session_start();
if($_SESSION['is_auth'] !== true)
{
    header('location: ../index.php');
    exit;
}

$paginaTitel = 'Show all users';
include('../includes/header.php');

include('../includes/db_connect.php');

$sql = "SELECT id, username, password, email FROM DED2_users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    echo '<table>';
    echo '<tr><th>username</th><th>password</th><th>email</th><th>&nbsp;</th><th>&nbsp;</th></tr>';
    
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<tr><td>' . $row["username"]. '</td>
                  <td>' . $row["password"]. '</td>
                  <td>' . $row["email"]. '</td>
                  <td><a href="edit_user.php?id=' . $row["id"] . '"><i class="fa fa-pencil"></i></a></td>
                  <td><a href="del_user.php?id=' . $row["id"] . '"><i class="fa fa-trash"></i></a></td>
              </tr>';
    }
    
    echo '</table>';
}
else
{
    echo 'De tabel is leeg.';
}

mysqli_close($conn);

include('../includes/footer.php');
?>