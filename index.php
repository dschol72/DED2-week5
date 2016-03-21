<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if((isset($_POST['username'])) && (isset($_POST['password'])) && (isset($_POST['email'])) &&(!empty($_POST['username'])) && (!empty($_POST['password'])) && (!empty($_POST['email'])))
    {
        echo 'Hoi';
    }
}

$paginaTitel = 'Home';
include('includes/header.php');
?>

<main>
    <h1>Welcome on the portfolio of Wierd Al Yankovic.</h1>
</main>

<?php
include('includes/footer.php');
?>