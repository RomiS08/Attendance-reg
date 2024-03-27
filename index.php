
<body class="success-page">

<?php 


//echo 'Current PHP version: ' . phpversion();

    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

?>

    <h1 class="text-center"> Registration for IT Conference  </h1>

    <form method="post" action="success.php">

        <div class="mb-3">

            <label for="first_name" class= "form-label">Your First Name </label>
            <input required type="text" name="fname" class="form-control" id="first_name"  placeholder="Enter Your First Name Here">
            

        </div>

        <div class="mb-3">

            <label for="last_name" class= "form-label">Your Last Name </label>
            <input  required type="text" name="lname" class="form-control" id="last_name"  placeholder="Enter Your Last Name Here">
            

        </div>

        <div class="mb-3">

            <label for="dob" class= "form-label"> Enter Your Birthday </label>
            <input type="text" name="dob" class="form-control" id="dob" placeholder="Enter Your Birthday">
            

        </div>

        <div class="mb-3">

            <label for="specialty" class="form-label">Area of Expertise</label>

            <select required class="form-select" id="specialty" name="specialty">

                <option selected disabled value="">Select your Role </option>  <!-- This Just Like Placeholder this avoid when user clicked clear drop down been empty-->
                    
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>

                <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']?> </option>
                    
                <?php }?>

            </select>

        </div>


        <div class="mb-3">

            <label for="email" class= "form-label">Email Address : </label>
            <input required type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email Address Here">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else </div>

        </div>

        <div class="mb-3">

            <label for="telephone" class="form-label"> Contact Number: </label>
            <input type="text" name="telephone" class="form-control" id="telephone" aria-describedby="phoneHelp" placeholder="Enter Your Phone Number"> 
            <div id="phoneHelp" class="form-text">We'll never share your Phone Number with anyone else </div>

        </div>

        <!--  <div class="mb-3 form-check" >

            <input type="checkbox" name="checkbox" class="form-check-input" id="Check-box1">
            <label class="form-check-label" for="Check-box1">Check me out</label>

        </div> -->
        
        <div class="index-btn" style="text-align: center;">
        <button type="submit" name="submit" class="btn btn-primary"> <i class="fa-solid fa-circle-plus"></i> Submit </button>
        <button type="button" name="cancel" class="btn btn-warning" onclick="location.reload();"><i class="fa-sharp fa-solid fa-ban"></i> Cancel </button>
        <button type="button" name="clear" class="btn btn-secondary" onclick="clearForm();"><i class="fa-solid fa-eraser"></i> Clear </button>
        </div>

    </form>

        <script>

            function clearForm() {
                document.getElementById('first_name').value = '';
                document.getElementById('last_name').value = '';
                document.getElementById('dob').value = '';
                document.getElementById('specialty').selectedIndex = 0; // This will reset the drop down to the first option (which is the placeholder as hidden value is set to empty string)
                document.getElementById('email').value = '';
                document.getElementById('telephone').value = '';
}           
        </script>


    <br> 
    <hr/> 
    <br>

    

<?php 

    require_once 'includes/footer.php';

?>
