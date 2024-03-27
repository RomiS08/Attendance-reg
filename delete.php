<?php 
    session_start();
?>

<?php
require_once 'includes/auth_check.php'; // for authentication check and this always should be on the top of the page after the header cause header has session_start 
require_once 'db/conn.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the ID from the POST data
    $id = $_POST['id'];

    // Call the deleteAttendee function
    $result = $crud->deleteAttendee($id);

    if ($result) {
        echo "Record Deleted successfully";
    } else {
        //echo "There was an error deleting the record";
        include 'includes/errormessge.php';
    }
}
?>
