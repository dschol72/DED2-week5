<?php

// Maak connectie met de database
DEFINE('DB_HOST',       'localhost');		// Server naam
DEFINE('DB_USERNAME',   'root');		    // Gebruikersnaam
DEFINE('DB_PASSWORD',   'root');		    // Wachtwoord
DEFINE('DB_DATABASE',   'i889354_fontys');	// Database naam

$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno())
{
	die('Service kan niet geladen worden.');
}
?>