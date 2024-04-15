<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include external CSS files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/updateview.css">
</head>

<body class="success-page">

    <?php 
ob_start();
$title = 'Success';  // Title of the page
require_once 'includes/header.php';    // Including header file
require_once 'db/conn.php';  // Including database connection file
require_once 'sendemail.php';  // Including sendemail file

function getSpecialtyName($specialty_id) {
    global $crud;
    $specialty = $crud->getSpecialtyById($specialty_id);
    if ($specialty === false) {
        include 'includes/errormessge.php';
        return false;
    }
    return $specialty['name'];
}

// Get the values from POST operation
if (!isset($_POST['submit']) || !isset($_POST['specialty'])){
     include 'includes/errormessge.php';
     header("Location: index.php"); 
} else {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $specialty_id = $_POST['specialty'];

    // Output HTML content directly
?>

    <div class="details-container">
        <div class="head-details">
            <h5 class="head-details"><?php echo $fname . ' ' . $lname; ?></h5>
            <h6 class="sub-details"><?php echo getSpecialtyName($specialty_id); ?></h6>
            <p class="text-det">Date Of Birth: <?php echo $dob; ?></p>
            <p class="text-det">Email Address: <?php echo $email; ?></p>
            <p class="text-det">Phone Number: <?php echo $telephone; ?></p>
        </div>
    </div>

    <br>

    <div class="confirmation">
        <div class="View-btn" style="text-align: center;">
            <a href="index.php" class="btn btn-primary"> <i class="fas fa-left-long"></i> Back </a>
            <button id="confirmBtn" class="btn btn-success"> <i class="fa-solid fa-circle-check"></i> Confirm
                Registration</button>
            <button onclick="deleteRecord(<?php echo $result['attendee_id']?>)" class="btn btn-danger"> <i
                    class="fa-solid fa-trash"></i> Delete </button>
        </div>
    </div>

    <div class="success-message" style="display: none;">
        <div class="success-icon">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
        </div>
        <div class="success-text">
            Successfully Registered!
        </div>
    </div>

    <script>
    document.getElementById("confirmBtn").addEventListener("click", function() {
        // Hide the confirmation button
        document.querySelector(".confirmation").style.display = "none";
        // Display the success message
        document.querySelector(".success-message").style.display = "block";

        // Send AJAX request to insert.php to handle database insertion
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "insert.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                // Redirect after 1.5 seconds
                setTimeout(function() {
                    window.location.href = "viewrecords.php";
                }, 1500);
            }
        };
        xhr.send(
            "fname=<?php echo $fname; ?>&lname=<?php echo $lname; ?>&dob=<?php echo $dob; ?>&email=<?php echo $email; ?>&telephone=<?php echo $telephone; ?>&specialty=<?php echo $specialty_id; ?>"
            );
    });
    </script>

    <?php 
}  // End of else statement
require_once 'includes/footer.php';  // Including footer file
ob_end_flush();
?>

</body>

</html>