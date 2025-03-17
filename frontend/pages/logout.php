<?php 
session_start(); // Start the session to access session variables   
session_destroy(); // Destroy all session variables
header('Location: login.php'); // Redirect to login page 
exit();

?>