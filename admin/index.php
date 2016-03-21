<?php
$paginaTitel = 'Ingelogd';
include('../includes/header.php');
?>

<main>
    <?php
    $naam = $_POST['naam'];
    $pass = $_POST['pass'];
    
    echo "<h1>$naam, je bent ingelogd!!</h1>";
    echo "En je wachtwoord is $pass.";
    ?>
</main>

<?php
include('../includes/footer.php');
?>