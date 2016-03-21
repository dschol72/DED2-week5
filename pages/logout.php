<?php
session_start();
session_unset();
// unset($_SESSION['is_auth']);
session_destroy();

header('location: ../index.php');
?>