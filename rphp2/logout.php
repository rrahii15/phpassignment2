<?php

session_start();

// Unset all session values
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page
header("Location: index.php");
exit;

?>
