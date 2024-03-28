
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    

    <!-------- Customized CSS ---------->

    <link rel="stylesheet" href="css/login.css">

</head>

<?php

session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $title = 'Login';
    require_once 'db/conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);  

        $result = $user->getUser($username,$new_password);
            if(!$result){ 
                echo '<div class="alert alert-danger text-center" role="alert"> Username or Password is incorrect! Please try again. </div>';
            }else{
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $result['id'];
                header("Location: viewrecords.php");
            }
    }

?>


<h1 class="text-center"><?php echo $title ?></h1> #

<button id="dark-mode-toggle">
    <i id="dark-mode-icon" class="fa fa-moon-o"></i>Dark Mode
</button>



<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <table class="table table-sm table-borderless">
        <tr>
            <td><label for="username"> Username </label></td>
            <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] === "POST") echo $_POST['username']; ?>"></td>
        </tr> 
        <tr>
            <td><label for="password" >Password </label></td>
            <td><input type="password" name="password" class="form-control" id="password"></td>
        </tr>
    </table>
<br/> <br/> 

    <input type="submit" value="Login" class="btn btn-primary btn-block"> </br>
    <a href="#"> Forgot Password </a>

</br> </br>
</br> </br>
</br> </br>

<div style="text-align: center;">
    <a href="index.php" class="btn btn-primary"> <i class="fa fa-home"></i> Back to Home </a>
</div>



    
</form>

</br>
</br>
</br>

<script>
document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    var icon = document.getElementById('dark-mode-icon');
    if (document.body.classList.contains('dark-mode')) {
        icon.className = 'fa fa-sun-o';
    } else {
        icon.className = 'fa fa-moon-o';
    }
});

</script>




<?php include_once 'includes/footer.php'?>
