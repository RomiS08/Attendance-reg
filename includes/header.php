<?php


// rest of your code
?>


<?php

include 'includes/session.php';

  // This Include Session.php file to start the session process properly this file contain code start/resume a session
  //  and start a session if not already started and this file is included in every page of the session 
  //  This session is required to store the data in the session variable and use it in the other pages    
  
?>

<!------------------------------- Navbar using Bootstrap ---------------------------------->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery Linking -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Customized CSS -->
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/success.css">

    <title> Attendance <?php echo $title?> </title>
  </head>

  <body>
    <style>
    .greeting {
        color: white; /* Change the color to white */
        font-size: 1.2em; /* Increase the font size */
        vertical-align: middle; /* Align the text with the middle of the surrounding element */
    }
</style>
    <!-- Start of DIV Class "Container" for Layout Purpose and this is apply to all layout in the website because it's Closing it on footer --> 
    <div class = "container">  
      <!-- Navbar using Bootstrap -->
      <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body  custom-navbar-success " data-bs-theme="dark" >
        <div div class="container-fluid">
          <a class="navbar-brand" href="index.php">IT Conference</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-auto ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewrecords.php">View Attendees</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <div class="navbar-nav ml-auto align-items-center">
              <?php
              if(!isset($_SESSION['userid'])){
                  // If User is not logged (input details is not corrected) in it will pass the to the Login page  
              ?>
                  <a class="nav-link active" href="login.php" aria-current="page" > <i class="fa-solid fa-user"></i> Login</a>
              <?php
              } else {
                  // if User entered details are correct the else statement will be executed and it will show the greeting message (access to the web) and Logout button 
                  $username = $_SESSION['username'];
              ?>
                  <span class="greeting"> Hello <?php echo $username; ?> !</span>
                  <a class="nav-link active" href="logout.php" aria-current="page" > <span class="fas fa-sign-out-alt" ></span> Logout</a>  
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </nav>


