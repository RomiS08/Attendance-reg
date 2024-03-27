<?php
include 'includes/session.php'; // Include session.php file to start the session process properly this file contain code start/resume a session 
                                // It identifies the session that need to be destroyed 
session_unset();                // remove all session variables from session array before destroying the session 
session_destroy();              // destroy all session variables in the session array 
header("Location: login.php");  // set login.php as the location to redirect to after the session is destroyed
exit();
?>
