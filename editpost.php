
<?php 
    session_start();    // session_start() should be on the top of the page 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include external CSS files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/updateview.css">
</head>

<?php
$title = 'Confirm Update Records';
require_once 'includes/auth_check.php'; // for authentication check and this always should be on the top of the page after the header cause header has session_start 
require_once 'db/conn.php';



// Function to get the specialty name by ID
function getSpecialtyName($specialty_id) {
    global $crud;
    $specialty = $crud->getSpecialtyById($specialty_id);
    if ($specialty === false) {
        // getSpecialtyById failed, handle the error
        include 'includes/errormessge.php';
        return false;
    }
    return $specialty['name'];
}


// Get the values from POST operation
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $specialty_id = $_POST['specialty'];

    // Get specialty name
    $specialty = getSpecialtyName($specialty_id);

    // Output HTML content directly
?>

<!-- Your HTML content here -->

<div class="details-container">
    <div class="head-details">
        <h5 class="head-details"><?php echo $fname . ' ' . $lname; ?></h5>
        <h6 class="sub-details"><?php echo $specialty; ?></h6>
        <p class="text-det">Date Of Birth: <?php echo $dob; ?></p> 
        <p class="text-det">Email Address: <?php echo $email; ?></p> 
        <p class="text-det">Phone Number: <?php echo $telephone; ?></p> 
    </div>
</div>

<!-- Confirm button -->
<div class="confirmation">
    <form id="confirmForm" method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="fname" value="<?php echo $fname; ?>">
        <input type="hidden" name="lname" value="<?php echo $lname; ?>">
        <input type="hidden" name="dob" value="<?php echo $dob; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="telephone" value="<?php echo $telephone; ?>">
        <input type="hidden" name="specialty" value="<?php echo $specialty_id; ?>">
        <input type="hidden" name="confirm" value="1">
        <button type="submit" name="confirm" id="confirmButton" class="btn btn-primary">Confirm Update</button>
    </form>
</div>

<?php
}

// If confirmation button is clicked
if (isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $specialty_id = $_POST['specialty'];

    // Calling the CRUD Operations to Update the Database
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $telephone, $specialty_id);

    // Redirect to viewrecords.php or show error
    if ($result) {
        echo '<div class="alert alert-success">Successfully Updated!</div>';
        echo '<script> 
                document.getElementById("confirmButton").disabled = true; 
                setTimeout(function(){ window.location.href="viewrecords.php"; }, 3000); 
              </script>';
    } else {
        echo include 'includes/errormessge.php';
    }
}
?>

<!-- Rest of your HTML content here -->

<!-- Success message -->
<div class="success-message" style="display: none;">
    <div class="success-icon">
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
    </div>
    <div class="success-text">
        Successfully Updated!
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#confirmForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'editpost.php',
                data: $('#confirmForm').serialize(),
                success: function() {
                    document.querySelector(".confirmation").style.display = "none";
                    document.querySelector(".success-message").style.display = "block";
                    setTimeout(function() {
                        window.location.href = "viewrecords.php";
                    }, 3000);
                }
            });
        });
    });
</script>

<br>
<hr>
<br>

<?php require_once 'includes/footer.php'; ?>
