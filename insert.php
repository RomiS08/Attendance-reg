<?php
require_once 'db/conn.php';  // Including database connection file
require_once 'sendemail.php';  // Including sendemail file

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['specialty'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $specialty_id = $_POST['specialty'];

    $crud = new crud($pdo);

    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $telephone, $specialty_id);
    if($isSuccess){
        SendEmail::SendMail($email, 'Welcome to IT Conference 2024', 'You have successfully registered for the IT Conference 2024');
        echo "Data inserted successfully";
    } else {
        echo "Failed to insert data";
    }
}
?>