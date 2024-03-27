<?php 

    $title = 'View Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php'; // for authentication check and this always should be on the top of the page after the header cause header has session_start 
    require_once 'db/conn.php';

    // <----  Get and view data from the database using "id"----->

    if(!isset($_GET['id'])){

        //echo ' <h4 class=" text-center text-danger"> Database Fetching Failure.! Please Contact Support </h4> ';
        include 'includes/errormessge.php';
        header("Location: viewrecords.php");  // <---- If ID Invalid Redirecting to the viewrecords.php page ----->

    } else{
        
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);

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

<div class="details" >
      <div class="details-input">
          <h5 class="head-details"> <?php echo $result ['firstname'] ." ". $result ['lastname'];?> </h5>
          <h6 class="sub-details"> <?php echo $result ['name']; ?>  </h6>
          <p class="text-det"> Date Of Birth : <?php echo $result ['dateofbirth'];?> </p> 
          <p class="text-det"> Email Address : <?php echo $result ['emailaddress'];?> </p> 
          <p class="text-det"> Phone Number : <?php echo $result['telephone']; ?> </p> 
      </div>
  </div> 

<br>

<div class="View-btn" style="text-align: center;">
    <a href="viewrecords.php" class="btn btn-primary"> <i class="fas fa-left-long"></i> Back </a>
    <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-success"> <i class="fa-solid fa-pen-to-square"></i> Edit </a>
    <button onclick="deleteRecord(<?php echo $result['attendee_id']?>)" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> Delete </button>
</div>



    


<?php 

    }  // <----  End of the else statement ----->
?>

<br> <hr/> <br> <!--  Adding some space and horizontal line -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function deleteRecord(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to delete.php
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: {id: id},
                success: function() {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your record has been deleted.",
                        icon: "success"
                    }).then(($result) => {
                        if($result.isConfirmed){
                            window.location.href = 'viewrecords.php';
                        }
                        
                    });
                }
            });
        }
    });
}
</script>

<?php 

    require_once 'includes/footer.php';

?>