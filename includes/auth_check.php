<?php
        // This will check whether the user is logged in or not if not redirected to login page (authentication check) 
        // The Logic for this function is to check if the session variable is set or not because the some pages should not accessible if user are unauthenticated
        if(!isset($_SESSION['userid'])){
            // User is not logged in
            header("Location: login.php");
            exit();
        }

?>