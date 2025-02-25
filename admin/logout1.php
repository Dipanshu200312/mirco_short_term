<?php

@include 'config.php';

session_name('admin_session'); // Set a unique session name for the admin
session_start();

// Unset all of the admin session variables
$_SESSION = array();

// Destroy the admin session
session_destroy();

// Redirect to the login page
header('location: login_form.php');
exit(); // Ensure that no further code is executed after the redirect
?>
