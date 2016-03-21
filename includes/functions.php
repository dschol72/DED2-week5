<?php

// Zet de PHP timestamp om naar NL datum en tijd
function toDutch($timestamp)
{
    setlocale(LC_ALL, 'nl_NL');
    $dutchTime = strftime('%e %B %Y - %H:%M', strtotime($timestamp));
    return $dutchTime;
}

// Maak de formulier data schoon
function sanitize($data)
{
    $data = htmlspecialchars($data); 
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}