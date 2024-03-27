
<!-- <body class="success-page"> -->

<?php 

    $title = 'Update Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php'; // for authentication check and this always should be on the top of the page after the header cause header has session_start 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){

        include 'includes/errormessge.php';
        
    }
    else{

        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);

    
    


?>


    <h1 class="text-center"> Update Details  </h1>

    <form method="post" action="editpost.php">

    <!--  Hidden input field to store the id of the record to be updated so user not able to see the ID -->
    
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" /> 

        <div class="mb-3">

            <label for="first_name" class= "form-label">Your First Name </label>
            <input type="text" name="fname" class="form-control" value=" <?php echo  $attendee['firstname']; ?>" id="fname"  placeholder="Enter Your First Name Here">
            

        </div>

        <div class="mb-3">

            <label for="last_name" class= "form-label">Your Last Name </label>
            <input type="text" name="lname" class="form-control" value=" <?php echo  $attendee['lastname']; ?>" id="lname"  placeholder="Enter Your Last Name Here">
            

        </div>

        <div class="mb-3">

            <label for="dob" class= "form-label"> Enter Your Birthday </label>
            <input type="text" name="dob" class="form-control" value=" <?php echo  $attendee['dateofbirth']; ?>" id="dob" placeholder="Enter Your Birthday">
            

        </div>

        <div class="mb-3">

            <label for="specialty" class= "form-label" > Area of Expertise </label>
            <select class="form-select" id="specialty" name="specialty">

                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>

                    <option value=" <?php echo $r['specialty_id']?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>> 
                    
                        <?php echo  $r['name']?> 
                
                    </option>

                <?php }?>

            </select>
            

        </div>

        <div class="mb-3">

            <label for="email" class= "form-label">Email Address : </label>
            <input type="email" name="email" class="form-control"  value=" <?php echo $attendee['emailaddress']; ?>" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email Address Here">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else </div>

        </div>

        <div class="mb-3">

            <label for="telephone" class="form-label"> Contact Number: </label>
            <input type="text" name="telephone" class="form-control" value=" <?php echo  $attendee['telephone']; ?>"id="telephone"aria-describedby="phoneHelp" placeholder="Enter Your Phone Number">
            <div id="phoneHelp" class="form-text">We'll never share your Phone Number with anyone else </div>

        </div>

        <!--  <div class="mb-3 form-check" >

            <input type="checkbox" name="checkbox" class="form-check-input" id="Check-box1">
            <label class="form-check-label" for="Check-box1">Check me out</label>

        </div> -->
        <div class="View-btn" style="text-align: center;">

        <a href="viewrecords.php" class="btn btn-primary"> <i class="fas fa-left-long"></i> Back </a>
        <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save Changes </button>

        </div>

        <br>

    </input>

    <?php } ?>

  <!-- closing the if statement to functioning the what inside the form when else statement passing  -->

    <br> 
    <hr/> 
    <br>

    

<?php 

    require_once 'includes/footer.php';

?>

